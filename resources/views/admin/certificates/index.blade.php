@extends('admin.layouts.app')

@section('title', 'Certificates')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold mb-2">Certificates</h1>
                <p class="text-blue-100 opacity-90">Manage your professional certificates</p>
            </div>
            <div class="flex flex-wrap gap-3">

                <a href="{{ route('admin.certificate-categories.index') }}"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg">
                    <i class="fas fa-tags"></i>
                    <span>Manage Categories</span>
                </a>
                <a href="{{ route('certificates') }}" target="_blank"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg">
                    <i class="fas fa-external-link-alt"></i>
                    <span>View Public Page</span>
                </a>
                <a href="{{ route('admin.certificates.create') }}"
                    class="bg-white/20 hover:bg-white/30 px-4 py-3 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 hover:shadow-lg transform hover:-translate-x-1">
                    <i class="fas fa-plus"></i>
                    <span>Add New Certificate</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8 border border-gray-200 dark:border-gray-700">
        <form method="GET" action="{{ route('admin.certificates.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Filter by Category
                    </label>
                    <select id="category_id" name="category_id" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2 flex items-end">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md mr-2">
                        <i class="fas fa-filter mr-2"></i> Apply Filters
                    </button>
                    <a href="{{ route('admin.certificates.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                        <i class="fas fa-times mr-2"></i> Clear
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Category
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($certificates as $certificate)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $certificate->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $certificate->title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($certificate->category)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" 
                                          style="background-color: {{ $certificate->category->color ?? '#6B7280' }}20; color: {{ $certificate->category->color ?? '#6B7280' }}">
                                        {{ $certificate->category->name }}
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        No Category
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $certificate->date->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($certificate->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.certificates.show', $certificate) }}"
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.certificates.edit', $certificate) }}"
                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.certificates.toggle-active', $certificate) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="{{ $certificate->is_active ? 'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300 mr-3' : 'text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 mr-3' }}"
                                        title="{{ $certificate->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas {{ $certificate->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i> {{ $certificate->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                        onclick="return confirm('Are you sure you want to delete this certificate?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No certificates found. <a href="{{ route('admin.certificates.create') }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Create one</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="bg-white dark:bg-gray-800 px-4 py-3 flex items-center justify-between border-t border-gray-200 dark:border-gray-700 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                {{ $certificates->links() }}
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Showing
                        <span class="font-medium">{{ $certificates->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $certificates->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $certificates->total() }}</span>
                        results
                    </p>
                </div>
                <div>
                    {{ $certificates->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection