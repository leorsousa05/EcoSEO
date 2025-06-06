<?php
$year = date('Y');
$siteConfig = require __DIR__ . '/../../config/site.php';
$companyName = $companyName ?? $siteConfig['name'];
$footerLinks = $footerLinks ?? [
    [
        'title' => 'Links Úteis',
        'links' => [
            ['text' => 'Sobre', 'href' => '/sobre'],
            ['text' => 'Contato', 'href' => '/contato'],
            ['text' => 'Blog', 'href' => '/blog'],
            ['text' => 'Mapa do Site', 'href' => '/mapa-site'],
        ]
    ],
    [
        'title' => 'Legal',
        'links' => [
            ['text' => 'Termos de Uso', 'href' => '/termos'],
            ['text' => 'Privacidade', 'href' => '/privacidade'],
        ]
    ]
];
$menuItems = $menuItems ?? [];
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<footer class="bg-gradient-to-b from-gray-900 to-gray-950 text-white py-16 relative overflow-hidden"<?= $attrs ?>>
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container mx-auto px-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <span class="iconify w-8 h-8 text-primary" data-icon="mdi:office-building"></span>
                    <h3 class="text-2xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent"><?= $this->e($companyName) ?></h3>
                </div>
                <p class="text-gray-400 leading-relaxed"><?= $siteConfig['description'] ?></p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-110">
                        <span class="iconify w-5 h-5" data-icon="mdi:facebook"></span>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-110">
                        <span class="iconify w-5 h-5" data-icon="mdi:instagram"></span>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-110">
                        <span class="iconify w-5 h-5" data-icon="mdi:linkedin"></span>
                    </a>
                </div>
            </div>

            <?php foreach ($footerLinks as $section): ?>
                <div class="space-y-6">
                    <h4 class="text-xl font-semibold text-white flex items-center space-x-2">
                        <span class="iconify w-5 h-5 text-primary" data-icon="mdi:link-variant"></span>
                        <span><?= $this->e($section['title']) ?></span>
                    </h4>
                    <ul class="space-y-3">
                        <?php foreach ($section['links'] as $link): ?>
                            <li>
                                <a href="<?= $this->e($link['href']) ?>" 
                                   class="text-gray-400 hover:text-primary transition-all duration-300 flex items-center space-x-2 group">
                                    <span class="iconify w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" data-icon="mdi:chevron-right"></span>
                                    <span><?= $this->e($link['text']) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>

            <div class="space-y-6">
                <h4 class="text-xl font-semibold text-white flex items-center space-x-2">
                    <span class="iconify w-5 h-5 text-primary" data-icon="mdi:map-marker"></span>
                    <span>Contato</span>
                </h4>
                <div class="space-y-4">
                    <p class="text-gray-400 leading-relaxed flex items-start space-x-3">
                        <span class="iconify w-5 h-5 text-primary mt-1" data-icon="mdi:office-building"></span>
                        <span>
                            <?= $siteConfig['address']['street'] ?><br>
                            <?= $siteConfig['address']['city'] ?>, <?= $siteConfig['address']['state'] ?><br>
                            CEP: <?= $siteConfig['address']['zip'] ?>
                        </span>
                    </p>
                    <a href="mailto:<?= $siteConfig['email']['primary'] ?>" 
                       class="text-gray-400 hover:text-primary transition-all duration-300 flex items-center space-x-2 group">
                        <span class="iconify w-5 h-5 text-primary" data-icon="mdi:email"></span>
                        <span><?= $siteConfig['email']['primary'] ?></span>
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-t border-gray-800 my-12">
        
        <div class="flex justify-center items-center">
            <div class="flex items-center space-x-2 text-gray-400">
                <span class="iconify w-5 h-5" data-icon="mdi:copyright"></span>
                <p>&copy; <?= $year ?> <?= $this->e($companyName) ?>. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer> 