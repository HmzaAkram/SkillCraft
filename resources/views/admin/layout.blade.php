<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin • SkillCrafter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      background: #f6f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Sidebar */
    .sidebar {
      width: 260px;
      position: fixed;
      top: 0; bottom: 0; left: 0;
      background: #111827;
      color: #fff;
      padding-top: 70px;
      transition: all 0.3s ease;
    }

    .sidebar a {
      color: #9ca3af;
      text-decoration: none;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-radius: 8px;
      margin: 6px 12px;
      transition: 0.3s;
      font-size: 15px;
      font-weight: 500;
    }

    .sidebar a.active, 
    .sidebar a:hover {
      background: #1f2937;
      color: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .sidebar i {
      font-size: 1.2rem;
    }

    /* Topbar */
    .topbar {
      position: fixed;
      left: 260px; right: 0; top: 0;
      height: 60px;
      background: rgba(255,255,255,0.9);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid #eee;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 10;
      transition: all 0.3s ease;
    }

    /* Content */
    .content {
      margin-left: 260px;
      padding: 20px;
      transition: all 0.3s ease;
    }

    /* User Badge */
    .badge-role {
      text-transform: capitalize;
    }

    /* Mobile Responsive */
    @media (max-width: 992px) {
      .sidebar {
        left: -260px;
      }
      .sidebar.show {
        left: 0;
      }
      .topbar {
        left: 0;
      }
      .content {
        margin-left: 0;
        padding-top: 70px;
      }
      .menu-toggle {
        display: block !important;
        cursor: pointer;
      }
    }

    .menu-toggle {
      display: none;
      font-size: 1.5rem;
      color: #333;
    }
  </style>
</head>
<body>

  <!-- Topbar -->
  <div class="topbar">
    <div class="d-flex align-items-center gap-3">
      <i class="bi bi-list menu-toggle"></i>
      <div class="fw-semibold fs-5">Admin Panel</div>
    </div>
    <div>
      <span class="me-3">
        {{ auth()->user()->name ?? '' }}
        <span class="badge bg-dark badge-role">{{ auth()->user()->role ?? '' }}</span>
      </span>
      <form class="d-inline" method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-sm btn-outline-danger">Logout</button>
      </form>
    </div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
      <i class="bi bi-people-fill"></i> Users
    </a>
    <a href="{{ route('admin.notes.index') }}" class="{{ request()->routeIs('admin.notes.*') ? 'active' : '' }}">
      <i class="bi bi-journal-bookmark-fill"></i> Notes
    </a>
    <a href="{{ route('admin.courses.index') }}" class="{{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
      <i class="bi bi-mortarboard-fill"></i> Courses
    </a>
    <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
      <i class="bi bi-file-earmark-text-fill"></i> Blogs
    </a>
    <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
      <i class="bi bi-envelope-fill"></i> Emails
    </a>
    <a href="{{ route('home') }}">
      <i class="bi bi-house-door-fill"></i> Back to Site
    </a>
  </div>

  <!-- Content -->
  <main class="content" style="padding-top: 80px;">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
  </main>

  <!-- Script for sidebar toggle -->
  <script>
    const toggle = document.querySelector('.menu-toggle');
    const sidebar = document.getElementById('sidebar');
    toggle?.addEventListener('click', () => {
      sidebar.classList.toggle('show');
    });
  </script>
</body>
</html>
