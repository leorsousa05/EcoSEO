<?php
$siteConfig = require __DIR__ . '/../../config/site.php';
$whatsapp = $siteConfig['whatsapp'];
$message = urlencode($whatsapp['message']);
$whatsappUrl = "https://wa.me/{$whatsapp['number']}?text={$message}";
?>

<a href="<?= $whatsappUrl ?>" 
   target="_blank" 
   rel="noopener noreferrer"
   class="bg-success hover:bg-success-hover text-white rounded-full p-4 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center group fixed bottom-6 right-6 z-50"
   aria-label="Contato via WhatsApp">
    <span class="iconify w-6 h-6" data-icon="mdi:whatsapp"></span>
</a> 