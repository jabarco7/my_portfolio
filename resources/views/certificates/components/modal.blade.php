<!-- Certificate Detail Modal -->
<div id="certificate-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Modal Backdrop -->
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" onclick="hideCertificateModal()"></div>

        <!-- Modal Content -->
        <div class="relative bg-base-100 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 z-10 flex justify-between items-center p-6 border-b border-base-300 bg-base-100">
                <h3 class="text-2xl font-bold text-base-content">Certificate Details</h3>
                <button onclick="hideCertificateModal()"
                    class="w-10 h-10 rounded-lg bg-base-200 hover:bg-base-300 flex items-center justify-center transition-colors duration-300">
                    <i class="fas fa-times text-base-content/70"></i>
                </button>
            </div>

            <div class="p-6">
                <!-- Dynamic content will be inserted here by JavaScript -->
                <div id="certificate-modal-content"></div>
            </div>
        </div>
    </div>
</div>