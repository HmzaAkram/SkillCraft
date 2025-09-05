<?php

namespace App\Http\Controllers;

use App\Events\CourseCreated;
use App\Models\Certification;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Progress;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['adminIndex', 'create', 'store', 'edit', 'update', 'destroy']);
    }

    // Admin Routes
    public function adminIndex()
    {
        $courses = Course::latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course = Course::create($validated);
        event(new CourseCreated($course)); // Trigger real-time event

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }

    // User Routes
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        $enrolled = Auth::user()->courses->contains($id);
        $userProgress = Progress::where('user_id', Auth::id())->where('course_id', $id)->get();
        $progressPercentage = $course->lessons->count() > 0 ? ($userProgress->where('status', 'completed')->count() / $course->lessons->count() * 100) : 0;

        return view('courses.show', compact('course', 'enrolled', 'progressPercentage', 'userProgress'));
    }

    public function enroll($id)
    {
        $user = Auth::user();
        $course = Course::with('lessons')->findOrFail($id);
        $user->courses()->attach($id);

        foreach ($course->lessons as $lesson) {
            Progress::create([
                'user_id' => $user->id,
                'course_id' => $id,
                'lesson_id' => $lesson->id,
                'status' => 'started',
            ]);
        }

        return redirect()->route('courses.show', $id)->with('success', 'Enrolled successfully.');
    }

    public function completeLesson(Request $request, $courseId, $lessonId)
    {
        $progress = Progress::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->where('lesson_id', $lessonId)
            ->firstOrFail();
        $progress->status = 'completed';
        $progress->save();

        // Check if course is complete
        $course = Course::with('lessons')->findOrFail($courseId);
        $completedCount = Progress::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->where('status', 'completed')
            ->count();
        if ($completedCount === $course->lessons->count()) {
            // Generate PDF certificate
            $pdf = Pdf::loadView('certificates.template', ['user' => Auth::user(), 'course' => $course]);
            $fileName = 'certificates/' . Auth::id() . '_' . $courseId . '.pdf';
            Storage::put($fileName, $pdf->output());

            Certification::create([
                'user_id' => Auth::id(),
                'course_id' => $courseId,
                'certificate_url' => $fileName,
            ]);
        }

        return redirect()->route('courses.show', $courseId)->with('success', 'Lesson completed.');
    }
}