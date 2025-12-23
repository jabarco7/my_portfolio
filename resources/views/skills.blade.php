@extends('layouts.app')

@section('content')
    <!-- Hero Section for Skills -->
    <section id="skills-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
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

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <!-- Content Column -->
                    <div class="animate-slide-up">
                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span class="block text-base-content">{{ $heroContent['title'] ?? 'My Technical' }}</span>
                            <span
                                class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                {{ $heroContent['subtitle'] ?? 'Skills & Tools' }}
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                {{ $heroContent['description'] ?? 'Over the years, I\'ve cultivated a diverse skill set that spans both frontend and backend development. I believe in using the right tool for the job and continuously expanding my knowledge.' }}
                            </p>
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                Here's a comprehensive overview of my technical capabilities, from programming languages and
                                frameworks to tools and methodologies.
                            </p>
                        </div>

                        <!-- Quick Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">{{ $statsData['technologies_count'] ?? '25+' }}</div>
                                <div class="text-sm text-base-content/70">Technologies</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">{{ $statsData['expert_level'] ?? '8/10' }}</div>
                                <div class="text-sm text-base-content/70">Expert Level</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">{{ $statsData['up_to_date_percentage'] ?? '100%' }}</div>
                                <div class="text-sm text-base-content/70">Up to Date</div>
                            </div>
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ $heroContent['button_link'] ?? '#skills-list' }}"
                                class="group relative inline-flex items-center gap-1 px-4 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-list-check relative z-10"></i>
                                <span class="relative z-10">{{ $heroContent['button_text'] ?? 'Explore Skills' }}</span>
                                <i
                                    class="fas fa-arrow-down relative z-10 group-hover:translate-y-1 transition-transform duration-300"></i>
                            </a>
                            <a href="{{ route('contact') }}"
                                class="group inline-flex items-center gap-1 px-3 py-5 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-envelope"></i>
                                <span>Discuss Project</span>
                                <i
                                    class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Visual Column - Skills Visualization -->
                    <div class="relative hidden lg:block">
                        <div class="relative max-w-lg mx-auto">
                            <!-- 3D Skills Sphere Concept -->
                            <div
                                class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <div
                                    class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300 bg-gradient-to-br from-gray-900 to-gray-800">
                                    <!-- Interactive Skills Grid -->
                                    <div class="p-8">
                                        <div class="grid grid-cols-3 gap-4 mb-8">
                                            @foreach (['Laravel', 'Vue', 'React', 'Node', 'Tailwind', 'Docker'] as $skill)
                                                <div class="relative group">
                                                    <div
                                                        class="aspect-square rounded-xl bg-gradient-to-br from-primary-500/20 to-secondary-500/20 flex items-center justify-center border border-primary/30 group-hover:scale-110 transition-transform duration-300">
                                                        <div class="text-center">
                                                            <div class="text-2xl font-bold text-primary mb-1">
                                                                {{ substr($skill, 0, 1) }}</div>
                                                            <div class="text-xs text-gray-300">{{ $skill }}</div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-green-400 animate-pulse opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Skill Progress Visualization -->
                                        <div class="space-y-4">
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-300 mb-1">
                                                    <span>Frontend</span>
                                                    <span>95%</span>
                                                </div>
                                                <div class="w-full h-2 bg-gray-700 rounded-full overflow-hidden">
                                                    <div class="h-full bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full animate-progress"
                                                        style="width: 95%"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-300 mb-1">
                                                    <span>Backend</span>
                                                    <span>90%</span>
                                                </div>
                                                <div class="w-full h-2 bg-gray-700 rounded-full overflow-hidden">
                                                    <div class="h-full bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full animate-progress"
                                                        style="width: 90%"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between text-sm text-gray-300 mb-1">
                                                    <span>DevOps</span>
                                                    <span>85%</span>
                                                </div>
                                                <div class="w-full h-2 bg-gray-700 rounded-full overflow-hidden">
                                                    <div class="h-full bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full animate-progress"
                                                        style="width: 85%"></div>
                                                </div>
                                            </div>
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
            <a href="#skills-list" class="animate-bounce">
                <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                    <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Main Skills Section -->
    <section id="skills-list" class="py-20 bg-base-100/50 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        {{ $skillsListContent['badge_text'] ?? 'Comprehensive Overview' }}
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">{{ $skillsListContent['title'] ?? 'Technical Skills' }}</span>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">{{ $skillsListContent['subtitle'] ?? 'Matrix' }}</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        {{ $skillsListContent['description'] ?? 'A detailed breakdown of my technical skills across different categories and proficiency levels.' }}
                    </p>
                </div>

                @php
                    $frontendSkills = $skills->filter(fn($s) => stripos($s->category, 'frontend') !== false);
                    $backendSkills = $skills->filter(fn($s) => stripos($s->category, 'backend') !== false);
                    $mobileSkills = $skills->filter(fn($s) => stripos($s->category, 'mobile') !== false);
                    $toolsSkills = $skills->filter(
                        fn($s) => stripos($s->category, 'tools') !== false || stripos($s->category, 'devops') !== false,
                    );
                    $softSkills = $skills->filter(fn($s) => stripos($s->category, 'soft') !== false);

                    $categorizedIds = $frontendSkills
                        ->pluck('id')
                        ->merge($backendSkills->pluck('id'))
                        ->merge($mobileSkills->pluck('id'))
                        ->merge($toolsSkills->pluck('id'))
                        ->merge($softSkills->pluck('id'));

                    $otherSkills = $skills->whereNotIn('id', $categorizedIds);
                @endphp

                <!-- Skills Tabs Navigation -->
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <button data-tab="frontend"
                        class="skills-tab active px-6 py-3 rounded-xl bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-semibold transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-code mr-2"></i>Frontend
                    </button>
                    <button data-tab="backend"
                        class="skills-tab px-6 py-3 rounded-xl bg-base-200 text-base-content font-semibold border border-base-300 hover:bg-base-300 transition-all duration-300">
                        <i class="fas fa-server mr-2"></i>Backend
                    </button>
                    <button data-tab="mobile" class="skills-tab px-6 py-3 rounded-xl bg-base-200 ...">
                        <i class="fas fa-mobile-alt mr-2"></i>Mobile
                    </button>
                    <button data-tab="tools"
                        class="skills-tab px-6 py-3 rounded-xl bg-base-200 text-base-content font-semibold border border-base-300 hover:bg-base-300 transition-all duration-300">
                        <i class="fas fa-tools mr-2"></i>Tools & DevOps
                    </button>
                    <button data-tab="soft"
                        class="skills-tab px-6 py-3 rounded-xl bg-base-200 text-base-content font-semibold border border-base-300 hover:bg-base-300 transition-all duration-300">
                        <i class="fas fa-users mr-2"></i>Soft Skills
                    </button>
                    @if ($otherSkills->count() > 0)
                        <button data-tab="other"
                            class="skills-tab px-6 py-3 rounded-xl bg-base-200 text-base-content font-semibold border border-base-300 hover:bg-base-300 transition-all duration-300">
                            <i class="fas fa-star mr-2"></i>Other
                        </button>
                    @endif
                </div>

                @php
                    $tabs = [
                        'frontend' => $frontendSkills,
                        'backend' => $backendSkills,
                        'mobile' => $mobileSkills,
                        'tools' => $toolsSkills,
                        'soft' => $softSkills,
                        'other' => $otherSkills,
                    ];
                @endphp

                @foreach ($tabs as $key => $tabSkills)
                    <div id="{{ $key }}-tab"
                        class="skills-tab-content {{ $key === 'frontend' ? 'active' : 'hidden' }}">
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @forelse($tabSkills as $skill)
                                <div class="skill-card group">
                                    <div
                                        class="bg-base-100 rounded-2xl p-6 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full">
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-secondary-500 flex items-center justify-center text-white text-xl">
                                                    <i class="fas fa-code"></i>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-bold text-base-content">{{ $skill->name }}
                                                    </h3>
                                                    <div class="text-sm text-base-content/70">{{ $skill->category }}</div>
                                                </div>
                                            </div>
                                            <div class="text-2xl font-bold text-primary">{{ $skill->percentage }}%</div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="flex justify-between text-sm text-base-content/60 mb-1">
                                                <span>Proficiency</span>
                                                <span>{{ $skill->percentage }}%</span>
                                            </div>
                                            <div class="w-full h-2 bg-base-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full transition-all duration-1000"
                                                    style="width: 0%" data-width="{{ $skill->percentage }}%"></div>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-base-content/70">Experience Level:</span>
                                            <span class="font-semibold text-primary">
                                                @if ($skill->percentage >= 90)
                                                    Expert
                                                @elseif($skill->percentage >= 75)
                                                    Advanced
                                                @elseif($skill->percentage >= 60)
                                                    Intermediate
                                                @else
                                                    Beginner
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @if ($key !== 'other')
                                    <div class="col-span-full text-center py-12">
                                        <p class="text-base-content/60">No skills found in this category.</p>
                                    </div>
                                @endif
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Additional Skills & Methodologies -->
    <section id="methodologies" class="py-20 bg-base-200/30 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        {{ $methodologiesContent['badge_text'] ?? 'Methodologies & Practices' }}
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">{{ $methodologiesContent['title'] ?? 'Development' }}</span>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">{{ $methodologiesContent['subtitle'] ?? 'Methodologies' }}</span>
                    </h2>
                </div>

                <!-- Methodology Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    @foreach ([['title' => 'Agile/Scrum', 'icon' => 'fas fa-sync-alt', 'color' => 'bg-blue-500/10 text-blue-500 border-blue-500/20'], ['title' => 'Test-Driven Dev', 'icon' => 'fas fa-vial', 'color' => 'bg-green-500/10 text-green-500 border-green-500/20'], ['title' => 'CI/CD', 'icon' => 'fas fa-code-branch', 'color' => 'bg-purple-500/10 text-purple-500 border-purple-500/20'], ['title' => 'Mobile First', 'icon' => 'fas fa-mobile-alt', 'color' => 'bg-orange-500/10 text-orange-500 border-orange-500/20'], ['title' => 'Responsive Design', 'icon' => 'fas fa-desktop', 'color' => 'bg-cyan-500/10 text-cyan-500 border-cyan-500/20'], ['title' => 'API First', 'icon' => 'fas fa-network-wired', 'color' => 'bg-indigo-500/10 text-indigo-500 border-indigo-500/20'], ['title' => 'Cloud Native', 'icon' => 'fas fa-cloud', 'color' => 'bg-teal-500/10 text-teal-500 border-teal-500/20']] as $method)
                        <div class="group">
                            <div
                                class="bg-base-100 rounded-xl p-6 border {{ $method['color'] }} text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-lg h-full">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 rounded-full {{ $method['color'] }} text-2xl mb-4">
                                    <i class="{{ $method['icon'] }}"></i>
                                </div>
                                <h3 class="text-lg font-bold text-base-content">{{ $method['title'] }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Languages -->
                <div class="text-center mb-16">
                    <h3 class="text-2xl font-bold mb-8 text-base-content">Languages</h3>
                    <div class="flex flex-wrap justify-center gap-4">
                        @foreach ([['name' => 'Arabic', 'level' => 'Native', 'flag' => '🇸🇦'], ['name' => 'English', 'level' => 'Fluent', 'flag' => '🇺🇸']] as $lang)
                            <div class="px-6 py-3 bg-base-100 rounded-xl border border-base-300 flex items-center gap-3">
                                <span class="text-2xl">{{ $lang['flag'] }}</span>
                                <div class="text-left">
                                    <div class="font-bold text-base-content">{{ $lang['name'] }}</div>
                                    <div class="text-sm text-base-content/70">{{ $lang['level'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section id="skills-cta" class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-secondary-500/5"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    <span class="text-base-content">{{ $ctaContent['title'] ?? 'Need a Specific' }}</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">{{ $ctaContent['subtitle'] ?? 'Skill Set?' }}</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    {{ $ctaContent['description'] ?? 'Whether you need expertise in a specific technology or a combination of skills, I\'m ready to tackle your project challenges.' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ $ctaContent['button_link'] ?? route('contact') }}"
                        class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <i class="fas fa-envelope relative z-10"></i>
                        <span class="relative z-10">{{ $ctaContent['button_text'] ?? 'Discuss Your Project' }}</span>
                        <i
                            class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('about') }}"
                        class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-user"></i>
                        <span>About Me</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    @vite('resources/css/skills.css')
@endpush

@push('scripts')
    <script src="{{ asset('js/skills.js') }}"></script>
@endpush
