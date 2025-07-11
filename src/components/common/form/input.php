<?php
$type = $type ?? 'text';
$name = $name ?? '';
$label = $label ?? '';
$placeholder = $placeholder ?? '';
$value = $value ?? '';
$required = $required ?? false;
$disabled = $disabled ?? false;
$readonly = $readonly ?? false;
$autocomplete = $autocomplete ?? '';
$pattern = $pattern ?? '';
$min = $min ?? '';
$max = $max ?? '';
$step = $step ?? '';
$accept = $accept ?? '';
$multiple = $multiple ?? false;
$icon = $icon ?? null;
$error = $error ?? '';
$help = $help ?? '';
$attributes = $attributes ?? [];

$inputId = $inputId ?? 'input-' . uniqid();
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
        <label for="<?= $inputId ?>" class="block text-sm font-medium text-gray-700">
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
        
        <input 
            type="<?= htmlspecialchars($type) ?>"
            name="<?= htmlspecialchars($name) ?>"
            id="<?= $inputId ?>"
            value="<?= htmlspecialchars($value) ?>"
            placeholder="<?= htmlspecialchars($placeholder) ?>"
            <?= $required ? 'required' : '' ?>
            <?= $disabled ? 'disabled' : '' ?>
            <?= $readonly ? 'readonly' : '' ?>
            <?= $autocomplete ? 'autocomplete="' . htmlspecialchars($autocomplete) . '"' : '' ?>
            <?= $pattern ? 'pattern="' . htmlspecialchars($pattern) . '"' : '' ?>
            <?= $min ? 'min="' . htmlspecialchars($min) . '"' : '' ?>
            <?= $max ? 'max="' . htmlspecialchars($max) . '"' : '' ?>
            <?= $step ? 'step="' . htmlspecialchars($step) . '"' : '' ?>
            <?= $accept ? 'accept="' . htmlspecialchars($accept) . '"' : '' ?>
            <?= $multiple ? 'multiple' : '' ?>
            class="<?= $classes ?><?= $icon ? ' pl-10' : '' ?>"
            <?= $attrString ?>
        />
    </div>

    <?php if ($error): ?>
        <p class="text-sm text-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($help): ?>
        <p class="text-sm text-gray-500"><?= htmlspecialchars($help) ?></p>
    <?php endif; ?>
</div> 