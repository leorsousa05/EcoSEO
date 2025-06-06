<?php
$siteConfig = require __DIR__ . '/../config/site.php';

$this->layout('views/layouts/base', [
    'title' => 'Página Inicial - ' . $siteConfig['name'],
    'description' => $siteConfig['tagline'],
    'keywords' => $siteConfig['seo']['keywords']
]);
?>

<?php $this->start('main_content') ?>

<?php $this->insert('components/sections/heroAbout') ?>

<?php $this->insert('components/sections/about') ?>

<?php $this->stop() ?> 