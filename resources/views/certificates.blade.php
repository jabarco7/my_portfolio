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
                                <div class="text-3xl font-bold text-primary mb-2">15+</div>
                                <div class="text-sm text-base-content/70">Certifications</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">5</div>
                                <div class="text-sm text-base-content/70">Specializations</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">100%</div>
                                <div class="text-sm text-base-content/70">Verified</div>
                            </div>
                        </div>

                        <!-- Call to Action Buttons -->
                        <div class="flex flex-wrap gap-4">
                            <a href="#certificates-grid"
                                class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <i class="fas fa-award relative z-10"></i>
                                <span class="relative z-10">View Certificates</span>
                                <i
                                    class="fas fa-arrow-down relative z-10 group-hover:translate-y-1 transition-transform duration-300"></i>
                            </a>
                            <a href="{{ route('skills') }}"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-code"></i>
                                <span>My Skills</span>
                                <i
                                    class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>

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
                                        <h3 class="text-2xl font-bold text-base-content mb-4">Full Stack Web Development
                                        </h3>
                                        <div class="text-base-content/70">Issued by: Professional Certification Board</div>
                                    </div>

                                    <!-- Certificate Details -->
                                    <div class="px-8 pb-8">
                                        <div class="grid grid-cols-2 gap-6 mb-6">
                                            <div class="text-center">
                                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                                <div class="font-semibold text-base-content">June 2023</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                                <div class="font-semibold text-base-content">#FSWD-2023-045</div>
                                            </div>
                                        </div>

                                        <!-- Verification Badge -->
                                        <div class="text-center">
                                            <div
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm">
                                                <i class="fas fa-shield-check"></i>
                                                <span>Verified Credential</span>
                                            </div>
                                        </div>
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

                    <!-- Filter Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <button data-filter="all"
                            class="certificate-filter-btn active px-4 py-2 rounded-lg bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-medium transition-all duration-300 hover:shadow-lg">
                            All Certificates
                        </button>
                        <button data-filter="development"
                            class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Development
                        </button>
                        <button data-filter="cloud"
                            class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Cloud & DevOps
                        </button>
                        <button data-filter="design"
                            class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Design
                        </button>
                        <button data-filter="language"
                            class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Languages
                        </button>
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
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Development Certificates -->
                    @foreach ([
            ['title' => 'AWS Certified Developer', 'issuer' => 'Amazon Web Services', 'date' => 'Nov 2023', 'category' => 'cloud', 'icon' => 'fab fa-aws', 'color' => 'from-orange-500 to-yellow-500', 'id' => 'AWS-DEV-2023-789', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Laravel Certified Developer', 'issuer' => 'Laravel Certification Board', 'date' => 'Aug 2023', 'category' => 'development', 'icon' => 'fab fa-laravel', 'color' => 'from-red-500 to-pink-500', 'id' => 'LCD-2023-456', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'React Professional', 'issuer' => 'Meta Certification', 'date' => 'May 2023', 'category' => 'development', 'icon' => 'fab fa-react', 'color' => 'from-cyan-500 to-blue-500', 'id' => 'META-REACT-2023-123', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Vue.js Mastery', 'issuer' => 'Vue School', 'date' => 'Mar 2023', 'category' => 'development', 'icon' => 'fab fa-vuejs', 'color' => 'from-green-500 to-emerald-500', 'id' => 'VUE-MASTER-2023-789', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Full Stack Web Development', 'issuer' => 'Coursera', 'date' => 'Jan 2023', 'category' => 'development', 'icon' => 'fab fa-google', 'color' => 'from-purple-500 to-indigo-500', 'id' => 'FSWD-2023-045', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Node.js Backend Development', 'issuer' => 'Udemy', 'date' => 'Dec 2022', 'category' => 'development', 'icon' => 'fas fa-code', 'color' => 'from-green-600 to-green-800', 'id' => 'NODE-2022-789', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Google Cloud Associate', 'issuer' => 'Google Cloud', 'date' => 'Oct 2022', 'category' => 'cloud', 'icon' => 'fab fa-google', 'color' => 'from-blue-500 to-cyan-500', 'id' => 'GCP-ASSOC-2022-456', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Docker Certified Associate', 'issuer' => 'Docker Inc.', 'date' => 'Sep 2022', 'category' => 'cloud', 'icon' => 'fab fa-docker', 'color' => 'from-blue-400 to-blue-600', 'id' => 'DCA-2022-123', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'UI/UX Design Specialization', 'issuer' => 'Interaction Design Foundation', 'date' => 'Jul 2022', 'category' => 'design', 'icon' => 'fas fa-paint-brush', 'color' => 'from-pink-500 to-purple-500', 'id' => 'UIUX-2022-456', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'IELTS Academic', 'issuer' => 'British Council', 'date' => 'Jun 2022', 'category' => 'language', 'icon' => 'fas fa-language', 'color' => 'from-red-500 to-orange-500', 'id' => 'IELTS-2022-8.0', 'verified' => true, 'score' => '8.0/9.0', 'credential_url' => '#'],
            ['title' => 'TypeScript Fundamentals', 'issuer' => 'Microsoft Learn', 'date' => 'Apr 2022', 'category' => 'development', 'icon' => 'fas fa-code', 'color' => 'from-blue-600 to-blue-800', 'id' => 'TS-FUND-2022-789', 'verified' => true, 'credential_url' => '#'],
            ['title' => 'Git Advanced Techniques', 'issuer' => 'GitHub', 'date' => 'Feb 2022', 'category' => 'development', 'icon' => 'fab fa-git-alt', 'color' => 'from-orange-600 to-red-600', 'id' => 'GIT-ADV-2022-123', 'verified' => true, 'credential_url' => '#'],
        ] as $certificate)
                        <div class="certificate-card group" data-category="{{ $certificate['category'] }}">
                            <div
                                class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                                <!-- Certificate Header with Gradient -->
                                <div class="relative p-6 bg-gradient-to-br {{ $certificate['color'] }} text-white">
                                    <div class="absolute top-4 right-4">
                                        <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                                            @if ($certificate['icon'] == 'fab fa-aws')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12.19 8.65c-.02-.48-.21-.86-.56-1.13-.35-.28-.84-.41-1.45-.41-.47 0-.85.1-1.13.29-.28.19-.42.44-.42.76 0 .27.1.48.31.63.21.15.68.33 1.41.54.73.21 1.3.41 1.71.6.41.19.72.43.93.72.21.29.31.66.31 1.11 0 .71-.27 1.28-.81 1.72-.54.44-1.26.66-2.16.66-.95 0-1.72-.23-2.31-.69-.59-.46-.88-1.15-.88-2.06h1.51c.02.43.18.77.48 1.02.3.25.71.37 1.23.37.5 0 .89-.1 1.17-.3.28-.2.42-.46.42-.79 0-.32-.12-.56-.36-.72-.24-.16-.73-.35-1.46-.56-.73-.21-1.28-.42-1.65-.61-.37-.19-.65-.43-.85-.72-.2-.29-.3-.65-.3-1.08 0-.67.26-1.21.78-1.63.52-.42 1.21-.63 2.07-.63.89 0 1.61.22 2.16.66.55.44.83 1.07.85 1.89h-1.52zm7.43 3.35c-.15.39-.39.73-.71 1.02-.32.29-.71.51-1.16.66-.45.15-.95.23-1.5.23-.95 0-1.71-.23-2.28-.69-.57-.46-.85-1.13-.85-2.01V6.5h1.51v4.45c0 .54.14.96.42 1.26.28.3.68.45 1.2.45.52 0 .92-.15 1.2-.45.28-.3.42-.72.42-1.26V6.5h1.51v4.71c0 .42-.05.81-.15 1.18-.1.37-.25.71-.45 1.02-.2.31-.45.57-.75.78-.3.21-.65.37-1.05.48-.4.11-.84.16-1.32.16-.48 0-.92-.05-1.32-.16-.4-.11-.75-.27-1.05-.48-.3-.21-.55-.47-.75-.78-.2-.31-.35-.65-.45-1.02-.1-.37-.15-.76-.15-1.18V6.5h1.51v4.45c0 .54.14.96.42 1.26.28.3.68.45 1.2.45.52 0 .92-.15 1.2-.45.28-.3.42-.72.42-1.26V6.5h1.51v4.71c0 .88-.28 1.55-.85 2.01-.57.46-1.33.69-2.28.69z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fab fa-laravel')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12.004 0L9.698 4.09l4.634 2.675L16.64 2.47 12.004 0zm5.675 3.276l-2.31 4 4.63 2.672 2.31-4.002-4.63-2.67zM7.15 4.377L2.52 7.05l2.31 4.002 4.63-2.672-2.31-4.003zM12.002 8.183l-4.63 2.67 4.63 2.67 4.63-2.67-4.63-2.67zm-6.463 3.733l-2.31 4 6.94 4.01 2.31-4.01-6.94-4.002zm12.923 0l-6.94 4.002 2.31 4.01 6.94-4.01-2.31-4.002z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fab fa-react')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.41 0-.783.093-1.106.278-1.375.793-1.683 3.264-.973 6.365C1.98 8.917 0 10.42 0 12.004c0 1.59 1.99 3.097 5.043 4.03-.704 3.113-.39 5.588.988 6.38.32.187.69.275 1.102.275 1.345 0 3.107-.96 4.888-2.624 1.78 1.654 3.542 2.603 4.887 2.603.41 0 .783-.09 1.106-.275 1.374-.792 1.683-3.263.973-6.365C22.02 15.096 24 13.59 24 12.004c0-1.59-1.99-3.097-5.043-4.032.704-3.11.39-5.587-.988-6.38-.318-.184-.688-.277-1.092-.278zm-.005 1.09v.006c.225 0 .406.044.558.127.666.382.955 1.835.73 3.704-.054.46-.142.945-.25 1.44-.96-.236-2.006-.417-3.107-.534-.66-.905-1.345-1.727-2.035-2.447 1.592-1.48 3.087-2.292 4.105-2.295zm-9.77.02c1.012 0 2.514.808 4.11 2.28-.686.72-1.37 1.537-2.02 2.442-1.107.117-2.154.298-3.113.538-.112-.49-.195-.964-.254-1.42-.23-1.868.054-3.32.714-3.707.19-.09.4-.127.563-.132zm4.882 3.05c.455.468.91.992 1.36 1.564-.44-.02-.89-.034-1.345-.034-.46 0-.915.01-1.36.034.44-.572.895-1.096 1.345-1.565zM12 8.1c.74 0 1.477.034 2.202.093.406.582.802 1.203 1.183 1.86.372.64.71 1.29 1.018 1.946-.308.655-.646 1.31-1.013 1.95-.38.66-.773 1.288-1.18 1.87-.728.063-1.466.098-2.21.098-.74 0-1.477-.035-2.202-.093-.406-.582-.802-1.204-1.183-1.86-.372-.64-.71-1.29-1.018-1.946.303-.657.646-1.313 1.013-1.954.38-.66.773-1.286 1.18-1.868.728-.064 1.466-.098 2.21-.098zm-3.635.254c-.24.377-.48.763-.704 1.16-.225.39-.435.782-.635 1.174-.265-.656-.49-1.31-.68-1.947.64-.15 1.315-.283 2.02-.386zm7.26 0c.698.103 1.372.236 2.017.387-.184.632-.405 1.282-.66 1.933-.2-.39-.41-.783-.64-1.174-.225-.392-.465-.774-.705-1.146zm3.063.675c.484.15.944.317 1.375.498 1.732.74 2.852 1.708 2.852 2.476-.005.768-1.125 1.74-2.857 2.475-.42.18-.88.343-1.355.493-.28-.958-.646-1.956-1.1-2.98.45-1.017.81-2.01 1.085-2.964zm-13.395.004c.278.96.645 1.957 1.1 2.98-.45 1.017-.812 2.01-1.086 2.964-.484-.15-.944-.318-1.37-.5-1.732-.737-2.852-1.706-2.852-2.474 0-.768 1.12-1.742 2.852-2.476.42-.18.88-.342 1.356-.493zm11.678 4.28c.265.657.49 1.312.68 1.948-.636.157-1.313.29-2.02.39.24-.375.48-.762.705-1.158.225-.39.435-.788.636-1.18zm-9.945.02c.2.392.41.783.64 1.175.23.39.465.772.705 1.143-.698-.102-1.372-.235-2.017-.386.184-.63.406-1.282.66-1.933zM17.92 16.32c.112.493.2.968.254 1.423.23 1.868-.054 3.32-.714 3.708-.147.088-.338.128-.563.128-1.012 0-2.514-.807-4.11-2.28.686-.72 1.37-1.536 2.02-2.44 1.107-.118 2.154-.3 3.113-.54zm-11.83.01c.96.234 2.006.415 3.107.532.66.905 1.345 1.727 2.035 2.446-1.595 1.483-3.09 2.295-4.11 2.295-.22-.005-.406-.05-.553-.132-.666-.38-.955-1.834-.73-3.703.054-.46.142-.944.25-1.438zm4.56.64c.44.02.89.034 1.345.034.46 0 .915-.01 1.36-.034-.44.572-.895 1.095-1.345 1.565-.455-.47-.91-.993-1.36-1.565z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fab fa-vuejs')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M24,1.61H14.06L12,5.16,9.94,1.61H0L12,22.39ZM12,14.08,5.16,2.23H9.59L12,6.41l2.41-4.18h4.43Z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fab fa-google')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                                    <path
                                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                                    <path
                                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                                    <path
                                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fab fa-docker')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.943 5.607h-1.903v1.904h1.903zm-3.807 0H8.233v1.904h1.903zm3.807 3.806h-1.903v1.904h1.903zm-3.807 0H8.233v1.904h1.903zm3.807 3.807h-1.903v1.903h1.903zm-3.807 0H8.233v1.903h1.903zm9.517-9.517h-1.903v1.904h1.903zm-3.806 0h-1.904v1.904h1.904zm3.806 3.806h-1.903v1.904h1.903zm-3.806 0h-1.904v1.904h1.904zm3.806 3.807h-1.903v1.903h1.903zm-3.806 0h-1.904v1.903h1.904zm3.806 3.806h-1.903v1.904h1.903zm-3.806 0h-1.904v1.904h1.904z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fas fa-paint-brush')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M7 14c-1.66 0-3 1.34-3 3 0 1.31-1.16 2-2 2 .92 1.22 2.49 2 4 2 2.21 0 4-1.79 4-4 0-1.66-1.34-3-3-3zm13.71-9.37l-1.34-1.34c-.39-.39-1.02-.39-1.41 0L9 12.25 11.75 15l8.96-8.96c.39-.39.39-1.02 0-1.41z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fas fa-language')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2 0 .68.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2 0-.68.07-1.35.16-2h4.68c.09.65.16 1.32.16 2 0 .68-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2 0-.68-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fas fa-code')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                                                </svg>
                                            @elseif($certificate['icon'] == 'fab fa-git-alt')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M23.548 8.877c-.027-.066-.057-.13-.09-.19-.016-.03-.03-.062-.048-.092-.038-.06-.08-.118-.123-.175-.023-.03-.045-.06-.07-.088-.048-.054-.1-.105-.153-.154-.024-.023-.047-.047-.072-.068-.06-.05-.12-.095-.185-.138-.018-.012-.034-.027-.052-.038L12.626.164c-.693-.424-1.56-.424-2.252 0L1.35 8.066c-.018.01-.034.025-.052.037-.064.043-.124.09-.185.138-.025.022-.048.045-.072.07-.054.048-.105.1-.153.153-.025.028-.047.058-.07.088-.043.057-.085.115-.123.175-.017.03-.032.06-.048.093-.033.06-.063.124-.09.19-.014.034-.028.067-.04.102-.03.087-.053.176-.07.267-.006.03-.015.058-.02.088-.017.107-.025.215-.025.324v6.902c0 .11.01.217.025.324.005.03.014.058.02.088.017.09.04.18.07.267.012.035.026.068.04.102.027.066.057.13.09.19.016.03.03.062.048.092.038.06.08.118.123.175.023.03.045.06.07.088.048.054.1.105.153.154.024.023.047.047.072.068.06.05.12.095.185.138.018.012.034.027.052.038l9.024 5.517c.346.212.738.318 1.13.318.39 0 .78-.106 1.126-.318l9.024-5.517c.018-.01.034-.025.052-.037.064-.043.124-.09.185-.138.025-.022.048-.045.072-.07.054-.048.105-.1.153-.153.025-.028.047-.058.07-.088.043-.057.085-.115.123-.175.017-.03.032-.06.048-.093.033-.06.063-.124.09-.19.014-.034.028-.067.04-.102.03-.087.053-.176.07-.267.006-.03.015-.058.02-.088.017-.107.025-.215.025-.324V9.658c0-.11-.01-.217-.025-.324-.005-.03-.014-.058-.02-.088-.017-.09-.04-.18-.07-.267-.012-.035-.026-.068-.04-.102zm-10.475-6.69l5.896 3.602-2.632 1.608-3.264-1.998V2.187zm-2.252 0v3.212L7.556 7.397l-2.632-1.608 5.897-3.602zM3.376 9.658l2.107 1.288-2.107 1.288V9.658zm7.447 12.155l-5.896-3.602 2.632-1.608 3.264 1.998v3.212zm1.126-5.274l-3.785-2.315 3.785-2.315 3.785 2.315-3.785 2.315zm1.126 5.274v-3.212l3.264-1.998 2.632 1.608-5.896 3.602zm7.447-8.58l-2.107-1.288 2.107-1.288v2.576z" />
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9h-4v4h-2v-4H9V9h4V5h2v4h4v2z" />
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pr-12">
                                        <div class="text-sm font-medium opacity-90 mb-2">{{ $certificate['issuer'] }}</div>
                                        <h3 class="text-xl font-bold">{{ $certificate['title'] }}</h3>
                                    </div>
                                </div>

                                <!-- Certificate Details -->
                                <div class="p-6 flex-grow">
                                    <div class="space-y-4">
                                        <!-- Date and ID -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                                <div class="font-semibold text-base-content">{{ $certificate['date'] }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                                <div class="font-semibold text-base-content font-mono text-sm">
                                                    {{ $certificate['id'] }}</div>
                                            </div>
                                        </div>

                                        <!-- Score if exists -->
                                        @if (isset($certificate['score']))
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">Score / Level</div>
                                                <div class="font-semibold text-base-content">{{ $certificate['score'] }}
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Verification Status -->
                                        <div class="pt-4 border-t border-base-300">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    @if ($certificate['verified'])
                                                        <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                                        <span
                                                            class="text-sm text-green-600 dark:text-green-400">Verified</span>
                                                    @else
                                                        <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                                                        <span class="text-sm text-yellow-600">Pending</span>
                                                    @endif
                                                </div>
                                                <span
                                                    class="text-xs px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                                    {{ ucfirst($certificate['category']) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Certificate Actions -->
                                <div class="p-6 pt-0">
                                    <div class="flex gap-3">
                                        <a href="{{ $certificate['credential_url'] }}" target="_blank"
                                            class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                            <i class="fas fa-external-link-alt"></i>
                                            <span>View Credential</span>
                                        </a>
                                        <button
                                            class="certificate-detail-btn inline-flex items-center justify-center w-12 h-12 bg-base-200 rounded-lg hover:bg-base-300 transition-all duration-300 group/expand"
                                            data-certificate='@json($certificate)'>
                                            <i
                                                class="fas fa-expand-alt text-base-content/70 group-hover/expand:text-primary"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button id="load-more-certificates"
                        class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-sync-alt group-hover:rotate-180 transition-transform duration-300"></i>
                        <span>Load More Certificates</span>
                    </button>
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

    <!-- Certificate Detail Modal -->
    <div id="certificate-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Modal Backdrop -->
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="hideCertificateModal()"></div>

            <!-- Modal Content -->
            <div class="relative bg-base-100 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                <div class="sticky top-0 z-10 flex justify-between items-center p-6 border-b border-base-300 bg-base-100">
                    <h3 class="text-2xl font-bold text-base-content">Certificate Details</h3>
                    <button onclick="hideCertificateModal()"
                        class="w-10 h-10 rounded-lg bg-base-200 hover:bg-base-300 flex items-center justify-center transition-colors duration-300">
                        <i class="fas fa-times text-base-content/70"></i>
                    </button>
                </div>

                <div class="p-6">
                    <!-- Dynamic content will be inserted here by JavaScript -->
                    <div id="certificate-modal-content"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    @vite('resources/css/certificates.css')
@endpush

@push('scripts')
    @vite('resources/js/certificates.js')
@endpush
