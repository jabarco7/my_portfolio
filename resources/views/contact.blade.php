@extends('layouts.app')

@section('content')
    <!-- Hero Section for Contact -->
    <section id="contact-hero" class="relative min-h-screen flex items-center overflow-hidden bg-base-100 pt-20">
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
                            <span class="block text-base-content">Get In</span>
                            <span
                                class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-purple-500 to-secondary-500 animate-gradient">
                                Touch
                            </span>
                        </h1>

                        <!-- Description -->
                        <div class="space-y-4 mb-8">
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                Have a project in mind? Need a developer for your team? Or just want to say hello? I'd love
                                to hear from you.
                            </p>
                            <p class="text-lg text-base-content/70 leading-relaxed">
                                Fill out the form or use one of the contact methods below. I typically respond within 24
                                hours.
                            </p>
                        </div>

                        <!-- Contact Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-primary mb-2">&lt;24h</div>
                                <div class="text-sm text-base-content/70">Response Time</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-secondary mb-2">100%</div>
                                <div class="text-sm text-base-content/70">Project Reviews</div>
                            </div>
                            <div class="text-center p-4 rounded-xl bg-base-200/50 backdrop-blur-sm border border-base-300">
                                <div class="text-3xl font-bold text-purple-500 mb-2">✓</div>
                                <div class="text-sm text-base-content/70">Available for Work</div>
                            </div>
                        </div>

                        <!-- Direct Contact Info -->
                        <div class="space-y-4 mb-8">
                            @foreach ([['icon' => 'fas fa-envelope', 'label' => 'Email', 'value' => config('portfolio.contact_info.email'), 'href' => 'mailto:' . config('portfolio.contact_info.email'), 'color' => 'text-primary', 'bg' => 'bg-primary/10'], ['icon' => 'fas fa-phone', 'label' => 'Phone', 'value' => config('portfolio.contact_info.phone'), 'href' => 'tel:' . config('portfolio.contact_info.phone'), 'color' => 'text-secondary', 'bg' => 'bg-secondary/10'], ['icon' => 'fas fa-map-marker-alt', 'label' => 'Location', 'value' => config('portfolio.contact_info.location'), 'href' => null, 'color' => '', 'bg' => 'bg-accent/10']] as $contact)
                                <{{ $contact['href'] ? 'a' : 'div' }}
                                    @if ($contact['href']) href="{{ $contact['href'] }}" @endif
                                    class="group flex items-center gap-4 p-4 rounded-xl bg-base-200/50 hover:bg-base-200 transition-all duration-300">
                                    <div
                                        class="w-12 h-12 rounded-lg {{ $contact['bg'] }} flex items-center justify-center {{ $contact['color'] }} text-xl">
                                        <i class="{{ $contact['icon'] }}"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/60">{{ $contact['label'] }}</div>
                                        <div
                                            class="font-semibold text-base-content group-hover:text-primary transition-colors duration-300">
                                            {{ $contact['value'] }}
                                        </div>
                                    </div>
                                    </{{ $contact['href'] ? 'a' : 'div' }}>
                            @endforeach
                        </div>

                        <!-- Social Links -->
                        <div>
                            <h3 class="text-lg font-bold text-base-content mb-4">Connect on Social</h3>
                                                   <div class="pt-8 border-t border-base-300">
                            <div class="text-center mb-8">
                                <h3 class="text-lg font-bold text-base-content mb-2 flex items-center justify-center gap-3">
                                    <span
                                        class="w-2 h-8 bg-gradient-to-b from-primary-500 to-secondary-500 rounded-full"></span>
                                    <span class="text-secondary-600 dark:text-secondary-400">{{ $settings['hero_social_title'] ?? 'Follow Me' }}</span>
                                </h3>
                                <p class="text-sm text-base-content/60">{{ $settings['hero_social_subtitle'] ?? 'Connect with me on social media to stay updated with my latest projects and work.' }}</p>
                            </div>

                            <div class="flex justify-center gap-8 flex-wrap">
                                @foreach ($socialLinks as $social)
                                    <a href="{{ $social->url }}"
                                        class="group flex flex-col items-center gap-2 transition-all duration-300 hover:scale-110"
                                        title="{{ $social->platform }}">
                                        <div
                                            class="w-12 h-12 rounded-full bg-base-200 border border-base-300 flex items-center justify-center group-hover:bg-base-300 transition-all duration-300">
                                            <i class="{{ $social->icon }} text-xl text-base-content"></i>
                                        </div>
                                        <span class="text-xs font-medium text-center">
                                            {{ $social->platform }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        </div>
                    </div>

                    <!-- Contact Form Column -->
                    <div class="relative">
                        <div class="relative max-w-lg mx-auto">
                            <!-- Form Container -->
                            <div
                                class="relative bg-gradient-to-br from-primary-400/20 via-transparent to-secondary-400/20 rounded-3xl p-8 backdrop-blur-sm">
                                <!-- Form Card -->
                                <div
                                    class="relative rounded-2xl overflow-hidden shadow-2xl border border-base-300 bg-base-100">
                                    <!-- Form Header -->
                                    <div class="p-8 border-b border-base-300">
                                        <h3 class="text-2xl font-bold text-base-content mb-2">Send a Message</h3>
                                        <p class="text-base-content/70">Fill out the form below and I'll get back to you
                                            soon.</p>
                                    </div>

                                    <!-- Contact Form -->
                                   <!-- Contact Form -->
<form id="contact-form" method="POST" action="{{ route('contact.store') }}" class="p-8 space-y-6">
    @csrf

    <!-- Form Status Messages -->
    <div id="form-success"
        class="hidden p-4 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle text-lg"></i>
            <span>Message sent successfully! I'll get back to you soon.</span>
        </div>
    </div>

    <div id="form-error"
        class="hidden p-4 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400">
        <div class="flex items-center gap-3">
            <i class="fas fa-exclamation-circle text-lg"></i>
            <span id="error-message">There was an error sending your message. Please try again.</span>
        </div>
    </div>
    <!-- Name Field -->
    <div>
        <label for="name" class="block text-sm font-medium text-base-content mb-2">
            <i class="fas fa-user mr-2 text-primary"></i>Full Name
        </label>
        <input type="text" id="name" name="name"
            class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 placeholder-base-content/40"
            placeholder="Enter your name">
        <div id="name-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-400"></div>
    </div>

    <!-- Email Field -->
    <div>
        <label for="email" class="block text-sm font-medium text-base-content mb-2">
            <i class="fas fa-envelope  text-primary"></i>Email Address
        </label>
        <input type="email" id="email" name="email"
            class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 placeholder-base-content/40"
            placeholder="Enter your email">
        <div id="email-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-400"></div>
    </div>

    <!-- Subject Field -->
    <div>
        <label for="subject" class="block text-sm font-medium text-base-content mb-2">
            <i class="fas fa-tag mr-2 text-primary"></i>Subject
        </label>
        <select id="subject" name="subject"
            class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300">
            <option value="">Select a subject</option>
            <option value="project">Project Inquiry</option>
            <option value="collaboration">Collaboration Opportunity</option>
            <option value="job">Job Opportunity</option>
            <option value="consultation">Consultation</option>
            <option value="other">Other</option>
        </select>
        <div id="subject-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-400"></div>
    </div>

    <!-- Message Field -->
    <div>
        <label for="message" class="block text-sm font-medium text-base-content mb-2">
            <i class="fas fa-comment-dots mr-2 text-primary"></i>Message
        </label>
        <textarea id="message" name="message" rows="5"
            class="w-full px-4 py-3 rounded-lg bg-base-200 border border-base-300 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition-all duration-300 placeholder-base-content/40 resize-none"
            placeholder="Tell me about your project or inquiry..."></textarea>
        <div id="message-error" class="hidden mt-2 text-sm text-red-600 dark:text-red-400"></div>
    </div>

    <!-- Submit Button -->
    <div class="pt-4">
        <button type="submit" id="submit-btn"
            class="group relative w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 hover:from-primary-600 hover:to-secondary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <i class="fas fa-paper-plane relative z-10"></i>
            <span class="relative z-10">Send Message</span>
            <i class="fas fa-arrow-right relative z-10 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300"></i>
        </button>
    </div>

    <!-- Privacy Note -->
    <p class="text-sm text-base-content/60 text-center">
        Your information is secure and will only be used to respond to your inquiry.
    </p>
</form>

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
            <a href="#contact-info" class="animate-bounce">
                <div class="w-10 h-16 rounded-full border-2 border-base-300 flex justify-center">
                    <div class="w-1 h-3 bg-base-content/40 rounded-full mt-2"></div>
                </div>
            </a>
        </div>
    </section>
@push('scripts')
<script src="{{ asset('js/contact-new.js') }}"></script>
@endpush

@endsection

@push('styles')
    @vite('resources/css/contact.css')
@endpush

@push('scripts')
@endpush

<style>
/* Form validation styles */
input:invalid, textarea:invalid, select:invalid {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

/* Dark mode validation styles */
.dark input:invalid, 
.dark textarea:invalid, 
.dark select:invalid {
    border-color: #f87171 !important;
    box-shadow: 0 0 0 3px rgba(248, 113, 113, 0.1) !important;
}

/* Enhanced validation styles */
.border-red-500 {
    border-color: #ef4444 !important;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
}

.dark .border-red-500 {
    border-color: #f87171 !important;
    box-shadow: 0 0 0 3px rgba(248, 113, 113, 0.1) !important;
}

/* Animation for form validation errors */
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}

.form-error-shake {
    animation: shake 0.5s;
}
</style>

<script src="{{ asset('js/contact.js') }}"></script>
</script>
