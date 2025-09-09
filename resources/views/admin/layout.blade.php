<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin • SkillCrafter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body { background: #f6f7fb; }
    .sidebar { width: 260px; position: fixed; top: 0; bottom: 0; left: 0; background: #111827; color: #fff; padding-top: 70px; }
    .sidebar a { color: #9ca3af; text-decoration: none; padding: 12px 20px; display: block; }
    .sidebar a.active, .sidebar a:hover { background: #1f2937; color: #fff; }
    .content { margin-left: 260px; padding: 20px; }
    .topbar { position: fixed; left: 260px; right: 0; top: 0; height: 60px; background: #fff; border-bottom: 1px solid #eee; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; z-index: 10; }
    .badge-role { text-transform: capitalize; }
    @media (max-width: 768px) {
      .sidebar { width: 100%; height: auto; position: relative; padding-top: 0; }
      .content { margin-left: 0; padding-top: 60px; }
      .topbar { left: 0; }
    }
  </style>
</head>
<body>
  <div class="topbar">
    <div class="fw-semibold">Admin Panel</div>
    <div>
      <span class="me-3">{{ auth()->user()->name ?? '' }} <span class="badge bg-dark badge-role">{{ auth()->user()->role ?? '' }}</span></span>
      <form class="d-inline" method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-sm btn-outline-danger">Logout</button>
      </form>
    </div>
  </div>

<div class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <i class="bi bi-people-fill me-2"></i> Users
    </a>
    <a href="{{ route('admin.notes.index') }}" class="{{ request()->routeIs('admin.notes.*') ? 'active' : '' }}">
        <i class="bi bi-journal-bookmark-fill me-2"></i> Notes
    </a>
    <a href="{{ route('admin.courses.index') }}" class="{{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
        <i class="bi bi-mortarboard-fill me-2"></i> Courses
    </a>
    <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text-fill me-2"></i> Blogs
    </a>
    <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
        <i class="bi bi-envelope-fill me-2"></i> Emails
    </a>
    <a href="{{ route('home') }}">
        <i class="bi bi-house-door-fill me-2"></i> Back to Site
    </a>
</div>

  <main class="content" style="padding-top: 80px;">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @yield('content')
  </main>
</body>
</html>