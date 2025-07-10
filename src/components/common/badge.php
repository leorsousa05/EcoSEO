<?php
$text = $text ?? 'Badge';
$color = $color ?? 'primary';
$size = $size ?? 'md';
$icon = $icon ?? null;
$attributes = $attributes ?? [];

$baseClasses = 'inline-flex items-center font-medium rounded-full';

$sizes = [
    'sm' => 'px-2 py-1 text-xs',
    'md' => 'px-3 py-1 text-sm',
    'lg' => 'px-4 py-2 text-base',
];

$colors = [
    'primary' => 'bg-primary text-white',
    'secondary' => 'bg-secondary text-white',
    'success' => 'bg-success text-white',
    'error' => 'bg-error text-white',
    'warning' => 'bg-warning text-white',
    'info' => 'bg-info text-white',
];

$classes = $baseClasses . ' ' . ($sizes[$size] ?? $sizes['md']) . ' ' . ($colors[$color] ?? $colors['primary']);

$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}
?>

<span class="<?= $classes ?>"<?= $attrString ?>>
    <?php if ($icon): ?>
        <span class="iconify w-4 h-4 mr-1" data-icon="<?= $icon ?>"></span>
    <?php endif; ?>
    <?= htmlspecialchars($text) ?>
</span> 