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

<section class="py-20 bg-gray-50 <?= $customClass ?>"<?= $attrs ?>>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="w-16 h-16 bg-primary-light rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="iconify w-8 h-8 text-primary" data-icon="heroicons:currency-dollar"></span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Investimento</h3>
                        <p class="text-gray-600"><?= $service['price'] ?></p>
                    </div>
                    
                    <div>
                        <div class="w-16 h-16 bg-success-light rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="iconify w-8 h-8 text-success" data-icon="heroicons:clock"></span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Prazo</h3>
                        <p class="text-gray-600"><?= $service['duration'] ?></p>
                    </div>
                    
                    <div>
                        <div class="w-16 h-16 bg-warning-light rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="iconify w-8 h-8 text-warning" data-icon="heroicons:star"></span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Qualidade</h3>
                        <p class="text-gray-600">Garantia de resultados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 