<?php
$background = $background ?? 'gradient';
$layout = $layout ?? 'centered';
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}

$bgClass = $background === 'gradient' 
    ? 'bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900' 
    : 'bg-gray-50';
?>

<section class="py-24 <?= $bgClass ?> relative overflow-hidden"<?= $attrs ?>>
    <?php if ($background === 'gradient'): ?>
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/4 w-48 h-48 bg-primary opacity-10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute bottom-0 right-1/3 w-64 h-64 bg-secondary opacity-10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        </div>
    <?php else: ?>
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <?php endif; ?>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <?php if ($layout === 'centered'): ?>
            <div class="max-w-4xl mx-auto text-center">
                <?= $this->insert('components/common/badge', [
                    'text' => 'Comece Agora',
                    'color' => 'primary',
                    'size' => 'md',
                    'icon' => 'heroicons:sparkles',
                ]) ?>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 <?= $background === 'gradient' ? 'text-white' : 'text-gray-900' ?> tracking-tight">
                    <?= $title ?>
                </h2>
                <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                    <?= $subtitle ?>
                </h3>
                <p class="text-xl <?= $background === 'gradient' ? 'text-gray-300' : 'text-gray-600' ?> leading-relaxed max-w-3xl mx-auto mb-12">
                    <?= $description ?>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <?php foreach ($buttons as $button): ?>
                        <?= $this->insert('components/common/button', [
                            'text' => $button['text'],
                            'icon' => $button['icon'] ?? null,
                            'href' => $button['href'],
                            'style' => $button['style'] ?? 'solid',
                            'color' => $button['color'] ?? 'primary',
                            'size' => 'lg',
                            'customClass' => 'group',
                        ]) ?>
                    <?php endforeach; ?>
                </div>

                <div class="mt-12 grid grid-cols-3 gap-8 max-w-2xl mx-auto">
                    <div class="text-center">
                        <div class="text-3xl font-bold <?= $background === 'gradient' ? 'text-white' : 'text-gray-900' ?>">30 dias</div>
                        <div class="text-sm <?= $background === 'gradient' ? 'text-gray-400' : 'text-gray-600' ?>">Teste grátis</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold <?= $background === 'gradient' ? 'text-white' : 'text-gray-900' ?>">0%</div>
                        <div class="text-sm <?= $background === 'gradient' ? 'text-gray-400' : 'text-gray-600' ?>">Configuração</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold <?= $background === 'gradient' ? 'text-white' : 'text-gray-900' ?>">24/7</div>
                        <div class="text-sm <?= $background === 'gradient' ? 'text-gray-400' : 'text-gray-600' ?>">Suporte</div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <?= $this->insert('components/common/badge', [
                        'text' => 'Ação',
                        'color' => 'primary',
                        'size' => 'md',
                        'icon' => 'heroicons:sparkles',
                    ]) ?>
                    
                    <div class="space-y-4">
                        <h2 class="text-4xl md:text-5xl font-bold <?= $background === 'gradient' ? 'text-white' : 'text-gray-900' ?> tracking-tight">
                            <?= $title ?>
                        </h2>
                        <h3 class="text-2xl md:text-3xl font-semibold text-primary">
                            <?= $subtitle ?>
                        </h3>
                    </div>

                    <p class="text-xl <?= $background === 'gradient' ? 'text-gray-300' : 'text-gray-600' ?> leading-relaxed">
                        <?= $description ?>
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <?php foreach ($buttons as $button): ?>
                            <?= $this->insert('components/common/button', [
                                'text' => $button['text'],
                                'icon' => $button['icon'] ?? null,
                                'href' => $button['href'],
                                'style' => $button['style'] ?? 'solid',
                                'color' => $button['color'] ?? 'primary',
                                'size' => 'lg',
                                'customClass' => 'group',
                            ]) ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="flex items-center space-x-6 pt-8">
                        <div class="flex items-center space-x-2">
                            <span class="iconify w-5 h-5 text-success" data-icon="heroicons:check-circle"></span>
                            <span class="text-sm <?= $background === 'gradient' ? 'text-gray-300' : 'text-gray-600' ?>">Sem cartão de crédito</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="iconify w-5 h-5 text-success" data-icon="heroicons:check-circle"></span>
                            <span class="text-sm <?= $background === 'gradient' ? 'text-gray-300' : 'text-gray-600' ?>">Cancelamento gratuito</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative z-10">
                        <img src="https://placehold.co/600x400/222/fff?text=CTA+Preview"
                             alt="Preview da solução"
                             loading="lazy"
                             decoding="async"
                             class="w-full h-auto rounded-2xl shadow-2xl transform transition-all duration-500 hover:scale-105"
                        />
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-full h-full bg-primary opacity-20 rounded-2xl transform rotate-3"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> 