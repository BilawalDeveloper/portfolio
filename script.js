// ===== PARTICLE SYSTEM =====
class ParticleSystem {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.particles = [];
        this.connections = [];
        this.mouse = { x: 0, y: 0 };
        this.particleCount = 80;
        
        this.resize();
        this.init();
        window.addEventListener('resize', () => this.resize());
    }
    
    resize() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }
    
    init() {
        this.particles = [];
        for (let i = 0; i < this.particleCount; i++) {
            this.particles.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5,
                radius: Math.random() * 2 + 1,
                color: this.getRandomColor()
            });
        }
    }
    
    getRandomColor() {
        const colors = [
            'rgba(0, 212, 255, 0.6)',
            'rgba(123, 47, 247, 0.6)',
            'rgba(255, 0, 110, 0.6)'
        ];
        return colors[Math.floor(Math.random() * colors.length)];
    }
    
    update() {
        this.particles.forEach(particle => {
            particle.x += particle.vx;
            particle.y += particle.vy;
            
            // Mouse interaction
            const dx = this.mouse.x - particle.x;
            const dy = this.mouse.y - particle.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < 150) {
                particle.x -= dx / distance * 0.5;
                particle.y -= dy / distance * 0.5;
            }
            
            // Boundaries
            if (particle.x < 0 || particle.x > this.canvas.width) particle.vx *= -1;
            if (particle.y < 0 || particle.y > this.canvas.height) particle.vy *= -1;
            
            particle.x = Math.max(0, Math.min(this.canvas.width, particle.x));
            particle.y = Math.max(0, Math.min(this.canvas.height, particle.y));
        });
    }
    
    draw() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        // Draw connections
        this.particles.forEach((p1, i) => {
            this.particles.slice(i + 1).forEach(p2 => {
                const dx = p1.x - p2.x;
                const dy = p1.y - p2.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 150) {
                    this.ctx.beginPath();
                    this.ctx.strokeStyle = `rgba(0, 212, 255, ${0.2 * (1 - distance / 150)})`;
                    this.ctx.lineWidth = 0.5;
                    this.ctx.moveTo(p1.x, p1.y);
                    this.ctx.lineTo(p2.x, p2.y);
                    this.ctx.stroke();
                }
            });
        });
        
        // Draw particles
        this.particles.forEach(particle => {
            this.ctx.beginPath();
            this.ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
            this.ctx.fillStyle = particle.color;
            this.ctx.fill();
            
            // Glow effect
            this.ctx.shadowBlur = 10;
            this.ctx.shadowColor = particle.color;
            this.ctx.fill();
            this.ctx.shadowBlur = 0;
        });
    }
    
    animate() {
        this.update();
        this.draw();
        requestAnimationFrame(() => this.animate());
    }
}

// ===== NEURAL NETWORK SVG =====
class NeuralNetwork {
    constructor(svg) {
        this.svg = svg;
        this.nodes = [];
        this.connections = [];
        this.mouse = { x: 0, y: 0 };
        
        this.init();
    }
    
    init() {
        const width = window.innerWidth;
        const height = window.innerHeight;
        
        // Create neural network nodes
        const layers = 4;
        const nodesPerLayer = 6;
        
        for (let layer = 0; layer < layers; layer++) {
            for (let node = 0; node < nodesPerLayer; node++) {
                const x = (width / (layers + 1)) * (layer + 1);
                const y = (height / (nodesPerLayer + 1)) * (node + 1);
                
                const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                circle.setAttribute('cx', x);
                circle.setAttribute('cy', y);
                circle.setAttribute('r', '5');
                circle.setAttribute('fill', 'url(#neuralGradient)');
                circle.setAttribute('filter', 'url(#glow)');
                circle.classList.add('neural-node');
                
                this.svg.appendChild(circle);
                this.nodes.push({ element: circle, x, y, layer, node });
            }
        }
        
        // Create connections between layers
        for (let layer = 0; layer < layers - 1; layer++) {
            const currentLayer = this.nodes.filter(n => n.layer === layer);
            const nextLayer = this.nodes.filter(n => n.layer === layer + 1);
            
            currentLayer.forEach(n1 => {
                nextLayer.forEach(n2 => {
                    if (Math.random() > 0.3) { // 70% connection rate
                        const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                        line.setAttribute('x1', n1.x);
                        line.setAttribute('y1', n1.y);
                        line.setAttribute('x2', n2.x);
                        line.setAttribute('y2', n2.y);
                        line.setAttribute('stroke', 'url(#neuralGradient)');
                        line.setAttribute('stroke-width', '1');
                        line.setAttribute('opacity', '0.2');
                        line.classList.add('neural-connection');
                        
                        this.svg.insertBefore(line, this.svg.firstChild);
                        this.connections.push({ element: line, from: n1, to: n2 });
                    }
                });
            });
        }
        
        this.animateConnections();
    }
    
    animateConnections() {
        setInterval(() => {
            const connection = this.connections[Math.floor(Math.random() * this.connections.length)];
            if (connection) {
                connection.element.setAttribute('opacity', '0.8');
                setTimeout(() => {
                    connection.element.setAttribute('opacity', '0.2');
                }, 500);
            }
        }, 200);
    }
    
    updateMousePosition(x, y) {
        this.mouse = { x, y };
        
        this.nodes.forEach(node => {
            const dx = x - node.x;
            const dy = y - node.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < 200) {
                const scale = 1 + (1 - distance / 200) * 0.5;
                node.element.setAttribute('r', 5 * scale);
                node.element.setAttribute('opacity', 0.5 + (1 - distance / 200) * 0.5);
            } else {
                node.element.setAttribute('r', '5');
                node.element.setAttribute('opacity', '1');
            }
        });
    }
}

// ===== 3D TILT EFFECT =====
function initTiltEffect() {
    const cards = document.querySelectorAll('[data-tilt]');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        });
    });
}

// ===== SMOOTH SCROLL =====
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
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
}

// ===== INTERSECTION OBSERVER FOR ANIMATIONS =====
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    document.querySelectorAll('.skill-category-card, .project-card, .stat-card').forEach(el => {
        observer.observe(el);
    });
}

// ===== AI CUBE MOUSE INTERACTION =====
function initCubeInteraction() {
    const cube = document.getElementById('aiCube');
    const container = document.querySelector('.ai-cube-container');
    
    if (!cube || !container) return;
    
    let mouseX = 0;
    let mouseY = 0;
    let currentX = 0;
    let currentY = 0;
    
    container.addEventListener('mousemove', (e) => {
        const rect = container.getBoundingClientRect();
        mouseX = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
        mouseY = ((e.clientY - rect.top) / rect.height - 0.5) * 2;
    });
    
    function animate() {
        currentX += (mouseX - currentX) * 0.1;
        currentY += (mouseY - currentY) * 0.1;
        
        const rotateY = currentX * 30;
        const rotateX = -currentY * 30;
        
        cube.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        
        requestAnimationFrame(animate);
    }
    
    animate();
}

// ===== CUSTOM CURSOR =====
function initCustomCursor() {
    if (window.matchMedia('(pointer: fine)').matches) {
        const cursor = document.createElement('div');
        cursor.classList.add('custom-cursor');
        document.body.appendChild(cursor);
        
        const cursorDot = document.createElement('div');
        cursorDot.classList.add('custom-cursor-dot');
        document.body.appendChild(cursorDot);
        
        let mouseX = 0;
        let mouseY = 0;
        let cursorX = 0;
        let cursorY = 0;
        let dotX = 0;
        let dotY = 0;
        
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });
        
        function animateCursor() {
            // Smooth cursor follow
            cursorX += (mouseX - cursorX) * 0.1;
            cursorY += (mouseY - cursorY) * 0.1;
            dotX += (mouseX - dotX) * 0.2;
            dotY += (mouseY - dotY) * 0.2;
            
            cursor.style.left = cursorX + 'px';
            cursor.style.top = cursorY + 'px';
            cursorDot.style.left = dotX + 'px';
            cursorDot.style.top = dotY + 'px';
            
            requestAnimationFrame(animateCursor);
        }
        
        animateCursor();
        
        // Cursor hover effects
        document.querySelectorAll('a, button, .project-card, .skill-category-card').forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
                cursorDot.style.transform = 'translate(-50%, -50%) scale(0.5)';
            });
            
            el.addEventListener('mouseleave', () => {
                cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                cursorDot.style.transform = 'translate(-50%, -50%) scale(1)';
            });
        });
    }
}

// ===== SKILL BARS ANIMATION =====
function animateSkillBars() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBars = entry.target.querySelectorAll('.skill-progress');
                progressBars.forEach((bar, index) => {
                    setTimeout(() => {
                        bar.style.animation = 'growBar 1.5s ease-out forwards';
                    }, index * 100);
                });
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3
    });
    
    document.querySelectorAll('.skill-category-card').forEach(card => {
        observer.observe(card);
    });
}

// ===== PROJECT CARDS GLOW EFFECT =====
function initProjectGlowEffect() {
    const cards = document.querySelectorAll('.project-card');
    
    cards.forEach(card => {
        const glow = card.querySelector('.project-glow');
        
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            glow.style.left = x + 'px';
            glow.style.top = y + 'px';
        });
    });
}

// ===== TYPING EFFECT FOR HERO =====
function initTypingEffect() {
    const subtitleElement = document.querySelector('.hero-subtitle');
    if (!subtitleElement) return;
    
    const originalText = subtitleElement.innerHTML;
    subtitleElement.innerHTML = '';
    
    let charIndex = 0;
    let isTag = false;
    let tagBuffer = '';
    
    function type() {
        if (charIndex < originalText.length) {
            const char = originalText[charIndex];
            
            if (char === '<') {
                isTag = true;
                tagBuffer = char;
            } else if (char === '>' && isTag) {
                isTag = false;
                tagBuffer += char;
                subtitleElement.innerHTML += tagBuffer;
                tagBuffer = '';
            } else if (isTag) {
                tagBuffer += char;
            } else {
                subtitleElement.innerHTML += char;
            }
            
            charIndex++;
            setTimeout(type, isTag ? 0 : 30);
        }
    }
    
    setTimeout(type, 1000);
}

// ===== FORM VALIDATION & SUBMISSION =====
function initFormSubmission() {
    const form = document.getElementById('contactForm');
    if (!form) return;
    
    const nameInput = document.getElementById('contactName');
    const emailInput = document.getElementById('contactEmail');
    const messageInput = document.getElementById('contactMessage');
    const honeypot = form.querySelector('input[name="website"]');
    const formMessage = document.getElementById('formMessage');
    const submitBtn = document.getElementById('submitBtn');
    
    // Email validation regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    // Real-time validation
    nameInput.addEventListener('blur', () => validateField(nameInput, 'nameError', nameInput.value.trim().length >= 2, 'Name must be at least 2 characters'));
    emailInput.addEventListener('blur', () => validateField(emailInput, 'emailError', emailRegex.test(emailInput.value.trim()), 'Please enter a valid email'));
    messageInput.addEventListener('blur', () => validateField(messageInput, 'messageError', messageInput.value.trim().length >= 10, 'Message must be at least 10 characters'));
    
    function validateField(field, errorId, isValid, errorMessage) {
        const errorElement = document.getElementById(errorId);
        if (!isValid) {
            field.classList.add('invalid');
            field.classList.remove('valid');
            errorElement.textContent = errorMessage;
            return false;
        } else {
            field.classList.add('valid');
            field.classList.remove('invalid');
            errorElement.textContent = '';
            return true;
        }
    }
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        try {
            // Check honeypot (spam prevention)
            if (honeypot.value) {
                return; // Bot detected, silently fail
            }
            
            // Validate all fields
            const isNameValid = validateField(nameInput, 'nameError', nameInput.value.trim().length >= 2, 'Name must be at least 2 characters');
            const isEmailValid = validateField(emailInput, 'emailError', emailRegex.test(emailInput.value.trim()), 'Please enter a valid email');
            const isMessageValid = validateField(messageInput, 'messageError', messageInput.value.trim().length >= 10, 'Message must be at least 10 characters');
            
            if (!isNameValid || !isEmailValid || !isMessageValid) {
                showFormMessage('Please fix the errors above', 'error');
                return;
            }
            
            // Disable submit button and show loading
            submitBtn.disabled = true;
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="loading-spinner"></span><span>Sending...</span>';
            
            try {
                // Simulate API call (replace with actual backend endpoint)
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                // For demo purposes - in production, send to your backend
                const formData = {
                    name: nameInput.value.trim(),
                    email: emailInput.value.trim(),
                    message: messageInput.value.trim()
                };
                
                console.log('Form data:', formData);
                
                // Success
                showFormMessage('✓ Message sent successfully! We\'ll get back to you soon.', 'success');
                form.reset();
                
                // Clear validation states
                [nameInput, emailInput, messageInput].forEach(input => {
                    input.classList.remove('valid', 'invalid');
                });
                
            } catch (error) {
                showFormMessage('✗ Failed to send message. Please try again later.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        } catch (error) {
            console.error('Form submission error:', error);
            showFormMessage('✗ An unexpected error occurred. Please try again.', 'error');
            submitBtn.disabled = false;
        }
    });
    
    function showFormMessage(message, type) {
        formMessage.textContent = message;
        formMessage.className = `form-message ${type}`;
        formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        
        if (type === 'success') {
            setTimeout(() => {
                formMessage.className = 'form-message';
            }, 5000);
        }
    }
}

// ===== PARALLAX EFFECT =====
function initParallaxEffect() {
    let ticking = false;
    
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrolled = window.pageYOffset;
                
                // Parallax for hero cube
                const cube = document.querySelector('.ai-cube-container');
                if (cube) {
                    cube.style.transform = `translateY(${scrolled * 0.3}px)`;
                }
                
                // Parallax for sections
                document.querySelectorAll('.section-title').forEach(title => {
                    const rect = title.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        const offset = (window.innerHeight - rect.top) * 0.05;
                        title.style.transform = `translateY(${offset}px)`;
                    }
                });
                
                ticking = false;
            });
            
            ticking = true;
        }
    });
}

// ===== NAVIGATION ACTIVE STATE =====
function initNavigationActiveState() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    window.addEventListener('scroll', () => {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (pageYOffset >= sectionTop - 100) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
}

// ===== MOBILE MENU TOGGLE =====
function initMobileMenu() {
    const menuToggle = document.getElementById('mobileMenuToggle');
    const navLinks = document.getElementById('navLinks');
    
    if (!menuToggle || !navLinks) return;
    
    menuToggle.addEventListener('click', () => {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        navLinks.classList.toggle('active');
        
        // Focus management
        if (!isExpanded) {
            // Menu opening - focus first link
            const firstLink = navLinks.querySelector('.nav-link');
            if (firstLink) {
                setTimeout(() => firstLink.focus(), 100);
            }
        }
    });
    
    // Close menu when clicking on a link
    navLinks.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            menuToggle.setAttribute('aria-expanded', 'false');
            navLinks.classList.remove('active');
            menuToggle.focus();
        });
    });
    
    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && navLinks.classList.contains('active')) {
            menuToggle.setAttribute('aria-expanded', 'false');
            navLinks.classList.remove('active');
            menuToggle.focus();
        }
    });
}

// ===== THEME TOGGLE =====
function initThemeToggle() {
    const themeToggle = document.getElementById('themeToggle');
    if (!themeToggle) return;
    
    // Check for saved theme preference or default to 'dark'
    const currentTheme = localStorage.getItem('theme') || 'dark';
    if (currentTheme === 'light') {
        document.body.classList.add('light-theme');
    }
    
    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('light-theme');
        const theme = document.body.classList.contains('light-theme') ? 'light' : 'dark';
        localStorage.setItem('theme', theme);
    });
}

// ===== BACK TO TOP BUTTON =====
function initBackToTop() {
    const backToTop = document.getElementById('backToTop');
    if (!backToTop) return;
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });
    
    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Keyboard support
    backToTop.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    });
}

// ===== SCROLL PROGRESS INDICATOR =====
function initScrollProgress() {
    const scrollProgress = document.getElementById('scrollProgress');
    if (!scrollProgress) return;
    
    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        scrollProgress.style.width = scrolled + '%';
        scrollProgress.setAttribute('aria-valuenow', Math.round(scrolled));
    });
}

// ===== COOKIE CONSENT =====
function initCookieConsent() {
    const cookieConsent = document.getElementById('cookieConsent');
    const acceptBtn = document.getElementById('cookieAccept');
    const declineBtn = document.getElementById('cookieDecline');
    
    if (!cookieConsent) return;
    
    // Check if user has already made a choice
    const cookieChoice = localStorage.getItem('cookieConsent');
    
    if (!cookieChoice) {
        // Show banner after 2 seconds
        setTimeout(() => {
            cookieConsent.classList.add('show');
        }, 2000);
    }
    
    acceptBtn.addEventListener('click', () => {
        localStorage.setItem('cookieConsent', 'accepted');
        cookieConsent.classList.remove('show');
        // Initialize analytics here if needed
        console.log('Cookies accepted');
    });
    
    declineBtn.addEventListener('click', () => {
        localStorage.setItem('cookieConsent', 'declined');
        cookieConsent.classList.remove('show');
        console.log('Cookies declined');
    });
}

// ===== INITIALIZE EVERYTHING =====
document.addEventListener('DOMContentLoaded', () => {
    // Initialize particle system
    const canvas = document.getElementById('particleCanvas');
    if (canvas) {
        const particleSystem = new ParticleSystem(canvas);
        particleSystem.animate();
        
        // Update mouse position for particle system
        document.addEventListener('mousemove', (e) => {
            particleSystem.mouse.x = e.clientX;
            particleSystem.mouse.y = e.clientY;
        });
    }
    
    // Initialize neural network
    const neuralSvg = document.getElementById('neuralSvg');
    if (neuralSvg) {
        const network = new NeuralNetwork(neuralSvg);
        
        // Update neural network on mouse move
        document.addEventListener('mousemove', (e) => {
            network.updateMousePosition(e.clientX, e.clientY);
        });
    }
    
    // Initialize all features
    initTiltEffect();
    initSmoothScroll();
    initScrollAnimations();
    initCubeInteraction();
    initCustomCursor();
    animateSkillBars();
    initProjectGlowEffect();
    initTypingEffect();
    initFormSubmission();
    initParallaxEffect();
    initNavigationActiveState();
    initMobileMenu();
    initThemeToggle();
    initBackToTop();
    initScrollProgress();
    initCookieConsent();
    
    // Add active class to nav links on scroll
    const navStyle = document.createElement('style');
    navStyle.textContent = `
        .nav-link.active {
            color: var(--accent-cyan);
        }
        .nav-link.active::after {
            width: 100%;
        }
        .custom-cursor {
            position: fixed;
            width: 40px;
            height: 40px;
            border: 2px solid var(--accent-cyan);
            border-radius: 50%;
            pointer-events: none;
            z-index: 10000;
            transition: transform 0.2s ease;
            transform: translate(-50%, -50%);
        }
        .custom-cursor-dot {
            position: fixed;
            width: 8px;
            height: 8px;
            background: var(--accent-cyan);
            border-radius: 50%;
            pointer-events: none;
            z-index: 10001;
            transition: transform 0.1s ease;
            transform: translate(-50%, -50%);
        }
        .neural-node {
            transition: all 0.3s ease;
        }
        .neural-connection {
            transition: opacity 0.5s ease;
        }
    `;
    document.head.appendChild(navStyle);
});

// ===== PERFORMANCE OPTIMIZATION =====
// Debounce function for resize events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Optimize resize handlers
window.addEventListener('resize', debounce(() => {
    const canvas = document.getElementById('particleCanvas');
    if (canvas) {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
}, 250));
