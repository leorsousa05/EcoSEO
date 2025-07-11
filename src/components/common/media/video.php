<?php
$src = $src ?? '';
$poster = $poster ?? '';
$width = $width ?? '';
$height = $height ?? '';
$autoplay = $autoplay ?? false;
$controls = $controls ?? true;
$loop = $loop ?? false;
$muted = $muted ?? false;
$preload = $preload ?? 'metadata';
$responsive = $responsive ?? true;
$rounded = $rounded ?? false;
$shadow = $shadow ?? false;
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

<video 
    src="<?= htmlspecialchars($src) ?>"
    <?= $poster ? 'poster="' . htmlspecialchars($poster) . '"' : '' ?>
    <?= $width ? 'width="' . htmlspecialchars($width) . '"' : '' ?>
    <?= $height ? 'height="' . htmlspecialchars($height) . '"' : '' ?>
    <?= $autoplay ? 'autoplay' : '' ?>
    <?= $controls ? 'controls' : '' ?>
    <?= $loop ? 'loop' : '' ?>
    <?= $muted ? 'muted' : '' ?>
    preload="<?= htmlspecialchars($preload) ?>"
    class="<?= $classes ?>"
    <?= $attrString ?>
>
    <p>Seu navegador não suporta vídeos HTML5.</p>
</video> 