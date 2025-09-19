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
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: #c53030;
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
            color: #fff;
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

        .hero {
            background: linear-gradient(135deg, #fed7aa 0%, #fef3c7 50%, #f6ad55 100%);
            padding: 120px 0 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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
            max-width: 800px;
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
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }

        .features {
            padding: 80px 0;
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

        /* FIXED CHATBOT STYLES */
        .chatbot-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #e63946, #f6ad55);
            box-shadow: 0 8px 25px rgba(230, 57, 70, 0.4);
            border-radius: 50%;
            z-index: 1050;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        .chatbot-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 30px rgba(230, 57, 70, 0.5);
        }

        .chatbot-toggle i {
            font-size: 1.5rem;
            color: white;
        }

        /* MAIN CHATBOT PANEL */
        .chatbot-panel {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 400px;
            height: 500px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            z-index: 1049;
            display: none; /* Initially hidden */
            flex-direction: column;
            overflow: hidden;
        }

        .chatbot-panel.show {
            display: flex;
            animation: slideInUp 0.3s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* CHATBOT HEADER */
        .chatbot-header {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: white;
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .chatbot-header-info h5 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .chatbot-header-info small {
            opacity: 0.9;
            font-size: 0.8rem;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .close-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* MESSAGES CONTAINER */
        .chatbot-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            background: #f8fafc;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .chatbot-messages::-webkit-scrollbar {
            width: 6px;
        }

        .chatbot-messages::-webkit-scrollbar-track {
            background: transparent;
        }

        .chatbot-messages::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        /* MESSAGE BUBBLES */
        .message {
            max-width: 85%;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-size: 0.9rem;
            line-height: 1.4;
            animation: messageSlideIn 0.3s ease-out;
        }

        .message.bot {
            background: white;
            color: #2d3748;
            align-self: flex-start;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .message.user {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            color: white;
            align-self: flex-end;
        }

        .message-time {
            font-size: 0.7rem;
            opacity: 0.7;
            margin-top: 0.25rem;
            text-align: right;
        }

        .message.bot .message-time {
            text-align: left;
        }

        @keyframes messageSlideIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* TYPING INDICATOR */
        .typing-indicator {
            background: white;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            align-self: flex-start;
            max-width: 80px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .typing-dot {
            width: 6px;
            height: 6px;
            background: #cbd5e0;
            border-radius: 50%;
            animation: typing 1.4s infinite;
        }

        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.4;
            }
            30% {
                transform: translateY(-8px);
                opacity: 1;
            }
        }

        /* INPUT AREA - CRITICAL FIX */
        .chatbot-input {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 1rem;
            display: flex;
            gap: 0.75rem;
            align-items: center;
            flex-shrink: 0; /* PREVENTS SHRINKING */
        }

        .chatbot-input input {
            flex: 1;
            border: 2px solid #e2e8f0;
            border-radius: 25px;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.3s ease;
            background: #f8fafc;
        }

        .chatbot-input input:focus {
            border-color: #e63946;
            background: white;
            box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
        }

        .chatbot-input input::placeholder {
            color: #a0aec0;
        }

        .send-btn {
            background: linear-gradient(135deg, #e63946, #f6ad55);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: white;
            font-size: 1rem;
        }

        .send-btn:hover:not(:disabled) {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(230, 57, 70, 0.4);
        }

        .send-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 576px) {
            .chatbot-panel {
                bottom: 90px;
                right: 15px;
                left: 15px;
                width: auto;
                height: 70vh;
            }
            
            .chatbot-toggle {
                bottom: 20px;
                right: 20px;
                width: 55px;
                height: 55px;
            }
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

  <!-- CHATBOT -->
    <button class="chatbot-toggle" onclick="toggleChat()">
        <i class="bi bi-chat-dots-fill"></i>
    </button>

    <div class="chatbot-panel" id="chatPanel">
        <div class="chatbot-header">
            <div class="chatbot-header-info">
                <div class="d-flex align-items-center">
                    <i class="bi bi-robot me-2"></i>
                    <div>
                        <h5>SkillCrafter AI</h5>
                        <small>Online • Here to assist</small>
                    </div>
                </div>
            </div>
            <button class="close-btn" onclick="toggleChat()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="chatbot-messages" id="chatMessages">
            <div class="message bot">
                <div>Hi! I'm your SkillCrafter assistant. I can help you understand our features, answer questions about skill development, or guide you through our learning paths. How can I help you today?</div>
                <div class="message-time" id="initialTime"></div>
            </div>
        </div>

        <div class="chatbot-input">
            <input type="text" 
                   id="messageInput" 
                   placeholder="Ask me anything about SkillCrafter..." 
                   onkeypress="handleKeyPress(event)">
            <button class="send-btn" id="sendBtn" onclick="sendMessage()">
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </div>

    <script>
        let isTyping = false;
        let chatOpen = false;

        // Initialize chat
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('initialTime').textContent = getCurrentTime();
        });

        function toggleChat() {
            const panel = document.getElementById('chatPanel');
            chatOpen = !chatOpen;
            
            if (chatOpen) {
                panel.classList.add('show');
                setTimeout(() => document.getElementById('messageInput').focus(), 300);
            } else {
                panel.classList.remove('show');
            }
        }

        function getCurrentTime() {
            return new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                sendMessage();
            }
        }

        function sendMessage() {
            const input = document.getElementById('messageInput');
            const message = input.value.trim();
            
            if (!message || isTyping) return;

            // Add user message
            addMessage(message, true);
            
            // Clear input
            input.value = '';
            
            // Show typing indicator
            showTyping();
            
            // Simulate AI response
            setTimeout(() => {
                hideTyping();
                const responses = [
                    "That's a great question! SkillCrafter uses advanced AI to create personalized learning paths tailored to your goals and learning style.",
                    "I'd be happy to help! Our platform offers interactive exercises, real-time feedback, and progress tracking to ensure effective learning.",
                    "Absolutely! With SkillCrafter, you can master any skill through our adaptive learning system that adjusts to your pace and preferences.",
                    "Great to hear from you! Our AI-powered approach makes skill development more engaging and efficient than traditional methods.",
                    "Thanks for your interest! SkillCrafter combines cutting-edge technology with proven learning methodologies to help you achieve your goals.",
                    "I'm here to help with any questions about SkillCrafter! Whether it's about features, pricing, or how to get started, just ask!"
                ];
                
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                addMessage(randomResponse, false);
            }, 1000 + Math.random() * 1500);
        }

        function addMessage(text, isUser) {
            const messagesContainer = document.getElementById('chatMessages');
            
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
            
            messageDiv.innerHTML = `
                <div>${text}</div>
                <div class="message-time">${getCurrentTime()}</div>
            `;
            
            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function showTyping() {
            isTyping = true;
            document.getElementById('sendBtn').disabled = true;
            
            const messagesContainer = document.getElementById('chatMessages');
            const typingDiv = document.createElement('div');
            typingDiv.className = 'typing-indicator';
            typingDiv.id = 'typingIndicator';
            typingDiv.innerHTML = `
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            `;
            
            messagesContainer.appendChild(typingDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function hideTyping() {
            isTyping = false;
            document.getElementById('sendBtn').disabled = false;
            
            const typingIndicator = document.getElementById('typingIndicator');
            if (typingIndicator) {
                typingIndicator.remove();
            }
        }

        // Close chat on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && chatOpen) {
                toggleChat();
            }
        });
    </script>
</body>
</html>