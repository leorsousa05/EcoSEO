<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$this->layout('layouts/base', $pagesConfig['thankYou']);
?>

<?php $this->start('main_content') ?>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <svg class="w-16 h-16 mx-auto mb-4 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mensagem Enviada!</h2>
            <p class="text-gray-600 mb-8">Obrigado por entrar em contato conosco. Retornaremos em breve!</p>
            <a href="/" class="inline-block bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-primary-hover transition-colors duration-300">
                Voltar ao Início
            </a>
        </div>
    </div>
</div>
<?php $this->stop() ?> 
