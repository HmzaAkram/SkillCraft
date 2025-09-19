<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillCrafter – AI‑Powered Skill Builder</title>
    <meta name="description" content="Master any skill with AI-powered personalized learning paths, adaptive exercises, and real-time feedback.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
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

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 15px;
        }

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
            padding: 1rem 0;
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
            gap: 2rem;
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
            gap: 1rem;
        }

        .cta-button {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: #fff;
            padding: 0.75rem 1.5rem;
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

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler-icon {
            width: 25px;
            height: 3px;
            background: #4a5568;
            border-radius: 2px;
            transition: 0.3s;
        }

        .hero {
            background: linear-gradient(135deg, #fed7aa 0%, #fef3c7 50%, #f6ad55 100%);
            padding: 80px 0;
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
            font-size: clamp(2rem, 6vw, 4rem);
            font-weight: 900;
            margin-bottom: 1.5rem;
            color: #1a202c;
            line-height: 1.3;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
        }

        .hero p {
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            margin-bottom: 2rem;
            color: #4b5563;
            max-width: 650px;
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
            background: #ffffff;
            color: #2d3748;
            padding: 0.75rem 1.5rem;
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

        .features {
            padding: 60px 0;
            background: #f1f5f9;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .section-header p {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: #718096;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.06);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e63946, #f6ad55);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
            color: #fff;
        }

        .feature-card h3 {
            font-size: clamp(1.25rem, 2vw, 1.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .feature-card p {
            color: #718096;
            line-height: 1.7;
        }

        .how-it-works {
            padding: 60px 0;
            background: #ffffff;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.25rem;
            margin: 0 auto 1.5rem;
        }

        .step h3 {
            font-size: clamp(1.25rem, 2vw, 1.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        .step p {
            color: #718096;
            line-height: 1.7;
        }

        .cta-section {
            background: linear-gradient(135deg, #2d3748, #4a5568);
            color: #ffffff;
            padding: 60px 0;
            text-align: center;
        }

        .cta-section h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: clamp(1rem, 2vw, 1.25rem);
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        footer {
            background: #1a202c;
            color: #e2e8f0;
            padding: 3rem 0 1.5rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
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
            padding-top: 1.5rem;
            text-align: center;
            color: #a0aec0;
            font-size: 0.85rem;
        }

        .chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e63946, #f6ad55);
            box-shadow: 0 6px 15px rgba(230, 57, 70, 0.3);
            border-radius: 50%;
            z-index: 1050;
            cursor: pointer;
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chatbot-toggle:hover {
            transform: scale(1.1);
        }

        .chatbot-panel {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 90%;
            max-width: 400px;
            max-height: 70vh;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background: #ffffff;
            overflow: hidden;
            z-index: 1050;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .chatbot-panel.hidden {
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
        }

        .chatbot-header {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-messages {
            max-height: 60vh;
            background: #f7fafc;
            overflow-y: auto;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .chat-message {
            background: #ffffff;
            border-radius: 10px;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            font-size: 0.95rem;
            max-width: 80%;
            align-self: flex-start;
        }

        .chat-message.user {
            align-self: flex-end;
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: #fff;
        }

        .chatbot-input {
            display: flex;
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .chatbot-input input {
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            flex-grow: 1;
            margin-right: 0.5rem;
            padding: 0.5rem 1rem;
        }

        .chatbot-input button {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            transition: transform 0.3s ease;
        }

        .chatbot-input button:hover {
            transform: scale(1.05);
        }

        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
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

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
            .nav-links a {
                font-size: 1rem;
            }
            .hero {
                padding: 40px 0;
            }
            .hero h1 {
                font-size: clamp(1.5rem, 5vw, 2.5rem);
            }
            .hero p {
                font-size: clamp(1rem, 2.5vw, 1.25rem);
            }
            .cta-button, .btn-secondary {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            .features, .how-it-works, .cta-section {
                padding: 40px 0;
            }
            .section-header h2 {
                font-size: clamp(1.5rem, 3vw, 2rem);
            }
            .chatbot-panel {
                bottom: 60px;
                max-width: 100%;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
                background: #ffffff;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                z-index: 999;
            }
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            .chatbot-panel {
                max-width: 350px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .container {
                padding: 0 10px;
            }
            .features-grid, .steps {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

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
</head>
<body x-data="{ 
    chatbotOpen: false, 
    messages: [{ text: 'Hi! I\'m your TalkToText Pro assistant. I can help you understand our features, answer questions about meeting transcriptions, or summarize meeting content. How can I help you today?', time: '19:34' }], 
    newMessage: '' 
}" @keydown.escape="chatbotOpen = false">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/" 
                   style="font-size: 28px; font-weight: 700; color: #e63946; text-transform: uppercase; letter-spacing: 2px; text-shadow: 2px 2px 6px rgba(0,0,0,0.2); transition: all 0.3s ease;">
                    SkillCrafter
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('features') }}">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('notes.index') }}">Notes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('how-it-works') }}">How It Works</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('community') }}">Community</a></li>
                    </ul>
                    <div class="d-flex align-items-center gap-2">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-danger">Admin Panel</a>
                            @endif
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:40px; height:40px;" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle fs-5"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('certifications.index') }}">Certifications</a></li>
                                </ul>
                            </div>
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
                    <a href="#terms" style="color: #9ca3af;">Terms of Service</a>
                </p>
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

    <!-- Chatbot Toggle Button -->
    <div class="chatbot-toggle d-flex align-items-center justify-content-center" @click="chatbotOpen = !chatbotOpen">
        <i class="bi bi-chat-dots-fill fs-3 text-white"></i>
    </div>

    <!-- Chatbot Panel -->
    <div class="chatbot-panel" :class="{ 'hidden': !chatbotOpen }">
        <div class="chatbot-header">
            <div class="d-flex align-items-center">
                <i class="bi bi-robot me-2 fs-5"></i>
                <h5 class="mb-0">TalkToText AI</h5>
                <small class="ms-2 opacity-75">Always here to help</small>
            </div>
            <button class="btn-close btn-close-white" @click="chatbotOpen = false"></button>
        </div>
        <div class="chatbot-messages" x-ref="messages">
            <template x-for="message in messages" :key="message.time">
                <div class="chat-message" :class="{ 'user': message.isUser }">
                    <p x-text="message.text"></p>
                    <small class="text-muted d-block text-end" x-text="message.time"></small>
                </div>
            </template>
        </div>
        <form class="chatbot-input" @submit.prevent="sendMessage">
            <input type="text" class="form-control" placeholder="Ask me anything about TalkToText..." x-model="newMessage">
            <button type="submit"><i class="bi bi-send-fill"></i></button>
        </form>
    </div>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
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
                style.backdropFilter = 'none';
            }
        });

        // Scroll animations
        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // Chatbot message sending
        function sendMessage() {
            if (!this.newMessage.trim()) return;

            // Add user message
            this.messages.push({ text: this.newMessage, time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }), isUser: true });
            const userMessage = this.newMessage;
            this.newMessage = '';

            // Send to backend
            fetch('/chatbot/handle', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ message: userMessage })
            })
            .then(response => response.json())
            .then(data => {
                if (data.text) {
                    this.messages.push({ text: data.text, time: data.time });
                } else {
                    this.messages.push({ text: 'Sorry, no response from server.', time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) });
                }
            })
            .catch(error => {
                this.messages.push({ text: 'Error: Could not connect to server.', time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) });
            })
            .finally(() => {
                this.$nextTick(() => {
                    const messagesEl = this.$refs.messages;
                    messagesEl.scrollTop = messagesEl.scrollHeight;
                });
            });
        }

        // Interactive hover effects
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', () => card.style.transform = 'translateY(-10px) scale(1.02)');
            card.addEventListener('mouseleave', () => card.style.transform = 'translateY(0) scale(1)');
        });

        // CTA button tracking
        document.querySelectorAll('.cta-button').forEach(button => {
            button.addEventListener('click', (e) => console.log('CTA clicked:', e.target.textContent));
        });
    </script>
</body>
</html>