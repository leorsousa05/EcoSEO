<?php
$siteConfig = require __DIR__ . '/../../config/site.php';
$servicesConfig = require __DIR__ . '/../../config/services.php';
$currentUri = $_SERVER['REQUEST_URI'];
$currentPage = '';

if ($currentUri === '/') {
    $currentPage = 'home';
} elseif (strpos($currentUri, '/sobre') === 0) {
    $currentPage = 'about';
} elseif (strpos($currentUri, '/servicos') === 0) {
    $currentPage = 'services';
} elseif (strpos($currentUri, '/recursos') === 0) {
    $currentPage = 'features';
} elseif (strpos($currentUri, '/contato') === 0) {
    $currentPage = 'contact';
}

$logo = [
    'href' => '/',
    'text' => $siteConfig['name'],
];

$menuItems = [
    [
        'text' => 'Início',
        'href' => '/',
        'active' => $currentPage === 'home',
    ],
    [
        'text' => 'Sobre',
        'href' => '/sobre',
        'active' => $currentPage === 'about',
    ],
    [
        'text' => 'Serviços',
        'href' => '/servicos',
        'active' => $currentPage === 'services',
        'submenu' => array_map(function($service) use ($currentUri) {
            return [
                'text' => $service['name'],
                'href' => '/' . $service['id'],
                'active' => $currentUri === '/' . $service['id'],
            ];
        }, $servicesConfig['services']),
    ],
    [
        'text' => 'Recursos',
        'href' => '/recursos',
        'active' => $currentPage === 'features',
    ],
    [
        'text' => 'Contato',
        'href' => '/contato',
        'active' => $currentPage === 'contact',
    ],
];

$ctaButton = [
    'text' => 'Começar Agora',
    'href' => '/contato',
    'style' => 'primary',
    'size' => 'md',
];
?>

<header class="fixed flex justify-center top-0 left-0 right-0 z-50 h-20 p-4 bg-white border-b border-gray-200 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-full">
            <a href="<?= htmlspecialchars($logo['href']) ?>" class="flex items-center space-x-3 group">
                <span class="iconify w-8 h-8 text-primary group-hover:scale-110 transition-transform duration-300" 
                    data-icon="heroicons:chart-bar" aria-hidden="true"></span>
                <span class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300">
                    <?= htmlspecialchars($logo['text']) ?>
                </span>
            </a>

            <nav class="hidden lg:flex items-center space-x-8" role="navigation" aria-label="Menu principal">
                <?php foreach ($menuItems as $item): ?>
                    <?php if (empty($item['submenu'])): ?>
                        <a href="<?= htmlspecialchars($item['href']) ?>"
                            class="text-gray-700 hover:text-primary font-medium transition-colors duration-300 <?= ($item['active'] ?? false) ? 'text-primary' : '' ?>"
                            <?= ($item['active'] ?? false) ? 'aria-current="page"' : '' ?>>
                            <?= htmlspecialchars($item['text']) ?>
                        </a>
                    <?php else: ?>
                        <div class="relative group">
                            <button class="flex items-center space-x-1 text-gray-700 hover:text-primary font-medium transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 rounded-lg px-2 py-1"
                                aria-expanded="false" aria-haspopup="true">
                                <span><?= htmlspecialchars($item['text']) ?></span>
                                <span class="iconify w-4 h-4 transition-transform duration-300 group-hover:rotate-180" 
                                    data-icon="heroicons:chevron-down" aria-hidden="true"></span>
                            </button>
                            <div class="absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    <?php foreach ($item['submenu'] as $subitem): ?>
                                        <a href="<?= htmlspecialchars($subitem['href']) ?>"
                                            class="block px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 transition-colors duration-200 <?= ($subitem['active'] ?? false) ? 'text-primary bg-primary-light' : '' ?>"
                                            <?= ($subitem['active'] ?? false) ? 'aria-current="page"' : '' ?>>
                                            <?= htmlspecialchars($subitem['text']) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <div class="hidden lg:block">
                <?= $this->insert('components/common/button', [
                    'text' => $ctaButton['text'],
                    'icon' => 'heroicons:arrow-right',
                    'href' => $ctaButton['href'],
                    'style' => $ctaButton['style'],
                    'size' => $ctaButton['size'],
                    'customClass' => 'group shadow-md hover:shadow-lg transition-shadow duration-300',
                ]) ?>
            </div>

            <button
                class="lg:hidden relative w-11 h-11 flex items-center justify-center text-gray-700 hover:text-gray-900 rounded-xl hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-300"
                aria-label="Abrir menu" aria-expanded="false" aria-controls="mobile-menu" data-menu-button>
                <span class="sr-only">Abrir menu</span>
                <div class="relative w-6 h-6">
                    <span class="absolute left-0 top-1 w-6 h-0.5 bg-current rounded transition-all duration-300 transform origin-center"></span>
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-6 h-0.5 bg-current rounded transition-all duration-300 transform origin-center"></span>
                    <span class="absolute left-0 bottom-1 w-6 h-0.5 bg-current rounded transition-all duration-300 transform origin-center"></span>
                </div>
            </button>
        </div>
    </div>

    <div class="lg:hidden fixed inset-0 z-40 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300" 
        id="mobile-overlay" data-overlay></div>

    <nav class="lg:hidden fixed inset-y-0 right-0 z-50 w-[88%] max-w-sm bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-out"
        id="mobile-menu" data-mobile-menu role="navigation" aria-label="Menu mobile">
        <div class="h-20 px-6 flex items-center justify-between border-b border-gray-200">
            <a href="<?= htmlspecialchars($logo['href']) ?>" class="flex items-center space-x-3">
                <span class="iconify w-7 h-7 text-primary" data-icon="heroicons:chart-bar" aria-hidden="true"></span>
                <span class="text-xl font-semibold text-gray-900"><?= htmlspecialchars($logo['text']) ?></span>
            </a>
            <button
                class="p-2 rounded-lg text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-200"
                aria-label="Fechar menu" data-close-menu>
                <span class="iconify w-6 h-6" data-icon="heroicons:x-mark"></span>
            </button>
        </div>

        <div class="h-[calc(100vh-5rem)] overflow-y-auto px-6 py-6">
            <?php foreach ($menuItems as $index => $item): ?>
                <div class="mb-4">
                    <?php if (empty($item['submenu'])): ?>
                        <a href="<?= htmlspecialchars($item['href']) ?>"
                            class="block text-lg text-gray-800 hover:text-primary font-medium transition-colors duration-200 <?= ($item['active'] ?? false) ? 'text-primary' : '' ?>"
                            <?= ($item['active'] ?? false) ? 'aria-current="page"' : '' ?>>
                            <?= htmlspecialchars($item['text']) ?>
                        </a>
                    <?php else: ?>
                        <div class="space-y-2">
                            <button
                                class="w-full flex items-center justify-between text-lg text-gray-800 hover:text-primary font-medium transition-colors duration-200 focus:outline-none"
                                data-submenu-toggle="<?= $index ?>"
                                aria-expanded="false" aria-controls="submenu-<?= $index ?>">
                                <span><?= htmlspecialchars($item['text']) ?></span>
                                <span class="iconify w-5 h-5 transition-transform duration-300" 
                                    data-icon="heroicons:chevron-down"></span>
                            </button>
                            <div id="submenu-<?= $index ?>"
                                class="submenu max-h-0 overflow-hidden transition-all duration-300 ease-out"
                                data-submenu="<?= $index ?>">
                                <div class="pl-4 space-y-2 border-l-2 border-gray-200">
                                    <?php foreach ($item['submenu'] as $subitem): ?>
                                        <a href="<?= htmlspecialchars($subitem['href']) ?>"
                                            class="block text-base text-gray-600 hover:text-primary transition-colors duration-200 <?= ($subitem['active'] ?? false) ? 'text-primary font-medium' : '' ?>"
                                            <?= ($subitem['active'] ?? false) ? 'aria-current="page"' : '' ?>>
                                            <?= htmlspecialchars($subitem['text']) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <div class="pt-6 mt-6 border-t border-gray-200">
                <?= $this->insert('components/common/button', [
                    'text' => $ctaButton['text'],
                    'icon' => 'heroicons:arrow-right',
                    'href' => $ctaButton['href'],
                    'style' => $ctaButton['style'],
                    'size' => $ctaButton['size'],
                    'customClass' => 'w-full justify-center',
                ]) ?>
            </div>
        </div>
    </nav>
</header>

<?= $this->insert('components/common/privacy-popup') ?>