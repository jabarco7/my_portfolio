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
            <button id="add-social-link-btn"
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
            <div class="flex items-center space-x-2">
                <button id="bulk-edit-btn"
                    class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors"
                    title="Bulk Edit">
                    <i class="fas fa-edit"></i>
                </button>
            </div>
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
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
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
                                    <button
                                        class="edit-link-btn text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300"
                                        title="Edit" data-link='{{ json_encode($link) }}'>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.social.destroy', $link) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this social link?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
                                    <button id="add-first-link-btn"
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
    <div id="social-link-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl max-w-md w-full">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">Add Social Link</h3>
                </div>
                <form id="social-link-form" class="p-6">
                    @csrf
                    <input type="hidden" id="link-id" name="id">

                    <div class="mb-4">
                        <label class="form-label">Platform</label>
                        <select id="platform-select" name="platform" class="form-input" required>
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
                            <input type="checkbox" id="active-checkbox" name="is_active"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Active</span>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancel-btn" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('social-link-modal');
            const form = document.getElementById('social-link-form');
            const platformSelect = document.getElementById('platform-select');
            const iconInput = document.getElementById('icon-input');
            let currentLink = null;

            // Platform to icon mapping
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

            // Auto-fill icon when platform changes
            platformSelect.addEventListener('change', function() {
                const platform = this.value;
                if (platform && platformIcons[platform]) {
                    iconInput.value = platformIcons[platform];
                }
            });

            // Add new link buttons
            document.getElementById('add-social-link-btn')?.addEventListener('click', () => openModal());
            document.getElementById('add-first-link-btn')?.addEventListener('click', () => openModal());

            // Edit link buttons
            document.querySelectorAll('.edit-link-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const link = JSON.parse(this.dataset.link);

                    // Convert is_active from integer to boolean if needed
                    if (link.is_active !== undefined && typeof link.is_active === 'number') {
                        link.is_active = Boolean(link.is_active);
                    }

                    console.log('Link data:', link);
                    openModal(link);
                });
            });

            // Cancel button
            document.getElementById('cancel-btn').addEventListener('click', () => closeModal());

            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            function openModal(link = null) {
                currentLink = link;
                document.getElementById('modal-title').textContent = link ? 'Edit Social Link' : 'Add Social Link';

                if (link) {
                    document.getElementById('link-id').value = link.id;
                    platformSelect.value = link.platform;
                    document.getElementById('url-input').value = link.url;
                    iconInput.value = link.icon;
                    document.getElementById('order-input').value = link.order;
                    document.getElementById('active-checkbox').checked = Boolean(link.is_active);

                    // Log for debugging
                    console.log('Link data in openModal:', link);
                    console.log('is_active value:', link.is_active, 'type:', typeof link.is_active);
                    console.log('checkbox checked:', document.getElementById('active-checkbox').checked);

                    // Use Laravel route helper for the edit URL
                    const editUrl = `{{ route('admin.social.update', ':id') }}`.replace(':id', link.id);
                    form.action = editUrl;
                    form.method = 'POST'; // Keep POST for form compatibility, but we'll send PUT via fetch

                    // Log for debugging
                    console.log('Edit URL:', editUrl);
                    console.log('Link ID:', link.id);

                    // Remove any existing _method input since we're using real HTTP methods
                    const existingMethodInput = form.querySelector('input[name="_method"]');
                    if (existingMethodInput) {
                        existingMethodInput.remove();
                    }

                    // Make sure is_active is a boolean
                    document.getElementById('active-checkbox').checked = Boolean(link.is_active);
                } else {
                    form.reset();
                    form.action = '{{ route('admin.social.store') }}';
                    form.method = 'POST';
                    document.getElementById('link-id').value = '';

                    // Remove any existing _method input
                    const existingMethodInput = form.querySelector('input[name="_method"]');
                    if (existingMethodInput) {
                        existingMethodInput.remove();
                    }

                    // Ensure is_active checkbox is checked by default for new links
                    document.getElementById('active-checkbox').checked = true;
                }

                modal.classList.remove('hidden');
            }

            function closeModal() {
                modal.classList.add('hidden');
                form.reset();
                currentLink = null;
            }

            // Update table row with new data
            function updateTableRow(updatedLink) {
                // Find the table row for this link
                const editBtn = document.querySelector(`button[data-link*='"id":${updatedLink.id}']`);
                if (!editBtn) return;

                const row = editBtn.closest('tr');
                if (!row) return;

                // Update the data-link attribute with new data
                editBtn.setAttribute('data-link', JSON.stringify(updatedLink));

                // Update the cells in the row
                const cells = row.querySelectorAll('td');

                // Platform and icon cell
                const platformCell = cells[0];
                const iconElement = platformCell.querySelector('i');
                const platformText = platformCell.querySelector('.text-sm.font-medium');
                if (iconElement) iconElement.className = updatedLink.icon + ' text-white text-lg';
                if (platformText) platformText.textContent = updatedLink.platform;

                // URL cell
                const urlCell = cells[1];
                const urlLink = urlCell.querySelector('a');
                if (urlLink) {
                    urlLink.href = updatedLink.url;
                    urlLink.title = updatedLink.url;
                    urlLink.textContent = updatedLink.url.length > 30 ? updatedLink.url.substring(0, 30) + '...' :
                        updatedLink.url;
                }

                // Icon class cell
                const iconCell = cells[2];
                const codeElement = iconCell.querySelector('code');
                if (codeElement) codeElement.textContent = updatedLink.icon;

                // Order cell
                const orderCell = cells[3];
                orderCell.textContent = updatedLink.order;

                // Status cell
                const statusCell = cells[4];
                const statusSpan = statusCell.querySelector('span');
                if (statusSpan) {
                    statusSpan.textContent = updatedLink.is_active ? 'Active' : 'Inactive';
                    statusSpan.className = updatedLink.is_active ?
                        'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' :
                        'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                }

                console.log('Table row updated with new data:', updatedLink);
            }

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(form);

                // Ensure is_active is always sent as a boolean value
                const activeCheckbox = document.getElementById('active-checkbox');
                formData.set('is_active', activeCheckbox.checked ? '1' : '0');

                // Log for debugging
                console.log('is_active checkbox checked:', activeCheckbox.checked);
                console.log('is_active form value:', activeCheckbox.checked ? '1' : '0');

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                        'content') ||
                    document.querySelector('input[name="_token"]')?.value;

                // Determine the actual HTTP method based on whether we're editing or creating
                const actualMethod = currentLink ? 'PUT' : 'POST';

                // Log form data for debugging
                console.log('Form action:', form.action);
                console.log('Form method:', actualMethod);
                console.log('Form data:');
                for (const [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }

                // Convert FormData to URLSearchParams for proper form submission
                const urlSearchParams = new URLSearchParams();
                for (const [key, value] of formData.entries()) {
                    urlSearchParams.append(key, value);
                }

                fetch(form.action, {
                        method: actualMethod, // Use the actual HTTP method (POST for create, PUT for update)
                        body: urlSearchParams,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw new Error(err.message || 'Server error');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update the table row with new data without page reload
                            if (currentLink && data.data) {
                                updateTableRow(data.data);
                            }

                            // Show success message
                            const successMessage = document.createElement('div');
                            successMessage.className =
                                'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                            successMessage.textContent = data.message ||
                                'Social link updated successfully!';
                            document.body.appendChild(successMessage);

                            setTimeout(() => {
                                successMessage.remove();
                                closeModal();
                            }, 1500);
                        } else {
                            // Show error message
                            const errorMessage = document.createElement('div');
                            errorMessage.className =
                                'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                            errorMessage.textContent = data.message || 'Something went wrong';
                            document.body.appendChild(errorMessage);

                            setTimeout(() => {
                                errorMessage.remove();
                            }, 5000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Show error message
                        const errorMessage = document.createElement('div');
                        errorMessage.className =
                            'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                        errorMessage.textContent = error.message ||
                            'An error occurred. Please try again.';
                        document.body.appendChild(errorMessage);

                        setTimeout(() => {
                            errorMessage.remove();
                        }, 5000);
                    });
            });

            // Handle delete forms
            document.querySelectorAll('form[action*="destroy"]').forEach(deleteForm => {
                deleteForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    if (!confirm('Are you sure you want to delete this social link?')) {
                        return;
                    }

                    const formData = new FormData(this);
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')
                        ?.getAttribute('content') ||
                        document.querySelector('input[name="_token"]')?.value;

                    fetch(this.action, {
                            method: 'DELETE',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(err => {
                                    throw new Error(err.message || 'Server error');
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Show success message
                                const successMessage = document.createElement('div');
                                successMessage.className =
                                    'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                                successMessage.textContent = data.message ||
                                    'Social link deleted successfully!';
                                document.body.appendChild(successMessage);

                                // Simply reload the page after showing success message
                                setTimeout(() => {
                                    successMessage.remove();
                                    location.reload();
                                }, 1500);
                            } else {
                                // Show error message
                                const errorMessage = document.createElement('div');
                                errorMessage.className =
                                    'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                                errorMessage.textContent = data.message ||
                                    'Something went wrong';
                                document.body.appendChild(errorMessage);

                                setTimeout(() => {
                                    errorMessage.remove();
                                }, 5000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            // Show error message
                            const errorMessage = document.createElement('div');
                            errorMessage.className =
                                'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                            errorMessage.textContent = error.message ||
                                'An error occurred. Please try again.';
                            document.body.appendChild(errorMessage);

                            setTimeout(() => {
                                errorMessage.remove();
                            }, 5000);
                        });
                });
            });
        });
    </script>
@endsection
