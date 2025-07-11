<?php
$service = $service ?? [];
$customClass = $customClass ?? '';
$attributes = $attributes ?? [];

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}

if (empty($service)) {
    return;
}
?>

<section class="py-20 bg-white <?= $customClass ?>"<?= $attrs ?>>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        O que está incluído
                    </h2>
                    <div class="space-y-4">
                        <?php foreach ($service['features'] as $feature): ?>
                            <div class="flex items-start space-x-3">
                                <span class="iconify w-6 h-6 text-success mt-1" data-icon="heroicons:check-circle"></span>
                                <span class="text-gray-700"><?= $feature ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        Resultados esperados
                    </h2>
                    <div class="space-y-4">
                        <?php foreach ($service['benefits'] as $benefit): ?>
                            <div class="flex items-start space-x-3">
                                <span class="iconify w-6 h-6 text-primary mt-1" data-icon="heroicons:chart-bar"></span>
                                <span class="text-gray-700"><?= $benefit ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 