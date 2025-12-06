@extends('admin.layouts.app')

@section('title', 'Social Links')

@section('content')
<div class="card rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Social Media Links</h2>

    <form action="{{ route('admin.social.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div id="social-links-container">
            @forelse ($links as $index => $link)
                <div class="social-link-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Social Link {{ $index + 1 }}</h3>
                        <button type="button" class="remove-social-link text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Platform</label>
                            <select name="platform[]" class="form-input" required>
                                <option value="twitter" {{ $link['platform'] == 'twitter' ? 'selected' : '' }}>Twitter</option>
                                <option value="facebook" {{ $link['platform'] == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="instagram" {{ $link['platform'] == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                <option value="linkedin" {{ $link['platform'] == 'linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                <option value="github" {{ $link['platform'] == 'github' ? 'selected' : '' }}>GitHub</option>
                                <option value="youtube" {{ $link['platform'] == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                <option value="dribbble" {{ $link['platform'] == 'dribbble' ? 'selected' : '' }}>Dribbble</option>
                                <option value="behance" {{ $link['platform'] == 'behance' ? 'selected' : '' }}>Behance</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label">URL</label>
                            <input type="url" name="url[]" value="{{ $link['url'] }}" class="form-input" required>
                        </div>
                    </div>
                </div>
            @empty
                <div class="social-link-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Social Link 1</h3>
                        <button type="button" class="remove-social-link text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Platform</label>
                            <select name="platform[]" class="form-input" required>
                                <option value="twitter">Twitter</option>
                                <option value="facebook">Facebook</option>
                                <option value="instagram">Instagram</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="github">GitHub</option>
                                <option value="youtube">YouTube</option>
                                <option value="dribbble">Dribbble</option>
                                <option value="behance">Behance</option>
                            </select>
                        </div>

                        <div>
                            <label class="form-label">URL</label>
                            <input type="url" name="url[]" placeholder="https://example.com" class="form-input" required>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <button type="button" id="add-social-link" class="btn btn-secondary mt-4">
            <i class="fas fa-plus"></i> Add Social Link
        </button>

        <div class="flex justify-end mt-6">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add social link functionality
        const addSocialLinkBtn = document.getElementById('add-social-link');
        const socialLinksContainer = document.getElementById('social-links-container');
        let socialLinkCount = document.querySelectorAll('.social-link-item').length;

        addSocialLinkBtn.addEventListener('click', function() {
            socialLinkCount++;

            const socialLinkItem = document.createElement('div');
            socialLinkItem.className = 'social-link-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4';

            socialLinkItem.innerHTML = `
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Social Link ${socialLinkCount}</h3>
                    <button type="button" class="remove-social-link text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Platform</label>
                        <select name="platform[]" class="form-input" required>
                            <option value="twitter">Twitter</option>
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="github">GitHub</option>
                            <option value="youtube">YouTube</option>
                            <option value="dribbble">Dribbble</option>
                            <option value="behance">Behance</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">URL</label>
                        <input type="url" name="url[]" placeholder="https://example.com" class="form-input" required>
                    </div>
                </div>
            `;

            socialLinksContainer.appendChild(socialLinkItem);

            // Add remove functionality
            socialLinkItem.querySelector('.remove-social-link').addEventListener('click', function() {
                socialLinkItem.remove();
            });
        });

        // Remove social link functionality
        document.querySelectorAll('.remove-social-link').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.social-link-item').remove();
            });
        });
    });
</script>
@endsection
