<x-portfolio-layout>
    <x-slot name="title">AI Portfolio - Showcasing Cutting-Edge AI Projects</x-slot>

    <!-- Hero Section with Premium Design -->
    <section class="relative min-h-screen flex items-center overflow-hidden bg-white dark:bg-gray-950">
        <!-- Animated Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 via-purple-50/30 to-pink-50/50 dark:from-blue-950/20 dark:via-purple-950/10 dark:to-pink-950/20"></div>
        
        <!-- Floating Particles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-400 rounded-full animate-float-slow opacity-60"></div>
            <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-purple-400 rounded-full animate-float-medium opacity-60"></div>
            <div class="absolute bottom-1/4 right-1/4 w-2 h-2 bg-pink-400 rounded-full animate-float-fast opacity-60"></div>
            <div class="absolute top-2/3 left-1/3 w-1.5 h-1.5 bg-indigo-400 rounded-full animate-float-slow opacity-60"></div>
            <div class="absolute bottom-1/3 left-2/3 w-2.5 h-2.5 bg-cyan-400 rounded-full animate-float-medium opacity-60"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8 animate-fade-in-up">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-500/20 rounded-full backdrop-blur-sm animate-slide-in-left">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <span class="text-sm font-medium bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Available for AI/ML Projects
                        </span>
                    </div>

                    <!-- Main Heading with Staggered Animation -->
                    <div class="space-y-4">
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-bold leading-[1.1] tracking-tight">
                            <span class="inline-block animate-fade-in-up animation-delay-100">
                                Crafting
                            </span>
                            <br>
                            <span class="inline-block bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-fade-in-up animation-delay-200 bg-300% animate-gradient">
                                Intelligent
                            </span>
                            <br>
                            <span class="inline-block animate-fade-in-up animation-delay-300">
                                Solutions
                            </span>
                        </h1>
                    </div>

                    <!-- Description -->
                    <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-xl animate-fade-in-up animation-delay-400">
                        Transforming complex challenges into elegant AI-powered solutions. Specialized in machine learning, deep learning, and cutting-edge artificial intelligence.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up animation-delay-500">
                        <a href="#projects" class="group relative px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/50 hover:scale-105 text-center">
                            <span class="relative z-10">Explore My Work</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <a href="#contact" class="group px-8 py-4 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border-2 border-gray-200 dark:border-gray-800 rounded-xl font-semibold hover:border-blue-600 dark:hover:border-blue-400 transition-all duration-300 hover:shadow-xl hover:scale-105 text-center">
                            <span class="flex items-center justify-center gap-2">
                                Let's Talk
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </span>
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8 animate-fade-in-up animation-delay-600">
                        <div class="text-center sm:text-left">
                            <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">50+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">AI Projects</div>
                        </div>
                        <div class="text-center sm:text-left">
                            <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">95%</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Accuracy</div>
                        </div>
                        <div class="text-center sm:text-left">
                            <div class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-pink-600 to-blue-600 bg-clip-text text-transparent">5+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Years Exp</div>
                        </div>
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="relative animate-fade-in-up animation-delay-300">
                    <!-- Main Card with 3D Effect -->
                    <div class="relative group">
                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500 animate-pulse-slow"></div>
                        
                        <!-- Main Card -->
                        <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-2xl border border-gray-200 dark:border-gray-800 overflow-hidden transform transition-transform duration-500 group-hover:scale-105">
                            <!-- Animated Grid Background -->
                            <div class="absolute inset-0 opacity-5 dark:opacity-10">
                                <div class="absolute inset-0" style="background-image: linear-gradient(rgba(99, 102, 241, 0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(99, 102, 241, 0.1) 1px, transparent 1px); background-size: 20px 20px;"></div>
                            </div>

                            <!-- Content -->
                            <div class="relative space-y-6">
                                <!-- AI Brain Visualization -->
                                <div class="relative aspect-square max-w-sm mx-auto">
                                    <svg class="w-full h-full" viewBox="0 0 200 200" fill="none">
                                        <!-- Neural Network Nodes -->
                                        <circle cx="100" cy="100" r="60" class="stroke-blue-500 dark:stroke-blue-400 animate-pulse-slow" stroke-width="2" fill="none"/>
                                        <circle cx="100" cy="100" r="40" class="stroke-purple-500 dark:stroke-purple-400 animate-pulse-slow animation-delay-200" stroke-width="2" fill="none"/>
                                        <circle cx="100" cy="100" r="20" class="stroke-pink-500 dark:stroke-pink-400 animate-pulse-slow animation-delay-400" stroke-width="2" fill="none"/>
                                        
                                        <!-- Connection Lines -->
                                        <line x1="100" y1="40" x2="100" y2="160" class="stroke-blue-400/30" stroke-width="1" stroke-dasharray="5,5"/>
                                        <line x1="40" y1="100" x2="160" y2="100" class="stroke-purple-400/30" stroke-width="1" stroke-dasharray="5,5"/>
                                        <line x1="60" y1="60" x2="140" y2="140" class="stroke-pink-400/30" stroke-width="1" stroke-dasharray="5,5"/>
                                        <line x1="140" y1="60" x2="60" y2="140" class="stroke-indigo-400/30" stroke-width="1" stroke-dasharray="5,5"/>
                                        
                                        <!-- Glowing Nodes -->
                                        <circle cx="100" cy="40" r="4" class="fill-blue-500">
                                            <animate attributeName="r" values="4;6;4" dur="2s" repeatCount="indefinite"/>
                                        </circle>
                                        <circle cx="100" cy="160" r="4" class="fill-purple-500">
                                            <animate attributeName="r" values="4;6;4" dur="2s" begin="0.2s" repeatCount="indefinite"/>
                                        </circle>
                                        <circle cx="40" cy="100" r="4" class="fill-pink-500">
                                            <animate attributeName="r" values="4;6;4" dur="2s" begin="0.4s" repeatCount="indefinite"/>
                                        </circle>
                                        <circle cx="160" cy="100" r="4" class="fill-indigo-500">
                                            <animate attributeName="r" values="4;6;4" dur="2s" begin="0.6s" repeatCount="indefinite"/>
                                        </circle>
                                    </svg>
                                </div>

                                <!-- Tech Stack Pills -->
                                <div class="flex flex-wrap gap-2 justify-center">
                                    <span class="px-3 py-1.5 bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded-full text-xs font-medium border border-blue-500/20 hover:bg-blue-500/20 transition-colors cursor-default">TensorFlow</span>
                                    <span class="px-3 py-1.5 bg-purple-500/10 text-purple-600 dark:text-purple-400 rounded-full text-xs font-medium border border-purple-500/20 hover:bg-purple-500/20 transition-colors cursor-default">PyTorch</span>
                                    <span class="px-3 py-1.5 bg-pink-500/10 text-pink-600 dark:text-pink-400 rounded-full text-xs font-medium border border-pink-500/20 hover:bg-pink-500/20 transition-colors cursor-default">Scikit-learn</span>
                                    <span class="px-3 py-1.5 bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-full text-xs font-medium border border-indigo-500/20 hover:bg-indigo-500/20 transition-colors cursor-default">OpenAI</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-blue-400 to-purple-400 rounded-2xl rotate-12 opacity-20 animate-float-slow pointer-events-none"></div>
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full opacity-20 animate-float-medium pointer-events-none"></div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#about" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </a>
        </div>
    </section>

    <!-- About Section with Premium Cards -->
    <section id="about" class="relative py-24 bg-gray-50 dark:bg-gray-900 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5 dark:opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle, #6366f1 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 space-y-4">
                <span class="inline-block px-4 py-2 bg-blue-500/10 text-blue-600 dark:text-blue-400 rounded-full text-sm font-semibold border border-blue-500/20">
                    About Me
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Passionate
                    </span> About AI
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Creating AI solutions that make a real difference in the world
                </p>
            </div>

            <!-- Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Innovation Card -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-3xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-xl border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <!-- Content -->
                        <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">Innovation</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            Constantly exploring cutting-edge AI technologies to solve real-world problems with creative and efficient solutions.
                        </p>
                    </div>
                </div>

                <!-- Performance Card -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-xl border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <!-- Content -->
                        <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Performance</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            Optimizing models and systems for maximum efficiency, accuracy, and scalability in production environments.
                        </p>
                    </div>
                </div>

                <!-- Research Card -->
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-600 rounded-3xl blur-xl opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                    <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-xl border border-gray-200 dark:border-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <!-- Content -->
                        <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent">Research</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            Staying at the forefront of AI research, implementing best practices and latest methodologies in every project.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="relative py-24 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <span class="inline-block px-4 py-2 bg-purple-500/10 text-purple-600 dark:text-purple-400 rounded-full text-sm font-semibold border border-purple-500/20">
                    Portfolio
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                    Featured <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Projects</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Explore my latest AI and machine learning projects
                </p>
            </div>
            @livewire('project-showcase')
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="relative py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <span class="inline-block px-4 py-2 bg-pink-500/10 text-pink-600 dark:text-pink-400 rounded-full text-sm font-semibold border border-pink-500/20">
                    Expertise
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                    Skills & <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Technologies</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Technologies and tools I work with
                </p>
            </div>
            @livewire('skills-display')
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="relative py-24 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <span class="inline-block px-4 py-2 bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 rounded-full text-sm font-semibold border border-indigo-500/20">
                    Insights
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                    Latest <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Articles</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Thoughts and insights on AI and technology
                </p>
            </div>
            @livewire('blog-posts-list')
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="relative py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <span class="inline-block px-4 py-2 bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 rounded-full text-sm font-semibold border border-cyan-500/20">
                    Connect
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                    Get in <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Touch</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Let's discuss your next AI project
                </p>
            </div>
            @livewire('contact-form')
        </div>
    </section>

    <!-- CV Upload Section -->
    <section class="relative py-24 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-blue-950/20 dark:via-purple-950/20 dark:to-pink-950/20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl blur-2xl opacity-20"></div>
                <div class="relative bg-white dark:bg-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 border border-gray-200 dark:border-gray-800">
                    <div class="text-center mb-8 space-y-4">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-500/20 rounded-full">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                For Recruiters
                            </span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold">
                            Hiring? <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Upload Your CV</span>
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-400">
                            Let our AI analyze your requirements and see if we're a match
                        </p>
                    </div>
                    @livewire('resume-upload')
                </div>
            </div>
        </div>
    </section>
</x-portfolio-layout>
