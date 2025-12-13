@extends('layouts.app')

@section('content')
    <!-- Hero Section Redesign -->
    <section id="hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100">
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
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            Open for Opportunities
                        </div>

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
                                class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-envelope relative z-10"></i>
                                <span class="relative z-10">Get In Touch</span>
                                <i
                                    class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>

                            <a href="#portfolio"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-briefcase"></i>
                                <span>View My Work</span>
                                <i
                                    class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>

                        <!-- Tech Stack -->
                        <div class="mb-12">
                            <p class="text-sm font-medium text-base-content/60 mb-4 uppercase tracking-wider">
                                Tech Stack</p>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($skills as $skill)
                                    <span
                                        class="px-4 py-2.5 bg-base-200/70 backdrop-blur-sm rounded-lg text-base-content text-sm font-medium border border-base-300 hover:bg-base-200 hover:border-primary transition-colors duration-300">
                                        {{ $skill->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Redesigned Follow Me Section -->
                        <div class="pt-8 border-t border-base-300">
                            <div class="text-center mb-8">
                                <h3 class="text-lg font-bold text-base-content mb-2 flex items-center justify-center gap-3">
                                    <span
                                        class="w-2 h-8 bg-gradient-to-b from-primary-500 to-secondary-500 rounded-full"></span>
                                    <span class="text-secondary-600 dark:text-secondary-400">Follow Me</span>
                                </h3>
                                <p class="text-sm text-base-content/60">دعنا نتواصل ونبني مشاريع رائعة معاً</p>
                            </div>

                            <div class="flex justify-center gap-8 flex-wrap">
                                @foreach (config('portfolio.social_links') as $social)
                                    <a href="{{ $social['url'] }}"
                                        class="group flex flex-col items-center gap-2 transition-all duration-300 hover:scale-110"
                                        title="{{ $social['label'] }}">
                                        <div
                                            class="w-12 h-12 rounded-full bg-base-200 border border-base-300 flex items-center justify-center group-hover:bg-base-300 transition-all duration-300">
                                            @if($social['label'] === 'GitHub')
                                                <svg class="w-6 h-6 {{ $social['color'] ?? 'text-base-content' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                                </svg>
                                            @elseif($social['label'] === 'LinkedIn')
                                                <svg class="w-6 h-6 {{ $social['color'] ?? 'text-base-content' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
                                                </svg>
                                            @elseif($social['label'] === 'Twitter')
                                                <svg class="w-6 h-6 {{ $social['color'] ?? 'text-base-content' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                                                </svg>
                                            @elseif($social['label'] === 'Email')
                                                <svg class="w-6 h-6 {{ $social['color'] ?? 'text-base-content' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path>
                                                </svg>
                                            @elseif($social['label'] === 'Instagram')
                                                <svg class="w-6 h-6 {{ $social['color'] ?? 'text-base-content' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <span class="text-xs font-medium text-center">
                                            {{ $social['label'] }}
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
                                                        = <span class="text-yellow-300">'Abduljabbar Galaom'</span>;</div>
                                                    <div class="text-blue-400">this.<span class="text-green-400">role</span>
                                                        = <span class="text-yellow-300">'Full Stack Developer'</span>;</div>
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
