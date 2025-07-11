<?php
$title = $title ?? 'Serviços Detalhados';
$subtitle = $subtitle ?? 'Cada serviço com foco em resultados';
$description = $description ?? 'Conheça em detalhes cada um dos nossos serviços e como eles podem transformar seu negócio.';
$services = $services ?? [];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden"<?= $attrs ?>>
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <?= $this->insert('components/common/badge', [
                'text' => 'Serviços',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:wrench-screwdriver',
            ]) ?>
            
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 tracking-tight">
                <?= $title ?>
            </h2>
            <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                <?= $subtitle ?>
            </h3>
            <p class="text-xl text-gray-600 leading-relaxed">
                <?= $description ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <?php foreach ($services as $service): ?>
                <div class="bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-16 h-16 bg-<?= $service['color'] ?>-light rounded-2xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-<?= $service['color'] ?>">
                            <span class="iconify w-8 h-8 text-<?= $service['color'] ?> group-hover:text-white transition-colors duration-300" data-icon="<?= $service['icon'] ?>"></span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-2xl font-semibold text-gray-900"><?= $service['name'] ?></h4>
                            <p class="text-<?= $service['color'] ?> font-medium"><?= $service['price'] ?></p>
                        </div>
                        <?php if (isset($service['popular']) && $service['popular']): ?>
                            <div class="flex-shrink-0">
                                <?= $this->insert('components/common/badge', [
                                    'text' => 'Mais Popular',
                                    'color' => $service['color'],
                                    'size' => 'sm',
                                    'icon' => 'heroicons:star',
                                ]) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <p class="text-gray-600 leading-relaxed mb-6">
                        <?= $service['description'] ?>
                    </p>
                    
                    <div class="mb-6">
                        <h5 class="font-semibold text-gray-900 mb-3">O que está incluído:</h5>
                        <ul class="space-y-2">
                            <?php foreach (array_slice($service['features'], 0, 4) as $feature): ?>
                                <li class="flex items-center space-x-3 text-gray-600">
                                    <span class="iconify w-5 h-5 text-success" data-icon="heroicons:check-circle"></span>
                                    <span><?= $feature ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="mb-6">
                        <h5 class="font-semibold text-gray-900 mb-3">Resultados esperados:</h5>
                        <ul class="space-y-2">
                            <?php foreach ($service['benefits'] as $benefit): ?>
                                <li class="flex items-center space-x-3 text-gray-600">
                                    <span class="iconify w-5 h-5 text-warning" data-icon="heroicons:chart-bar"></span>
                                    <span><?= $benefit ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                        <div class="text-sm text-gray-500">
                            <span class="iconify w-4 h-4 inline mr-1" data-icon="heroicons:clock"></span>
                            <?= $service['duration'] ?>
                        </div>
                        <?= $this->insert('components/common/button', [
                            'text' => 'Solicitar Orçamento',
                            'href' => '/contato?service=' . $service['id'],
                            'style' => 'solid',
                            'color' => $service['color'],
                            'size' => 'sm',
                        ]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> 