<!-- Projects Grid Section -->
<section id="projects-grid" class="py-20 bg-base-100/50 relative">
    <div class="absolute inset-0 overflow-hidden opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-400/20 rounded-full mix-blend-multiply blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-7xl mx-auto">
            @if ($projects->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        @php
                            // Get actual category from database
                            $category = $project->category ? $project->category->name : 'Uncategorized';
                            $categorySlug = $project->category ? $project->category->slug : 'uncategorized';
                            // Get tags for filtering
                            $tagNames = $project->tags
                                ->pluck('name')
                                ->map(function ($name) {
                                    return strtolower($name);
                                })
                                ->toArray();
                        @endphp

                        <div class="project-card group" data-category="{{ $categorySlug }}"
                            data-tags="{{ implode(',', $tagNames) }}" data-project-id="{{ $project->id }}">
                            <div
                                class="bg-base-100 rounded-2xl border border-base-300 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden h-full flex flex-col">
                                <!-- Project Image -->
                                <div class="relative h-64 overflow-hidden">
                                    @if ($project->featured_image)
                                        <img src="{{ asset('storage/' . $project->featured_image) }}"
                                            alt="{{ $project->title }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-primary-500/20 to-secondary-500/20 flex items-center justify-center">
                                            <i class="fas fa-code text-5xl text-primary/50"></i>
                                        </div>
                                    @endif

                                    <!-- Project Overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div
                                            class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                            <div class="flex gap-2">
                                                @if ($project->project_url)
                                                    <a href="{{ $project->project_url }}" target="_blank"
                                                        class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-all duration-300">
                                                        <i class="fas fa-external-link-alt text-xs"></i>
                                                        <span class="text-sm">Live Demo</span>
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Project Category Badge -->
                                    <div class="absolute top-4 right-4">
                                        <span
                                            class="px-3 py-1 rounded-full bg-primary/90 backdrop-blur-sm text-white text-xs font-medium">
                                            {{ ucfirst($category) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Project Content -->
                                <div class="p-6 flex-grow">
                                    <div class="flex items-start justify-between mb-4">
                                        <h3 class="text-xl font-bold text-base-content">{{ $project->title }}</h3>
                                        @if ($project->is_featured)
                                            <span
                                                class="px-2 py-1 rounded bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 text-xs font-medium">
                                                Featured
                                            </span>
                                        @endif
                                    </div>

                                    <p class="text-base-content/70 mb-6 leading-relaxed">
                                        {{ $project->excerpt ?? Str::limit($project->description, 120) }}
                                    </p>

                                    <!-- Tech Stack -->
                                    <div class="mb-6">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($project->tags as $tag)
                                                <span
                                                    class="px-3 py-1.5 rounded-lg bg-base-200 text-base-content text-sm">
                                                    {{ $tag->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Project Meta -->
                                    <div
                                        class="flex items-center justify-center text-sm text-base-content/60 border-t border-base-300 pt-4">
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>{{ $project->created_at->format('M Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Actions -->
                                <div class="p-6 pt-0">
                                    <div class="flex gap-3">
                                        <a href="{{ route('projects.show', $project->slug ?? $project->id) }}"
                                            class="group/view flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary/10 text-primary font-medium rounded-lg hover:bg-primary/20 transition-all duration-300">
                                            <i class="fas fa-expand-alt"></i>
                                            <span>View Details</span>
                                        </a>
                                        <a href="{{ route('projects.show', $project->slug ?? $project->id) }}"
                                            class="inline-flex items-center justify-center w-12 h-12 bg-base-200 rounded-lg hover:bg-base-300 transition-all duration-300 group/expand">
                                            <i
                                                class="fas fa-eye text-base-content/70 group-hover/expand:text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination or Load More -->
                @if (request()->get('page', 1) == 1 && $totalActiveProjects > 6)
                    <div class="text-center mt-12">
                        <a href="{{ route('projects', ['page' => 2]) }}"
                            class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-sync-alt group-hover:rotate-180 transition-transform duration-300"></i>
                            <span>Load More Projects</span>
                        </a>
                    </div>
                @elseif (request()->get('page', 1) > 1)
                    <div class="text-center mt-12">
                        <a href="{{ route('projects') }}"
                            class="group inline-flex items-center gap-3 px-8 py-4 bg-base-200 backdrop-blur-sm border border-base-300 text-base-content font-semibold rounded-xl hover:bg-base-300 shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-arrow-left"></i>
                            <span>Show Less</span>
                        </a>
                    </div>
                @endif
            @else
                <!-- No Projects Message -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-base-200 mb-6">
                        <i class="fas fa-folder-open text-3xl text-base-content/50"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-base-content mb-4">No Projects Available</h3>
                    <p class="text-base-content/70 max-w-md mx-auto mb-8">
                        Currently working on new projects. Check back soon or contact me to discuss your project ideas.
                    </p>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-primary-500 to-secondary-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-envelope"></i>
                        <span>Start a Project</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>