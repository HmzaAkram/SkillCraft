<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="//unpkg.com/alpinejs" defer></script>

     
    <script src="//unpkg.com/alpinejs" defer></script>       {{-- Required for Alpine --}}
    <meta charset="UTF-8">
    <!-- Bootstrap 5 CSS (include this in the head section) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillCrafter – AI‑Powered Skill Builder</title>
    <meta name="description" content="Master any skill with AI-powered personalized learning paths, adaptive exercises, and real-time feedback.">
    <style>
        /* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    line-height: 1.7;
    color: #2d3748;
    background: #f7fafc;
    overflow-x: hidden;
}

/* Container */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
}

/* Header */
header {
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: box-shadow 0.3s ease;
}

header.scrolled {
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem 0;
}

.navbar-brand {
    font-size: 1.75rem;
    font-weight: 800;
    color: #e63946;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: color 0.3s ease;
}

.navbar-brand:hover {
    color: #c53030;
}

.nav-links {
    display: flex;
    gap: 2.5rem;
    list-style: none;
}

.nav-links a {
    text-decoration: none;
    color: #4a5568;
    font-weight: 600;
    font-size: 1.1rem;
    transition: color 0.3s ease, transform 0.2s ease;
}

.nav-links a:hover {
    color: #e63946;
    transform: translateY(-2px);
}

.auth-buttons {
    display: flex;
    gap: 1.25rem;
}

.cta-button {
    background: linear-gradient(135deg, #e63946, #f6ad55);
    color: #fff;
    padding: 0.875rem 2rem;
    border: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 24px rgba(230, 57, 70, 0.25);
}

/* Mobile Menu */
.navbar-toggler {
    border: none;
    padding: 0.5rem;
}

.navbar-toggler-icon {
    width: 28px;
    height: 3px;
    background: #4a5568;
    border-radius: 2px;
    transition: 0.3s;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, #fed7aa 0%, #fef3c7 50%, #f6ad55 100%);
    padding: 140px 0 100px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.15'%3E%3Ccircle cx='40' cy='40' r='3'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero h1 {
    font-size: clamp(2.75rem, 6vw, 4.5rem);
    font-weight: 900;
    margin-bottom: 1.75rem;
    color: #1a202c;
    line-height: 1.3;
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
}

.hero p {
    font-size: 1.5rem;
    margin-bottom: 2.5rem;
    color: #4b5563;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.hero-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 4rem;
}

.btn-secondary {
    background: #ffffff;
    color: #2d3748;
    padding: 0.875rem 2rem;
    border: 2px solid #e2e8f0;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    border-color: #e63946;
    color: #e63946;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* Features Section */
.features {
    padding: 100px 0;
    background: #f1f5f9;
}

.section-header {
    text-align: center;
    margin-bottom: 5rem;
}

.section-header h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1.25rem;
    color: #1a202c;
}

.section-header p {
    font-size: 1.25rem;
    color: #718096;
    max-width: 650px;
    margin: 0 auto;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
}

.feature-card {
    background: #ffffff;
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.06);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #e63946, #f6ad55);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 1.75rem;
    color: #fff;
}

.feature-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
    color: #1a202c;
}

.feature-card p {
    color: #718096;
    line-height: 1.7;
}

/* How It Works */
.how-it-works {
    padding: 100px 0;
    background: #ffffff;
}

.steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 3.5rem;
    margin-top: 4rem;
}

.step {
    text-align: center;
    position: relative;
}

.step-number {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #e63946, #f6ad55);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 1.5rem;
    margin: 0 auto 2rem;
}

.step h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
    color: #1a202c;
}

.step p {
    color: #718096;
    line-height: 1.7;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #2d3748, #4a5568);
    color: #ffffff;
    padding: 100px 0;
    text-align: center;
}

.cta-section h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
}

.cta-section p {
    font-size: 1.25rem;
    margin-bottom: 3rem;
    opacity: 0.9;
}

/* Footer */
footer {
    background: #1a202c;
    color: #e2e8f0;
    padding: 4rem 0 2rem;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 3rem;
    margin-bottom: 3rem;
}

.footer-section h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #ffffff;
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 0.75rem;
}

.footer-section ul li a {
    color: #a0aec0;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #e63946;
}

.footer-bottom {
    border-top: 1px solid #4a5568;
    padding-top: 2rem;
    text-align: center;
    color: #a0aec0;
    font-size: 0.9rem;
}

/* Chatbot Styles */
.chatbot-toggle {
    bottom: 40px;
    right: 40px;
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #e63946, #f6ad55);
    box-shadow: 0 8px 20px rgba(230, 57, 70, 0.3);
}

.chatbot-panel {
    bottom: 120px;
    right: 40px;
    width: 380px;
    max-height: 500px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.chatbot-header {
    background: linear-gradient(135deg, #e63946, #f6ad55);
    color: #fff;
    padding: 1rem 1.5rem;
}

.chatbot-messages {
    max-height: 350px;
    background: #f7fafc;
}

.chatbot-input input {
    border-radius: 50px;
    border: 1px solid #e2e8f0;
}

.chatbot-input button {
    background: linear-gradient(135deg, #e63946, #f6ad55);
}

/* Modal Styles */
.modal-content {
    border-radius: 20px;
    border: none;
}

.modal-header {
    background: linear-gradient(135deg, #e63946, #f6ad55);
    color: #fff;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

.modal-body input,
.modal-body textarea {
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    transition: border-color 0.3s ease;
}

.modal-body input:focus,
.modal-body textarea:focus {
    border-color: #e63946;
    box-shadow: 0 0 8px rgba(230, 57, 70, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .nav-links {
        flex-direction: column;
        gap: 1.5rem;
        padding: 1rem;
        background: #ffffff;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 999;
    }

    .navbar-collapse.show {
        display: flex;
    }

    .hero h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
    }

    .hero p {
        font-size: 1.25rem;
    }

    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }

    .features-grid,
    .steps {
        grid-template-columns: 1fr;
    }

    .chatbot-panel {
        width: 90%;
        right: 5%;
        bottom: 80px;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.8s ease-out;
}

.animate-on-scroll {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease-out;
}

.animate-on-scroll.animated {
    opacity: 1;
    transform: translateY(0);
}
           </style>
           <!-- Add in your main layout file (before closing </head>) -->
<script src="//unpkg.com/alpinejs" defer></script>

</head>
<body>
    <!-- Header -->
<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <!-- Logo -->
          <a class="navbar-brand fw-bold" href="/" 
   style="font-size: 28px; 
          font-weight: 700; 
          color: #e63946; 
          text-transform: uppercase; 
          letter-spacing: 2px; 
          text-shadow: 2px 2px 6px rgba(0,0,0,0.2); 
          transition: all 0.3s ease;">
    SkillCrafter
</a>


            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('features') }}">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('notes.index') }}">Notes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('how-it-works') }}">How It Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('community') }}">Community</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">Pricing</a></li> -->
                </ul>

                <!-- Auth Buttons -->
                <div class="d-flex align-items-center gap-3">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-danger">Admin Panel</a>
                        @endif

                        <!-- Profile Icon Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:40px; height:40px;" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle fs-5"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                
                                <!-- <li><a class="dropdown-item" href="{{ route('progress') }}">Progress</a></li> -->
                                <li><a class="dropdown-item" href="{{ route('certifications.index') }}">Certifications</a></li>
                            </ul>
                        </div>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-sm btn-danger">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>


    
    <main>
        @yield('content')
    </main>

   
    {{-- Light/Dark Toggle Script --}}
   <!-- Footer -->
    <footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>SkillCrafter</h3>
                <p>Empowering learners worldwide with AI-powered skill development.</p>
            </div>
            <div class="footer-section">
                <h3>Product</h3>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#integrations">Integrations</a></li>
                    <li><a href="#api">API</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Company</h3>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#careers">Careers</a></li>
                    <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</a></li>

                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 SkillCrafter. All rights reserved. | 
            <a href="#privacy" style="color: #9ca3af;">Privacy Policy</a> | 
            <a href="#terms" style="color: #9ca3af;">Terms of Service</a></p>
        </div>
    </div>

    <!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg">
      <div class="modal-header" style="background: linear-gradient(135deg, #e11d48, #f59e0b); color: white;">
        <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn text-white" style="background: linear-gradient(135deg, #e11d48, #f59e0b);">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg">
      <div class="modal-header" style="background: linear-gradient(135deg, #e11d48, #f59e0b); color: white;">
        <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn text-white" style="background: linear-gradient(135deg, #e11d48, #f59e0b);">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>

</footer>


    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = '#fff';
                header.style.backdropFilter = 'none';
            }
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Mobile menu toggle (basic implementation)
        const mobileMenu = document.querySelector('.mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        mobileMenu.addEventListener('click', () => {
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });

        // Add some interactive hover effects
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // CTA button click tracking (placeholder)
        document.querySelectorAll('.cta-button').forEach(button => {
            button.addEventListener('click', (e) => {
                // Add analytics tracking here
                console.log('CTA clicked:', e.target.textContent);
            });
        });
    </script>
   @if (Route::currentRouteName() != 'chatbot')
   <div x-data="{ open: false }">
    <!-- Chatbot Toggle Button -->
    <button @click="open = !open"
        class="rounded-circle position-fixed d-flex align-items-center justify-content-center"
        style="bottom: 30px; right: 30px; z-index: 1050; width: 60px; height: 60px;
               background: linear-gradient(135deg, #e11d48, #f59e0b);
               box-shadow: 0 6px 16px rgba(225,29,72,0.4); border: none;">
        <i class="bi bi-robot fs-3 text-white"></i>
    </button>

    <!-- Chatbot Panel -->
    <div x-show="open"
         x-transition
         class="position-fixed bg-white border-0 rounded-4 shadow-lg"
         style="bottom: 100px; right: 30px; width: 340px; z-index: 1051; overflow: hidden;">
         
        <!-- Chatbot Header -->
        <div class="d-flex align-items-center justify-content-between px-3 py-2"
             style="background: linear-gradient(135deg, #e11d48, #f59e0b); color: white;">
            <h6 class="mb-0 fw-bold">🤖 SkillCrafter AI</h6>
            <button @click="open = false" class="btn btn-sm btn-light rounded-circle">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Chatbot Messages -->
        <div class="p-3" style="max-height: 300px; overflow-y: auto;">
            @if(session('reply'))
                <div class="alert alert-secondary p-2 mb-2">
                    <strong>You:</strong> {{ old('message') }}
                </div>
                <div class="alert alert-success p-2">
                    <strong>AI:</strong> {{ session('reply') }}
                </div>
            @else
                <p class="text-muted small">👋 Ask me anything about skills, learning paths, or AI guidance!</p>
            @endif
        </div>

        <!-- Chatbot Input -->
        <form method="POST" action="{{ route('chatbot.message') }}" class="d-flex p-2 border-top">
            @csrf
            <input type="text" name="message" class="form-control me-2 rounded-pill"
                   placeholder="Type a message..." required>
            <button type="submit"
                    class="btn rounded-pill text-white px-3"
                    style="background: linear-gradient(135deg, #e11d48, #f59e0b);">
                <i class="bi bi-send-fill"></i>
            </button>
        </form>
    </div>
</div>
@endif



</body>
</html>