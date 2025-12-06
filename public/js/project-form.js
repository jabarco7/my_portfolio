document.addEventListener('DOMContentLoaded', function() {
    const addImageBtn = document.getElementById('add-image');
    const imagesContainer = document.getElementById('images-container');
    let imageCount = 1;

    // Preview featured image
    window.previewImage = function(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Update image label for additional images
    window.updateImageLabel = function(input) {
        const label = input.parentElement.querySelector('.image-label');
        const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
        label.textContent = fileName;
    }

    if (addImageBtn) {
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

            // Clear inputs in new row
            fileInput.value = '';
            captionInput.value = '';
            label.textContent = '';

            // Re-add event listener for file input
            fileInput.onchange = function() {
                updateImageLabel(this);
            };

            // Append new row
            imagesContainer.appendChild(newRow);

            // Smooth scroll to the new row
            newRow.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        });
    }

    // Add event listeners to existing file inputs
    document.querySelectorAll('.image-input').forEach(input => {
        input.onchange = function() {
            updateImageLabel(this);
        };
    });
});
