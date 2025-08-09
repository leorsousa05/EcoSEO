<?php
$layout = $layout ?? 'grid';
$background = $background ?? 'dark';
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}

$bgClass = $background === 'dark' 
    ? 'bg-gradient-to-b from-gray-900 to-gray-800' 
    : 'bg-gradient-to-b from-gray-50 to-white';
$textClass = $background === 'dark' ? 'text-white' : 'text-gray-900';
$textMutedClass = $background === 'dark' ? 'text-gray-300' : 'text-gray-600';
?>

<section class="py-24 <?= $bgClass ?> relative overflow-hidden"<?= $attrs ?>>
    <?php if ($background === 'dark'): ?>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-1/4 w-64 h-64 bg-primary rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute -bottom-8 right-1/4 w-64 h-64 bg-secondary rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        </div>
    <?php else: ?>
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <?php endif; ?>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <?= $this->insert('components/common/badge', [
                'text' => 'Estatísticas',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:chart-bar',
            ]) ?>
            
            <h2 class="text-4xl md:text-5xl font-bold mb-6 <?= $textClass ?> tracking-tight">
                <?= $title ?>
            </h2>
            <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                <?= $subtitle ?>
            </h3>
            <p class="text-xl <?= $textMutedClass ?> leading-relaxed">
                <?= $description ?>
            </p>
        </div>

        <?php if ($layout === 'grid'): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-<?= count($stats) <= 3 ? '3' : (count($stats) <= 4 ? '4' : '6') ?> gap-8 max-w-<?= count($stats) <= 3 ? '4xl' : '7xl' ?> mx-auto">
                <?php foreach ($stats as $stat): ?>
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-<?= $stat['color'] ?>-light rounded-2xl flex items-center justify-center mx-auto mb-4 transform transition-all duration-300 group-hover:scale-110 group-hover:bg-<?= $stat['color'] ?>">
                            <span class="iconify w-8 h-8 text-<?= $stat['color'] ?> group-hover:text-white transition-colors duration-300" data-icon="<?= $stat['icon'] ?>"></span>
                        </div>
                        <div class="text-3xl font-bold <?= $textClass ?> mb-2"><?= $stat['number'] ?></div>
                        <div class="text-sm font-medium text-<?= $stat['color'] ?> mb-1"><?= $stat['label'] ?></div>
                        <div class="text-xs <?= $textMutedClass ?>"><?= $stat['description'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($stats as $stat): ?>
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:bg-opacity-15 hover:-translate-y-2 group">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-12 h-12 bg-<?= $stat['color'] ?>-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-<?= $stat['color'] ?>">
                                <span class="iconify w-6 h-6 text-<?= $stat['color'] ?> group-hover:text-white transition-colors duration-300" data-icon="<?= $stat['icon'] ?>"></span>
                            </div>
                            <div class="flex-1">
                                <div class="text-3xl font-bold <?= $textClass ?>"><?= $stat['number'] ?></div>
                                <div class="text-lg font-semibold text-<?= $stat['color'] ?>"><?= $stat['label'] ?></div>
                            </div>
                        </div>
                        <p class="<?= $textMutedClass ?> leading-relaxed">
                            <?= $stat['description'] ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="text-center mt-16">
            <div class="inline-flex items-center space-x-2 <?= $textMutedClass ?> mb-6">
                <span class="iconify w-5 h-5" data-icon="heroicons:information-circle"></span>
                <p>Dados atualizados em tempo real • Última atualização: <?= date('d/m/Y H:i') ?></p>
            </div>
            <div class="flex justify-center space-x-4">
                <?= $this->insert('components/common/button', [
                    'text' => 'Ver Relatório Completo',
                    'icon' => 'heroicons:document-chart-bar',
                    'href' => '#stats-report',
                    'variant' => 'outline',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
                <?= $this->insert('components/common/button', [
                    'text' => 'Seja Parte dos Números',
                    'icon' => 'heroicons:arrow-right',
                    'href' => '/signup',
                    'variant' => 'primary',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
            </div>
        </div>
    </div>
</section> 