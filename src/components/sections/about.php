<?php
$title = $title ?? 'Sobre o EcoSEO';
$description = $description ?? 'Um template moderno e otimizado para SEO, criado para desenvolvedores e empresas que buscam excelência em performance e acessibilidade.';
$features = $features ?? [
    [
        'icon' => 'heroicons:rocket-launch',
        'title' => 'Performance Otimizada',
        'text' => 'Estrutura limpa e eficiente, com foco em velocidade de carregamento e SEO. Pontuação máxima em Core Web Vitals.',
        'list' => [
            'Lazy loading inteligente',
            'Otimização de imagens',
            'Minificação automática'
        ]
    ],
    [
        'icon' => 'heroicons:sparkles',
        'title' => 'Design Responsivo',
        'text' => 'Interface adaptativa que funciona perfeitamente em qualquer dispositivo, desde smartphones até monitores ultrawide.',
        'list' => [
            'Layout fluido',
            'Breakpoints customizados',
            'Mobile-first approach'
        ]
    ],
    [
        'icon' => 'heroicons:shield-check',
        'title' => 'Acessibilidade',
        'text' => 'Desenvolvido seguindo as diretrizes WCAG 2.1, garantindo que seu conteúdo seja acessível para todos os usuários.',
        'list' => [
            'ARIA landmarks',
            'Contraste adequado',
            'Navegação por teclado'
        ]
    ]
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="relative py-24 bg-gradient-to-b from-gray-900 to-gray-800 overflow-hidden"<?= $attrs ?>>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-primary rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute -bottom-8 right-1/4 w-64 h-64 bg-secondary rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
    </div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white tracking-tight">
                <?= $title ?>
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                <?= $description ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <?php foreach ($features as $feature): ?>
                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl transition-all duration-300 hover:transform hover:scale-102 hover:bg-opacity-15 group">
                    <div class="flex items-center space-x-4 mb-6">
                        <span class="iconify w-8 h-8 text-primary transition-colors duration-300 group-hover:text-black" data-icon="<?= $feature['icon'] ?>"></span>
                        <h3 class="text-2xl font-semibold text-black"><?= $feature['title'] ?></h3>
                    </div>
                    
                    <p class="text-gray-800 mb-6 leading-relaxed">
                        <?= $feature['text'] ?>
                    </p>

                    <ul class="space-y-3">
                        <?php foreach ($feature['list'] as $item): ?>
                            <li class="flex items-center space-x-3 text-gray-800 group/item">
                                <span class="iconify w-5 h-5 text-primary transition-all duration-300 group-hover/item:text-black group-hover/item:scale-110" data-icon="heroicons:check-circle"></span>
                                <span class="transition-colors duration-300 group-hover/item:text-black"><?= $item ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <?= $this->insert('components/common/button', [
                'text' => 'Explorar Funcionalidades',
                'icon' => 'heroicons:arrow-right',
                'href' => '#features',
                'style' => 'outline',
                'size' => 'lg',
                'customClass' => 'group'
            ]) ?>
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
