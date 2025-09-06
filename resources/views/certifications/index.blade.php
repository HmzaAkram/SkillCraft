@extends('layouts.app')

@section('content')
<section class="hero" style="padding: 100px 0 50px;">
  <div class="container text-center">
    <h1 class="mb-3">Your Certifications</h1>
    <p class="text-muted">Download and showcase your achievements</p>
  </div>
</section>

<section style="background-color:#f9fafb;">
  <div class="container py-5">
    <div class="row g-4">
      @forelse($certifications as $cert)
        <div class="col-md-4">
          <div class="card shadow-sm h-100 text-center p-4">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title">{{ $cert->course->name }}</h5>
              <p class="text-muted small mb-3">Certified on {{ $cert->created_at->format('M d, Y') }}</p>
              <a href="{{ route('certifications.download', $cert->id) }}" 
                 class="btn btn-primary mt-auto">
                <i class="bi bi-download"></i> Download Certificate
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p class="text-muted">No certifications yet. Complete courses to earn certificates.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
    