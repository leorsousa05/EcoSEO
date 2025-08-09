<?php
$text = $text ?? 'Button';
$href = $href ?? '#';
$variant = $variant ?? 'primary';
$size = $size ?? 'md';
$icon = $icon ?? null;
$iconPosition = $iconPosition ?? 'left';
$attributes = $attributes ?? [];
$type = $type ?? 'button';
$disabled = $disabled ?? false;
$isLink = isset($href) && $href !== null;

$baseClasses = 'inline-flex items-center justify-center font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed';

$sizes = [
    'xs' => 'px-2 py-1 text-xs rounded',
    'sm' => 'px-3 py-1.5 text-sm rounded-md',
    'md' => 'px-4 py-2 text-sm rounded-md',
    'lg' => 'px-6 py-3 text-base rounded-lg',
    'xl' => 'px-8 py-4 text-lg rounded-lg',
];

$variants = [
    'primary' => 'bg-primary text-white hover:bg-primary-hover border-transparent focus:ring-primary-focus shadow-sm hover:shadow-md',
    'secondary' => 'bg-secondary text-white hover:bg-secondary-hover border-transparent focus:ring-secondary-focus shadow-sm hover:shadow-md',
    'success' => 'bg-success text-white hover:bg-success-hover border-transparent focus:ring-success-focus shadow-sm hover:shadow-md',
    'error' => 'bg-error text-white hover:bg-error-hover border-transparent focus:ring-error-focus shadow-sm hover:shadow-md',
    'warning' => 'bg-warning text-white hover:bg-warning-hover border-transparent focus:ring-warning-focus shadow-sm hover:shadow-md',
    'info' => 'bg-info text-white hover:bg-info-hover border-transparent focus:ring-info-focus shadow-sm hover:shadow-md',
    'outline' => 'bg-transparent text-primary hover:bg-primary-light border-primary hover:border-primary-hover focus:ring-primary shadow-sm hover:shadow-md',
    'outline-secondary' => 'bg-transparent text-secondary hover:bg-secondary-light border-secondary hover:border-secondary-hover focus:ring-secondary shadow-sm hover:shadow-md',
    'outline-success' => 'bg-transparent text-success hover:bg-success-light border-success hover:border-success-hover focus:ring-success shadow-sm hover:shadow-md',
    'outline-error' => 'bg-transparent text-error hover:bg-error-light border-error hover:border-error-hover focus:ring-error shadow-sm hover:shadow-md',
    'outline-warning' => 'bg-transparent text-warning hover:bg-warning-light border-warning hover:border-warning-hover focus:ring-warning shadow-sm hover:shadow-md',
    'outline-info' => 'bg-transparent text-info hover:bg-info-light border-info hover:border-info-hover focus:ring-info shadow-sm hover:shadow-md',
    'ghost' => 'bg-transparent text-gray-700 hover:bg-gray-100 hover:text-gray-900 border-transparent focus:ring-gray-500',
    'ghost-primary' => 'bg-transparent text-primary hover:bg-primary-light hover:text-primary-hover border-transparent focus:ring-primary',
    'ghost-secondary' => 'bg-transparent text-secondary hover:bg-secondary-light hover:text-secondary-hover border-transparent focus:ring-secondary',
    'ghost-success' => 'bg-transparent text-success hover:bg-success-light hover:text-success-hover border-transparent focus:ring-success',
    'ghost-error' => 'bg-transparent text-error hover:bg-error-light hover:text-error-hover border-transparent focus:ring-error',
    'ghost-warning' => 'bg-transparent text-warning hover:bg-warning-light hover:text-warning-hover border-transparent focus:ring-warning',
    'ghost-info' => 'bg-transparent text-info hover:bg-info-light hover:text-info-hover border-transparent focus:ring-info',
];

$classes = $baseClasses . ' ' . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$variant] ?? $variants['primary']);

if ($customClass ?? false) {
    $classes .= ' ' . $customClass;
}

$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}

$iconClasses = 'flex-shrink-0';
if ($size === 'xs' || $size === 'sm') {
    $iconClasses .= ' w-4 h-4';
} elseif ($size === 'lg' || $size === 'xl') {
    $iconClasses .= ' w-6 h-6';
} else {
    $iconClasses .= ' w-5 h-5';
}

$iconSpacing = $size === 'xs' || $size === 'sm' ? 'mr-1.5' : 'mr-2';
$iconSpacingRight = $size === 'xs' || $size === 'sm' ? 'ml-1.5' : 'ml-2';

$renderIcon = function($icon, $position = 'left') use ($iconClasses, $iconSpacing, $iconSpacingRight) {
    if (!$icon) return '';
    
    $spacing = $position === 'left' ? $iconSpacing : $iconSpacingRight;
    return '<span class="iconify ' . $iconClasses . ' ' . $spacing . '" data-icon="' . htmlspecialchars($icon) . '" aria-hidden="true"></span>';
};
?>

<?php if ($isLink): ?>
    <a href="<?= htmlspecialchars($href) ?>" 
       class="<?= $classes ?>" 
       <?= $disabled ? 'aria-disabled="true" tabindex="-1"' : '' ?>
       <?= $attrString ?>>
        <?php if ($icon && $iconPosition === 'left'): ?>
            <?= $renderIcon($icon, 'left') ?>
        <?php endif; ?>
        <?= htmlspecialchars($text) ?>
        <?php if ($icon && $iconPosition === 'right'): ?>
            <?= $renderIcon($icon, 'right') ?>
        <?php endif; ?>
    </a>
<?php else: ?>
    <button type="<?= htmlspecialchars($type) ?>" 
            class="<?= $classes ?>" 
            <?= $disabled ? 'disabled' : '' ?>
            <?= $attrString ?>>
        <?php if ($icon && $iconPosition === 'left'): ?>
            <?= $renderIcon($icon, 'left') ?>
        <?php endif; ?>
        <?= htmlspecialchars($text) ?>
        <?php if ($icon && $iconPosition === 'right'): ?>
            <?= $renderIcon($icon, 'right') ?>
        <?php endif; ?>
    </button>
<?php endif; ?> 