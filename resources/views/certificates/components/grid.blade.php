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
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12.19 8.65c-.02-.48-.21-.86-.56-1.13-.35-.28-.84-.41-1.45-.41-.47 0-.85.1-1.13.29-.28.19-.42.44-.42.76 0 .27.1.48.31.63.21.15.68.33 1.41.54.73.21 1.3.41 1.71.6.41.19.72.43.93.72.21.29.31.66.31 1.11 0 .71-.27 1.28-.81 1.72-.54.44-1.26.66-2.16.66-.95 0-1.72-.23-2.31-.69-.59-.46-.88-1.15-.88-2.06h1.51c.02.43.18.77.48 1.02.3.25.71.37 1.23.37.5 0 .89-.1 1.17-.3.28-.2.42-.46.42-.79 0-.32-.12-.56-.36-.72-.24-.16-.73-.35-1.46-.56-.73-.21-1.28-.42-1.65-.61-.37-.19-.65-.43-.85-.72-.2-.29-.3-.65-.3-1.08 0-.67.26-1.21.78-1.63.52-.42 1.21-.63 2.07-.63.89 0 1.61.22 2.16.66.55.44.83 1.07.85 1.89h-1.52z" />
                                                </svg>
                                            @elseif($certificate->icon == 'fab fa-laravel')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M23.6 7c-.1-.5-.4-.9-.8-1.2l-10-6c-.5-.3-1.1-.3-1.6 0l-10 6c-.4.3-.7.7-.8 1.2L0 12l.4 5c.1.5.4.9.8 1.2l10 6c.3.2.6.3.9.3.3 0 .6-.1.9-.3l10-6c.4-.3.7-.7.8-1.2l.4-5-.6-5zm-11.6 9.8L3.1 12l8.9-4.8L20.9 12l-8.9 4.8z" />
                                                </svg>
                                            @elseif($certificate->icon == 'fab fa-react')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.96-4.888 2.622-1.78-1.653-3.542-2.602-4.887-2.602-.41 0-.783.093-1.106.278-1.375.793-1.683 3.264-.973 6.365C1.98 8.917 0 10.42 0 12.004c0 1.59 1.99 3.097 5.043 4.03-.704 3.113-.39 5.588.988 6.38.32.187.69.275 1.102.275 1.345 0 3.107-.96 4.888-2.624 1.78 1.654 3.542 2.603 4.887 2.603.41 0 .783-.09 1.106-.275 1.374-.792 1.683-3.263.973-6.365C22.02 15.096 24 13.59 24 12.004c0-1.59-1.99-3.097-5.043-4.032.704-3.11.39-5.587-.988-6.38-.318-.184-.688-.277-1.092-.278zm-.005 1.09v.006c.225 0 .406.044.558.127.666.382.955 1.835.73 3.704-.054.46-.142.945-.25 1.44-.96-.236-2.006-.417-3.107-.534-.66-.905-1.345-1.727-2.035-2.447 1.592-1.48 3.087-2.292 4.105-2.295zm-9.77.02c1.012 0 2.514.808 4.11 2.28-.686.72-1.37 1.537-2.02 2.442-1.107.117-2.154.298-3.113.538-.112-.49-.195-.964-.254-1.42-.23-1.868.054-3.32.714-3.707.19-.09.4-.127.563-.132zm4.882 3.05c.455.468.91.992 1.36 1.564-.44-.02-.89-.034-1.345-.034-.46 0-.915.01-1.36.034.44-.572.895-1.096 1.345-1.565zM12 8.1c.74 0 1.477.034 2.202.093.406.582.802 1.203 1.183 1.86.372.64.71 1.29 1.018 1.946-.308.655-.646 1.31-1.013 1.95-.38.66-.773 1.288-1.18 1.87-.728.063-1.466.098-2.21.098-.74 0-1.477-.035-2.202-.093-.406-.582-.802-1.204-1.183-1.86-.372-.64-.71-1.29-1.018-1.946.303-.657.646-1.313 1.013-1.954.38-.66.773-1.286 1.18-1.868.728-.064 1.466-.098 2.21-.098zm-3.635.254c-.24.377-.48.763-.704 1.16-.225.39-.435.782-.635 1.174-.265-.656-.49-1.31-.676-1.947.64-.15 1.315-.283 2.015-.386zm7.26 0c.695.103 1.365.23 2.006.377-.18.632-.405 1.282-.66 1.933-.2-.39-.41-.783-.64-1.174-.225-.392-.465-.774-.705-1.156zm3.063.675c.484.15.944.317 1.375.498 1.732.74 2.852 1.708 2.852 2.476-.005.768-1.125 1.74-2.857 2.475-.42.18-.88.342-1.355.493-.28-.958-.646-1.956-1.1-2.98.45-1.017.81-2.01 1.085-2.964zm-13.395.004c.278.96.645 1.957 1.1 2.98-.45 1.017-.812 2.01-1.086 2.964-.484-.15-.944-.318-1.37-.5-1.732-.737-2.852-1.706-2.852-2.474 0-.768 1.12-1.742 2.852-2.476.42-.18.88-.342 1.356-.494zm11.678 4.28c.265.657.49 1.312.676 1.948-.64.157-1.316.29-2.016.39.24-.38.48-.764.705-1.16.224-.392.434-.784.635-1.178zm-9.945.02c.2.392.41.783.64 1.175.23.39.465.772.705 1.154-.695-.102-1.365-.23-2.006-.376.18-.63.406-1.282.66-1.954zm4.427.19c.455.01.915.034 1.345.034.44 0 .895-.02 1.345-.034-.44.572-.895 1.095-1.345 1.565-.455-.47-.91-.993-1.36-1.565zm-1.17.073c-.66.904-1.345 1.726-2.035 2.446 1.592 1.48 3.087 2.293 4.105 2.293.005 0 .01 0 .015-.002v1.09c-.01 0-.02.003-.03.003-1.345 0-3.107-.96-4.888-2.622.686-.72 1.37-1.537 2.02-2.442 1.107-.117 2.154-.298 3.113-.538.112.49.195.964.254 1.42.23 1.868-.054 3.32-.714 3.707-.19.09-.4.128-.563.133-.005 0-.01-.003-.015-.003v-1.09c1.012 0 2.514-.81 4.11-2.29.686.72 1.37 1.538 2.02 2.443 1.107.116 2.154.297 3.113.537.112-.49.195-.965.254-1.42.23-1.868-.054-3.32-.714-3.708-.19-.09-.4-.127-.563-.132-1.346 0-3.107.96-4.888 2.623-1.78-1.654-3.542-2.603-4.887-2.603-.41 0-.783.09-1.106.275-1.374.792-1.683 3.263-.973 6.365-1.05.317-2.006.695-2.828 1.115-1.376.793-1.684 3.264-.974 6.365.1.5.4.9.8 1.2l10 6c.5.3 1.1.3 1.6 0l10-6c.4-.3.7-.7.8-1.2l.4-5-.6-5z"/>
                                                </svg>
                                            @else
                                                <i class="{{ $certificate->icon }}"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-certificate"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex justify-between items-start">
                                    <h3 class="text-xl font-bold text-white">{{ $certificate->title }}</h3>
                                    @if ($certificate->is_featured)
                                        <span class="px-2 py-1 rounded-full bg-white/20 text-white text-xs font-medium">
                                            Featured
                                        </span>
                                    @endif
                                </div>
                                <div class="mt-2 text-white/80 text-sm">
                                    {{ $certificate->issuer ?? 'Certificate Authority' }}
                                </div>
                            </div>

                            <!-- Certificate Content -->
                            <div class="p-6 flex-grow flex flex-col">
                                <!-- Certificate Details -->
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center gap-2 text-sm text-base-content/70">
                                        <i class="fas fa-calendar-alt w-4"></i>
                                        <span>{{ $certificate->issue_date->format('M Y') ?? 'Unknown' }}</span>
                                        @if ($certificate->expiry_date)
                                            <span>•</span>
                                            <span>Expires: {{ $certificate->expiry_date->format('M Y') }}</span>
                                        @endif
                                    </div>

                                    @if ($certificate->credential_id)
                                        <div class="flex items-center gap-2 text-sm text-base-content/70">
                                            <i class="fas fa-fingerprint w-4"></i>
                                            <span>ID: {{ $certificate->credential_id }}</span>
                                        </div>
                                    @endif

                                    @if ($certificate->category)
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-medium">
                                                {{ $certificate->category->name }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Certificate Description -->
                                <div class="mb-6 flex-grow">
                                    <p class="text-base-content/70 text-sm">
                                        {{ $certificate->description ?? 'Certificate of completion demonstrating proficiency in the subject area.' }}
                                    </p>
                                </div>

                                <!-- Verification Badge -->
                                @if ($certificate->verification_url)
                                    <div class="mb-4">
                                        <a href="{{ $certificate->verification_url }}" target="_blank"
                                            class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm hover:bg-green-200 dark:hover:bg-green-900/50 transition-colors duration-300">
                                            <i class="fas fa-shield-check"></i>
                                            <span>Verify Certificate</span>
                                        </a>
                                    </div>
                                @endif

                                <!-- Certificate Actions -->
                                <div class="flex gap-3">
                                    <a href="{{ route('certificates.show', $certificate->id) }}"
                                        class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                        <i class="fas fa-expand-alt"></i>
                                        <span>View Details</span>
                                    </a>
                                    @if ($certificate->certificate_url)
                                        <a href="{{ $certificate->certificate_url }}" target="_blank"
                                            class="inline-flex items-center justify-center w-12 h-12 bg-base-200 rounded-lg hover:bg-base-300 transition-all duration-300 group/expand">
                                            <i class="fas fa-external-link-alt text-base-content/70 group-hover/expand:text-primary"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Certificates Message -->
            @if ($certificates->count() === 0)
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-base-200 mb-6">
                        <i class="fas fa-certificate text-3xl text-base-content/50"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-base-content mb-4">No Certificates Available</h3>
                    <p class="text-base-content/70 max-w-md mx-auto mb-8">
                        I'm currently working on new certifications. Check back soon to see my latest achievements.
                    </p>
                    <a href="{{ route('skills') }}"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-code"></i>
                        <span>View My Skills</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>