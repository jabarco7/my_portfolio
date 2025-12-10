@extends('layouts.app')

@section('content')
    <!-- Hero Section for About -->
    <section id="about-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute top-1/4 left-1/4 w-72 h-72 bg-primary-100/30 dark:bg-primary-900/20 rounded-full mix-blend-multiply blur-3xl animate-pulse-slow">
            </div>
            <div
                class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-secondary-100/20 dark:bg-secondary-900/10 rounded-full mix-blend-multiply blur-3xl">
            </div>
            <div
                class="absolute top-1/2 left-1/3 w-64 h-64 bg-blue-100/20 dark:bg-blue-900/10 rounded-full mix-blend-multiply blur-3xl">
            </div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5 dark:opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h60v60H0z\" fill=\"none\"/%3E%3Cpath d=\"M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z\" fill=\"%23000000\" fill-opacity=\"0.2\"/%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <!-- Content Column -->
                    <div class="animate-slide-up">
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            About Me
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span class="block text-base-content">My Journey as a</span>
                            <span
                                class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                Web Developer
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                I'm <span class="font-semibold text-primary">Abduljabbar</span>, a passionate Full Stack
                                Developer with a focus on creating elegant, efficient, and user-friendly web applications.
                                My journey in web development began 5 years ago, and since then I've been constantly
                                learning and adapting to new technologies.
                            </p>
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                I believe in writing clean, maintainable code and creating interfaces that provide
                                exceptional user experiences. Every project is an opportunity to solve problems creatively
                                and make a positive impact.
                            </p>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">5+</div>
                                <div class="text-sm text-base-content/70">Years Experience</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">50+</div>
                                <div class="text-sm text-base-content/70">Projects Completed</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">30+</div>
                                <div class="text-sm text-base-content/70">Happy Clients</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-blue-500 mb-2">100%</div>
                                <div class="text-sm text-base-content/70">Satisfaction</div>
                            </div>
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('contact') }}"
                                class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-download relative z-10"></i>
                                <span class="relative z-10">Download CV</span>
                            </a>
                            <a href="{{ route('home') }}#portfolio"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-briefcase"></i>
                                <span>View Portfolio</span>
                                <i
                                    class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Visual Column -->
                    <div class="relative">
                        <div class="relative max-w-lg mx-auto">
                            <!-- Profile Image -->
                            <div
                                class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300">
                                    <div
                                        class="aspect-square bg-gradient-to-br from-gray-800 to-gray-900 relative overflow-hidden">
                                        <!-- Abstract pattern inside profile image -->
                                        <div class="absolute inset-0 opacity-20">
                                            <div class="absolute top-1/4 left-1/4 w-48 h-48 bg-primary-400/30 rounded-full">
                                            </div>
                                            <div
                                                class="absolute bottom-1/4 right-1/4 w-32 h-32 bg-secondary-400/30 rounded-full">
                                            </div>
                                        </div>

                                        <!-- Profile icon/avatar -->
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div
                                                class="w-48 h-48 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 p-1">
                                                <div
                                                    class="w-full h-full rounded-full bg-gray-900 flex items-center justify-center">
                                                    <i class="fas fa-user text-6xl text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info badges on image -->
                                    <div class="absolute bottom-6 left-6 right-6 flex justify-between">
                                        <div
                                            class="px-4 py-2 bg-primary/90 backdrop-blur-sm rounded-full text-white text-sm font-medium">
                                            <i class="fas fa-code mr-2"></i>Developer
                                        </div>
                                        <div
                                            class="px-4 py-2 bg-secondary/90 backdrop-blur-sm rounded-full text-white text-sm font-medium">
                                            <i class="fas fa-palette mr-2"></i>Designer
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Elements -->
                            <div
                                class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary-400/20 to-transparent rounded-3xl -rotate-12 animate-float-slow">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-secondary-400/20 to-transparent rounded-2xl rotate-12 animate-float-slower">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-base-100/50 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Expertise
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">Technical</span>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Skills</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        I specialize in modern web technologies and frameworks, constantly expanding my skill set to deliver
                        cutting-edge solutions.
                    </p>
                </div>

                <!-- Skills Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ([['title' => 'Frontend Development', 'skills' => ['React.js', 'Vue.js', 'HTML5/CSS3', 'JavaScript/ES6+', 'Tailwind CSS', 'Responsive Design'], 'icon' => 'fas fa-code', 'color' => 'from-blue-500 to-cyan-500'], ['title' => 'Backend Development', 'skills' => ['Laravel', 'Node.js', 'PHP', 'Python', 'REST APIs', 'Database Design'], 'icon' => 'fas fa-server', 'color' => 'from-purple-500 to-pink-500'], ['title' => 'Tools & Technologies', 'skills' => ['Git/GitHub', 'Docker', 'AWS', 'Webpack', 'Testing', 'CI/CD'], 'icon' => 'fas fa-tools', 'color' => 'from-green-500 to-emerald-500']] as $category)
                        <div
                            class="group bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br {{ $category['color'] }} text-white text-2xl mb-6">
                                <i class="{{ $category['icon'] }}"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-base-content">{{ $category['title'] }}</h3>
                            <div class="space-y-3">
                                @foreach ($category['skills'] as $skill)
                                    <div class="flex items-center justify-between">
                                        <span class="text-base-content/80">{{ $skill }}</span>
                                        <div class="w-24 h-2 bg-base-200 rounded-full overflow-hidden">
                                            <div class="h-full bg-gradient-to-r {{ $category['color'] }} rounded-full"
                                                style="width: {{ rand(80, 95) }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Experience & Education -->
    <section id="timeline" class="py-20 bg-base-200/30 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Journey
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">Experience &</span>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Education</span>
                    </h2>
                </div>

                <!-- Timeline -->
                <div class="relative">
                    <!-- Timeline line -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary-400 to-secondary-400 hidden lg:block">
                    </div>

                    <!-- Timeline items -->
                    <div class="space-y-12">
                        @foreach ([
            ['year' => '2022 - Present', 'title' => 'Senior Full Stack Developer', 'company' => 'Tech Solutions Inc.', 'description' => 'Leading development of enterprise web applications using Laravel and Vue.js. Mentoring junior developers and implementing best practices.', 'type' => 'experience', 'side' => 'left'],
            ['year' => '2020 - 2022', 'title' => 'Full Stack Developer', 'company' => 'Digital Innovations LLC', 'description' => 'Developed and maintained multiple client projects. Implemented responsive designs and optimized application performance.', 'type' => 'experience', 'side' => 'right'],
            ['year' => '2018 - 2020', 'title' => 'Frontend Developer', 'company' => 'Web Creators Agency', 'description' => 'Created interactive user interfaces and collaborated with designers to implement pixel-perfect designs.', 'type' => 'experience', 'side' => 'left'],
            ['year' => '2016 - 2018', 'title' => 'Bachelor of Computer Science', 'company' => 'University of Technology', 'description' => 'Graduated with honors. Focused on software engineering, web technologies, and human-computer interaction.', 'type' => 'education', 'side' => 'right'],
        ] as $item)
                            <div
                                class="relative lg:w-1/2 {{ $item['side'] == 'left' ? 'lg:pr-12 lg:ml-0 lg:mr-auto' : 'lg:pl-12 lg:ml-auto lg:mr-0' }}">
                                <!-- Timeline dot -->
                                <div class="absolute top-6 left-1/2 transform -translate-x-1/2 w-6 h-6 rounded-full border-4 border-base-100 bg-gradient-to-r from-primary-500 to-secondary-500 z-10 hidden lg:block {{ $item['side'] == 'left' ? 'lg:-right-6' : 'lg:-left-6' }}"
                                    style="{{ $item['side'] == 'left' ? 'left: calc(100% - 12px)' : 'right: calc(100% - 12px)' }}">
                                </div>

                                <!-- Content card -->
                                <div
                                    class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <div
                                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full {{ $item['type'] == 'experience' ? 'bg-primary/10 text-primary' : 'bg-secondary/10 text-secondary' }} text-sm font-medium mb-4">
                                        <i
                                            class="fas {{ $item['type'] == 'experience' ? 'fa-briefcase' : 'fa-graduation-cap' }}"></i>
                                        {{ $item['type'] == 'experience' ? 'Experience' : 'Education' }}
                                    </div>
                                    <div class="text-sm font-semibold text-primary mb-2">{{ $item['year'] }}</div>
                                    <h3 class="text-xl font-bold mb-2 text-base-content">{{ $item['title'] }}</h3>
                                    <div class="text-lg font-medium text-base-content/70 mb-4">{{ $item['company'] }}
                                    </div>
                                    <p class="text-base-content/60">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section id="philosophy" class="py-20 bg-base-100 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-400/20 rounded-full mix-blend-multiply blur-3xl">
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        My Approach
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        Development
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Philosophy</span>
                    </h2>
                </div>

                <!-- Philosophy Cards -->
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ([['title' => 'Clean Code', 'description' => 'Writing maintainable, readable, and efficient code that stands the test of time.', 'icon' => 'fas fa-broom'], ['title' => 'User-Centric', 'description' => 'Prioritizing user experience and accessibility in every project I work on.', 'icon' => 'fas fa-users'], ['title' => 'Continuous Learning', 'description' => 'Staying updated with the latest technologies and best practices in web development.', 'icon' => 'fas fa-book-open']] as $philosophy)
                        <div
                            class="group text-center p-8 rounded-2xl bg-base-200/50 backdrop-blur-sm border border-base-300 hover:bg-base-200 transition-all duration-300 hover:-translate-y-2">
                            <div
                                class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 text-white text-3xl mb-6 group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $philosophy['icon'] }}"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-base-content">{{ $philosophy['title'] }}</h3>
                            <p class="text-base-content/70">{{ $philosophy['description'] }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Quote -->
                <div
                    class="mt-20 p-8 rounded-2xl bg-gradient-to-r from-primary-500/10 via-transparent to-secondary-500/10 border border-primary/20">
                    <div class="text-center">
                        <i class="fas fa-quote-left text-4xl text-primary/30 mb-6"></i>
                        <p class="text-2xl font-medium text-base-content/80 italic mb-6">
                            "Great web development is about creating solutions that are not only functional but also
                            delightful to use."
                        </p>
                        <div class="text-base-content/60">— Abduljabbar</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-secondary-500/5"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    <span class="text-base-content">Ready to Start Your</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Next
                        Project?</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    Let's collaborate to bring your ideas to life with cutting-edge web solutions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                        class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <i class="fas fa-envelope relative z-10"></i>
                        <span class="relative z-10">Contact Me</span>
                        <i
                            class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('home') }}"
                        class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-home"></i>
                        <span>Back to Home</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/about.css')
@endpush
