<?php
$layout = $layout ?? 'grid';
$background = $background ?? 'light';
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
                'text' => 'Funcionalidades',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:sparkles',
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

        <?php if ($layout === 'grid'): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($features as $feature): ?>
                    <div class="bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 group">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-12 h-12 bg-<?= $feature['color'] ?>-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-<?= $feature['color'] ?>">
                                <span class="iconify w-6 h-6 text-<?= $feature['color'] ?> group-hover:text-white transition-colors duration-300" data-icon="<?= $feature['icon'] ?>"></span>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold text-gray-900"><?= $feature['title'] ?></h4>
                                <p class="text-sm text-<?= $feature['color'] ?> font-medium"><?= $feature['stats'] ?></p>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed mb-6">
                            <?= $feature['description'] ?>
                        </p>
                        
                        <?php if (!empty($feature['button'])): ?>
                            <?= $this->insert('components/common/button', [
                                'text' => $feature['button']['text'],
                                'icon' => $feature['button']['icon'] ?? 'heroicons:arrow-right',
                                'href' => $feature['button']['href'],
                                'style' => $feature['button']['style'] ?? 'outline',
                                'size' => $feature['button']['size'] ?? 'sm',
                                'customClass' => 'w-full justify-center group',
                            ]) ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="space-y-8">
                <?php foreach ($features as $index => $feature): ?>
                    <div class="bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300 hover:shadow-xl group">
                        <div class="flex items-center space-x-6">
                            <div class="w-16 h-16 bg-<?= $feature['color'] ?>-light rounded-2xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-<?= $feature['color'] ?>">
                                <span class="iconify w-8 h-8 text-<?= $feature['color'] ?> group-hover:text-white transition-colors duration-300" data-icon="<?= $feature['icon'] ?>"></span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="text-2xl font-semibold text-gray-900"><?= $feature['title'] ?></h4>
                                    <span class="text-sm text-<?= $feature['color'] ?> font-medium bg-<?= $feature['color'] ?>-light px-3 py-1 rounded-full">
                                        <?= $feature['stats'] ?>
                                    </span>
                                </div>
                                <p class="text-gray-600 leading-relaxed text-lg mb-4">
                                    <?= $feature['description'] ?>
                                </p>
                                
                                <?php if (!empty($feature['button'])): ?>
                                    <?= $this->insert('components/common/button', [
                                        'text' => $feature['button']['text'],
                                        'icon' => $feature['button']['icon'] ?? 'heroicons:arrow-right',
                                        'href' => $feature['button']['href'],
                                        'style' => $feature['button']['style'] ?? 'outline',
                                        'size' => $feature['button']['size'] ?? 'sm',
                                        'customClass' => 'group',
                                    ]) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="text-center mt-16">
            <?= $this->insert('components/common/button', [
                'text' => 'Ver Todas as Funcionalidades',
                'icon' => 'heroicons:arrow-right',
                'href' => '#features',
                'style' => 'outline',
                'size' => 'lg',
                'customClass' => 'group',
            ]) ?>
        </div>
    </div>
</section> 