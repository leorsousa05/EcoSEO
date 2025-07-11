<?php
$title = $title ?? 'Nenhum item encontrado';
$description = $description ?? 'Não há dados para exibir no momento.';
$icon = $icon ?? 'heroicons:inbox';
$action = $action ?? null;
$attributes = $attributes ?? [];

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div class="text-center py-12"<?= $attrString ?>>
    <div class="flex justify-center">
        <span class="iconify w-16 h-16 text-gray-400" data-icon="<?= $icon ?>"></span>
    </div>
    
    <h3 class="mt-4 text-lg font-medium text-gray-900">
        <?= htmlspecialchars($title) ?>
    </h3>
    
    <p class="mt-2 text-sm text-gray-500">
        <?= htmlspecialchars($description) ?>
    </p>
    
    <?php if ($action): ?>
        <div class="mt-6">
            <?= $this->insert('components/common/button', $action) ?>
        </div>
    <?php endif; ?>
</div> 