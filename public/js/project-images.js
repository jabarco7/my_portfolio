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
            // Create new image row via AJAX
            fetch(`${window.location.origin}/admin/projects/image-row/${imageCount}`)
                .then(response => response.text())
                .then(html => {
                    imagesContainer.insertAdjacentHTML('beforeend', html);
                    imageCount++;

                    // Add event listener to new input
                    const newRow = imagesContainer.lastElementChild;
                    const fileInput = newRow.querySelector('.image-input');
                    fileInput.onchange = function() {
                        updateImageLabel(this);
                    };

                    // Scroll to new row
                    newRow.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
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
