<?php

namespace App\Http\Controllers;

use App\Events\CourseCreated;
use App\Models\Certification;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Progress;
use App\Models\Mcq;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['adminIndex', 'create', 'store', 'edit', 'update', 'destroy', 'adminMcqsIndex', 'adminMcqCreate', 'adminMcqStore', 'adminMcqEdit', 'adminMcqUpdate', 'adminMcqDestroy']);
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
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:102400',
        ]);

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('videos', 'public');
        }

        $course = Course::create($validated);
        event(new CourseCreated($course));

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
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:102400',
        ]);

        $course = Course::findOrFail($id);

        if ($request->hasFile('video')) {
            if ($course->video) {
                Storage::disk('public')->delete($course->video);
            }
            $validated['video'] = $request->file('video')->store('videos', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->video) {
            Storage::disk('public')->delete($course->video);
        }
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

        return redirect()->route('courses.show', $courseId)->with('success', 'Lesson completed.');
    }

    // Admin MCQ Routes
    // Admin MCQ Routes (add after completeLesson method)
public function adminMcqsIndex($course)
{
    $course = Course::findOrFail($course);
    $mcqs = $course->mcqs()->paginate(10);
    return view('admin.mcqs.index', compact('mcqs', 'course'));
}

public function adminMcqCreate($course)
{
    $course = Course::findOrFail($course);
    return view('admin.mcqs.create', compact('course'));
}

public function adminMcqStore(Request $request, $course)
{
    $validated = $request->validate([
        'question' => 'required|string|max:255',
        'options' => 'required|string', // pehle string validate karo
        'correct_option' => 'required|integer|min:0',
    ]);

    // String ko array me convert karo
    $optionsArray = array_map('trim', explode(',', $request->options));

    if (count($optionsArray) < 2) {
        return back()->withErrors(['options' => 'Please provide at least 2 options.'])->withInput();
    }

    Mcq::create([
        'course_id' => $course,
        'question' => $validated['question'],
        'options' => $optionsArray, // array save hoga
        'correct_option' => $validated['correct_option'],
    ]);

    return redirect()->route('admin.mcqs.index', $course)->with('success', 'MCQ created successfully.');
}


// in your CourseController (or appropriate controller)

public function adminMcqEdit($course, $mcq)
{
    $mcq = Mcq::findOrFail($mcq);

    // Verify the MCQ belongs to the course (optional but recommended)
    if ($mcq->course_id != $course) {
        abort(404);
    }

    $course = Course::findOrFail($course);

    // Pass the MCQ and course to the view.
    // In the blade we'll use implode(',', $mcq->options) to prefill textarea
    return view('admin.mcqs.edit', compact('mcq', 'course'));
}

public function adminMcqUpdate(Request $request, $course, $mcq)
{
    // Basic validation first
    $validated = $request->validate([
        'question' => 'required|string|max:255',
        'options' => 'required|string',           // textarea -> string
        'correct_option' => 'required|integer',   // we'll check bounds below
    ]);

    // Convert comma-separated string to array
    $optionsArray = array_values(array_filter(array_map('trim', explode(',', $request->input('options'))), function($v) {
        return $v !== '' && $v !== null;
    }));

    // Ensure at least 2 options
    if (count($optionsArray) < 2) {
        return back()
            ->withErrors(['options' => 'Please provide at least 2 options (comma-separated).'])
            ->withInput();
    }

    // Normalize correct option to integer index
    $correctIndex = (int) $request->input('correct_option');

    // If your UI expects 1-based option number (e.g., user enters 1 for first option),
    // convert it to 0-based: uncomment next line:
    // $correctIndex = max(0, $correctIndex - 1);

    // Validate correct index is within range
    if ($correctIndex < 0 || $correctIndex >= count($optionsArray)) {
        return back()
            ->withErrors(['correct_option' => 'Correct option index is out of range. Use 0..' . (count($optionsArray) - 1) . '.'])
            ->withInput();
    }

    $mcqModel = Mcq::findOrFail($mcq);

    if ($mcqModel->course_id != $course) {
        abort(404);
    }

    // Update fields explicitly (do not pass original $validated 'options' string)
    $mcqModel->update([
        'question' => $validated['question'],
        'options' => $optionsArray,
        'correct_option' => $correctIndex,
    ]);

    return redirect()->route('admin.mcqs.index', $course)->with('success', 'MCQ updated successfully.');
}

public function adminMcqDestroy($course, $mcq)
{
    $mcq = Mcq::findOrFail($mcq);
    // Optional: Verify the MCQ belongs to the course
    if ($mcq->course_id != $course) {
        abort(404);
    }

    $mcq->delete();

    return redirect()->route('admin.mcqs.index', $course)->with('success', 'MCQ deleted successfully.');
}

    // User MCQ Routes
    public function showMcqTest($id)
    {
        $course = Course::with('lessons', 'mcqs')->findOrFail($id);
        $enrolled = Auth::user()->courses->contains($id);
        $userProgress = Progress::where('user_id', Auth::id())->where('course_id', $id)->get();

        // Check if all lessons are completed
        $allLessonsCompleted = $userProgress->where('status', 'completed')->count() === $course->lessons->count();
        if (!$allLessonsCompleted) {
            return redirect()->route('courses.show', $id)->with('error', 'Please complete all lessons before taking the MCQ test.');
        }

        // Randomize MCQs - Select e.g., 5 random questions
        $mcqQuestions = $course->mcqs()->inRandomOrder()->limit(5)->get(); // Adjust limit as needed

        if ($mcqQuestions->isEmpty()) {
            return redirect()->route('courses.show', $id)->with('error', 'No MCQs available for this course.');
        }

        // Prepare for view
        $questions = $mcqQuestions->map(function ($mcq) {
            return [
                'id' => $mcq->id,
                'question' => $mcq->question,
                'options' => $mcq->options,
                'correct' => $mcq->correct_option,
            ];
        });

        return view('courses.mcq-test', compact('course', 'questions'));
    }

public function submitMcq(Request $request, $id)
{
    $course = Course::with('lessons')->findOrFail($id);
    $userProgress = Progress::where('user_id', Auth::id())->where('course_id', $id)->get();

    // Check if all lessons are completed
    $allLessonsCompleted = $userProgress->where('status', 'completed')->count() === $course->lessons->count();
    if (!$allLessonsCompleted) {
        return redirect()->route('courses.show', $id)->with('error', 'Please complete all lessons before submitting the test.');
    }

    // Collect submitted question IDs
    $submittedAnswers = $request->all();
    $mcqIds = [];
    foreach ($submittedAnswers as $key => $value) {
        if (strpos($key, 'question_') === 0) {
            $mcqIds[] = str_replace('question_', '', $key);
        }
    }

    $mcqs = Mcq::whereIn('id', $mcqIds)->get();
    $totalQuestions = $mcqs->count();
    $passingScore = ceil($totalQuestions * 0.7); // 70% passing

    $score = 0;
    foreach ($mcqs as $mcq) {
        $userAnswer = (int) $request->input("question_{$mcq->id}");
        if ($userAnswer === (int) $mcq->correct_option) {
            $score++;
        }
    }

    if ($score >= $passingScore) {
        $certification = Certification::where('user_id', Auth::id())
            ->where('course_id', $id)
            ->first();

        if (!$certification) {
            $pdf = Pdf::loadView('certificates.template', [
                'user' => Auth::user(),
                'course' => $course
            ]);

            $fileName = 'certificates/' . Auth::id() . '_' . $id . '_' . time() . '.pdf';
            Storage::put($fileName, $pdf->output());

            Certification::create([
                'user_id' => Auth::id(),
                'course_id' => $id,
                'certificate_url' => $fileName,
            ]);
        }

        return redirect()->route('courses.show', $id)->with('success', '🎉 Congratulations! You passed the MCQ test and received a certificate.');
    } else {
        return redirect()->route('courses.show', $id)->with('error', '❌ You did not pass. Score: ' . $score . '/' . $totalQuestions . '. Please try again.');
    }
}

}