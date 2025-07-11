<?php
$siteConfig = require __DIR__ . '/../../config/site.php';
$servicesConfig = require __DIR__ . '/../../config/services.php';

$currentUri = $_SERVER['REQUEST_URI'];
$serviceSubmenu = [];
$isServicePage = false;

foreach ($servicesConfig['services'] as $service) {
    $serviceUrl = '/' . $service['id'];
    if ($currentUri === $serviceUrl) {
        $isServicePage = true;
    }
    $serviceSubmenu[] = [
        'text' => $service['name'],
        'href' => $serviceUrl,
        'active' => $currentUri === $serviceUrl,
    ];
}

$logo = $logo ?? [
    'text' => 'Logo',
    'href' => '/',
];
$menuItems = $menuItems ?? [
    [
        'text' => 'Início',
        'href' => '/',
        'active' => $currentUri === '/',
    ],
    [
        'text' => 'Sobre',
        'href' => '/sobre',
        'active' => $currentUri === '/sobre',
    ],
    [
        'text' => 'Serviços',
        'href' => '/servicos',
        'active' => $currentUri === '/servicos' || $isServicePage,
        'submenu' => $serviceSubmenu,
    ],
    [
        'text' => 'Blog',
        'href' => '/blog',
        'active' => $currentUri === '/blog',
    ],
];
$ctaButton = $ctaButton ?? [
    'text' => 'Fale Conosco',
    'href' => '/contato',
    'style' => 'solid',
    'size' => 'md',
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
                        <?= $siteConfig['name'] ?? "EcoSEO" ?>
                    </span>
                </a>
            </div>

            <nav class="hidden lg:flex items-center space-x-8">
                <?php foreach ($menuItems as $item): ?>
                    <div class="relative group submenu-hover">
                        <a href="<?= htmlspecialchars($item['href']) ?>" 
                           class="relative text-gray-600 hover:text-gray-900 transition-colors duration-200 py-2 flex items-center group">
                            <?= htmlspecialchars($item['text']) ?>
                            <?php if (! empty($item['submenu'])): ?>
                                <span class="iconify ml-1 w-4 h-4 text-gray-500 group-hover:text-gray-900 transition-transform duration-300 transform group-hover:rotate-180" data-icon="heroicons:chevron-down"></span>
                            <?php endif; ?>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                            <?php if ($item['active'] ?? false): ?>
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                            <?php endif; ?>
                        </a>
                        
                        <?php if (! empty($item['submenu'])): ?>
                            <div class="absolute top-full left-0 w-full h-2 bg-transparent"></div>
                            <div class="submenu-dropdown absolute opacity-0 invisible transition-all duration-200 top-full left-0 min-w-[200px] bg-white shadow-lg rounded-md mt-2 py-2 z-50 border border-gray-100">
                                <?php foreach ($item['submenu'] as $subitem): ?>
                                    <a href="<?= htmlspecialchars($subitem['href']) ?>" 
                                       class="block px-4 py-2 transition-colors duration-150 flex items-center <?= ($subitem['active'] ?? false) ? 'bg-primary-light text-primary font-medium' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' ?>">
                                        <?php if ($subitem['active'] ?? false): ?>
                                            <span class="iconify w-4 h-4 mr-2" data-icon="heroicons:check-circle"></span>
                                        <?php endif; ?>
                                        <?= htmlspecialchars($subitem['text']) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </nav>

            <div class="hidden lg:flex items-center space-x-4">
                <?= $this->insert('components/common/button', [
                    'text' => $ctaButton['text'],
                    'icon' => 'heroicons:arrow-right',
                    'href' => $ctaButton['href'],
                    'style' => $ctaButton['style'],
                    'size' => $ctaButton['size'],
                    'customClass' => 'group',
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

        <div class="lg:hidden" x-show="open" x-transition>
            <nav class="py-4 space-y-4">
                <?php foreach ($menuItems as $item): ?>
                    <div x-data="{ submenuOpen: false }">
                        <div class="flex items-center justify-between">
                            <a href="<?= htmlspecialchars($item['href']) ?>" 
                               class="block text-gray-600 hover:text-gray-900 transition-colors duration-200 py-2">
                                <?= htmlspecialchars($item['text']) ?>
                            </a>
                            
                            <?php if (! empty($item['submenu'])): ?>
                                <button @click="submenuOpen = !submenuOpen" 
                                        class="text-gray-600 hover:text-gray-900 transition-transform duration-300"
                                        :class="{ 'rotate-180': submenuOpen }">
                                    <span class="iconify w-5 h-5" data-icon="heroicons:chevron-down"></span>
                                </button>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (! empty($item['submenu'])): ?>
                            <div x-show="submenuOpen" x-transition 
                                 class="pl-4 space-y-2 mt-2">
                                <?php foreach ($item['submenu'] as $subitem): ?>
                                    <a href="<?= htmlspecialchars($subitem['href']) ?>" 
                                       class="block transition-colors duration-200 flex items-center <?= ($subitem['active'] ?? false) ? 'text-primary font-medium' : 'text-gray-500 hover:text-gray-800' ?>">
                                        <?php if ($subitem['active'] ?? false): ?>
                                            <span class="iconify w-4 h-4 mr-2" data-icon="heroicons:check-circle"></span>
                                        <?php endif; ?>
                                        <?= htmlspecialchars($subitem['text']) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                
                <div class="pt-4">
                    <?= $this->insert('components/common/button', [
                        'text' => $ctaButton['text'],
                        'icon' => 'heroicons:arrow-right',
                        'href' => $ctaButton['href'],
                        'style' => $ctaButton['style'],
                        'size' => $ctaButton['size'],
                        'customClass' => 'w-full justify-center group',
                    ]) ?>
                </div>
            </nav>
        </div>
    </div>
</header>

<?= $this->insert('components/common/privacy-popup') ?>
