@extends('admin.layouts.app')

@section('title', 'Skills Page Content')

@section('content')
<div class="p-4 md:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4 md:p-6">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.293H19a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                    </svg>
                    Skills Page Content Management
                </h2>
            </div>
            <div class="p-4 md:p-6">
                @if(session()->has('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 dark:bg-green-900 dark:border-green-800">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 0l-2 2a1 1 0 001.414 1.414l2-2a1 1 0 00.0-.0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700 dark:text-green-200">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.skills-page-content.update') }}" method="POST">
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
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_badge_text" name="hero[badge_text]" value="{{ $heroContent->badge_text ?? '' }}" placeholder="e.g., Technical Expertise">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text that appears in badge above hero title</p>
                                </div>
                                <div>
                                    <label for="hero_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_title" name="hero[title]" value="{{ $heroContent->title ?? '' }}" placeholder="e.g., My Technical">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in hero section</p>
                                </div>
                                <div>
                                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_subtitle" name="hero[subtitle]" value="{{ $heroContent->subtitle ?? '' }}" placeholder="e.g., Skills & Tools">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below main title</p>
                                </div>
                                <div>
                                    <label for="hero_button_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_button_text" name="hero[button_text]" value="{{ $heroContent->button_text ?? '' }}" placeholder="e.g., Explore Skills">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text displayed on main call-to-action button</p>
                                </div>
                                <div>
                                    <label for="hero_button_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Link</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_button_link" name="hero[button_link]" value="{{ $heroContent->button_link ?? '' }}" placeholder="#skills-list">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">URL where main button links to</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="hero_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="hero_description" name="hero[description]" rows="4" placeholder="Brief description of your skills and expertise">{{ $heroContent->description ?? '' }}</textarea>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main description text in hero section</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills List Section -->
                    <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                                Skills List Section
                            </h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <div>
                                    <label for="skills_list_badge_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="skills_list_badge_text" name="skills_list[badge_text]" value="{{ $skillsListContent->badge_text ?? '' }}" placeholder="e.g., Comprehensive Overview">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text that appears in badge above skills list title</p>
                                </div>
                                <div>
                                    <label for="skills_list_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="skills_list_title" name="skills_list[title]" value="{{ $skillsListContent->title ?? '' }}" placeholder="e.g., Technical Skills">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in skills list section</p>
                                </div>
                                <div>
                                    <label for="skills_list_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="skills_list_subtitle" name="skills_list[subtitle]" value="{{ $skillsListContent->subtitle ?? '' }}" placeholder="e.g., Matrix">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below main title</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="skills_list_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="skills_list_description" name="skills_list[description]" rows="4" placeholder="Description of your skills categories and proficiency levels">{{ $skillsListContent->description ?? '' }}</textarea>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Description text for skills list section</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Methodologies Section -->
                    <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0 1.756-2.924-3.35-2.924zm-3.35 13.628c1.398 0 2.256.62 2.924-1.756.62-2.924-1.756zm1.756 13.628c1.398 0 2.256.62 2.924-1.756.62-2.924-1.756z"></path>
                                </svg>
                                Methodologies Section
                            </h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <div>
                                    <label for="methodologies_badge_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Badge Text</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="methodologies_badge_text" name="methodologies[badge_text]" value="{{ $methodologiesContent->badge_text ?? '' }}" placeholder="e.g., Methodologies & Practices">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text that appears in badge above methodologies title</p>
                                </div>
                                <div>
                                    <label for="methodologies_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="methodologies_title" name="methodologies[title]" value="{{ $methodologiesContent->title ?? '' }}" placeholder="e.g., Development">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in methodologies section</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="methodologies_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="methodologies_subtitle" name="methodologies[subtitle]" value="{{ $methodologiesContent->subtitle ?? '' }}" placeholder="e.g., Methodologies">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below main title</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Section -->
                    <div class="mb-6 bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <div class="px-4 py-3 sm:px-6 border-b border-gray-200 dark:border-gray-600">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882H19.823a2.25 2.25 0 00-2.25 2.25H6.177a2.25 2.25 0 00-2.25-2.25 0-1.26.474-1.125-1.876-1.125h11.75c.621 0 1.125.504 1.125 1.125H12a2 2 0 002 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.293H19a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                                </svg>
                                Call to Action Section
                            </h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                                <div>
                                    <label for="cta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_title" name="cta[title]" value="{{ $ctaContent->title ?? '' }}" placeholder="e.g., Need a Specific">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Main title displayed in CTA section</p>
                                </div>
                                <div>
                                    <label for="cta_subtitle" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subtitle</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_subtitle" name="cta[subtitle]" value="{{ $ctaContent->subtitle ?? '' }}" placeholder="e.g., Skill Set?">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Subtitle displayed below main title</p>
                                </div>
                                <div>
                                    <label for="cta_button_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Text</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_button_text" name="cta[button_text]" value="{{ $ctaContent->button_text ?? '' }}" placeholder="e.g., Discuss Your Project">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Text displayed on call-to-action button</p>
                                </div>
                                <div>
                                    <label for="cta_button_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Button Link</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_button_link" name="cta[button_link]" value="{{ $ctaContent->button_link ?? '' }}" placeholder="{{ route('contact') }}">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">URL where CTA button links to</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="cta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" id="cta_description" name="cta[description]" rows="4" placeholder="Encourage visitors to contact you for their project needs">{{ $ctaContent->description ?? '' }}</textarea>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Description text for call-to-action section</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.293H19a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.293H19a2 2 0 012 2v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                            </svg>
                            Update Content
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection