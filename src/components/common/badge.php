<?php
$text = $text ?? 'Badge';
$color = $color ?? 'primary';
$size = $size ?? 'md';
$icon = $icon ?? null;
$attributes = $attributes ?? [];

$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}

$sizeClasses = [
    'sm' => 'text-xs px-2 py-1',
    'md' => 'text-sm px-3 py-1.5',
    'lg' => 'text-base px-4 py-2',
];

$colorClasses = [
    'primary' => 'bg-[var(--color-primary)] text-white',
    'secondary' => 'bg-[var(--color-secondary)] text-white',
    'success' => 'bg-green-500 text-white',
    'error' => 'bg-red-500 text-white',
    'warning' => 'bg-yellow-500 text-white',
    'info' => 'bg-blue-500 text-white',
];

$classes = 'rounded-full w-fit font-medium flex items-center flex-row justify-center ' . ($sizeClasses[$size] ?? $sizeClasses['md']) . ' ' . ($colorClasses[$color] ?? $colorClasses['primary']);
?>

<span class="<?= $classes ?><?= $attrString ?>">
    <?php if (! empty($icon)): ?>
        <span class="iconify mr-1 w-4 h-4" data-icon="<?= htmlspecialchars($icon) ?>"></span>
    <?php endif; ?>
    <?= htmlspecialchars($text) ?>
</span> 