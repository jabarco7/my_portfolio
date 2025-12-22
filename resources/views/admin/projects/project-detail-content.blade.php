@extends('admin.layouts.app')

@section('title', 'Project Detail Page Content')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Project Detail Page Content</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Projects
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.project-detail-content.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Hero Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h1a8 8 0 008 8v1h-1z"></path>
                                    </svg>
                                    Hero Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="hero_badge_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_badge_text" name="hero[badge_text]" value="{{ $heroContent->badge_text ?? 'Project Case Study' }}" placeholder="e.g., Project Case Study">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text displayed in the badge above the title</p>
                                    </div>
                                    <div>
                                        <label for="hero_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_title" name="hero[title]" value="{{ $heroContent->title ?? 'Project Details' }}" placeholder="e.g., Project Details">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in the hero section</p>
                                    </div>
                                    <div>
                                        <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_subtitle" name="hero[subtitle]" value="{{ $heroContent->subtitle }}" placeholder="e.g., A detailed look at our work">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below the main title</p>
                                    </div>
                                    <div>
                                        <label for="hero_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_description" name="hero[description]" rows="3" placeholder="e.g., Explore the details of this project">{{ $heroContent->description ?? '' }}</textarea>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Description displayed in the hero section</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Gallery Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="gallery_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="gallery_title" name="gallery[title]" value="{{ $galleryContent->title ?? 'Project Gallery' }}" placeholder="e.g., Project Gallery">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title of the gallery section</p>
                                    </div>
                                    <div>
                                        <label for="gallery_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="gallery_subtitle" name="gallery[subtitle]" value="{{ $galleryContent->subtitle ?? 'Visual showcase of the project' }}" placeholder="e.g., Visual showcase of the project">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle of the gallery section</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Features Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="features_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="features_title" name="features[title]" value="{{ $featuresContent->title ?? 'Key Features' }}" placeholder="e.g., Key Features">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title of the features section</p>
                                    </div>
                                    <div>
                                        <label for="features_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="features_subtitle" name="features[subtitle]" value="{{ $featuresContent->subtitle ?? 'Notable functionalities and capabilities' }}" placeholder="e.g., Notable functionalities and capabilities">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle of the features section</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Details Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Project Details Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="project_details_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_title" name="project_details[title]" value="{{ $projectDetailsContent->title ?? 'Project Details' }}" placeholder="e.g., Project Details">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title of the project details section</p>
                                    </div>
                                    <div>
                                        <label for="project_details_technologies_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Technologies Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_technologies_title" name="project_details[technologies_title]" value="{{ $projectDetailsContent->technologies_title ?? 'Technologies Used' }}" placeholder="e.g., Technologies Used">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the technologies subsection</p>
                                    </div>
                                    <div>
                                        <label for="project_details_category_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_category_title" name="project_details[category_title]" value="{{ $projectDetailsContent->category_title ?? 'Category' }}" placeholder="e.g., Category">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the category subsection</p>
                                    </div>
                                    <div>
                                        <label for="project_details_client_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Client Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_client_title" name="project_details[client_title]" value="{{ $projectDetailsContent->client_title ?? 'Client' }}" placeholder="e.g., Client">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the client subsection</p>
                                    </div>
                                    <div>
                                        <label for="project_details_date_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_date_title" name="project_details[date_title]" value="{{ $projectDetailsContent->date_title ?? 'Project Date' }}" placeholder="e.g., Project Date">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the date subsection</p>
                                    </div>
                                    <div>
                                        <label for="project_details_status_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_status_title" name="project_details[status_title]" value="{{ $projectDetailsContent->status_title ?? 'Project Status' }}" placeholder="e.g., Project Status">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the status subsection</p>
                                    </div>
                                    <div>
                                        <label for="project_details_links_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Links Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="project_details_links_title" name="project_details[links_title]" value="{{ $projectDetailsContent->links_title ?? 'Project Links' }}" placeholder="e.g., Project Links">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the links subsection</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Explore More Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Explore More Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="explore_more_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="explore_more_title" name="explore_more[title]" value="{{ $exploreMoreContent->title ?? 'Explore More Projects' }}" placeholder="e.g., Explore More Projects">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title of the explore more section</p>
                                    </div>
                                    <div>
                                        <label for="explore_more_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="explore_more_subtitle" name="explore_more[subtitle]" value="{{ $exploreMoreContent->subtitle ?? 'Check out other projects in my portfolio' }}" placeholder="e.g., Check out other projects in my portfolio">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle of the explore more section</p>
                                    </div>
                                    <div>
                                        <label for="explore_more_button_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="explore_more_button_text" name="explore_more[button_text]" value="{{ $exploreMoreContent->button_text ?? 'View Portfolio' }}" placeholder="e.g., View Portfolio">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text for the button in this section</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg>
                                    Share Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="share_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="share_title" name="share[title]" value="{{ $shareContent->title ?? 'Share Project' }}" placeholder="e.g., Share Project">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title of the share section</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Challenges Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Challenges Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="challenges_badge_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="challenges_badge_text" name="challenges[badge_text]" value="{{ $challengesContent->badge_text ?? 'Development Insights' }}" placeholder="e.g., Development Insights">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text displayed in the badge above the title</p>
                                    </div>
                                    <div>
                                        <label for="challenges_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="challenges_title" name="challenges[title]" value="{{ $challengesContent->title ?? 'Challenges & Solutions' }}" placeholder="e.g., Challenges & Solutions">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in the challenges section</p>
                                    </div>
                                    <div>
                                        <label for="challenges_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="challenges_subtitle" name="challenges[subtitle]" value="{{ $challengesContent->subtitle ?? 'Every project comes with unique challenges. Here\'s how we solved them.' }}" placeholder="e.g., Every project comes with unique challenges. Here's how we solved them.">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below the main title</p>
                                    </div>
                                    <div>
                                        <label for="challenges_challenges_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Challenges Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="challenges_challenges_title" name="challenges[challenges_title]" value="{{ $challengesContent->challenges_title ?? 'Key Challenges' }}" placeholder="e.g., Key Challenges">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the challenges subsection</p>
                                    </div>
                                    <div>
                                        <label for="challenges_solutions_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Solutions Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="challenges_solutions_title" name="challenges[solutions_title]" value="{{ $challengesContent->solutions_title ?? 'Implemented Solutions' }}" placeholder="e.g., Implemented Solutions">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Title for the solutions subsection</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                    Call-to-Action Section
                                </h3>
                            </div>
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                    <div>
                                        <label for="cta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_title" name="cta[title]" value="{{ $ctaContent->title ?? 'Like What You See?' }}" placeholder="e.g., Like What You See?">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in the CTA section</p>
                                    </div>
                                    <div>
                                        <label for="cta_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_subtitle" name="cta[subtitle]" value="{{ $ctaContent->subtitle ?? 'Let\'s Work Together' }}" placeholder="e.g., Let's Work Together">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below the main title</p>
                                    </div>
                                    <div>
                                        <label for="cta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_description" name="cta[description]" rows="3" placeholder="e.g., Ready to bring your next project to life with the same quality and attention to detail?">{{ $ctaContent->description ?? '' }}</textarea>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Description displayed in the CTA section</p>
                                    </div>
                                    <div>
                                        <label for="cta_button_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_button_text" name="cta[button_text]" value="{{ $ctaContent->button_text ?? 'Start a Project' }}" placeholder="e.g., Start a Project">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text for the CTA button</p>
                                    </div>
                                    <div>
                                        <label for="cta_button_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Link</label>
                                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_button_link" name="cta[button_link]" value="{{ $ctaContent->button_link ?? route('contact') }}" placeholder="e.g., /contact">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">URL for the CTA button</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-save mr-2"></i>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
