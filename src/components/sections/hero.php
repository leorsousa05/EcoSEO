<?php
$title = $title ?? 'EcoSEO: Template SEO Otimizado';
$subtitle = $subtitle ?? 'Desenvolvido para Performance e Acessibilidade';
$description = $description ?? 'Um template moderno e otimizado para SEO, criado para desenvolvedores e empresas que buscam excelência em performance e acessibilidade.';
$features = $features ?? [
    [
        'icon' => 'heroicons:bolt',
        'text' => 'Performance otimizada com Core Web Vitals'
    ],
    [
        'icon' => 'heroicons:device-phone-mobile',
        'text' => 'Design responsivo para todos os dispositivos'
    ],
    [
        'icon' => 'heroicons:shield-check',
        'text' => 'WCAG 2.1 AA compliant'
    ]
];
$buttons = $buttons ?? [
    [
        'text' => 'Começar Agora',
        'icon' => 'heroicons:arrow-right',
        'href' => '#features',
        'style' => 'solid'
    ],
    [
        'text' => 'Ver Documentação',
        'icon' => 'heroicons:book-open',
        'href' => '#docs',
        'style' => 'outline'
    ]
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<?= $this->insert('components/common/alert', [
    'type' => 'info',
    'message' => 'Este é um alerta de informação',
    'attributes' => [
        'class' => 'mb-4'
    ]
]) ?>

<section id="hero" class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900"<?= $attrs ?>>
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/4 w-48 h-48 bg-primary opacity-10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute bottom-0 right-1/3 w-64 h-64 bg-secondary opacity-10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <?= $this->insert('components/common/badge', [
                        'text' => 'Versão 1.0.0 Disponível',
                        'color' => 'primary',
                        'size' => 'md',
                        'icon' => 'heroicons:sparkles'
                    ]) ?>

                    <div class="space-y-4">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tight">
                            <?= $title ?>
                        </h1>
                        <h2 class="text-2xl md:text-3xl font-semibold text-primary">
                            <?= $subtitle ?>
                        </h2>
                    </div>

                    <p class="text-xl text-gray-300 leading-relaxed max-w-2xl">
                        <?= $description ?>
                    </p>

                    <ul class="space-y-4">
                        <?php foreach ($features as $feature): ?>
                            <li class="flex items-center space-x-3 text-gray-300 group">
                                <span class="iconify w-6 h-6 text-primary transition-all duration-300 group-hover:scale-110" data-icon="<?= $feature['icon'] ?>"></span>
                                <span class="text-lg"><?= $feature['text'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <?php foreach ($buttons as $button): ?>
                            <?= $this->insert('components/common/button', [
                                'text' => $button['text'],
                                'icon' => $button['icon'] ?? null,
                                'href' => $button['href'],
                                'style' => $button['style'] ?? null,
                                'size' => 'lg',
                                'customClass' => 'group'
                            ]) ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="grid grid-cols-3 gap-8 pt-8 border-t border-gray-800">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">99%</div>
                            <div class="text-sm text-gray-400">Performance</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">100%</div>
                            <div class="text-sm text-gray-400">Acessibilidade</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">50+</div>
                            <div class="text-sm text-gray-400">Componentes</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative z-10">
                        <img src="https://placehold.co/600x400/222/fff?text=EcoSEO+Preview"
                             alt="Preview do EcoSEO template"
                             loading="lazy"
                             decoding="async"
                             class="w-full h-auto rounded-2xl shadow-2xl transform transition-all duration-500 hover:scale-105"
                        />
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-full h-full bg-primary opacity-20 rounded-2xl transform rotate-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0, 0) scale(1); }
}
.animate-blob {
    animation: blob 7s infinite;
}
.animation-delay-2000 {
    animation-delay: 2s;
}
</style> 