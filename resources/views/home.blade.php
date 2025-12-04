@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative min-h-[110vh] flex items-center justify-center bg-gradient-to-br from-primary-50 to-secondary-50 dark:from-gray-900 dark:to-gray-800">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <img src="https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" 
             alt="Background" class="w-full h-full object-cover">
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white animate-fade-in-up bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl p-12 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight">
                Hi, I'm <span class="text-primary-300">John Doe</span>
            </h1>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-light mb-6 tracking-wide">
                Professional Web Developer
            </h2>
            <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto leading-relaxed font-light">
                Creating beautiful, functional websites with modern technologies
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mx-auto w-full sm:w-auto">
                <a href="#portfolio" class="px-6 py-2 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg work-btn text-sm font-semibold tracking-wide no-underline w-64 sm:w-auto text-center block" style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important;">
                    View My Work
                </a>
                <a href="#contact" class="px-6 py-2 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg contact-me-btn text-sm font-semibold tracking-wide border-2 no-underline w-64 sm:w-auto text-center block" style="background-color: transparent !important; color: var(--color-base-content) !important; border-color: var(--color-base-content) !important;">
                    Contact Me
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-white no-underline">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">About Me</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <h3 class="text-2xl font-semibold mb-4 text-primary-600 dark:text-primary-400 tracking-tight">
                    Professional Web Developer & Designer
                </h3>
                <p class="mb-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                    I'm a passionate web developer with over 5 years of experience in creating beautiful, functional websites. 
                    I specialize in modern web technologies and have a keen eye for design and user experience.
                </p>
                <p class="mb-6 text-gray-600 dark:text-gray-300 leading-relaxed">
                    My goal is to help businesses and individuals establish a strong online presence through 
                    custom web solutions that are tailored to their specific needs.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400 tracking-tight">50+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Projects Completed</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400 tracking-tight">30+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Happy Clients</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400 tracking-tight">5+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Years Experience</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400 tracking-tight">10+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Awards Won</p>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="#contact" class="px-6 py-3 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg touch-btn text-base font-semibold tracking-wide no-inline-block no-underline w-64" style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important; display: inline-block;">
                        Get In Touch
                    </a>
                </div>
            </div>

            <div class="order-1 md:order-2 flex justify-center">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Profile" class="rounded-full w-64 h-64 md:w-80 md:h-80 object-cover shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Certificates Section -->
<section id="certificates" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">My Certificates</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Professional certifications that validate my skills and expertise in web development.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Certificate 1 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight">Full Stack Web Development</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Coursera • 2023</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Comprehensive certification covering both frontend and backend development technologies.
                </p>
            </div>

            <!-- Certificate 2 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight">Advanced JavaScript</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Udemy • 2023</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    In-depth knowledge of modern JavaScript including ES6+, async programming, and design patterns.
                </p>
            </div>

            <!-- Certificate 3 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight">React Developer</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Meta • 2022</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Professional certification for building modern web applications with React and related technologies.
                </p>
            </div>

            <!-- Certificate 4 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight">UI/UX Design Fundamentals</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Google • 2022</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Principles of user interface and user experience design for creating intuitive digital products.
                </p>
            </div>

            <!-- Certificate 5 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight">Laravel Framework</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Laravel • 2022</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Official certification for developing robust web applications using the Laravel PHP framework.
                </p>
            </div>

            <!-- Certificate 6 -->
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary-600 dark:text-primary-400 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold tracking-tight">Cloud Computing</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">AWS • 2021</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Certification in cloud services and deployment for scalable web applications.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">My Services</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                I offer a wide range of web development services to help businesses and individuals establish a strong online presence.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-laptop-code text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">Web Development</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Creating responsive, fast, and secure websites using the latest technologies and best practices.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-mobile-alt text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">Mobile Development</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Building mobile-friendly websites and applications that work seamlessly on all devices.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-palette text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">UI/UX Design</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Designing beautiful and intuitive user interfaces that provide an excellent user experience.
                </p>
            </div>

            <!-- Service 4 -->
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-search text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">SEO Optimization</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Optimizing websites for search engines to improve visibility and attract more organic traffic.
                </p>
            </div>

            <!-- Service 5 -->
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-server text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">Backend Development</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Building robust and scalable backend systems to power your web applications.
                </p>
            </div>

            <!-- Service 6 -->
            <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-rocket text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 tracking-tight">Performance Optimization</h3>
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    Improving website speed and performance to ensure a smooth user experience.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">My Portfolio</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Take a look at some of my recent projects and see how I can help bring your ideas to life.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Project 1 -->
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Project 1" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-semibold mb-2 tracking-tight">E-commerce Platform</h3>
                        <p class="text-sm mb-4 leading-relaxed">A modern e-commerce platform with advanced features</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Project 2" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-semibold mb-2 tracking-tight">Task Management App</h3>
                        <p class="text-sm mb-4 leading-relaxed">A productivity app for managing tasks and projects</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Project 3" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-semibold mb-2 tracking-tight">Social Media Dashboard</h3>
                        <p class="text-sm mb-4 leading-relaxed">A dashboard for managing social media accounts</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1556075798-4825dfaaf498?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Project 4" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-semibold mb-2 tracking-tight">Restaurant Website</h3>
                        <p class="text-sm mb-4 leading-relaxed">A beautiful website for a modern restaurant</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1522542550221-ebfd2c060a98?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Project 5" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-semibold mb-2 tracking-tight">Fitness Tracking App</h3>
                        <p class="text-sm mb-4 leading-relaxed">An app for tracking fitness goals and progress</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 6 -->
            <div class="group relative overflow-hidden rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1517180102446-f3ece452e9d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Project 6" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-semibold mb-2 tracking-tight">Travel Booking Platform</h3>
                        <p class="text-sm mb-4 leading-relaxed">A platform for booking flights and hotels</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors font-medium no-underline">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#" class="px-8 py-3 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg projects-btn text-base font-semibold tracking-wide no-underline" style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important;">
                View All Projects
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">Get In Touch</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                Have a project in mind or just want to say hello? Feel free to reach out to me!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <!-- Contact Form -->
            <div>
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium mb-2 tracking-wide">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800 transition-colors duration-200" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium mb-2 tracking-wide">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800 transition-colors duration-200" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium mb-2 tracking-wide">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800 transition-colors duration-200" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium mb-2 tracking-wide">Message</label>
                        <textarea id="message" name="message" rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800 transition-colors duration-200 leading-relaxed" 
                                  required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="contact-btn w-full px-6 py-3 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-base font-semibold tracking-wide no-underline" style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important;">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-primary-600 dark:text-primary-400 tracking-tight">Contact Information</h3>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-map-marker-alt text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1 tracking-wide">Address</h4>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">123 Main Street, City, Country</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-phone text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1 tracking-wide">Phone</h4>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">+123 456 7890</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-envelope text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1 tracking-wide">Email</h4>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">your.email@example.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-clock text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1 tracking-wide">Working Hours</h4>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Monday - Friday: 9:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-primary-600 dark:text-primary-400 tracking-tight">Follow Me</h3>

                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                            <i class="fab fa-twitter text-primary-600 dark:text-primary-400 text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                            <i class="fab fa-linkedin text-primary-600 dark:text-primary-400 text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                            <i class="fab fa-github text-primary-600 dark:text-primary-400 text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                            <i class="fab fa-instagram text-primary-600 dark:text-primary-400 text-xl"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                            <i class="fab fa-dribbble text-primary-600 dark:text-primary-400 text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection