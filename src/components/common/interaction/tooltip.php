<?php
$content = $content ?? '';
$text = $text ?? '';
$position = $position ?? 'top';
$trigger = $trigger ?? 'hover';
$attributes = $attributes ?? [];

$positionClasses = [
    'top' => 'bottom-full left-1/2 transform -translate-x-1/2 mb-2',
    'bottom' => 'top-full left-1/2 transform -translate-x-1/2 mt-2',
    'left' => 'right-full top-1/2 transform -translate-y-1/2 mr-2',
    'right' => 'left-full top-1/2 transform -translate-y-1/2 ml-2',
];

$triggerEvent = $trigger === 'click' ? 'onclick="toggleTooltip(this)"' : '';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div class="relative inline-block"<?= $attrString ?>>
    <div class="<?= $triggerEvent ? 'cursor-pointer' : '' ?>" <?= $triggerEvent ?>>
        <?= $content ?>
    </div>
    
    <div class="absolute z-50 px-3 py-2 text-sm text-white bg-gray-900 rounded-lg shadow-lg opacity-0 invisible transition-all duration-200 pointer-events-none <?= $positionClasses[$position] ?>"
         role="tooltip">
        <?= htmlspecialchars($text) ?>
        
        <div class="absolute w-2 h-2 bg-gray-900 transform rotate-45
            <?= $position === 'top' ? 'top-full left-1/2 -translate-x-1/2' : '' ?>
            <?= $position === 'bottom' ? 'bottom-full left-1/2 -translate-x-1/2' : '' ?>
            <?= $position === 'left' ? 'left-full top-1/2 -translate-y-1/2' : '' ?>
            <?= $position === 'right' ? 'right-full top-1/2 -translate-y-1/2' : '' ?>">
        </div>
    </div>
</div>

<?php if ($trigger === 'hover'): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tooltips = document.querySelectorAll('[role="tooltip"]');
    
    tooltips.forEach(tooltip => {
        const parent = tooltip.parentElement;
        const trigger = parent.querySelector('div:first-child');
        
        trigger.addEventListener('mouseenter', () => {
            tooltip.classList.remove('opacity-0', 'invisible');
            tooltip.classList.add('opacity-100', 'visible');
        });
        
        trigger.addEventListener('mouseleave', () => {
            tooltip.classList.add('opacity-0', 'invisible');
            tooltip.classList.remove('opacity-100', 'visible');
        });
    });
});
</script>
<?php else: ?>
<script>
function toggleTooltip(element) {
    const tooltip = element.nextElementSibling;
    const isVisible = !tooltip.classList.contains('opacity-0');
    
    if (isVisible) {
        tooltip.classList.add('opacity-0', 'invisible');
        tooltip.classList.remove('opacity-100', 'visible');
    } else {
        tooltip.classList.remove('opacity-0', 'invisible');
        tooltip.classList.add('opacity-100', 'visible');
    }
}

document.addEventListener('click', function(event) {
    const tooltips = document.querySelectorAll('[role="tooltip"]');
    tooltips.forEach(tooltip => {
        const parent = tooltip.parentElement;
        if (!parent.contains(event.target)) {
            tooltip.classList.add('opacity-0', 'invisible');
            tooltip.classList.remove('opacity-100', 'visible');
        }
    });
});
</script>
<?php endif; ?> 