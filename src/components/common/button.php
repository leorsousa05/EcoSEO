<?php
// Default values for all variables
$text = $text ?? 'Button';
$href = $href ?? '#';
$variant = $variant ?? 'primary';
$attributes = $attributes ?? [];
$type = $type ?? 'button';
$isLink = isset($href) && $href !== null;

// Base classes for all buttons
$baseClasses = 'inline-flex items-center justify-center px-4 py-2 border rounded-md text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200';

// Variant styles
$variants = [
    'primary' => 'bg-primary text-white hover:bg-primary-hover border-transparent focus:ring-primary-focus',
    'secondary' => 'bg-secondary text-white hover:bg-secondary-hover border-transparent focus:ring-secondary-focus',
    'outline' => 'bg-transparent text-primary hover:bg-gray-50 border-primary focus:ring-primary'
];

// Combine classes
$classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);

// Build attributes string
$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}
?>

<?php if ($isLink): ?>
    <a href="<?= htmlspecialchars($href) ?>" class="<?= $classes ?>"<?= $attrString ?>>
        <?= htmlspecialchars($text) ?>
    </a>
<?php else: ?>
    <button type="<?= htmlspecialchars($type) ?>" class="<?= $classes ?>"<?= $attrString ?>>
        <?= htmlspecialchars($text) ?>
    </button>
<?php endif; ?> 