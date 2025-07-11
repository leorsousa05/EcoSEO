<?php
$id = $id ?? 'modal-' . uniqid();
$title = $title ?? '';
$content = $content ?? '';
$footer = $footer ?? null;
$size = $size ?? 'md';
$closeOnOverlay = $closeOnOverlay ?? true;
$showCloseButton = $showCloseButton ?? true;
$attributes = $attributes ?? [];

$sizeClasses = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
    '3xl' => 'max-w-3xl',
    '4xl' => 'max-w-4xl',
    '5xl' => 'max-w-5xl',
    '6xl' => 'max-w-6xl',
    '7xl' => 'max-w-7xl',
    'full' => 'max-w-full mx-4',
];

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div id="<?= $id ?>" class="fixed inset-0 z-50 hidden"<?= $attrString ?>>
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" 
             <?= $closeOnOverlay ? 'onclick="closeModal(\'' . $id . '\')"' : '' ?>>
        </div>

        <div class="inline-block w-full <?= $sizeClasses[$size] ?> text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:p-6">
            <?php if ($title || $showCloseButton): ?>
                <div class="flex items-center justify-between mb-4">
                    <?php if ($title): ?>
                        <h3 class="text-lg font-medium text-gray-900">
                            <?= htmlspecialchars($title) ?>
                        </h3>
                    <?php endif; ?>
                    
                    <?php if ($showCloseButton): ?>
                        <button type="button" 
                                onclick="closeModal('<?= $id ?>')"
                                class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <span class="iconify w-6 h-6" data-icon="heroicons:x-mark"></span>
                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="text-gray-700">
                <?= $content ?>
            </div>
            
            <?php if ($footer): ?>
                <div class="mt-6 flex justify-end space-x-3">
                    <?= $footer ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('[id^="modal-"]');
        modals.forEach(modal => {
            if (!modal.classList.contains('hidden')) {
                closeModal(modal.id);
            }
        });
    }
});
</script> 