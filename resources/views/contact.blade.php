@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Get In Touch</h2>
                <div class="w-20 h-1 bg-primary-600 mx-auto"></div>
                <p class="mt-4 text-gray-600 dark:text-gray-300">
                    Feel free to contact me with any questions or project inquiries.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-6">Send Me a Message</h3>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        @error('name')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-800" 
                                   required>
                        </div>

                        @error('email')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-800" 
                                   required>
                        </div>

                        @error('subject')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" 
                                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-800" 
                                   required>
                        </div>

                        @error('message')
                            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
                        @enderror
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" 
                                      class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-800" 
                                      required>{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="w-full px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-md font-medium transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg mb-8">
                        <h3 class="text-xl font-semibold mb-6">Contact Information</h3>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="text-primary-600 dark:text-primary-400 mr-4">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Address</h4>
                                    <p class="text-gray-600 dark:text-gray-300">123 Street Name, City, Country</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="text-primary-600 dark:text-primary-400 mr-4">
                                    <i class="fas fa-phone text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Phone</h4>
                                    <p class="text-gray-600 dark:text-gray-300">+123 456 7890</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="text-primary-600 dark:text-primary-400 mr-4">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Email</h4>
                                    <p class="text-gray-600 dark:text-gray-300">your.email@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-900 p-8 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-6">Follow Me</h3>

                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-full hover:bg-primary-600 dark:hover:bg-primary-600 text-gray-700 dark:text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-full hover:bg-primary-600 dark:hover:bg-primary-600 text-gray-700 dark:text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-full hover:bg-primary-600 dark:hover:bg-primary-600 text-gray-700 dark:text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-full hover:bg-primary-600 dark:hover:bg-primary-600 text-gray-700 dark:text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
