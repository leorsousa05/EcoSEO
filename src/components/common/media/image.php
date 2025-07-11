<?php
$src = $src ?? '';
$alt = $alt ?? '';
$width = $width ?? '';
$height = $height ?? '';
$lazy = $lazy ?? true;
$responsive = $responsive ?? true;
$rounded = $rounded ?? false;
$shadow = $shadow ?? false;
$overlay = $overlay ?? false;
$caption = $caption ?? '';
$attributes = $attributes ?? [];

$classes = 'block';
$classes .= $responsive ? ' w-full h-auto' : '';
$classes .= $rounded ? ' rounded-lg' : '';
$classes .= $shadow ? ' shadow-lg' : '';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<figure class="<?= $overlay ? 'relative group overflow-hidden' : '' ?>">
    <img 
        src="<?= htmlspecialchars($src) ?>" 
        alt="<?= htmlspecialchars($alt) ?>"
        <?= $width ? 'width="' . htmlspecialchars($width) . '"' : '' ?>
        <?= $height ? 'height="' . htmlspecialchars($height) . '"' : '' ?>
        <?= $lazy ? 'loading="lazy"' : '' ?>
        <?= $lazy ? 'decoding="async"' : '' ?>
        class="<?= $classes ?>"
        <?= $attrString ?>
    />
    
    <?php if ($overlay): ?>
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
            <span class="iconify w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" data-icon="heroicons:eye"></span>
        </div>
    <?php endif; ?>
    
    <?php if ($caption): ?>
        <figcaption class="mt-2 text-sm text-gray-600 text-center">
            <?= htmlspecialchars($caption) ?>
        </figcaption>
    <?php endif; ?>
</figure> 