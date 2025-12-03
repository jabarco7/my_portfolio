@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-primary-50 to-secondary-50 dark:from-gray-900 dark:to-gray-800">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <img src="https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" 
             alt="Background" class="w-full h-full object-cover">
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white animate-fade-in-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                Hi, I'm <span class="text-primary-300">John Doe</span>
            </h1>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-light mb-6">
                Professional Web Developer
            </h2>
            <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">
                Creating beautiful, functional websites with modern technologies
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#portfolio" class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-md font-medium transition-colors">
                    View My Work
                </a>
                <a href="#contact" class="px-8 py-3 bg-transparent border-2 border-white hover:bg-white hover:text-primary-600 text-white rounded-md font-medium transition-colors">
                    Contact Me
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-white">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">About Me</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <h3 class="text-2xl font-semibold mb-4 text-primary-600 dark:text-primary-400">
                    Professional Web Developer & Designer
                </h3>
                <p class="mb-4 text-gray-600 dark:text-gray-300">
                    I'm a passionate web developer with over 5 years of experience in creating beautiful, functional websites. 
                    I specialize in modern web technologies and have a keen eye for design and user experience.
                </p>
                <p class="mb-6 text-gray-600 dark:text-gray-300">
                    My goal is to help businesses and individuals establish a strong online presence through 
                    custom web solutions that are tailored to their specific needs.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400">50+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Projects Completed</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400">30+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Happy Clients</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400">5+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Years Experience</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-2xl font-bold text-primary-600 dark:text-primary-400">10+</h4>
                        <p class="text-gray-600 dark:text-gray-300">Awards Won</p>
                    </div>
                </div>

                <a href="#contact" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-md font-medium transition-colors">
                    Get In Touch
                </a>
            </div>

            <div class="order-1 md:order-2 flex justify-center">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="Profile" class="rounded-full w-64 h-64 md:w-80 md:h-80 object-cover shadow-xl">
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">My Services</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                I offer a wide range of web development services to help businesses and individuals establish a strong online presence.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-laptop-code text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Web Development</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Creating responsive, fast, and secure websites using the latest technologies and best practices.
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-mobile-alt text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Mobile Development</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Building mobile-friendly websites and applications that work seamlessly on all devices.
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-palette text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">UI/UX Design</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Designing beautiful and intuitive user interfaces that provide an excellent user experience.
                </p>
            </div>

            <!-- Service 4 -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-search text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">SEO Optimization</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Optimizing websites for search engines to improve visibility and attract more organic traffic.
                </p>
            </div>

            <!-- Service 5 -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-server text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Backend Development</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Building robust and scalable backend systems to power your web applications.
                </p>
            </div>

            <!-- Service 6 -->
            <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-primary-600 dark:text-primary-400 mb-4">
                    <i class="fas fa-rocket text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Performance Optimization</h3>
                <p class="text-gray-600 dark:text-gray-300">
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
            <h2 class="text-3xl md:text-4xl font-bold mb-4">My Portfolio</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
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
                        <h3 class="text-xl font-semibold mb-2">E-commerce Platform</h3>
                        <p class="text-sm mb-4">A modern e-commerce platform with advanced features</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
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
                        <h3 class="text-xl font-semibold mb-2">Task Management App</h3>
                        <p class="text-sm mb-4">A productivity app for managing tasks and projects</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
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
                        <h3 class="text-xl font-semibold mb-2">Social Media Dashboard</h3>
                        <p class="text-sm mb-4">A dashboard for managing social media accounts</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
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
                        <h3 class="text-xl font-semibold mb-2">Restaurant Website</h3>
                        <p class="text-sm mb-4">A beautiful website for a modern restaurant</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
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
                        <h3 class="text-xl font-semibold mb-2">Fitness Tracking App</h3>
                        <p class="text-sm mb-4">An app for tracking fitness goals and progress</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
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
                        <h3 class="text-xl font-semibold mb-2">Travel Booking Platform</h3>
                        <p class="text-sm mb-4">A platform for booking flights and hotels</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fas fa-link"></i> View Project
                            </a>
                            <a href="#" class="text-white hover:text-primary-300 transition-colors">
                                <i class="fab fa-github"></i> Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="#" class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-md font-medium transition-colors">
                View All Projects
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Get In Touch</h2>
            <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Have a project in mind or just want to say hello? Feel free to reach out to me!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <!-- Contact Form -->
            <div>
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg">
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
                        <label for="name" class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" 
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" 
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" 
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" 
                                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-gray-800" 
                                  required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-md font-medium transition-colors">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-primary-600 dark:text-primary-400">Contact Information</h3>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Address</h4>
                                <p class="text-gray-600 dark:text-gray-300">123 Main Street, City, Country</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-phone text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Phone</h4>
                                <p class="text-gray-600 dark:text-gray-300">+123 456 7890</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Email</h4>
                                <p class="text-gray-600 dark:text-gray-300">your.email@example.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Working Hours</h4>
                                <p class="text-gray-600 dark:text-gray-300">Monday - Friday: 9:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-primary-600 dark:text-primary-400">Follow Me</h3>

                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                            <i class="fab fa-twitter text-primary-600 dark:text-primary-400"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                            <i class="fab fa-linkedin text-primary-600 dark:text-primary-400"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                            <i class="fab fa-github text-primary-600 dark:text-primary-400"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                            <i class="fab fa-instagram text-primary-600 dark:text-primary-400"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors">
                            <i class="fab fa-dribbble text-primary-600 dark:text-primary-400"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
