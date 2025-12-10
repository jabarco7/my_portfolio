@extends('layouts.app')

@section('content')
    <!-- Hero Section for Certificates -->
    <section id="certificates-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-primary-100/30 dark:bg-primary-900/20 rounded-full mix-blend-multiply blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-secondary-100/20 dark:bg-secondary-900/10 rounded-full mix-blend-multiply blur-3xl"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-blue-100/20 dark:bg-blue-900/10 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-5 dark:opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M0 0h60v60H0z\" fill=\"none\"/%3E%3Cpath d=\"M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z\" fill=\"%23000000\" fill-opacity=\"0.2\"/%3E%3C/svg%3E');"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 right-20 hidden lg:block">
            <div class="relative">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-400 to-secondary-400 rotate-12 opacity-20 animate-float-slow"></div>
                <div class="absolute -top-4 -left-4 w-8 h-8 rounded-full bg-secondary-300/40 dark:bg-secondary-700/40 animate-float"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <!-- Content Column -->
                    <div class="animate-slide-up">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            Professional Credentials
                        </div>

                        <!-- Main Heading -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-6">
                            <span class="block text-base-content">Certifications &</span>
                            <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                Accreditations
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                My commitment to continuous learning and professional development is reflected in these certifications. Each one represents hours of study, practical application, and validation of expertise.
                            </p>
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                These credentials demonstrate my dedication to staying current with industry standards and best practices.
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
                            <a href="#certificates-grid" class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <i class="fas fa-award relative z-10"></i>
                                <span class="relative z-10">View Certificates</span>
                                <i class="fas fa-arrow-down relative z-10 group-hover:translate-y-1 transition-transform duration-300"></i>
                            </a>
                            <a href="{{ route('skills') }}" class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-code"></i>
                                <span>My Skills</span>
                                <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Visual Column - Certificate Showcase -->
                    <div class="relative hidden lg:block">
                        <div class="relative max-w-lg mx-auto">
                            <!-- Certificate Display Concept -->
                            <div class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <!-- Main Certificate Card -->
                                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300 bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-gray-800 dark:to-gray-900">
                                    <!-- Certificate Border -->
                                    <div class="absolute inset-4 border-2 border-primary/20 rounded-lg"></div>
                                    
                                    <!-- Certificate Header -->
                                    <div class="relative p-8 text-center">
                                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 text-white text-3xl mb-6">
                                            <i class="fas fa-award"></i>
                                        </div>
                                        <div class="text-sm font-semibold text-primary mb-2">CERTIFICATE OF ACHIEVEMENT</div>
                                        <h3 class="text-2xl font-bold text-base-content mb-4">Full Stack Web Development</h3>
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
                                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm">
                                                <i class="fas fa-shield-check"></i>
                                                <span>Verified Credential</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Decorative Elements -->
                                    <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/30"></div>
                                    <div class="absolute top-4 right-4 w-8 h-8 border-t-2 border-r-2 border-primary/30"></div>
                                    <div class="absolute bottom-4 left-4 w-8 h-8 border-b-2 border-l-2 border-primary/30"></div>
                                    <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/30"></div>
                                </div>
                            </div>

                            <!-- Floating Certificate Elements -->
                            <div class="absolute -top-6 -right-6 w-40 h-40 bg-gradient-to-br from-primary-400/20 to-transparent rounded-3xl -rotate-12 animate-float-slow"></div>
                            <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-secondary-400/20 to-transparent rounded-2xl rotate-12 animate-float-slower">
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
                        <button data-filter="all" class="certificate-filter-btn active px-4 py-2 rounded-lg bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-medium transition-all duration-300 hover:shadow-lg">
                            All Certificates
                        </button>
                        <button data-filter="development" class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Development
                        </button>
                        <button data-filter="cloud" class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Cloud & DevOps
                        </button>
                        <button data-filter="design" class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
                            Design
                        </button>
                        <button data-filter="language" class="certificate-filter-btn px-4 py-2 rounded-lg bg-base-200 text-base-content font-medium border border-base-300 hover:bg-base-300 transition-all duration-300">
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
                    @foreach([
                        ['title' => 'AWS Certified Developer', 'issuer' => 'Amazon Web Services', 'date' => 'Nov 2023', 'category' => 'cloud', 'icon' => 'fab fa-aws', 'color' => 'from-orange-500 to-yellow-500', 'id' => 'AWS-DEV-2023-789', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Laravel Certified Developer', 'issuer' => 'Laravel Certification Board', 'date' => 'Aug 2023', 'category' => 'development', 'icon' => 'fab fa-laravel', 'color' => 'from-red-500 to-pink-500', 'id' => 'LCD-2023-456', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'React Professional', 'issuer' => 'Meta Certification', 'date' => 'May 2023', 'category' => 'development', 'icon' => 'fab fa-react', 'color' => 'from-cyan-500 to-blue-500', 'id' => 'META-REACT-2023-123', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Vue.js Mastery', 'issuer' => 'Vue School', 'date' => 'Mar 2023', 'category' => 'development', 'icon' => 'fab fa-vuejs', 'color' => 'from-green-500 to-emerald-500', 'id' => 'VUE-MASTER-2023-789', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Full Stack Web Development', 'issuer' => 'Coursera', 'date' => 'Jan 2023', 'category' => 'development', 'icon' => 'fas fa-code', 'color' => 'from-purple-500 to-indigo-500', 'id' => 'FSWD-2023-045', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Node.js Backend Development', 'issuer' => 'Udemy', 'date' => 'Dec 2022', 'category' => 'development', 'icon' => 'fab fa-node-js', 'color' => 'from-green-600 to-green-800', 'id' => 'NODE-2022-789', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Google Cloud Associate', 'issuer' => 'Google Cloud', 'date' => 'Oct 2022', 'category' => 'cloud', 'icon' => 'fab fa-google', 'color' => 'from-blue-500 to-cyan-500', 'id' => 'GCP-ASSOC-2022-456', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Docker Certified Associate', 'issuer' => 'Docker Inc.', 'date' => 'Sep 2022', 'category' => 'cloud', 'icon' => 'fab fa-docker', 'color' => 'from-blue-400 to-blue-600', 'id' => 'DCA-2022-123', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'UI/UX Design Specialization', 'issuer' => 'Interaction Design Foundation', 'date' => 'Jul 2022', 'category' => 'design', 'icon' => 'fas fa-paint-brush', 'color' => 'from-pink-500 to-purple-500', 'id' => 'UIUX-2022-456', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'IELTS Academic', 'issuer' => 'British Council', 'date' => 'Jun 2022', 'category' => 'language', 'icon' => 'fas fa-language', 'color' => 'from-red-500 to-orange-500', 'id' => 'IELTS-2022-8.0', 'verified' => true, 'score' => '8.0/9.0', 'credential_url' => '#'],
                        ['title' => 'TypeScript Fundamentals', 'issuer' => 'Microsoft Learn', 'date' => 'Apr 2022', 'category' => 'development', 'icon' => 'fas fa-code', 'color' => 'from-blue-600 to-blue-800', 'id' => 'TS-FUND-2022-789', 'verified' => true, 'credential_url' => '#'],
                        ['title' => 'Git Advanced Techniques', 'issuer' => 'GitHub', 'date' => 'Feb 2022', 'category' => 'development', 'icon' => 'fab fa-git-alt', 'color' => 'from-orange-600 to-red-600', 'id' => 'GIT-ADV-2022-123', 'verified' => true, 'credential_url' => '#'],
                    ] as $certificate)
                    <div class="certificate-card group" data-category="{{ $certificate['category'] }}">
                        <div class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                            <!-- Certificate Header with Gradient -->
                            <div class="relative p-6 bg-gradient-to-br {{ $certificate['color'] }} text-white">
                                <div class="absolute top-4 right-4">
                                    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                                        <i class="{{ $certificate['icon'] }} text-xl"></i>
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
                                            <div class="font-semibold text-base-content">{{ $certificate['date'] }}</div>
                                        </div>
                                        <div>
                                            <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                            <div class="font-semibold text-base-content font-mono text-sm">{{ $certificate['id'] }}</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Score if exists -->
                                    @if(isset($certificate['score']))
                                    <div>
                                        <div class="text-sm text-base-content/60 mb-1">Score / Level</div>
                                        <div class="font-semibold text-base-content">{{ $certificate['score'] }}</div>
                                    </div>
                                    @endif
                                    
                                    <!-- Verification Status -->
                                    <div class="pt-4 border-t border-base-300">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                @if($certificate['verified'])
                                                <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                                                <span class="text-sm text-green-600 dark:text-green-400">Verified</span>
                                                @else
                                                <div class="w-2 h-2 rounded-full bg-yellow-500"></div>
                                                <span class="text-sm text-yellow-600">Pending</span>
                                                @endif
                                            </div>
                                            <span class="text-xs px-3 py-1 rounded-full bg-base-200 text-base-content/70">
                                                {{ ucfirst($certificate['category']) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Certificate Actions -->
                            <div class="p-6 pt-0">
                                <div class="flex gap-3">
                                    <a href="{{ $certificate['credential_url'] }}" target="_blank" class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                        <i class="fas fa-external-link-alt"></i>
                                        <span>View Credential</span>
                                    </a>
                                    <button class="certificate-detail-btn inline-flex items-center justify-center w-12 h-12 bg-base-200 rounded-lg hover:bg-base-300 transition-all duration-300 group/expand"
                                            data-certificate='@json($certificate)'>
                                        <i class="fas fa-expand-alt text-base-content/70 group-hover/expand:text-primary"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button id="load-more-certificates" class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-sync-alt group-hover:rotate-180 transition-transform duration-300"></i>
                        <span>Load More Certificates</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Specializations Section -->
    <section id="specializations" class="py-20 bg-base-200/30 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Specializations
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                        <span class="text-base-content">Advanced Learning</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Paths</span>
                    </h2>
                    <p class="text-lg text-base-content/70 max-w-3xl mx-auto">
                        These specializations represent comprehensive learning journeys that combine multiple certifications and practical experience.
                    </p>
                </div>

                <!-- Specializations Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach([
                        ['title' => 'Full Stack Development', 'description' => 'Complete web development expertise from frontend to backend and DevOps.', 'certificates' => 6, 'duration' => '8 months', 'icon' => 'fas fa-layer-group', 'color' => 'from-primary-500 to-secondary-500'],
                        ['title' => 'Cloud Architecture', 'description' => 'Designing and implementing scalable cloud infrastructure solutions.', 'certificates' => 4, 'duration' => '6 months', 'icon' => 'fas fa-cloud', 'color' => 'from-blue-500 to-cyan-500'],
                        ['title' => 'Frontend Mastery', 'description' => 'Advanced user interface development and modern JavaScript frameworks.', 'certificates' => 5, 'duration' => '7 months', 'icon' => 'fas fa-palette', 'color' => 'from-purple-500 to-pink-500'],
                    ] as $specialization)
                    <div class="group">
                        <div class="bg-base-100 rounded-2xl p-8 border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl bg-gradient-to-br {{ $specialization['color'] }} text-white text-2xl mb-6">
                                <i class="{{ $specialization['icon'] }}"></i>
                            </div>
                            <h3 class="text-xl font-bold text-base-content mb-4">{{ $specialization['title'] }}</h3>
                            <p class="text-base-content/70 mb-6">{{ $specialization['description'] }}</p>
                            
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center p-3 rounded-lg bg-base-200/50">
                                    <div class="text-2xl font-bold text-primary">{{ $specialization['certificates'] }}</div>
                                    <div class="text-sm text-base-content/70">Certificates</div>
                                </div>
                                <div class="text-center p-3 rounded-lg bg-base-200/50">
                                    <div class="text-2xl font-bold text-secondary">{{ $specialization['duration'] }}</div>
                                    <div class="text-sm text-base-content/70">Duration</div>
                                </div>
                            </div>
                            
                            <button class="w-full py-3 rounded-lg bg-base-200 text-base-content font-medium hover:bg-base-300 transition-colors duration-300">
                                View Learning Path
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Verification Section -->
    <section id="verification" class="py-20 bg-base-100 relative">
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Verification Card -->
                <div class="bg-gradient-to-br from-primary-500/10 via-transparent to-secondary-500/10 rounded-2xl p-8 border border-primary/20">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 text-white text-3xl mb-6">
                            <i class="fas fa-shield-check"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-base-content mb-4">Verify Certificates</h3>
                        <p class="text-base-content/70 mb-8 max-w-2xl mx-auto">
                            All my certifications can be verified through their respective issuing platforms. Enter a credential ID below to verify authenticity.
                        </p>
                        
                        <div class="max-w-md mx-auto">
                            <div class="flex gap-4">
                                <input type="text" 
                                       placeholder="Enter Credential ID (e.g., AWS-DEV-2023-789)" 
                                       class="flex-1 px-4 py-3 rounded-lg bg-base-100 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300">
                                <button class="px-6 py-3 bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-semibold rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                                    Verify
                                </button>
                            </div>
                            <p class="text-sm text-base-content/60 mt-4">
                                Need help verifying? <a href="{{ route('contact') }}" class="text-primary hover:underline">Contact me</a> for assistance.
                            </p>
                        </div>
                    </div>
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
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">Professional Growth?</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    Certifications are just one part of the journey. Let's discuss how these skills can benefit your next project.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <i class="fas fa-envelope relative z-10"></i>
                        <span class="relative z-10">Start a Conversation</span>
                        <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('home') }}#portfolio" class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
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
                    <button onclick="hideCertificateModal()" class="w-10 h-10 rounded-lg bg-base-200 hover:bg-base-300 flex items-center justify-center transition-colors duration-300">
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