<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$this->layout('layouts/base', $pagesConfig['contact']);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/contact') ?>
<?php $this->stop() ?> 