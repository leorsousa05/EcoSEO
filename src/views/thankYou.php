<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$this->layout('layouts/base', $pagesConfig['thankYou']);
?>

<?php $this->start('main_content') ?>
<section class="py-32 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <svg class="w-16 h-16 mx-auto mb-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-2">Obrigado pelo seu contato!</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">Recebemos sua mensagem e entraremos em contato em breve.</p>
            <a href="/" class="inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                Voltar para a Página Inicial
            </a>
        </div>
    </div>
</section>
<?php $this->stop() ?> 
