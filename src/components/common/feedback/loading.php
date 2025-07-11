<?php
$type = $type ?? 'spinner';
$size = $size ?? 'md';
$text = $text ?? '';
$overlay = $overlay ?? false;
$attributes = $attributes ?? [];

$sizeClasses = [
    'xs' => 'w-4 h-4',
    'sm' => 'w-6 h-6',
    'md' => 'w-8 h-8',
    'lg' => 'w-12 h-12',
    'xl' => 'w-16 h-16',
];

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<?php if ($overlay): ?>
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"<?= $attrString ?>>
        <div class="bg-white rounded-lg p-6 flex flex-col items-center space-y-4">
            <?php if ($type === 'spinner'): ?>
                <div class="<?= $sizeClasses[$size] ?> animate-spin rounded-full border-4 border-gray-200 border-t-primary"></div>
            <?php elseif ($type === 'dots'): ?>
                <div class="flex space-x-1">
                    <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-bounce"></div>
                    <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            <?php elseif ($type === 'pulse'): ?>
                <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-pulse"></div>
            <?php endif; ?>
            
            <?php if ($text): ?>
                <p class="text-gray-600"><?= htmlspecialchars($text) ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="flex flex-col items-center space-y-2"<?= $attrString ?>>
        <?php if ($type === 'spinner'): ?>
            <div class="<?= $sizeClasses[$size] ?> animate-spin rounded-full border-4 border-gray-200 border-t-primary"></div>
        <?php elseif ($type === 'dots'): ?>
            <div class="flex space-x-1">
                <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-bounce"></div>
                <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            </div>
        <?php elseif ($type === 'pulse'): ?>
            <div class="<?= $sizeClasses[$size] ?> bg-primary rounded-full animate-pulse"></div>
        <?php endif; ?>
        
        <?php if ($text): ?>
            <p class="text-gray-600 text-sm"><?= htmlspecialchars($text) ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?> 