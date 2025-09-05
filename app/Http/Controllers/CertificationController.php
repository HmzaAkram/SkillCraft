<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Certification;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Auth::user()->certifications()->with('course')->get();
        return view('certifications.index', compact('certifications'));
    }

    public function download($id)
    {
        $certification = Certification::findOrFail($id);
        if ($certification->user_id !== Auth::id()) {
            abort(403);
        }
        return Storage::download($certification->certificate_url);
    }
}