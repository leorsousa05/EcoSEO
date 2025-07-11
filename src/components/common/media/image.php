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

$classes = 'block transition-all duration-300';
$classes .= $responsive ? ' w-full h-auto' : '';
$classes .= $rounded ? ' rounded-lg' : '';
$classes .= $shadow ? ' shadow-lg hover:shadow-xl' : '';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<figure class="<?= $overlay ? 'relative group overflow-hidden rounded-lg' : '' ?>">
    <img 
        src="<?= htmlspecialchars($src) ?>" 
        alt="<?= htmlspecialchars($alt) ?>"
        <?= $width ? 'width="' . htmlspecialchars($width) . '"' : '' ?>
        <?= $height ? 'height="' . htmlspecialchars($height) . '"' : '' ?>
        <?= $lazy ? 'loading="lazy"' : '' ?>
        <?= $lazy ? 'decoding="async"' : '' ?>
        class="<?= $classes ?> <?= $overlay ? 'group-hover:scale-105' : 'hover:scale-105' ?>"
        <?= $attrString ?>
    />
    
    <?php if ($overlay): ?>
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center pb-4">
            <span class="iconify w-8 h-8 text-white mb-2" data-icon="heroicons:eye"></span>
        </div>
    <?php endif; ?>
    
    <?php if ($caption): ?>
        <figcaption class="mt-3 text-sm text-gray-600 text-center font-medium">
            <?= htmlspecialchars($caption) ?>
        </figcaption>
    <?php endif; ?>
</figure> 