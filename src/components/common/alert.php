<?php
$type = $type ?? 'info';
$message = $message ?? 'This is an alert message.';
$attributes = $attributes ?? [];

$attrString = '';
if (is_array($attributes)) {
    foreach ($attributes as $key => $value) {
        $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
    }
}

$alertClasses = [
    'success' => 'bg-green-100 border-green-500 text-green-800',
    'error' => 'bg-red-100 border-red-500 text-red-800',
    'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-800',
    'info' => 'bg-blue-100 border-blue-500 text-blue-800',
];

$classes = 'fixed bottom-4 right-4 z-50 p-4 rounded-lg border-l-4 shadow-lg opacity-0 transition-opacity duration-300 ease-in ' . ($alertClasses[$type] ?? $alertClasses['info']) . ' text-[var(--color-secondary)]';
?>

<div id="alert-<?php echo uniqid(); ?>" class="<?= $classes ?>"<?= $attrString ?> style="display: none;">
    <div class="flex justify-between items-start">
        <span><?= htmlspecialchars($message) ?></span>
        <button onclick="this.parentElement.parentElement.style.display = 'none';" class="ml-4 text-[var(--color-secondary)] hover:text-black">
            &times;  <!-- Close icon -->
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertId = 'alert-<?php echo uniqid(); ?>';
        const alertElement = document.getElementById(alertId);
        if (alertElement) {
            alertElement.style.display = 'block';  
            setTimeout(() => {
                alertElement.classList.remove('opacity-0');
                alertElement.classList.add('opacity-100');
            }, 100);  
            setTimeout(() => {
                alertElement.classList.remove('opacity-100');
                alertElement.classList.add('opacity-0');
                setTimeout(() => {
                    alertElement.style.display = 'none';
                }, 300);  
            }, 5000);
        }
    });
</script> 