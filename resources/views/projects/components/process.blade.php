<!-- Project Process Section -->
<section id="project-process" class="py-20 bg-base-100 relative">
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
                    Development Process
                </div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    <span class="text-base-content">How I Bring</span>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Ideas
                        to Life</span>
                </h2>
                <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                    Every successful project follows a structured process to ensure quality, efficiency, and client
                    satisfaction.
                </p>
            </div>

            <!-- Process Steps -->
            <div class="relative">
                <!-- Timeline Line -->
                <div
                    class="absolute left-8 md:left-1/2 transform md:-translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary-400 to-secondary-400 hidden md:block">
                </div>

                <div class="space-y-12 md:space-y-0">
                    @if ($pageContent['process_steps'] ?? null)
                        @foreach ($pageContent['process_steps'] as $index => $step)
                            <div class="relative md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-12' : 'md:ml-auto md:pl-12' }}">
                                <!-- Step Circle -->
                                <div
                                    class="absolute left-0 md:left-auto {{ $index % 2 == 0 ? 'md:-right-6' : 'md:-left-6' }} top-6 w-12 h-12 rounded-full border-4 border-base-100 bg-gradient-to-r from-primary-500 to-secondary-500 flex items-center justify-center text-white font-bold z-10">
                                    {{ $step['step'] }}
                                </div>

                                <!-- Step Card -->
                                <div
                                    class="ml-14 md:ml-0 bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <div
                                        class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary text-xl mb-4">
                                        <i class="{{ $step['icon'] }}"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-base-content mb-4">{{ $step['title'] }}</h3>
                                    <p class="text-base-content/70">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ([
            ['step' => '01', 'title' => 'Discovery & Planning', 'description' => 'Understanding requirements, defining scope, and planning the project architecture.', 'icon' => 'fas fa-lightbulb'],
            ['step' => '02', 'title' => 'Design & Prototyping', 'description' => 'Creating wireframes, mockups, and interactive prototypes for client approval.', 'icon' => 'fas fa-paint-brush'],
            ['step' => '03', 'title' => 'Development', 'description' => 'Writing clean, maintainable code with regular updates and testing.', 'icon' => 'fas fa-code'],
            ['step' => '04', 'title' => 'Testing & Quality', 'description' => 'Rigorous testing across devices and browsers to ensure flawless performance.', 'icon' => 'fas fa-check-double'],
            ['step' => '05', 'title' => 'Deployment', 'description' => 'Launching the project with proper hosting, security, and optimization.', 'icon' => 'fas fa-rocket'],
            ['step' => '06', 'title' => 'Support & Maintenance', 'description' => 'Ongoing support, updates, and maintenance for long-term success.', 'icon' => 'fas fa-headset'],
        ] as $index => $step)
                            <div class="relative md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-12' : 'md:ml-auto md:pl-12' }}">
                                <!-- Step Circle -->
                                <div
                                    class="absolute left-0 md:left-auto {{ $index % 2 == 0 ? 'md:-right-6' : 'md:-left-6' }} top-6 w-12 h-12 rounded-full border-4 border-base-100 bg-gradient-to-r from-primary-500 to-secondary-500 flex items-center justify-center text-white font-bold z-10">
                                    {{ $step['step'] }}
                                </div>

                                <!-- Step Card -->
                                <div
                                    class="ml-14 md:ml-0 bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <div
                                        class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-primary/10 text-primary text-xl mb-4">
                                        <i class="{{ $step['icon'] }}"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-base-content mb-4">{{ $step['title'] }}</h3>
                                    <p class="text-base-content/70">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>