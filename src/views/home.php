<?php
$siteConfig = require __DIR__ . '/../config/site.php';

$this->layout('/layouts/base', [
    'title' => 'Página Inicial - ' . $siteConfig['name'],
    'description' => $siteConfig['tagline'],
    'keywords' => $siteConfig['seo']['keywords']
]);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $siteConfig['name'],
        'description' => $siteConfig['tagline'],
        'keywords' => $siteConfig['seo']['keywords'],
        'buttons' => [
            [
                'text' => 'Saiba mais',
                'href' => '#',
                'variant' => 'primary'
            ]
        ]
    ]) ?>

    <?= $this->insert('components/sections/about') ?>

    <?= $this->insert('components/sections/products') ?>

    <?= $this->insert('components/sections/contact') ?>
    
<?php $this->stop() ?> 