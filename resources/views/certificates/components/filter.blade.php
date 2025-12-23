<!-- Certificates Filter Section -->
<section id="certificates-filter" class="py-12 bg-base-200/30">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-bold text-base-content">Browse Certificates</h2>
                    <p class="text-base-content/70">Filter by category or search for specific credentials</p>
                </div>

                <!-- Category Filter Dropdown -->
                <div class="flex flex-wrap gap-3">
                    <!-- All Certificates Button -->
                    <a href="{{ route('certificates') }}"
                        class="px-4 py-2 rounded-lg {{ !request()->has('category') ? 'bg-gradient-to-r from-primary-500 to-secondary-500 text-white' : 'bg-base-200 text-base-content border border-base-300 hover:bg-base-300' }} font-medium transition-all duration-300 hover:shadow-lg">
                        All Certificates
                    </a>

                    <!-- Category Buttons -->
                    @foreach ($categories ?? [] as $category)
                        <a href="{{ route('certificates', ['category' => $category->id]) }}"
                            class="px-4 py-2 rounded-lg {{ request()->get('category') == $category->id ? 'bg-gradient-to-r from-primary-500 to-secondary-500 text-white' : 'bg-base-200 text-base-content border border-base-300 hover:bg-base-300' }} font-medium transition-all duration-300 hover:shadow-lg">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>