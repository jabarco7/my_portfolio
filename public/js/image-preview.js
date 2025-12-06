document.addEventListener('DOMContentLoaded', function() {
    // Preview featured image
    const featuredImageInput = document.getElementById('featured_image');
    if (featuredImageInput) {
        featuredImageInput.addEventListener('change', function() {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');

            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    preview.style.maxHeight = '300px';
                    preview.style.width = '100%';
                    preview.style.objectFit = 'cover';
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Update image label for additional images
    function previewAdditionalImage(input) {
        const label = input.parentElement.querySelector('.image-label');
        const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
        label.textContent = fileName;

        // Show preview of the selected image
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Create or update preview element
                let previewContainer = input.parentElement.querySelector('.image-preview');
                if (!previewContainer) {
                    previewContainer = document.createElement('div');
                    previewContainer.className = 'image-preview mt-2';
                    input.parentElement.appendChild(previewContainer);
                }

                // Clear previous preview
                previewContainer.innerHTML = '';

                // Create new preview image
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'w-full h-32 object-cover rounded';
                preview.style.display = 'block';
                previewContainer.appendChild(preview);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Add event listeners to existing file inputs
    document.querySelectorAll('.image-input').forEach(input => {
        input.addEventListener('change', function() {
            previewAdditionalImage(this);
        });
    });

    // Add more image rows
    const addImageBtn = document.getElementById('add-image');
    const imagesContainer = document.getElementById('images-container');

    if (addImageBtn) {
        let imageCount = 1;
        addImageBtn.addEventListener('click', function() {
            const firstRow = imagesContainer.querySelector('.image-row');
            const newRow = firstRow.cloneNode(true);

            // Generate unique IDs for new elements
            const newId = imageCount++;
            const fileInput = newRow.querySelector('.image-input');
            const labelFor = newRow.querySelector('label[for^="image-"]');
            const captionInput = newRow.querySelector('.image-caption');
            const label = newRow.querySelector('.image-label');

            // Update IDs and for attributes
            fileInput.id = `image-${newId}`;
            labelFor.setAttribute('for', `image-${newId}`);

            // Clear inputs in the new row
            fileInput.value = '';
            captionInput.value = '';
            label.textContent = '';

            // Clear image preview
            const imagePreview = newRow.querySelector('.image-preview');
            if (imagePreview) {
                imagePreview.innerHTML = '';
            }

            // Re-add event listener for file input
            fileInput.addEventListener('change', function() {
                previewAdditionalImage(this);
            });

            // Append new row
            imagesContainer.appendChild(newRow);

            // Smooth scroll to the new row
            newRow.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        });
    }
});
