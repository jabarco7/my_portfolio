@extends('admin.layouts.app')

@section('title', 'Social Links')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl shadow-lg p-6 mb-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Social Links Management</h1>
                <p class="text-blue-100">Manage your social media links and connections</p>
            </div>
            <button onclick="openCreateModal()"
                class="bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-lg font-medium transition-colors flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Link
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Links</h3>
                <i class="fas fa-share-alt text-blue-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $socialLinks->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Active</h3>
                <i class="fas fa-check-circle text-green-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $socialLinks->where('is_active', true)->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Inactive</h3>
                <i class="fas fa-pause-circle text-gray-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ $socialLinks->where('is_active', false)->count() }}</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Platforms</h3>
                <i class="fas fa-globe text-purple-500"></i>
            </div>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $socialLinks->unique('platform')->count() }}</p>
        </div>
    </div>

    <!-- Social Links Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">All Social Links</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Platform</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            URL</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Icon</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Order</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($socialLinks as $link)
                        <tr id="row-{{ $link->id }}" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div
                                            class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                            <i class="{{ $link->icon }} text-white text-lg"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $link->platform }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">ID: {{ $link->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ $link->url }}" target="_blank"
                                    class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 truncate max-w-xs block"
                                    title="{{ $link->url }}">
                                    {{ Str::limit($link->url, 30) }}
                                    <i class="fas fa-external-link-alt ml-1"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                <code
                                    class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-xs">{{ $link->icon }}</code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $link->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($link->is_active)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Active</span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ $link->url }}" target="_blank"
                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300"
                                        title="Visit Link">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <button onclick="openEditModal({{ json_encode($link) }})"
                                        class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteLink({{ $link->id }})"
                                        class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-share-alt text-gray-400 dark:text-gray-500 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No social links yet
                                    </h3>
                                    <p class="text-gray-500 dark:text-gray-400 mb-4">Get started by adding your first social
                                        media link</p>
                                    <button onclick="openCreateModal()"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-plus mr-2"></i> Add Your First Link
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div id="social-link-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">Add Social Link</h3>
                </div>
                <form id="social-link-form" class="p-6" onsubmit="handleFormSubmit(event)">
                    @csrf
                    <input type="hidden" id="link-id" name="id">
                    <input type="hidden" id="method-input" name="_method" value="POST">

                    <div class="mb-4">
                        <label class="form-label">Platform</label>
                        <select id="platform-select" name="platform" class="form-input" required onchange="updateIcon()">
                            <option value="">Select Platform</option>
                            <option value="twitter">Twitter</option>
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="github">GitHub</option>
                            <option value="youtube">YouTube</option>
                            <option value="dribbble">Dribbble</option>
                            <option value="behance">Behance</option>
                            <option value="website">Website</option>
                            <option value="email">Email</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">URL</label>
                        <input type="url" id="url-input" name="url" class="form-input"
                            placeholder="https://example.com" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Icon Class</label>
                        <input type="text" id="icon-input" name="icon" class="form-input"
                            placeholder="ri-twitter-fill" required>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Use RemixIcon classes (e.g.,
                            ri-twitter-fill)</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Order</label>
                        <input type="number" id="order-input" name="order" class="form-input" min="1"
                            value="1" required>
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" id="active-checkbox" name="is_active" value="1"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Active</span>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const platformIcons = {
            'twitter': 'ri-twitter-fill',
            'facebook': 'ri-facebook-fill',
            'instagram': 'ri-instagram-fill',
            'linkedin': 'ri-linkedin-box-fill',
            'github': 'ri-github-fill',
            'youtube': 'ri-youtube-fill',
            'dribbble': 'ri-dribbble-fill',
            'behance': 'ri-behance-fill',
            'website': 'ri-global-line',
            'email': 'ri-mail-fill'
        };

        function updateIcon() {
            const platform = document.getElementById('platform-select').value;
            if (platform && platformIcons[platform]) {
                document.getElementById('icon-input').value = platformIcons[platform];
            }
        }

        function openCreateModal() {
            document.getElementById('modal-title').textContent = 'Add Social Link';
            document.getElementById('social-link-form').reset();
            document.getElementById('link-id').value = '';
            document.getElementById('method-input').value = 'POST';
            document.getElementById('active-checkbox').checked = true;
            document.getElementById('social-link-modal').classList.remove('hidden');
        }

        function openEditModal(link) {
            document.getElementById('modal-title').textContent = 'Edit Social Link';
            document.getElementById('link-id').value = link.id;
            document.getElementById('platform-select').value = link.platform;
            document.getElementById('url-input').value = link.url;
            document.getElementById('icon-input').value = link.icon;
            document.getElementById('order-input').value = link.order;
            document.getElementById('active-checkbox').checked = Boolean(link.is_active);
            document.getElementById('method-input').value = 'PUT';
            document.getElementById('social-link-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('social-link-modal').classList.add('hidden');
        }

        async function handleFormSubmit(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const id = document.getElementById('link-id').value;
            const isEdit = !!id;

            // Handle checkbox manually to ensure it's sent
            // If checked, it sends '1'. If unchecked, we must ensure '0' is sent or handled.
            // But FormData only includes checked checkboxes.
            // So we append it manually if unchecked?
            // Actually, for boolean fields, it's safer to just set it explicitly.
            if (!document.getElementById('active-checkbox').checked) {
                formData.append('is_active', '0');
            } else {
                // It's already in formData as '1' because of value="1"
            }

            const url = isEdit ?
                `{{ route('admin.social.update', ':id') }}`.replace(':id', id) :
                `{{ route('admin.social.store') }}`;

            try {
                const response = await fetch(url, {
                    method: 'POST', // Always POST, Laravel handles _method
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Reload to show changes reliably
                    window.location.reload();
                } else {
                    alert(data.message || 'An error occurred');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while saving');
            }
        }

        async function deleteLink(id) {
            if (!confirm('Are you sure you want to delete this social link?')) return;

            const url = `{{ route('admin.social.destroy', ':id') }}`.replace(':id', id);

            try {
                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.message || 'An error occurred');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while deleting');
            }
        }

        // Close modal on outside click
        document.getElementById('social-link-modal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    </script>
@endsection
