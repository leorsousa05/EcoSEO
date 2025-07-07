<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$siteConfig = require __DIR__ . '/../config/site.php';
$this->layout('layouts/base', $pagesConfig['home']);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $siteConfig['name'],
        'description' => $siteConfig['tagline'],
        'buttons' => [
            [
                'text' => 'Saiba mais',
                'href' => '#',
                'variant' => 'primary',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/about') ?>

    <?= $this->insert('components/sections/products') ?>

    <?= $this->insert('components/sections/contact') ?>
    
<?php $this->stop() ?> 
