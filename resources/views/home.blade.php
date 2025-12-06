@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="home"
        class="relative min-h-[110vh] flex items-center justify-center bg-gradient-to-br from-primary-50 to-secondary-50 dark:from-gray-900 dark:to-gray-800">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <img src="https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80"
                alt="Background" class="w-full h-full object-cover">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div
                class="text-center text-white animate-fade-in-up bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl p-12 max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight">
                    Hi, I'm <span class="text-primary-300">Abduljabbar Galaom</span>
                </h1>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-light mb-6 tracking-wide">
                    Web Developer
                </h2>
                <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto leading-relaxed font-light">
                    Creating beautiful, functional websites with modern technologies
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mx-auto w-full sm:w-auto">
                    <a href="#portfolio"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg work-btn text-sm font-semibold tracking-wide no-underline w-64 sm:w-auto text-center block"
                        style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important;">
                        View My Work
                    </a>
                    <a href="#contact"
                        class="px-6 py-2 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg contact-me-btn text-sm font-semibold tracking-wide border-2 no-underline w-64 sm:w-auto text-center block"
                        style="background-color: transparent !important; color: var(--color-base-content) !important; border-color: var(--color-base-content) !important;">
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
                        I'm a passionate web developer with over 5 years of experience in creating beautiful, functional
                        websites.
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
                        <a href="#contact"
                            class="px-6 py-3 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg touch-btn text-base font-semibold tracking-wide no-inline-block no-underline w-64"
                            style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important; display: inline-block;">
                            Get In Touch
                        </a>
                    </div>
                </div>

                <div class="order-1 md:order-2 flex justify-center">
                    <img src="{{ asset('assets/ph1.jpeg') }}" alt="Profile" alt="Profile"
                        class="rounded-full w-64 h-64 md:w-80 md:h-80 object-cover shadow-xl">
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
                @if ($projects->count() > 0)
                    @foreach ($projects->take(6) as $project)
                        <a href="{{ route('projects.show', $project->slug) }}"
                            class="group relative overflow-hidden rounded-lg shadow-lg block no-underline">
                            @if ($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}"
                                    class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                            @else
                                <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                                    alt="{{ $project->title }}"
                                    class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div
                                    class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                    <h3 class="text-xl font-semibold mb-2 tracking-tight">{{ $project->title }}</h3>
                                    <p class="text-sm mb-4 leading-relaxed">
                                        {{ $project->excerpt ?? Str::limit($project->description, 100) }}</p>
                                    <div class="flex space-x-4">
                                        <span class="text-white hover:text-primary-300 transition-colors font-medium">
                                            <i class="fas fa-eye mr-1"></i> View Details
                                        </span>
                                        @if ($project->project_url)
                                            <a href="{{ $project->project_url }}" target="_blank"
                                                class="text-white hover:text-primary-300 transition-colors font-medium no-underline"
                                                onclick="event.stopPropagation()">
                                                <i class="fas fa-link"></i> Live
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="col-span-3 text-center">
                        <p class="text-gray-600 dark:text-gray-300">No projects available at the moment.</p>
                    </div>
                @endif
            </div>

            @if ($projects->count() > 6)
                <div class="text-center mt-12">
                    <a href="{{ route('portfolio') }}"
                        class="px-8 py-3 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg projects-btn text-base font-semibold tracking-wide no-underline"
                        style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important;">
                        إظهار جميع المشاريع
                    </a>
                </div>
            @endif
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
                    <form action="{{ route('contact.store') }}" method="POST"
                        class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg">
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

                        <button type="submit"
                            class="contact-btn w-full px-6 py-3 rounded-md font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg text-base font-semibold tracking-wide no-underline"
                            style="background-color: var(--color-primary) !important; color: var(--color-base-content) !important; border-color: var(--color-primary) !important;">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-6 text-primary-600 dark:text-primary-400 tracking-tight">
                            Contact Information</h3>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="text-primary-600 dark:text-primary-400 mr-4 mt-1">
                                    <i class="fas fa-map-marker-alt text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium mb-1 tracking-wide">Address</h4>
                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">123 Main Street, City,
                                        Country</p>
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
                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Monday - Friday: 9:00 AM -
                                        5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-900 p-10 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-6 text-primary-600 dark:text-primary-400 tracking-tight">Follow
                            Me</h3>

                        <div class="flex space-x-4">
                            <a href="#"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                                <i class="fab fa-twitter text-primary-600 dark:text-primary-400 text-xl"></i>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                                <i class="fab fa-linkedin text-primary-600 dark:text-primary-400 text-xl"></i>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                                <i class="fab fa-github text-primary-600 dark:text-primary-400 text-xl"></i>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                                <i class="fab fa-instagram text-primary-600 dark:text-primary-400 text-xl"></i>
                            </a>
                            <a href="#"
                                class="w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary-100 dark:hover:bg-primary-900 transition-all duration-300 transform hover:scale-110 no-underline">
                                <i class="fab fa-dribbble text-primary-600 dark:text-primary-400 text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
