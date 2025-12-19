@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="py-4 bg-base-200/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-base-content/60 hover:text-primary transition-colors">الرئيسية</a>
                <i class="fas fa-chevron-left text-base-content/40 text-xs"></i>
                <a href="{{ route('certificates') }}" class="text-base-content/60 hover:text-primary transition-colors">الشهادات</a>
                <i class="fas fa-chevron-left text-base-content/40 text-xs"></i>
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
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            {{ $certificate->category->name ?? 'شهادة مهنية' }}
                        </div>

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
                                <div class="text-sm text-base-content/60">مقدم من</div>
                                <div class="text-lg font-semibold text-base-content">{{ $certificate->issuer ?? 'جهة معتمدة' }}</div>
                            </div>
                        </div>

                        <!-- Meta Info -->
                        <div class="grid grid-cols-2 gap-6 mb-8">
                            <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-4">
                                <div class="text-sm text-base-content/60 mb-1">تاريخ الإصدار</div>
                                <div class="font-semibold text-base-content">{{ $certificate->issued_at->format('F Y') }}</div>
                            </div>
                            <div class="bg-base-200/50 backdrop-blur-sm border border-base-300 rounded-xl p-4">
                                <div class="text-sm text-base-content/60 mb-1">رقم الشهادة</div>
                                <div class="font-semibold text-base-content font-mono text-sm">#{{ $certificate->id }}</div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-wrap gap-4">
                            @if(!empty($certificate->certificate_url) && filter_var($certificate->certificate_url, FILTER_VALIDATE_URL))
                                <a href="{{ $certificate->certificate_url }}" target="_blank"
                                    class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <i class="fas fa-external-link-alt relative z-10"></i>
                                    <span class="relative z-10">عرض الشهادة</span>
                                </a>
                            @endif
                            <a href="{{ route('certificates') }}"
                                class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-arrow-left"></i>
                                <span>العودة للشهادات</span>
                            </a>
                        </div>
                    </div>

                    <!-- Certificate Visual -->
                    <div class="relative hidden lg:block">
                        <div class="relative max-w-lg mx-auto">
                            @if($certificate->image)
                                <!-- Real Certificate Image -->
                                <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-base-300">
                                    <img src="{{ $certificate->image_url }}"
                                         alt="{{ $certificate->title }}"
                                         class="w-full h-auto object-contain bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-gray-800 dark:to-gray-900"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">

                                    <!-- Fallback when image fails to load -->
                                    <div class="hidden p-8 text-center">
                                        <i class="fas fa-image text-6xl text-base-content/30 mb-4"></i>
                                        <p class="text-base-content/60">فشل في تحميل الصورة</p>
                                    </div>

                                    <!-- Overlay with certificate info -->
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-6">
                                        <div class="text-white">
                                            <div class="text-sm font-medium opacity-90 mb-1">{{ $certificate->issuer ?? 'Certificate Issuer' }}</div>
                                            <h3 class="text-xl font-bold">{{ $certificate->title }}</h3>
                                        </div>
                                    </div>

                                    <!-- Verification Badge -->
                                    <div class="absolute top-4 right-4">
                                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-500/90 text-white text-sm font-medium backdrop-blur-sm">
                                            <i class="fas fa-shield-check"></i>
                                            <span>معتمدة</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Fallback Certificate Card Design -->
                                <div class="relative bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-gray-800 dark:to-gray-900 rounded-3xl p-8 shadow-2xl border border-base-300">
                                    <!-- Certificate Border -->
                                    <div class="absolute inset-4 border-2 border-primary/20 rounded-lg"></div>

                                    <!-- Certificate Header -->
                                    <div class="relative text-center">
                                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-secondary-500 text-white text-3xl mb-6">
                                            <i class="fas fa-certificate"></i>
                                        </div>
                                        <div class="text-sm font-semibold text-primary mb-2">شهادة إنجاز</div>
                                        <h3 class="text-2xl font-bold text-base-content mb-4">{{ $certificate->title }}</h3>
                                        <div class="text-base-content/70">مقدمة من: {{ $certificate->issuer ?? 'جهة معتمدة' }}</div>
                                    </div>

                                    <!-- Certificate Details -->
                                    <div class="mt-8 space-y-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="text-center">
                                                <div class="text-sm text-base-content/60 mb-1">تاريخ الإصدار</div>
                                                <div class="font-semibold text-base-content">{{ $certificate->issued_at->format('M Y') }}</div>
                                            </div>
                                            <div class="text-center">
                                                <div class="text-sm text-base-content/60 mb-1">رقم الشهادة</div>
                                                <div class="font-semibold text-base-content font-mono text-sm">#{{ $certificate->id }}</div>
                                            </div>
                                        </div>

                                        <!-- Verification Badge -->
                                        <div class="text-center">
                                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm">
                                                <i class="fas fa-shield-check"></i>
                                                <span>شهادة معتمدة</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Decorative Corners -->
                                    <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/30"></div>
                                    <div class="absolute top-4 right-4 w-8 h-8 border-t-2 border-r-2 border-primary/30"></div>
                                    <div class="absolute bottom-4 left-4 w-8 h-8 border-b-2 border-l-2 border-primary/30"></div>
                                    <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/30"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Description -->
    <section class="py-20 bg-base-200/30">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-base-100 rounded-2xl shadow-lg border border-base-300 p-8">
                    <h2 class="text-2xl font-bold text-base-content mb-6">تفاصيل الشهادة</h2>

                    <div class="grid lg:grid-cols-2 gap-8 mb-8">
                        <!-- Certificate Description -->
                        <div>
                            @if($certificate->description)
                                <div class="prose prose-lg max-w-none text-base-content/70">
                                    {!! nl2br(e($certificate->description)) !!}
                                </div>
                            @else
                                <div class="prose prose-lg max-w-none text-base-content/70">
                                    <p>هذه الشهادة تؤكد على الخبرة والكفاءة في {{ $certificate->title }}. تم الحصول عليها من {{ $certificate->issuer ?? 'جهة معتمدة' }} وتعتبر دليلاً على المعرفة والمهارات العملية في هذا المجال.</p>

                                    <p>الشهادة تُظهر القدرة على تطبيق أفضل الممارسات والمعايير المهنية، مما يعزز من القدرات التقنية والمهنية.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Certificate Image -->
                        @if($certificate->image)
                            <div class="flex justify-center">
                                <div class="relative max-w-md rounded-2xl overflow-hidden shadow-xl">
                                    <img src="{{ $certificate->image_url }}" 
                                         alt="{{ $certificate->title }}" 
                                         class="w-full h-auto">
                                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                                        <div class="text-white">
                                            <div class="text-sm font-medium opacity-90 mb-1">{{ $certificate->issuer ?? 'Certificate Issuer' }}</div>
                                            <h3 class="text-lg font-bold">{{ $certificate->title }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Skills Gained -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-base-content mb-4">المهارات المكتسبة</h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $skills = [
                                    'Technical Skills',
                                    'Problem Solving',
                                    'Best Practices',
                                    'Professional Development'
                                ];
                            @endphp
                            @foreach($skills as $skill)
                                <span class="px-3 py-1.5 rounded-lg bg-primary/10 text-primary text-sm font-medium">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Certificates -->
    @if($relatedCertificates->count() > 0)
        <section class="py-20 bg-base-100/50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-base-content mb-4">شهادات ذات صلة</h2>
                        <p class="text-base-content/70">استكشف شهادات أخرى في نفس المجال</p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($relatedCertificates as $relatedCertificate)
                            <div class="group bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                                <!-- Certificate Image -->
                                @if($relatedCertificate->image)
                                    <div class="relative h-48 overflow-hidden">
                                        <img src="{{ $relatedCertificate->image_url }}" 
                                             alt="{{ $relatedCertificate->title }}" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                                        <!-- Certificate Title Overlay -->
                                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                            <div class="text-sm font-medium opacity-90 mb-1">{{ $relatedCertificate->issuer ?? 'Certificate Issuer' }}</div>
                                            <h3 class="text-lg font-bold">{{ $relatedCertificate->title }}</h3>
                                        </div>

                                        <!-- Verification Badge -->
                                        <div class="absolute top-4 right-4">
                                            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                                                <i class="fas fa-certificate text-white text-lg"></i>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Certificate Header -->
                                    <div class="relative p-6 bg-gradient-to-br {{ $relatedCertificate->category ? $relatedCertificate->category->color ?? 'from-blue-500 to-indigo-600' : 'from-blue-500 to-indigo-600' }} text-white">
                                        <div class="absolute top-4 right-4">
                                            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                                                <i class="fas fa-certificate text-2xl"></i>
                                            </div>
                                        </div>
                                        <div class="pr-12">
                                            <div class="text-sm font-medium opacity-90 mb-2">{{ $relatedCertificate->issuer ?? 'Certificate Issuer' }}</div>
                                            <h3 class="text-xl font-bold">{{ $relatedCertificate->title }}</h3>
                                        </div>
                                    </div>
                                @endif

                                <!-- Certificate Details -->
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">تاريخ الإصدار</div>
                                                <div class="font-semibold text-base-content">{{ $relatedCertificate->issued_at->format('M Y') }}</div>
                                            </div>
                                            <div>
                                                <div class="text-sm text-base-content/60 mb-1">رقم الشهادة</div>
                                                <div class="font-semibold text-base-content font-mono text-sm">#{{ $relatedCertificate->id }}</div>
                                            </div>
                                        </div>

                                        <div class="pt-4 border-t border-base-300">
                                            <a href="{{ route('certificate', $relatedCertificate->id) }}"
                                                class="group/view inline-flex items-center gap-2 text-primary font-medium hover:text-primary/80 transition-colors">
                                                <span>عرض التفاصيل</span>
                                                <i class="fas fa-arrow-right group-hover/view:translate-x-1 transition-transform"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-secondary-500/5"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    <span class="text-base-content">مهتم بالتعرف على</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500">مهاراتي الأخرى؟</span>
                </h2>
                <p class="text-xl text-base-content/70 mb-10 max-w-2xl mx-auto">
                    استكشف مجموعي من الشهادات والمهارات التي أقدمها
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('certificates') }}"
                        class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <i class="fas fa-certificate relative z-10"></i>
                        <span class="relative z-10">جميع الشهادات</span>
                    </a>
                    <a href="{{ route('skills') }}"
                        class="group inline-flex items-center justify-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-code"></i>
                        <span>المهارات</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function getSkillsForCertificate(certificateTitle) {
        const skillsMap = {
            'AWS Certified Developer': ['Cloud Computing', 'AWS Services', 'Serverless Architecture', 'DevOps'],
            'Laravel Certified Developer': ['PHP', 'Laravel Framework', 'MVC Architecture', 'API Development'],
            'React Professional': ['React.js', 'Hooks', 'State Management', 'Component Architecture'],
            'Vue.js Mastery': ['Vue.js', 'Vuex', 'Vue Router', 'Composition API'],
            'Full Stack Web Development': ['HTML/CSS', 'JavaScript', 'Backend Development', 'Database Design'],
            'Node.js Backend Development': ['Node.js', 'Express.js', 'REST APIs', 'Authentication'],
            'Google Cloud Associate': ['GCP Services', 'Cloud Infrastructure', 'Storage Solutions', 'Networking'],
            'Docker Certified Associate': ['Containerization', 'Docker', 'Orchestration', 'CI/CD'],
            'UI/UX Design Specialization': ['User Research', 'Wireframing', 'Prototyping', 'Design Systems'],
            'IELTS Academic': ['English Proficiency', 'Academic Writing', 'Listening Comprehension', 'Speaking'],
            'TypeScript Fundamentals': ['TypeScript', 'Type Safety', 'Modern JavaScript', 'Tooling'],
            'Git Advanced Techniques': ['Version Control', 'Git Workflows', 'Collaboration', 'DevOps']
        };

        return skillsMap[certificateTitle] || ['Technical Skills', 'Problem Solving', 'Best Practices'];
    }

    // Update skills based on certificate title
    document.addEventListener('DOMContentLoaded', function() {
        const certificateTitle = document.querySelector('h1 span.text-base-content').textContent;
        const skillsContainer = document.querySelector('.flex.flex-wrap.gap-2');

        if (certificateTitle && skillsContainer) {
            const skills = getSkillsForCertificate(certificateTitle);
            skillsContainer.innerHTML = '';

            skills.forEach(skill => {
                const skillElement = document.createElement('span');
                skillElement.className = 'px-3 py-1.5 rounded-lg bg-primary/10 text-primary text-sm font-medium';
                skillElement.textContent = skill;
                skillsContainer.appendChild(skillElement);
            });
        }
    });
</script>
@endpush
