// Toast notification function
function showToast(message) {
    console.log('=== TOAST FUNCTION START ===');
    console.log('showToast called with message:', message);

    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');

    console.log('Toast element:', toast);
    console.log('Toast message element:', toastMessage);

    if (!toast || !toastMessage) {
        console.error('Toast elements not found');
        console.log('Falling back to alert');
        alert(message);
        return;
    }

    // Set message
    toastMessage.textContent = message;
    console.log('Message set to:', toastMessage.textContent);

    // Simple show/hide without animations
    toast.style.display = 'block';
    toast.classList.remove('hidden');
    toast.style.transform = 'translateX(0)';
    toast.style.opacity = '1';
    toast.style.zIndex = '9999';
    toast.style.position = 'fixed';
    toast.style.top = '80px';
    toast.style.right = '16px';

    console.log('Toast displayed with message:', message);

    // Auto hide after 5 seconds
    setTimeout(() => {
        toast.style.display = 'none';
        toast.classList.add('hidden');
        console.log('Toast hidden');
    }, 5000);

    console.log('=== TOAST FUNCTION END ===');
}

// Make the function globally available
window.showToast = showToast;

console.log('Toast script loaded');

// Ensure the toast is ready when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    console.log('=== DOM LOADED ===');
    console.log('Checking for toast elements');
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');

    console.log('Toast element found:', !!toast);
    console.log('Toast message element found:', !!toastMessage);

    if (toast && toastMessage) {
        console.log('Toast elements found and ready');
        console.log('Toast initial styles:', toast.style.cssText);
    } else {
        console.error('Toast elements not found on DOM load');
    }
    console.log('=== DOM LOADED END ===');
});
