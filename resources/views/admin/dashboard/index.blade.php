@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Messages Card -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100">Total Messages</p>
                <p class="text-3xl font-bold mt-2">{{ $totalMessages }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-envelope text-2xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm text-blue-100">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>All messages from visitors</span>
        </div>
    </div>

    <!-- Unread Messages Card -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100">Unread Messages</p>
                <p class="text-3xl font-bold mt-2">{{ $unreadMessages }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-envelope-open text-2xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm text-green-100">
            <i class="fas fa-clock mr-1"></i>
            <span>Messages awaiting reply</span>
        </div>
    </div>
    
    <!-- Projects Card -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100">Total Projects</p>
                <p class="text-3xl font-bold mt-2">{{ \App\Models\Project::count() }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-briefcase text-2xl"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm text-purple-100">
            <i class="fas fa-folder mr-1"></i>
            <span>Portfolio projects</span>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-indigo-100">Quick Actions</p>
                <div class="flex space-x-2 mt-3">
                    <a href="{{ route('admin.projects.create') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 p-2 rounded-lg transition-colors" title="Add New Project">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('admin.content') }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 p-2 rounded-lg transition-colors" title="Edit Content">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-bolt text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-4 bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-between">
        <h3 class="text-lg font-semibold text-white">Recent Messages</h3>
        <a href="{{ route('admin.messages') }}" class="text-white hover:text-blue-100 transition-colors flex items-center">
            View All <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
    <div class="p-0">
        @forelse ($recentMessages as $message)
            <div class="p-4 border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <div class="flex items-start justify-between">
                    <div class="flex items-start space-x-3 flex-1">
                        <div class="flex-shrink-0">
                            @if ($message->is_read)
                                <div class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope-open text-green-600 dark:text-green-400"></i>
                                </div>
                            @else
                                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center relative">
                                    <i class="fas fa-envelope text-yellow-600 dark:text-yellow-400"></i>
                                    <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $message->name }}</p>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $message->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">{{ $message->email }}</p>
                            <p class="text-sm text-gray-700 dark:text-gray-300 truncate">{{ $message->subject }}</p>
                        </div>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="{{ route('admin.messages.show', $message->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-inbox text-gray-400 dark:text-gray-500 text-2xl"></i>
                </div>
                <p class="text-gray-500 dark:text-gray-400">No messages yet</p>
                <p class="text-sm text-gray-400 dark:text-gray-500 mt-2">Messages from visitors will appear here</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
