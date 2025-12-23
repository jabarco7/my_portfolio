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
            style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 0h60v60H0z" fill="none"/%3E%3Cpath d="M0 0h2v60H0zM20 0h2v60H20zM40 0h2v60H40zM58 0h2v60H58zM0 0v2h60V0zM0 20v2h60V20zM0 40v2h60V40zM0 58v2h60V58z" fill="%23000000" fill-opacity="0.2"/%3E%3C/svg%3E');">
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

                <!-- Visual Column - Certificate Showcase -->
                <div class="relative hidden lg:block">
                    <div class="relative max-w-lg mx-auto">
                        <!-- Certificate Display Concept -->
                        <div
                            class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                            <!-- Main Certificate Card -->
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300">
                                <!-- Certificate Mockup -->
                                <div class="relative bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 p-8">
                                    <!-- Certificate Header -->
                                    <div class="text-center mb-6">
                                        <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                                            <i class="fas fa-award text-white text-3xl"></i>
                                        </div>
                                        <h3 class="text-xl font-bold text-base-content mb-2">Certificate of Achievement</h3>
                                        <p class="text-base-content/70">This is to certify that</p>
                                    </div>

                                    <!-- Certificate Body -->
                                    <div class="text-center mb-6">
                                        <h4 class="text-2xl font-bold text-primary mb-2">John Doe</h4>
                                        <p class="text-base-content/70 mb-4">has successfully completed the</p>
                                        <h5 class="text-xl font-bold text-base-content mb-2">Professional Web Development</h5>
                                        <p class="text-base-content/70">course with distinction</p>
                                    </div>

                                    <!-- Certificate Footer -->
                                    <div class="flex justify-between items-end">
                                        <div class="text-center">
                                            <div class="w-24 h-0.5 bg-base-content/30 mb-2"></div>
                                            <p class="text-sm text-base-content/70">Date</p>
                                        </div>
                                        <div class="w-24 h-24 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center">
                                            <i class="fas fa-certificate text-white text-3xl"></i>
                                        </div>
                                        <div class="text-center">
                                            <div class="w-24 h-0.5 bg-base-content/30 mb-2"></div>
                                            <p class="text-sm text-base-content/70">Signature</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Certificates -->
                            <div class="absolute -top-6 -right-6 w-32 h-40 rounded-xl bg-gradient-to-br from-primary-500/20 to-secondary-500/20 backdrop-blur-sm transform rotate-12 shadow-lg hidden xl:block">
                                <div class="w-full h-full rounded-xl bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 p-4 flex items-center justify-center">
                                    <i class="fas fa-certificate text-amber-500 text-4xl"></i>
                                </div>
                            </div>

                            <div class="absolute -bottom-4 -left-6 w-28 h-36 rounded-xl bg-gradient-to-br from-secondary-500/20 to-primary-500/20 backdrop-blur-sm transform -rotate-12 shadow-lg hidden xl:block">
                                <div class="w-full h-full rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-4 flex items-center justify-center">
                                    <i class="fas fa-medal text-blue-500 text-4xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>