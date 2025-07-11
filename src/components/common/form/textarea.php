<?php
$name = $name ?? '';
$label = $label ?? '';
$placeholder = $placeholder ?? '';
$value = $value ?? '';
$rows = $rows ?? 4;
$cols = $cols ?? '';
$required = $required ?? false;
$disabled = $disabled ?? false;
$readonly = $readonly ?? false;
$maxlength = $maxlength ?? '';
$minlength = $minlength ?? '';
$icon = $icon ?? null;
$error = $error ?? '';
$help = $help ?? '';
$attributes = $attributes ?? [];

$textareaId = $textareaId ?? 'textarea-' . uniqid();
$classes = 'w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 resize-vertical';
$classes .= $error ? ' border-error' : '';
$classes .= $disabled ? ' bg-gray-100 cursor-not-allowed' : '';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div class="space-y-2">
    <?php if ($label): ?>
        <label for="<?= $textareaId ?>" class="block text-sm font-medium text-gray-700">
            <?= htmlspecialchars($label) ?>
            <?php if ($required): ?>
                <span class="text-error">*</span>
            <?php endif; ?>
        </label>
    <?php endif; ?>

    <div class="relative">
        <?php if ($icon): ?>
            <span class="iconify absolute left-3 top-4 w-5 h-5 text-gray-400" data-icon="<?= $icon ?>"></span>
        <?php endif; ?>
        
        <textarea 
            name="<?= htmlspecialchars($name) ?>"
            id="<?= $textareaId ?>"
            rows="<?= $rows ?>"
            <?= $cols ? 'cols="' . htmlspecialchars($cols) . '"' : '' ?>
            placeholder="<?= htmlspecialchars($placeholder) ?>"
            <?= $required ? 'required' : '' ?>
            <?= $disabled ? 'disabled' : '' ?>
            <?= $readonly ? 'readonly' : '' ?>
            <?= $maxlength ? 'maxlength="' . htmlspecialchars($maxlength) . '"' : '' ?>
            <?= $minlength ? 'minlength="' . htmlspecialchars($minlength) . '"' : '' ?>
            class="<?= $classes ?><?= $icon ? ' pl-10' : '' ?>"
            <?= $attrString ?>
        ><?= htmlspecialchars($value) ?></textarea>
    </div>

    <?php if ($error): ?>
        <p class="text-sm text-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($help): ?>
        <p class="text-sm text-gray-500"><?= htmlspecialchars($help) ?></p>
    <?php endif; ?>
</div> 