<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="//unpkg.com/alpinejs" defer></script>

     
    <script src="//unpkg.com/alpinejs" defer></script>       {{-- Required for Alpine --}}
    <meta charset="UTF-8">
    <!-- Bootstrap 5 CSS (include this in the head section) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillCrafter – AI‑Powered Skill Builder</title>
    <meta name="description" content="Master any skill with AI-powered personalized learning paths, adaptive exercises, and real-time feedback.">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e11d48;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #e11d48;
        }
        .auth-buttons {
    display: flex;
    gap: 1rem; /* Adjust the space between Register and Login */
}


        .cta-button {
            background: linear-gradient(135deg, #e11d48, #f59e0b);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(225, 29, 72, 0.3);
        }

        /* Mobile menu */
        .mobile-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .mobile-menu span {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 3px 0;
            transition: 0.3s;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 50%, #f59e0b 100%);
            padding: 120px 0 80px;
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
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #1f2937;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #4b5563;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }

        .btn-secondary {
            background: white;
            color: #374151;
            padding: 0.75rem 1.5rem;
            border: 2px solid #e5e7eb;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            border-color: #e11d48;
            color: #e11d48;
            transform: translateY(-2px);
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background: #f9fafb;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .section-header p {
            font-size: 1.125rem;
            color: #6b7280;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e11d48, #f59e0b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .feature-card p {
            color: #6b7280;
            line-height: 1.6;
        }

        /* How It Works */
        .how-it-works {
            padding: 80px 0;
            background: white;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #e11d48, #f59e0b);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0 auto 1.5rem;
        }

        .step h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .step p {
            color: #6b7280;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.125rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: #111827;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 1rem;
            text-align: center;
            color: #9ca3af;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: flex;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-buttons .cta-button,
            .hero-buttons .btn-secondary {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .steps {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Scroll animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="container">
            <a href="/" class="logo">SkillCrafter</a>
            <ul class="nav-links">
                           <li><a href="{{ route('about') }}">About</a>
</li>
                <li><a href="{{ route('features') }}">Features</a>
</li>
           <li><a href="{{ route('notes.index') }}">Notes</a>

</li>
 
                <a href="{{ route('how-it-works') }}">How It Works</a>

                <li><a href="{{ route('pricing') }}">Pricing</a>
</li>
    
            </ul>
 <div class="auth-buttons">
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="cta-button">Logout</button>
        </form>
    @else
        <a href="{{ route('register') }}" class="cta-button">Register</a>
        <a href="{{ route('login') }}" class="cta-button">Login</a>
    @endauth
</div>


            <!-- <div class="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div> -->
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
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#careers">Careers</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <!-- <div class="footer-section">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#help">Help Center</a></li>
                        <li><a href="#community">Community</a></li>
                        <li><a href="#tutorials">Tutorials</a></li>
                        <li><a href="#status">Status</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 SkillCrafter. All rights reserved. | <a href="#privacy" style="color: #9ca3af;">Privacy Policy</a> | <a href="#terms" style="color: #9ca3af;">Terms of Service</a></p>
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



</body>
</html>