<?php
$items = $items ?? [];
$separator = $separator ?? 'chevron-right';
$attributes = $attributes ?? [];

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<nav class="flex items-center space-x-2 text-sm text-gray-500" aria-label="Breadcrumb"<?= $attrString ?>>
    <ol class="flex items-center space-x-2">
        <?php foreach ($items as $index => $item): ?>
            <li class="flex items-center">
                <?php if ($index > 0): ?>
                    <span class="iconify w-4 h-4 mx-2 text-gray-400" data-icon="heroicons:<?= $separator ?>"></span>
                <?php endif; ?>
                
                <?php if (isset($item['url']) && $index < count($items) - 1): ?>
                    <a href="<?= htmlspecialchars($item['url']) ?>" 
                       class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        <?= htmlspecialchars($item['name']) ?>
                    </a>
                <?php else: ?>
                    <span class="text-gray-900 font-medium">
                        <?= htmlspecialchars($item['name']) ?>
                    </span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav> 