@php
    $imageId = $imageId ?? 0;
@endphp
<div class="image-row p-4 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                Image
            </label>
            <div class="relative">
                <input type="file" name="images[]" accept="image/*" id="image-{{ $imageId }}"
                    class="hidden image-input" onchange="previewAdditionalImage(this)">
                <label for="image-{{ $imageId }}" class="cursor-pointer">
                    <div
                        class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-3 text-center hover:border-purple-500 dark:hover:border-purple-500 transition-all duration-300 group">
                        <div class="flex items-center justify-center space-x-2">
                            <i
                                class="fas fa-image text-xl text-gray-400 group-hover:text-purple-500 transition-colors duration-300"></i>
                            <span
                                class="text-sm text-gray-600 dark:text-gray-400 group-hover:text-purple-500 transition-colors duration-300">
                                Choose file
                            </span>
                        </div>
                    </div>
                </label>
                <span class="image-label text-xs text-gray-500 mt-2 block text-center"></span>
                <div class="image-preview mt-2"></div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-2 text-gray-700 dark:text-gray-300">
                Caption
            </label>
            <input type="text" name="image_captions[]"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 image-caption"
                placeholder="Image caption">
        </div>
    </div>
</div>
