@extends('layouts.app')

@section('content')
    <!-- Hero Section Redesign -->
    <section id="hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
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

        <!-- Floating Elements -->
        <div class="absolute top-20 right-20 hidden lg:block">
            <div class="relative">
                <div
                    class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-400 to-secondary-400 rotate-12 opacity-20 animate-float-slow">
                </div>
                <div
                    class="absolute -top-4 -left-4 w-8 h-8 rounded-full bg-secondary-300/40 dark:bg-secondary-700/40 animate-float">
                </div>
            </div>
        </div>

        <div class="absolute bottom-20 left-10 hidden lg:block">
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-400 to-purple-400 -rotate-12 opacity-20 animate-float-slower">
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
                    <!-- Content Column -->
                    <div class="animate-slide-up">

                        <!-- Badge -->
                        @if(isset($settings['hero_badge_text']))
                        <div class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded-full text-sm font-medium mb-6">
                            <span class="w-2 h-2 bg-primary-500 rounded-full mr-2 animate-pulse"></span>
                            {{ $settings['hero_badge_text'] }}
                        </div>
                        @endif

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tight mb-4">
                            <span class="block text-base-content">Hello, I'm</span>
                            <span
                                class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                {{ $settings['hero_name'] ?? 'Abduljabbar' }}
                            </span>
                        </h1>

                        <!-- Subheading -->
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-base-content/70 mb-6">
                            {{ $settings['hero_title'] ?? 'Full Stack Web Developer' }}
                        </h2>

                        <!-- Description -->
                        <p class="text-lg md:text-xl text-base-content/60 mb-8 leading-relaxed">
                            {{ $settings['hero_description'] ?? "I craft digital experiences that are fast, accessible, visually appealing, and responsive. Let's build something amazing together." }}
                        </p>

                        <!-- Call to Action Buttons -->
                        <div class="flex flex-wrap gap-4 mb-12">
                            <a href="{{ route('contact') }}"
                                class="group relative inline-flex items-center gap-1 px-4 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-envelope relative z-10"></i>
                                <span class="relative z-10">{{ $settings['hero_cta1_text'] ?? 'Get In Touch' }}</span>
                                <i
                                    class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>

                            <a href="#portfolio"
                                class="group inline-flex items-center gap-1 px-4 py-4 bg-gray-800 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-briefcase"></i>
                                <span>{{ $settings['hero_cta2_text'] ?? 'View My Work' }}</span>
                                <i
                                    class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>

                        <!-- Tech Stack -->
                        <div class="mb-12">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-bold text-base-content flex items-center gap-3">
                                    <span class="w-2 h-8 bg-gradient-to-b from-primary-500 to-secondary-500 rounded-full"></span>
                                    <span>{{ $settings['hero_tech_stack_title'] ?? 'Tech Stack' }}</span>
                                </h3>
                                <a href="{{ route('skills') }}" class="text-sm text-primary hover:text-primary/80 transition-colors duration-300">
                                    View All <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>

                            @if($skills->count() > 0)
                            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                                @foreach ($skills as $skill)
                                <div class="group relative bg-base-100 border border-base-300 rounded-lg p-3 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                                    <div class="flex flex-col items-center text-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-secondary-100 dark:from-primary-900/20 dark:to-secondary-900/20 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform duration-300">
                                            @if($skill->icon)
                                            <i class="{{ $skill->icon }} text-lg text-primary"></i>
                                            @else
                                            <i class="fas fa-code text-lg text-primary"></i>
                                            @endif
                                        </div>
                                        <h4 class="font-medium text-sm text-base-content">{{ $skill->name }}</h4>
                                        @if($skill->percentage)
                                        <div class="mt-1 w-full">
                                            <div class="h-1.5 bg-base-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="bg-base-100 border border-base-300 rounded-xl p-8 text-center">
                                <i class="fas fa-code text-4xl text-base-content/30 mb-4"></i>
                                <p class="text-base-content/60">No skills added yet. Check back soon!</p>
                            </div>
                            @endif
                        </div>

                        <!-- Redesigned Follow Me Section -->
                        <div class="pt-8 border-t border-base-300">
                            <div class="text-center mb-8">
                                <h3 class="text-lg font-bold text-base-content mb-2 flex items-center justify-center gap-3">
                                    <span
                                        class="w-2 h-8 bg-gradient-to-b from-primary-500 to-secondary-500 rounded-full"></span>
                                    <span class="text-secondary-600 dark:text-secondary-400">{{ $settings['hero_social_title'] ?? 'Follow Me' }}</span>
                                </h3>
                                <p class="text-sm text-base-content/60">{{ $settings['hero_social_subtitle'] ?? 'دعنا نتواصل ونبني مشاريع رائعة معاً' }}</p>
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

                    <!-- Visual Column -->
                    <div class="hidden lg:block relative">
                        <!-- Main Card -->
                        <div class="relative max-w-lg mx-auto">
                            <!-- Card Background -->
                            <div
                                class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <!-- Code Editor Mockup -->
                                <div
                                    class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-2xl border border-gray-800">
                                    <!-- Editor Header -->
                                    <div
                                        class="bg-gray-800 px-6 py-4 border-b border-gray-700 flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <div class="flex gap-2">
                                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                            </div>
                                            <span class="text-gray-400 text-sm font-mono ml-4">portfolio.js</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <i class="fas fa-code text-gray-500"></i>
                                            <i class="fas fa-terminal text-gray-500"></i>
                                        </div>
                                    </div>

                                    <!-- Code Content -->
                                    <div class="p-8 bg-gradient-to-br from-gray-900 to-gray-800 font-mono text-sm">
                                        <div class="mb-6">
                                            <div class="text-purple-400 mb-2">class <span
                                                    class="text-yellow-300">Developer</span> {</div>
                                            <div class="ml-6 space-y-1">
                                                <div class="text-gray-400">constructor() {</div>
                                                <div class="ml-6 space-y-1">
                                                    <div class="text-blue-400">this.<span class="text-green-400">name</span>
                                                        = <span class="text-yellow-300">'{{ $settings['hero_name'] ?? 'Abduljabbar' }}'</span>;</div>
                                                    <div class="text-blue-400">this.<span class="text-green-400">role</span>
                                                        = <span class="text-yellow-300">'{{ $settings['hero_title'] ?? 'Full Stack Developer' }}'</span>;</div>
                                                    <div class="text-blue-400">this.<span
                                                            class="text-green-400">passion</span> = <span
                                                            class="text-yellow-300">'Clean Code & Beautiful UIs'</span>;
                                                    </div>
                                                </div>
                                                <div class="text-gray-400">}</div>
                                            </div>
                                            <div class="text-purple-400">}</div>
                                        </div>

                                        <div class="mb-6">
                                            <div class="text-purple-400">const <span class="text-yellow-300">skills</span> =
                                                [</div>
                                            <div class="ml-6 space-y-1">
                                                <div class="text-gray-300">'Web Development',</div>
                                                <div class="text-gray-300">'UI/UX Design',</div>
                                                <div class="text-gray-300">'Responsive Design',</div>
                                                <div class="text-gray-300">'API Integration'</div>
                                            </div>
                                            <div class="text-purple-400">];</div>
                                        </div>

                                        <div>
                                            <div class="text-blue-400">console.<span
                                                    class="text-yellow-300">log</span>(<span class="text-green-400">"Let's
                                                    build something amazing!"</span>);</div>
                                        </div>
                                    </div>

                                    <!-- Terminal Footer -->
                                    <div class="bg-gray-800 px-6 py-3 border-t border-gray-700">
                                        <div class="flex items-center gap-2">
                                            <span class="text-green-400">$</span>
                                            <span class="text-gray-300 animate-typing">npm run
                                                create-amazing-project</span>
                                            <span class="w-2 h-4 bg-gray-300 ml-1 animate-pulse"></span>
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

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 hidden lg:block">
            <a href="#about" class="animate-bounce">
                <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                    <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
                </div>
            </a>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/home.css')
    <!-- Social Icons Styles -->
    <link rel="stylesheet" href="{{ asset('css/social-icons-fix.css') }}">
@endpush
