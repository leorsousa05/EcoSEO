<?php
$title = $title ?? '';
$subtitle = $subtitle ?? '';
$content = $content ?? '';
$image = $image ?? null;
$footer = $footer ?? null;
$actions = $actions ?? [];
$elevated = $elevated ?? true;
$bordered = $bordered ?? false;
$attributes = $attributes ?? [];

$classes = 'bg-white';
$classes .= $elevated ? ' shadow-lg' : '';
$classes .= $bordered ? ' border border-gray-200' : '';
$classes .= ' rounded-lg overflow-hidden';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div class="<?= $classes ?>"<?= $attrString ?>>
    <?php if ($image): ?>
        <div class="relative">
            <img src="<?= htmlspecialchars($image['src']) ?>" 
                 alt="<?= htmlspecialchars($image['alt'] ?? '') ?>"
                 class="w-full h-48 object-cover">
            <?php if (isset($image['overlay'])): ?>
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <span class="text-white text-lg font-semibold"><?= htmlspecialchars($image['overlay']) ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
    <div class="p-6">
        <?php if ($title): ?>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">
                <?= htmlspecialchars($title) ?>
            </h3>
        <?php endif; ?>
        
        <?php if ($subtitle): ?>
            <p class="text-sm text-gray-600 mb-4">
                <?= htmlspecialchars($subtitle) ?>
            </p>
        <?php endif; ?>
        
        <div class="text-gray-700">
            <?= $content ?>
        </div>
        
        <?php if (!empty($actions)): ?>
            <div class="mt-6 flex space-x-3">
                <?php foreach ($actions as $action): ?>
                    <?= $this->insert('components/common/button', $action) ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <?php if ($footer): ?>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            <?= $footer ?>
        </div>
    <?php endif; ?>
</div> 