@extends('layouts.app')

@section('content')
    <!-- Hero Section for Certificates -->
    <section id="certificates-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
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
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            Professional Credentials
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span class="block text-base-content">Certifications &</span>
                            <span
                                class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                Accreditations
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                My commitment to continuous learning and professional development is reflected in these
                                certifications. Each one represents hours of study, practical application, and validation of
                                expertise.
                            </p>
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                These credentials demonstrate my dedication to staying current with industry standards and
                                best practices.
                            </p>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">{{ $certificates->count() }}+</div>
                                <div class="text-sm text-base-content/70">Certifications</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">
                                    {{ $certificates->unique('category_id')->count() }}</div>
                                <div class="text-sm text-base-content/70">Specializations</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">100%</div>
                                <div class="text-sm text-base-content/70">Verified</div>
                            </div>
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#certificates-grid"
                                class="group relative inline-flex items-center gap-2 px-4 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-award relative z-10"></i>
                                <span class="relative z-10">View Certificates</span>
                                <i
                                    class="fas fa-arrow-down relative z-10 group-hover:translate-y-1 transition-transform duration-300"></i>
                            </a>
                            <a href="{{ route('skills') }}"
                                class="group inline-flex items-center gap-2 px-4 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-code"></i>
                                <span>My Skills</span>
                                <i
                                    class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>
                    

                    </a>
                    <!-- Visual Column - Certificate Showcase -->
                    <div class="relative hidden lg:block">
                        <div class="relative max-w-lg mx-auto">
                            <!-- Certificate Display Concept -->
                            <div
                                class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <!-- Main Certificate Card -->
                                <div
                                    class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300 bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-gray-800 dark:to-gray-900">
                                    <!-- Certificate Border -->
                                    <div class="absolute inset-4 border-2 border-primary/20 rounded-lg"></div>

                                    <!-- Certificate Header -->
                                    <div class="relative p-8 text-center">
                                        <div
                                            class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 text-white text-3xl mb-6">
                                            <i class="fas fa-award"></i>
                                        </div>
                                        <div class="text-sm font-semibold text-primary mb-2">CERTIFICATE OF ACHIEVEMENT
                                        </div>
                                        <h3 class="text-2xl font-bold text-base-content mb-4">Professional Development</h3>
                                        <div class="text-base-content/70">Issued by: Professional Certification Board</div>
                                    </div>

                                    <!-- Certificate Details -->
                                    <div class="px-8 pb-8">
                                        <div class="grid grid-cols-2 gap-6 mb-6">
                                            <div class="text-center">
                                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                                <div class="font-semibold text-base-content">{{ now()->format('M Y') }}
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                                <div class="font-semibold text-base-content">
                                                    #CERT-{{ now()->format('Y') }}-001</div>
                                            </div>
                                        </div>

                                        <!-- Verification Badge -->
                                        <div class="text-center">
                                            <div
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm">
                                                <i class="fas fa-shield-check"></i>
                                                <span>Verified Credential
                                            </div>
                                        </div>
                                        </span>
                                    </div>

                                    <!-- Decorative Elements -->
                                    <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/30">
                                    </div>
                                    <div class="absolute top-4 right-4 w-8 h-8 border-t-2 border-r-2 border-primary/30">
                                    </div>
                                    <div class="absolute bottom-4 left-4 w-8 h-8 border-b-2 border-l-2 border-primary/30">
                                    </div>
                                    <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/30">
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Certificate Elements -->
                            <div
                                class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary-400/20 to-transparent rounded-3xl -rotate-12 animate-float-slow">
                            </div>
                            <div
                                class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-secondary-400/20 to-transparent rounded-2xl rotate-12 animate-float-slower">
                                <div class="absolute inset-4 border-2 border-primary/10 rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 hidden lg:block">
            <a href="#certificates-grid" class="animate-bounce">
                <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                    <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Certificates Filter Section -->
    <section id="certificates-filter" class="py-12 bg-base-200/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h2 class="text-2xl font-bold text-base-content">Browse Certificates</h2>
                        <p class="text-base-content/70">Filter by category or search for specific credentials</p>
                    </div>

                    <!-- Search Bar -->
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        <div class="relative w-full sm:w-64 md:w-80">
                            <input type="text" id="certificate-search" placeholder="Search certificates..."
                                class="w-full px-4 py-3 pl-12 bg-base-100 border border-base-300
                  rounded-xl text-base-content placeholder-base-content/60
                  focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent transition-all duration-300">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-base-content/40 pointer-events-none"></i>
                        </div>





                        <!-- Filter Buttons -->
                        <div class="flex flex-wrap gap-2 sm:gap-3 w-full sm:w-auto justify-start sm:justify-end">
                            <button data-filter="all"
                                class="certificate-filter-btn active px-3 sm:px-4 py-2 rounded-lg bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-medium transition-all duration-300 hover:shadow-lg text-sm sm:text-base">
                                All
                            </button>
                            @foreach ($certificates->unique('category_id')->pluck('category') as $category)
                                @if ($category)
                                    <button data-filter="{{ $category->slug }}"
                                        class="certificate-filter-btn px-3 sm:px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300 text-sm sm:text-base">
                                        {{ ucfirst($category->name) }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificates Grid Section -->
    <section id="certificates-grid" class="py-20 bg-base-100/50 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <!-- Certificates Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="certificates-container">
                    @foreach ($certificates as $certificate)
                        <div class="certificate-card group"
                            data-category="{{ $certificate->category ? $certificate->category->slug : 'general' }}"
                            data-title="{{ strtolower($certificate->title) }}"
                            data-issuer="{{ strtolower($certificate->issuer ?? '') }}">
                            <div
                                class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">


                                <!-- Certificate Header with Gradient -->
                                @php
                                
                                    $categoryColor = $certificate->category ? $certificate->category->color : null;

                                    $bgClass = '';
                                    $style = '';

                                    if (!$certificate->category) {
                                        $bgClass = 'bg-gradient-to-br from-gray-500 to-gray-600';
                                    } elseif (empty($categoryColor)) {
                                        $bgClass = 'bg-gradient-to-br from-blue-500 to-indigo-600';
                                    } elseif (
                                        Str::startsWith($categoryColor, '#') ||
                                        Str::startsWith($categoryColor, 'rgb') ||
                                        Str::startsWith($categoryColor, 'hsl')
                                    ) {
                                        $style = "background: linear-gradient(135deg, {$categoryColor}, {$categoryColor})";
                                    } elseif (Str::contains($categoryColor, 'gradient')) {
                                        $style = "background: {$categoryColor}";
                                    } elseif (
                                        Str::startsWith($categoryColor, 'bg-') ||
                                        Str::startsWith($categoryColor, 'from-')
                                    ) {
                                        if (Str::startsWith($categoryColor, 'from-')) {
                                            $bgClass = 'bg-gradient-to-br ' . $categoryColor;
                                        } else {
                                            $bgClass = $categoryColor;
                                        }
                                    } else {
                                        $style = "background: linear-gradient(135deg, {$categoryColor}, {$categoryColor})";
                                    }
                                @endphp
                                <div class="relative p-6 {{ $bgClass }} text-white" style="{{ $style }}">
                                    <div class="absolute top-4 right-4">
                                        <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                                            @if (isset($certificate->icon))
                                                @if ($certificate->icon == 'fab fa-aws')
                                                    <svg class="w-6 h-6 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12.19 8.65c-.02-.48-.21-.86-.56-1.13-.35-.28-.84-.41-1.45-.41-.47 0-.85.1-1.13.29-.28.19-.42.44-.42.76 0 .27.1.48.31.63.21.15.68.33 1.41.54.73.21 1.3.41 1.71.6.41.19.72.43.93.72.21.29.31.66.31 1.11 0 .71-.27 1.28-.81 1.72-.54.44-1.26.66-2.16.66-.95 0-1.72-.23-2.31-.69-.59-.46-.88-1.15-.88-2.06h1.51c.02.43.18.77.48 1.02.3.25.71.37 1.23.37.5 0 .89-.1 1.17-.3.28-.2.42-.46.42-.79 0-.32-.12-.56-.36-.72-.24-.16-.73-.35-1.46-.56-.73-.21-1.28-.42-1.65-.61-.37-.19-.65-.43-.85-.72-.2-.29-.3-.65-.3-1.08 0-.67.26-1.21.78-1.63.52-.42 1.21-.63 2.07-.63.89 0 1.61.22 2.16.66.55.44.83 1.07.85 1.89h-1.52z" />
                                                    </svg>
                                                @elseif($certificate->icon == 'fab fa-laravel')
                                                    <svg class="w-6 h-6 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12.004 0L9.698 4.09l4.634 2.675L16.64 2.47 12.004 0zm5.675 3.276l-2.31 4 4.63 2.672 2.31-4.002-4.63-2.67zM7.15 4.377L2.52 7.05l2.31 4.002 4.63-2.672-2.31-4.003zM12.002 8.183l-4.63 2.67 4.63 2.67 4.63-2.67-4.63-2.67z" />
                                                    </svg>
                                                @elseif($certificate->icon == 'fab fa-react')
                                                    <svg class="w-6 h-6 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.41 0-.783.093-1.106.278-1.375.793-1.683 3.264-.973 6.365C1.98 8.917 0 10.42 0 12.004c0 1.59 1.99 3.097 5.043 4.03-.704 3.113-.39 5.588.988 6.38.32.187.69.275 1.102.275 1.345 0 3.107-.96 4.888-2.624 1.78 1.654 3.542 2.603 4.887 2.603.41 0 .783-.09 1.106-.275 1.374-.792 1.683-3.263.973-6.365C22.02 15.096 24 13.59 24 12.004c0-1.59-1.99-3.097-5.043-4.032.704-3.11.39-5.587-.988-6.38-.318-.184-.688-.277-1.092-.278zm-.005 1.09v.006c.225 0 .406.044.558.127.666.382.955 1.835.73 3.704-.054.46-.142.945-.25 1.44-.96-.236-2.006-.417-3.107-.534-.66-.905-1.345-1.727-2.035-2.447 1.592-1.48 3.087-2.292 4.105-2.295zm-9.77.02c1.012 0 2.514.808 4.11 2.28-.686.72-1.37 1.537-2.02 2.442-1.107.117-2.154.298-3.113.538-.112-.49-.195-.964-.254-1.42-.23-1.868.054-3.32.714-3.707.19-.09.4-.127.563-.132z" />
                                                    </svg>
                                                @else
                                                    <i class="fas fa-certificate text-2xl"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-certificate text-2xl"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pr-12">
                                        <div class="text-sm font-medium opacity-90 mb-2">
                                            {{ $certificate->issuer ?? 'Certificate Issuer' }}</div>
                                        <h3 class="text-xl font-bold">{{ $certificate->title }}</h3>
                                    </div>
                                </div>

                                <!-- Certificate Details -->
                                <div class="p-6 flex-grow">
                                    <div class="space-y-4">
                                        <!-- Date and ID -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                                <div class="font-semibold text-base-content">
                                                    {{ $certificate->issued_at->format('M Y') }}</div>
                                            </div>
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                                <div class="font-semibold text-base-content font-mono text-sm">
                                                    #{{ $certificate->id }}</div>
                                            </div>
                                        </div>

                                        <!-- Score if exists -->
                                        @if (isset($certificate->score))
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Score / Level</div>
                                                <div class="font-semibold text-base-content">{{ $certificate->score }}
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Description -->
                                        @if ($certificate->description)
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Description</div>
                                                <div class="text-sm text-base-content/70 line-clamp-3">
                                                    {{ Str::limit($certificate->description, 100) }}</div>
                                            </div>
                                        @endif

                                        <!-- Verification Status -->
                                        <div class="pt-4 border-t border-base-300">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                                    <span
                                                        class="text-sm text-green-600 dark:text-green-400">Verified</span>
                                                </div>
                                                <span
                                                    class="text-xs px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                                    {{ ucfirst($certificate->category->name ?? 'General') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Certificate Actions -->
                                <div class="p-6 pt-0">
                                    <div class="flex gap-3">
                                        @if (!empty($certificate->certificate_url) && filter_var($certificate->certificate_url, FILTER_VALIDATE_URL))
                                            <a href="{{ $certificate->certificate_url }}" target="_blank"
                                                class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                                <i class="fas fa-external-link-alt"></i>
                                                <span>View Credential</span>
                                            </a>
                                        @else
                                            <a href="{{ route('certificate', $certificate->id) }}"
                                                class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                                <i class="fas fa-info-circle"></i>
                                                <span>View Details</span>
                                            </a>
                                            <button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-12" id="load-more-container">
                    <button id="load-more-certificates"
                        class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-sync-alt group-hover:rotate-180 transition-transform duration-300"></i>
                        <span>Load More Certificates</span>
                    </button>
                </div>

                <!-- No Results Message -->
                <div class="hidden text-center py-12" id="no-results">
                    <div class="w-16 h-16 rounded-full bg-base-200 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl text-base-content/40"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-base-content mb-2">No certificates found</h3>
                    <p class="text-base-content/60">Try adjusting your search or filter criteria</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="certificates-cta" class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-secondary-500/5"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    <span class="text-base-content">Ready to Validate Your</span>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Professional
                        Growth?</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    Certifications are just one part of the journey. Let's discuss how these skills can benefit your next
                    project.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                        class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <i class="fas fa-envelope relative z-10"></i>
                        <span class="relative z-10">Start a Conversation</span>
                        <i
                            class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('home') }}#portfolio"
                        class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-briefcase"></i>
                        <span>View My Work</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Share Modal -->
    <div id="share-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="hideShareModal()"></div>
            <div class="relative bg-base-100 rounded-2xl shadow-2xl max-w-md w-full">
                <div class="flex justify-between items-center p-6 border-b border-base-300">
                    <h3 class="text-xl font-bold text-base-content">Share Certificate</h3>
                    <button onclick="hideShareModal()"
                        class="w-8 h-8 rounded-lg bg-base-200 hover:bg-base-300 flex items-center justify-center">
                        <i class="fas fa-times text-base-content/70"></i>
                    </button>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-base-200 transition-colors"
                            onclick="shareToSocial('twitter')">
                            <i class="fab fa-twitter text-blue-500"></i>
                            <span>Share on Twitter</span>
                        </button>
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-base-200 transition-colors"
                            onclick="shareToSocial('linkedin')">
                            <i class="fab fa-linkedin text-blue-600"></i>
                            <span>Share on LinkedIn</span>
                        </button>
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-base-200 transition-colors"
                            onclick="copyCertificateLink()">
                            <i class="fas fa-copy text-primary"></i>
                            <span>Copy Link</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    @vite('resources/css/certificates.css')
@endpush

@push('scripts')
    @vite('resources/js/certificates-final.js')
    @vite('resources/js/certificates-loadmore.js')
@endpush
