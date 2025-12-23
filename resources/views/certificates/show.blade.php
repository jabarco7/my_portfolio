@extends('layouts.app')

@section('title', $certificate->title)

@section('content')
    <!-- Breadcrumb -->
    <section class="py-4 bg-base-200/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-base-content/60 hover:text-primary transition-colors">Home</a>
                <i class="fas fa-chevron-right text-base-content/40 text-xs"></i>
                <a href="{{ route('certificates') }}" class="text-base-content/60 hover:text-primary transition-colors">Certificates</a>
                <i class="fas fa-chevron-right text-base-content/40 text-xs"></i>
                <span class="text-base-content">{{ $certificate->title }}</span>
            </nav>
        </div>
    </section>

    <!-- Certificate Detail Hero -->
    <section class="py-20 bg-base-100/50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-6xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Certificate Info -->
                    <div class="animate-slide-up">
                        <!-- Title -->
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight mb-6">
                            <span class="text-base-content">{{ $certificate->title }}</span>
                        </h1>

                        <!-- Issuer -->
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 flex items-center justify-center">
                                <i class="fas fa-award text-white text-xl"></i>
                            </div>
                            <div>
                                <div class="text-sm text-base-content/60">Issued by</div>
                                <div class="text-lg font-semibold text-base-content">{{ $certificate->issuer ?? 'Certified Authority' }}</div>
                            </div>
                        </div>

                        <!-- Meta Info -->
                        <div class="grid grid-cols-2 gap-6 mb-8">
                            <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-4">
                                <div class="text-sm text-base-content/60 mb-1">Date Issued</div>
                                <div class="font-semibold text-base-content">{{ $certificate->issued_at->format('F Y') }}</div>
                            </div>
                            <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-4">
                                <div class="text-sm text-base-content/60 mb-1">Credential ID</div>
                                <div class="font-semibold text-base-content font-mono text-sm">#{{ $certificate->id }}</div>
                            </div>
                        </div>

                        <!-- Score if exists -->
                        @if(isset($certificate->score))
                            <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-4 mb-8">
                                <div class="text-sm text-base-content/60 mb-1">Score / Level</div>
                                <div class="font-semibold text-base-content">{{ $certificate->score }}</div>
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="flex flex-wrap gap-4">
                            @if(!empty($certificate->certificate_url) && filter_var($certificate->certificate_url, FILTER_VALIDATE_URL))
                                <a href="{{ $certificate->certificate_url }}" target="_blank"
                                    class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <i class="fas fa-external-link-alt relative z-10"></i>
                                    <span class="relative z-10">View Certificate</span>
                                </a>
                            @endif
                            <a href="{{ route('certificates') }}"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-arrow-left"></i>
                                <span>Back to Certificates</span>
                            </a>
                        </div>
                    </div>

                    <!-- Certificate Visual -->
                    <div class="relative hidden lg:block">
                        <div class="relative max-w-lg mx-auto">
                            @if($certificate->image)
                                <!-- Real Certificate Image -->
                                <div class="relative group">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-primary-500 to-secondary-500 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
                                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-base-300">
                                        <!-- Image Actions -->
                                        <div class="absolute top-4 left-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                            <button onclick="window.open('{{ asset('storage/' . $certificate->image) }}', '_blank')"
                                                    class="p-2 bg-white/90 dark:bg-gray-800/90 rounded-full shadow-lg hover:bg-white dark:hover:bg-gray-800 transition-colors">
                                                <i class="fas fa-expand text-gray-700 dark:text-gray-200"></i>
                                            </button>
                                        </div>
                                        <img src="{{ asset('storage/' . $certificate->image) }}" 
                                             alt="{{ $certificate->title }}" 
                                             class="w-full h-auto object-cover">
                                    </div>
                                </div>
                            @else
                                <!-- Certificate Mockup -->
                                <div class="relative group">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-primary-500 to-secondary-500 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
                                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-base-300 bg-gradient-to-br from-amber-50 to-amber-100 dark:from-amber-900/20 dark:to-amber-800/20 p-8">
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
                                            <h4 class="text-2xl font-bold text-primary mb-2">{{ $certificate->title }}</h4>
                                            <p class="text-base-content/70 mb-4">has successfully completed the</p>
                                            <h5 class="text-xl font-bold text-base-content mb-2">Professional Development</h5>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Details Section -->
    <section class="py-20 bg-base-100 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Description -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-base-content mb-6">About This Certificate</h2>
                    <div class="prose prose-primary max-w-none">
                        <p class="text-base-content/70 leading-relaxed">
                            {{ $certificate->description ?? 'This certificate represents mastery of skills and knowledge in the specified field. It demonstrates commitment to professional development and continuous learning.' }}
                        </p>
                    </div>
                </div>

                <!-- Key Information -->
                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-base-content mb-4">Certificate Information</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-base-content/60">Issued By</span>
                                <span class="font-semibold text-base-content">{{ $certificate->issuer ?? 'Certified Authority' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-base-content/60">Date Issued</span>
                                <span class="font-semibold text-base-content">{{ $certificate->issued_at->format('F Y') }}</span>
                            </div>
                            @if($certificate->expiry_date)
                                <div class="flex justify-between">
                                    <span class="text-base-content/60">Expires</span>
                                    <span class="font-semibold text-base-content">{{ $certificate->expiry_date->format('F Y') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between">
                                <span class="text-base-content/60">Credential ID</span>
                                <span class="font-semibold text-base-content font-mono">#{{ $certificate->id }}</span>
                            </div>
                            @if(isset($certificate->score))
                                <div class="flex justify-between">
                                    <span class="text-base-content/60">Score</span>
                                    <span class="font-semibold text-base-content">{{ $certificate->score }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-base-content mb-4">Skills Validated</h3>
                        <div class="space-y-3">
                            @if($certificate->skills && count($certificate->skills))
                                @foreach($certificate->skills as $skill)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-check-circle text-green-500"></i>
                                        <span class="text-base-content/70">{{ $skill->name }}</span>
                                    </div>
                                @endforeach
                            @else
                                @foreach(['Technical Knowledge', 'Practical Application', 'Industry Standards', 'Best Practices', 'Problem Solving', 'Professional Development'] as $skill)
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-check-circle text-green-500"></i>
                                        <span class="text-base-content/70">{{ $skill }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Verification Section -->
                <div class="bg-gradient-to-r from-primary-500/10 to-secondary-500/10 rounded-2xl p-8 border border-primary/20">
                    <div class="flex flex-col md:flex-row md:items-center gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                                <i class="fas fa-shield-check text-green-600 dark:text-green-400 text-2xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-xl font-bold text-base-content mb-2">Verified Certificate</h3>
                            <p class="text-base-content/70 mb-4">
                                This certificate has been verified and is authentic. You can verify its validity by using the credential ID above or scanning the QR code.
                            </p>
                            @if(!empty($certificate->certificate_url) && filter_var($certificate->certificate_url, FILTER_VALIDATE_URL))
                                <a href="{{ $certificate->certificate_url }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 text-primary font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span>Verify Online</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Certificates -->
    @if(isset($relatedCertificates) && count($relatedCertificates))
        <section class="py-20 bg-base-100/50 relative">
            <div class="absolute inset-0 overflow-hidden opacity-10">
                <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-2xl md:text-3xl font-bold text-base-content mb-4">Related Certificates</h2>
                        <p class="text-base-content/70 max-w-3xl mx-auto">
                            Explore other certifications in the same field or from the same issuer.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($relatedCertificates as $relatedCertificate)
                            <a href="{{ route('certificates.show', $relatedCertificate->id) }}" 
                               class="group block bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                                <div class="relative h-48 overflow-hidden">
                                    @if($relatedCertificate->image)
                                        <img src="{{ asset('storage/' . $relatedCertificate->image) }}" 
                                             alt="{{ $relatedCertificate->title }}" 
                                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-primary-500/20 to-secondary-500/20 flex items-center justify-center">
                                            <i class="fas fa-certificate text-5xl text-primary/50"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-bold text-base-content mb-2">{{ $relatedCertificate->title }}</h3>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-base-content/60">{{ $relatedCertificate->issuer ?? 'Certified Authority' }}</span>
                                        <span class="text-sm text-base-content/60">{{ $relatedCertificate->issued_at->format('M Y') }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="text-center mt-12">
                        <a href="{{ route('certificates') }}"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-arrow-left"></i>
                            <span>View All Certificates</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection