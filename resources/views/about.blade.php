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

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span
                                class="block text-base-content">{{ $aboutPage->title ?? 'My Journey as a' }}</span>
                            <span
                                class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                {{ $aboutPage->subtitle ?? 'Web Developer' }}
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            @if(!empty($aboutPage->description))
                                <p class="text-lg text-base-content/70 leading-relaxed">{!! $aboutPage->description !!}</p>
                            @else
                                <p class="text-lg text-base-content/70 leading-relaxed">
                                    I'm <span
                                        class="font-semibold text-primary">Developer</span>,
                                    a passionate Full Stack
                                    Developer with a focus on creating elegant, efficient, and user-friendly web
                                    applications.
                                    My journey in web development began {{ $aboutPage->experience_years ?? '5' }} years
                                    ago, and since then I've been constantly
                                    learning and adapting to new technologies.
                                </p>
                                <p class="text-lg text-base-content/70 leading-relaxed">
                                    I believe in writing clean, maintainable code and creating interfaces that provide
                                    exceptional user experiences. Every project is an opportunity to solve problems
                                    creatively
                                    and make a positive impact.
                                </p>
                            @endif
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
                            <div
                                class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">
                                    {{ $aboutPage->experience_years ?? '5' }}+</div>
                                <div class="text-sm text-base-content/70">Experience Ye</div>
                            </div>
                            <div
                                class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">
                                    {{ $aboutPage->projects_count ?? '50' }}+</div>
                                <div class="text-sm text-base-content/70">Complete projects</div>
                            </div>
                            <div
                                class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">
                                    {{ $aboutPage->clients_count ?? '30' }}+</div>
                                <div class="text-sm text-base-content/70">Clinets</div>
                            </div>
                            <div
                                class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-blue-500 mb-2">
                                    {{ $aboutPage->satisfaction_rate ?? '100' }}%</div>
                                <div class="text-sm text-base-content/70">Satisfaction Rate</div>
                            </div>
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="flex items-center justify-center flex-wrap gap-4">
                            @if(!empty($aboutPage->cv_url))
                            <a href="{{ $aboutPage->cv_url }}"
                                class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden"
                                target="_blank" download>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-download relative z-10"></i>
                                <span class="relative z-10">CV download</span>
                            </a>
                            @else
                            <a href="{{ route('contact') }}"
                                class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-envelope relative z-10"></i>
                                <span class="relative z-10">تواصل معي</span>
                            </a>
                            @endif
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

                                        <!-- Profile image -->
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div
                                                class="w-48 h-48 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 p-1">
                                                <div class="w-full h-full rounded-full overflow-hidden">
                                                    <img src="{{ $aboutPage->profile_image ? asset('storage/' . $aboutPage->profile_image) : URL::asset('assets/ph1.jpeg') }}" alt="Profile Picture"
                                                        class="w-full h-full object-cover">
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

    <!-- Social Media Section -->
    <section id="social" class="py-16 bg-base-100/50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    <span class="text-base-content">Connect With Me</span>
                </h2>
                <p class="text-lg text-base-content/70 mb-10">
                    Let's connect and build something amazing together!
                </p>
                 <div class="pt-8 border-t border-base-300">
                            <div class="text-center mb-8">
                                <h3 class="text-lg font-bold text-base-content mb-2 flex items-center justify-center gap-3">
                                    <span
                                        class="w-2 h-8 bg-gradient-to-b from-primary-500 to-secondary-500 rounded-full"></span>
                                    <span class="text-secondary-600 dark:text-secondary-400">{{ $settings['hero_social_title'] ?? 'Follow Me' }}</span>
                                </h3>
                                <p class="text-sm text-base-content/60">{{ $settings['hero_social_subtitle'] ?? 'Let\'s stay connected!' }}</p>
                            </div>

                            <div class="flex justify-center gap-8 flex-wrap">
                                @foreach ($socialLinks as $social)
                                    <a href="{{ $social->url }}"
                                        class="group flex flex-col items-center gap-2 transition-all duration-300 hover:scale-110"
                                        title="{{ $social->platform }}">
                                        <div
                                            class="w-12 h-12 rounded-full bg-base-200 border border-base-300 flex items-center justify-center group-hover:bg-base-300 transition-all duration-300">
                                            <i class="{{ $social->icon }} text-xl text-base-content"></i>
                                        </div>
                                        <span class="text-xs font-medium text-center">
                                            {{ $social->platform }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/about.css')
    <!-- Social Icons Styles -->
    <link rel="stylesheet" href="{{ asset('css/social-icons-fix.css') }}">
@endpush
