<?php
$siteConfig = require __DIR__ . '/../../config/site.php';
$logo = $logo ?? [
    'text' => 'Logo',
    'href' => '/'
];
$menuItems = $menuItems ?? [
    [
        'text' => 'Início',
        'href' => '/',
        'active' => $_SERVER['REQUEST_URI'] === '/'
    ],
    [
        'text' => 'Sobre',
        'href' => '/sobre',
        'active' => $_SERVER['REQUEST_URI'] === '/sobre'
    ],
    [
        'text' => 'Serviços',
        'href' => '/servicos',
        'active' => $_SERVER['REQUEST_URI'] === '/servicos'
    ],
    [
        'text' => 'Blog',
        'href' => '/blog',
        'active' => $_SERVER['REQUEST_URI'] === '/blog'
    ]
];
$ctaButton = $ctaButton ?? [
    'text' => 'Fale Conosco',
    'href' => '/contato',
    'style' => 'solid',
    'size' => 'md'
];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<header class="h-[80px] fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-200"<?= $attrs ?>>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <a href="/" class="flex items-center space-x-2 group">
                    <span class="iconify w-8 h-8 text-primary transition-transform duration-300 group-hover:scale-110" data-icon="heroicons:chart-bar"></span>
                    <span class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                        <?= $siteConfig['site_name'] ?? "EcoSEO" ?>
                    </span>
                </a>
            </div>

            <nav class="hidden lg:flex items-center space-x-8">
                <?php foreach ($menuItems as $item): ?>
                    <a href="<?= htmlspecialchars($item['href']) ?>" 
                       class="relative text-gray-600 hover:text-gray-900 transition-colors duration-200 py-2 group">
                        <?= htmlspecialchars($item['text']) ?>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                        <?php if ($item['active']): ?>
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="hidden lg:flex items-center space-x-4">
                <?= $this->insert('components/common/button', [
                    'text' => $ctaButton['text'],
                    'icon' => 'heroicons:arrow-right',
                    'href' => $ctaButton['href'],
                    'style' => $ctaButton['style'],
                    'size' => $ctaButton['size'],
                    'customClass' => 'group'
                ]) ?>
            </div>

            <div class="lg:hidden">
                <button class="text-gray-600 hover:text-gray-900 focus:outline-none transition-colors duration-200" 
                        aria-label="Menu"
                        x-data="{ open: false }"
                        @click="open = !open">
                    <span class="iconify w-6 h-6" data-icon="heroicons:bars-3"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden" x-show="open" x-transition>
            <nav class="py-4 space-y-4">
                <?php foreach ($menuItems as $item): ?>
                    <a href="<?= htmlspecialchars($item['href']) ?>" 
                       class="block text-gray-600 hover:text-gray-900 transition-colors duration-200 py-2">
                        <?= htmlspecialchars($item['text']) ?>
                    </a>
                <?php endforeach; ?>
                <div class="pt-4">
                    <?= $this->insert('components/common/button', [
                        'text' => $ctaButton['text'],
                        'icon' => 'heroicons:arrow-right',
                        'href' => $ctaButton['href'],
                        'style' => $ctaButton['style'],
                        'size' => $ctaButton['size'],
                        'customClass' => 'w-full justify-center group'
                    ]) ?>
                </div>
            </nav>
        </div>
    </div>
</header>
