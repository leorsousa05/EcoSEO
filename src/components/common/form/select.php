<?php
$name = $name ?? '';
$label = $label ?? '';
$options = $options ?? [];
$selected = $selected ?? '';
$required = $required ?? false;
$disabled = $disabled ?? false;
$multiple = $multiple ?? false;
$size = $size ?? '';
$icon = $icon ?? null;
$error = $error ?? '';
$help = $help ?? '';
$placeholder = $placeholder ?? '';
$attributes = $attributes ?? [];

$selectId = $selectId ?? 'select-' . uniqid();
$classes = 'w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200';
$classes .= $error ? ' border-error' : '';
$classes .= $disabled ? ' bg-gray-100 cursor-not-allowed' : '';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div class="space-y-2">
    <?php if ($label): ?>
        <label for="<?= $selectId ?>" class="block text-sm font-medium text-gray-700">
            <?= htmlspecialchars($label) ?>
            <?php if ($required): ?>
                <span class="text-error">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>

    <div class="relative">
        <?php if ($icon): ?>
            <span class="iconify absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" data-icon="<?= $icon ?>"></span>
        <?php endif; ?>
        
        <select 
            name="<?= htmlspecialchars($name) ?>"
            id="<?= $selectId ?>"
            <?= $required ? 'required' : '' ?>
            <?= $disabled ? 'disabled' : '' ?>
            <?= $multiple ? 'multiple' : '' ?>
            <?= $size ? 'size="' . htmlspecialchars($size) . '"' : '' ?>
            class="<?= $classes ?><?= $icon ? ' pl-10' : '' ?>"
            <?= $attrString ?>
        >
            <?php if ($placeholder): ?>
                <option value="" disabled <?= $selected === '' ? 'selected' : '' ?>>
                    <?= htmlspecialchars($placeholder) ?>
                </option>
            <?php endif; ?>
            
            <?php foreach ($options as $value => $label): ?>
                <option 
                    value="<?= htmlspecialchars($value) ?>"
                    <?= $selected === $value ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($label) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if ($error): ?>
        <p class="text-sm text-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($help): ?>
        <p class="text-sm text-gray-500"><?= htmlspecialchars($help) ?></p>
    <?php endif; ?>
</div> 