@extends('layouts.app')

@section('content')
    <!-- Hero Section for Contact -->
    <section id="contact-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-primary-100/30 dark:bg-primary-900/20 rounded-full mix-blend-multiply blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-secondary-100/20 dark:bg-secondary-900/10 rounded-full mix-blend-multiply blur-3xl"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-blue-100/20 dark:bg-blue-900/10 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5 dark:opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h60v60H0z\" fill=\"none\"/%3E%3Cpath d=\"M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z\" fill=\"%23000000\" fill-opacity=\"0.2\"/%3E%3C/svg%3E');"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 right-20 hidden lg:block">
            <div class="relative">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-400 to-secondary-400 rotate-12 opacity-20 animate-float-slow"></div>
                <div class="absolute -top-4 -left-4 w-8 h-8 rounded-full bg-secondary-300/40 dark:bg-secondary-700/40 animate-float"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <!-- Content Column -->
                    <div class="animate-slide-up">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            Let's Connect
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span class="block text-base-content">Get In</span>
                            <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                Touch
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                Have a project in mind? Need a developer for your team? Or just want to say hello? I'd love to hear from you.
                            </p>
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                Fill out the form or use one of the contact methods below. I typically respond within 24 hours.
                            </p>
                        </div>

                        <!-- Contact Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">&lt;24h</div>
                                <div class="text-sm text-base-content/70">Response Time</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">100%</div>
                                <div class="text-sm text-base-content/70">Project Reviews</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">✓</div>
                                <div class="text-sm text-base-content/70">Available for Work</div>
                            </div>
                        </div>

                        <!-- Direct Contact Info -->
                        <div class="space-y-4 mb-8">
                            <a href="mailto:abduljabbar@example.com" class="group flex items-center gap-4 p-4 rounded-xl bg-base-200/50 hover:bg-base-200 transition-all duration-300">
                                <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xl">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-base-content/60">Email</div>
                                    <div class="font-semibold text-base-content group-hover:text-primary transition-colors duration-300">abduljabbar@example.com</div>
                                </div>
                            </a>
                            
                            <div class="group flex items-center gap-4 p-4 rounded-xl bg-base-200/50">
                                <div class="w-12 h-12 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary text-xl">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-base-content/60">Phone</div>
                                    <div class="font-semibold text-base-content">+966 50 123 4567</div>
                                </div>
                            </div>
                            
                            <div class="group flex items-center gap-4 p-4 rounded-xl bg-base-200/50">
                                <div class="w-12 h-12 rounded-lg bg-purple-500/10 flex items-center justify-center text-purple-500 text-xl">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-base-content/60">Location</div>
                                    <div class="font-semibold text-base-content">Riyadh, Saudi Arabia</div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Links -->
                        <div>
                            <h3 class="text-lg font-bold text-base-content mb-4">Connect on Social</h3>
                            <div class="flex gap-4">
                                @foreach([
                                    ['icon' => 'fab fa-github', 'url' => '#', 'color' => 'hover:bg-gray-800 hover:text-white'],
                                    ['icon' => 'fab fa-linkedin', 'url' => '#', 'color' => 'hover:bg-blue-600 hover:text-white'],
                                    ['icon' => 'fab fa-twitter', 'url' => '#', 'color' => 'hover:bg-sky-500 hover:text-white'],
                                    ['icon' => 'fab fa-codepen', 'url' => '#', 'color' => 'hover:bg-gray-900 hover:text-white'],
                                ] as $social)
                                <a href="{{ $social['url'] }}" class="w-12 h-12 rounded-xl bg-base-200 flex items-center justify-center text-base-content text-xl {{ $social['color'] }} transition-all duration-300 hover:scale-110">
                                    <i class="{{ $social['icon'] }}"></i>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form Column -->
                    <div class="relative">
                        <div class="relative max-w-lg mx-auto">
                            <!-- Form Container -->
                            <div class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <!-- Form Card -->
                                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300 bg-base-100">
                                    <!-- Form Header -->
                                    <div class="p-8 border-b border-base-300">
                                        <h3 class="text-2xl font-bold text-base-content mb-2">Send a Message</h3>
                                        <p class="text-base-content/70">Fill out the form below and I'll get back to you soon.</p>
                                    </div>
                                    
                                    <!-- Contact Form -->
                                    <form id="contact-form" class="p-8 space-y-6">
                                        <!-- Form Status Messages -->
                                        <div id="form-success" class="hidden p-4 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400">
                                            <div class="flex items-center gap-3">
                                                <i class="fas fa-check-circle text-lg"></i>
                                                <span>Message sent successfully! I'll get back to you soon.</span>
                                            </div>
                                        </div>
                                        
                                        <div id="form-error" class="hidden p-4 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400">
                                            <div class="flex items-center gap-3">
                                                <i class="fas fa-exclamation-circle text-lg"></i>
                                                <span>There was an error sending your message. Please try again.</span>
                                            </div>
                                        </div>

                                        <!-- Name Field -->
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-base-content mb-2">
                                                <i class="fas fa-user mr-2 text-primary"></i>Full Name
                                            </label>
                                            <input type="text" id="name" name="name" required 
                                                   class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 placeholder-base-content/40"
                                                   placeholder="Enter your name">
                                            <div class="text-sm text-red-500 mt-1 hidden" id="name-error"></div>
                                        </div>

                                        <!-- Email Field -->
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-base-content mb-2">
                                                <i class="fas fa-envelope mr-2 text-primary"></i>Email Address
                                            </label>
                                            <input type="email" id="email" name="email" required 
                                                   class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 placeholder-base-content/40"
                                                   placeholder="Enter your email">
                                            <div class="text-sm text-red-500 mt-1 hidden" id="email-error"></div>
                                        </div>

                                        <!-- Subject Field -->
                                        <div>
                                            <label for="subject" class="block text-sm font-medium text-base-content mb-2">
                                                <i class="fas fa-tag mr-2 text-primary"></i>Subject
                                            </label>
                                            <select id="subject" name="subject" 
                                                    class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300">
                                                <option value="">Select a subject</option>
                                                <option value="project">Project Inquiry</option>
                                                <option value="collaboration">Collaboration Opportunity</option>
                                                <option value="job">Job Opportunity</option>
                                                <option value="consultation">Consultation</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div class="text-sm text-red-500 mt-1 hidden" id="subject-error"></div>
                                        </div>

                                        <!-- Message Field -->
                                        <div>
                                            <label for="message" class="block text-sm font-medium text-base-content mb-2">
                                                <i class="fas fa-comment-dots mr-2 text-primary"></i>Message
                                            </label>
                                            <textarea id="message" name="message" rows="5" required 
                                                      class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 placeholder-base-content/40 resize-none"
                                                      placeholder="Tell me about your project or inquiry..."></textarea>
                                            <div class="text-sm text-red-500 mt-1 hidden" id="message-error"></div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="pt-4">
                                            <button type="submit" id="submit-btn" 
                                                    class="group relative w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                                <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                <i class="fas fa-paper-plane relative z-10"></i>
                                                <span class="relative z-10">Send Message</span>
                                                <i class="fas fa-arrow-right relative z-10 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                                            </button>
                                        </div>

                                        <!-- Privacy Note -->
                                        <p class="text-sm text-base-content/60 text-center">
                                            Your information is secure and will only be used to respond to your inquiry.
                                        </p>
                                    </form>
                                </div>
                            </div>

                            <!-- Floating Elements -->
                            <div class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary-400/20 to-transparent rounded-3xl -rotate-12 animate-float-slow"></div>
                            <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-secondary-400/20 to-transparent rounded-2xl rotate-12 animate-float-slower"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 hidden lg:block">
            <a href="#contact-info" class="animate-bounce">
                <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                    <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section id="contact-info" class="py-20 bg-base-200/30 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Additional Information
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">Other Ways to</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Connect</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        Besides direct contact, here are other platforms and information that might be helpful.
                    </p>
                </div>

                <!-- Contact Cards Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    <!-- Working Hours -->
                    <div class="group">
                        <div class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br from-primary-500 to-secondary-500 text-white text-2xl mb-6">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h3 class="text-xl font-bold text-base-content mb-4">Working Hours</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-base-content/70">Sunday - Thursday</span>
                                    <span class="font-semibold text-base-content">9:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-base-content/70">Friday - Saturday</span>
                                    <span class="font-semibold text-base-content">By Appointment</span>
                                </div>
                                <div class="pt-4 border-t border-base-300">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                        <span class="text-green-600 dark:text-green-400 text-sm">Currently Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preferred Contact -->
                    <div class="group">
                        <div class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 text-white text-2xl mb-6">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h3 class="text-xl font-bold text-base-content mb-4">Fastest Response</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="text-sm text-base-content/60 mb-1">Primary Method</div>
                                    <div class="font-semibold text-base-content">Email</div>
                                    <p class="text-sm text-base-content/70 mt-2">I check email regularly throughout the day</p>
                                </div>
                                <div>
                                    <div class="text-sm text-base-content/60 mb-1">Response Time</div>
                                    <div class="font-semibold text-primary">Within 24 hours</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Time Zone -->
                    <div class="group">
                        <div class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white text-2xl mb-6">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h3 class="text-xl font-bold text-base-content mb-4">Time Zone & Location</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="text-sm text-base-content/60 mb-1">Current Time</div>
                                    <div class="font-semibold text-base-content" id="current-time">Loading...</div>
                                </div>
                                <div>
                                    <div class="text-sm text-base-content/60 mb-1">Timezone</div>
                                    <div class="font-semibold text-base-content">AST (UTC+3)</div>
                                </div>
                                <div>
                                    <div class="text-sm text-base-content/60 mb-1">Location</div>
                                    <div class="font-semibold text-base-content">Riyadh, Saudi Arabia</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Platforms & Networks -->
                <div class="text-center">
                    <h3 class="text-2xl font-bold mb-8 text-base-content">Find Me On</h3>
                    <div class="flex flex-wrap justify-center gap-6">
                        @foreach([
                            ['platform' => 'GitHub', 'icon' => 'fab fa-github', 'url' => '#', 'description' => 'Check out my code repositories', 'color' => 'bg-gray-800 hover:bg-gray-900'],
                            ['platform' => 'LinkedIn', 'icon' => 'fab fa-linkedin', 'url' => '#', 'description' => 'Professional network and experience', 'color' => 'bg-blue-600 hover:bg-blue-700'],
                            ['platform' => 'Twitter', 'icon' => 'fab fa-twitter', 'url' => '#', 'description' => 'Tech thoughts and updates', 'color' => 'bg-sky-500 hover:bg-sky-600'],
                            ['platform' => 'CodePen', 'icon' => 'fab fa-codepen', 'url' => '#', 'description' => 'Frontend experiments and demos', 'color' => 'bg-gray-900 hover:bg-black'],
                            ['platform' => 'Stack Overflow', 'icon' => 'fab fa-stack-overflow', 'url' => '#', 'description' => 'Technical Q&A contributions', 'color' => 'bg-orange-500 hover:bg-orange-600'],
                            ['platform' => 'Upwork', 'icon' => 'fab fa-upwork', 'url' => '#', 'description' => 'Freelance projects and reviews', 'color' => 'bg-green-500 hover:bg-green-600'],
                        ] as $platform)
                        <a href="{{ $platform['url'] }}" target="_blank" 
                           class="group flex flex-col items-center gap-4 p-6 rounded-2xl bg-base-100 border border-base-300 hover:border-primary/30 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 w-full sm:w-64">
                            <div class="w-16 h-16 rounded-xl {{ $platform['color'] }} text-white flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $platform['icon'] }}"></i>
                            </div>
                            <div class="text-center">
                                <h4 class="text-lg font-bold text-base-content mb-2">{{ $platform['platform'] }}</h4>
                                <p class="text-sm text-base-content/70">{{ $platform['description'] }}</p>
                            </div>
                            <div class="text-primary text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                Visit Profile <i class="fas fa-arrow-right ml-1"></i>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="contact-faq" class="py-20 bg-base-100 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Common Questions
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">Frequently Asked</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Questions</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        Here are answers to some common questions about working with me.
                    </p>
                </div>

                <!-- FAQ Accordion -->
                <div class="space-y-4">
                    @foreach([
                        ['question' => 'What types of projects do you take on?', 'answer' => 'I specialize in full-stack web development, including custom web applications, e-commerce solutions, API development, and responsive website design. I enjoy challenging projects that require creative problem-solving.', 'open' => true],
                        ['question' => 'What is your typical response time?', 'answer' => 'I strive to respond to all inquiries within 24 hours during weekdays. For urgent matters, email is the fastest way to reach me.', 'open' => false],
                        ['question' => 'Do you work remotely or on-site?', 'answer' => 'I primarily work remotely but am open to on-site collaboration for projects in Riyadh. Remote work allows me to maintain flexible hours and work with clients worldwide.', 'open' => false],
                        ['question' => 'What are your rates?', 'answer' => 'My rates vary depending on project scope, complexity, and timeline. I offer both hourly and project-based pricing. Please contact me with your project details for a customized quote.', 'open' => false],
                        ['question' => 'What is your development process?', 'answer' => 'I follow an agile development process: discovery and planning, design mockups, development iterations, testing, and deployment. I maintain clear communication throughout the project.', 'open' => false],
                        ['question' => 'Do you provide ongoing support?', 'answer' => 'Yes, I offer maintenance packages and ongoing support for projects I develop. This includes updates, security patches, and feature enhancements.', 'open' => false],
                    ] as $faq)
                    <div class="faq-item bg-base-100 rounded-xl border border-base-300 overflow-hidden">
                        <button class="faq-question w-full flex items-center justify-between p-6 text-left hover:bg-base-200 transition-colors duration-300">
                            <span class="text-lg font-semibold text-base-content">{{ $faq['question'] }}</span>
                            <i class="fas fa-chevron-down text-primary transition-transform duration-300 {{ $faq['open'] ? 'rotate-180' : '' }}"></i>
                        </button>
                        <div class="faq-answer overflow-hidden transition-all duration-300 {{ $faq['open'] ? 'max-h-96' : 'max-h-0' }}">
                            <div class="p-6 pt-0">
                                <p class="text-base-content/70">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Still have questions -->
                <div class="text-center mt-12">
                    <div class="inline-flex items-center gap-3 text-lg text-base-content/70">
                        <i class="fas fa-question-circle text-primary"></i>
                        <span>Still have questions? <a href="#contact-form" class="text-primary font-semibold hover:underline">Send me a message</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact-cta" class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-secondary-500/5"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    <span class="text-base-content">Ready to Start Your</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Project?</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    Let's discuss how we can work together to bring your ideas to life.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#contact-form" class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <i class="fas fa-paper-plane relative z-10"></i>
                        <span class="relative z-10">Send a Message</span>
                        <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('home') }}#portfolio" class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-briefcase"></i>
                        <span>View Portfolio</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Map Section -->
    <section id="contact-map" class="py-12 bg-base-200/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Map Placeholder -->
                <div class="rounded-2xl overflow-hidden shadow-xl border border-base-300">
                    <div class="h-64 bg-gradient-to-br from-primary-500/10 to-secondary-500/10 flex flex-col items-center justify-center">
                        <i class="fas fa-map-marked-alt text-4xl text-primary/50 mb-4"></i>
                        <h3 class="text-xl font-bold text-base-content mb-2">Riyadh, Saudi Arabia</h3>
                        <p class="text-base-content/70">Available for remote work worldwide</p>
                    </div>
                    <div class="bg-base-100 p-6">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse"></div>
                                <span class="font-semibold text-base-content">Available for new projects</span>
                            </div>
                            <div class="text-sm text-base-content/70">
                                <i class="fas fa-globe-americas mr-2"></i> Working with clients globally
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/contact.css')
@endpush

@push('scripts')
@vite('resources/js/contact.js')
@endpush