<?php
$type = $type ?? 'info';
$message = $message ?? 'Alert message';
$dismissible = $dismissible ?? false;
$attributes = $attributes ?? [];

$baseClasses = 'p-4 rounded-lg border';

$types = [
    'success' => 'bg-success-light border-success text-success',
    'error' => 'bg-error-light border-error text-error',
    'warning' => 'bg-warning-light border-warning text-warning',
    'info' => 'bg-info-light border-info text-info',
];

$classes = $baseClasses . ' ' . ($types[$type] ?? $types['info']);

$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}
?>

<div class="<?= $classes ?>"<?= $attrString ?>>
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <span class="iconify w-5 h-5" data-icon="heroicons:information-circle"></span>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm"><?= htmlspecialchars($message) ?></p>
        </div>
        <?php if ($dismissible): ?>
            <div class="ml-auto pl-3">
                <button type="button" 
                        class="inline-flex text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600 transition-colors duration-200"
                        onclick="this.parentElement.parentElement.parentElement.remove()">
                    <span class="iconify w-5 h-5" data-icon="heroicons:x-mark"></span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div> 