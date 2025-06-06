<?php
$this->layout('views/layouts/base', [
    'title' => 'Página não encontrada - 404',
    'description' => 'A página que você está procurando não foi encontrada.'
]);
?>

<?php $this->start('main_content') ?>
    <div class="min-h-[80vh] bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12 animate-fade-in">
                    <h1 class="text-9xl font-bold bg-gradient-to-r from-primary to-primary-dark bg-clip-text text-transparent mb-4 transform hover:scale-105 transition-transform duration-300">
                        404
                    </h1>
                    <div class="h-1 w-32 bg-gradient-to-r from-primary to-primary-dark mx-auto rounded-full mb-8"></div>
                </div>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 md:p-12 shadow-2xl border border-white/20">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                            Ops! Página não encontrada
                        </h2>
                        <p class="text-gray-300 text-lg mb-8">
                            Parece que você se aventurou em um caminho desconhecido. Não se preocupe, estamos aqui para ajudar você a encontrar o que procura.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 mb-12">
                        <div class="bg-white/5 rounded-xl p-6 hover:bg-white/10 transition-colors duration-300">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="iconify text-2xl text-primary" data-icon="mdi:information-outline"></span>
                                <h3 class="text-xl font-semibold text-white">O que aconteceu?</h3>
                            </div>
                            <p class="text-gray-300">
                                A página que você está tentando acessar pode ter sido movida, renomeada ou não existe mais. Isso pode acontecer por diversos motivos, como:
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center gap-2 text-gray-300">
                                    <span class="iconify text-primary" data-icon="mdi:check-circle-outline"></span>
                                    URL digitada incorretamente
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <span class="iconify text-primary" data-icon="mdi:check-circle-outline"></span>
                                    Link desatualizado
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <span class="iconify text-primary" data-icon="mdi:check-circle-outline"></span>
                                    Página removida ou renomeada
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white/5 rounded-xl p-6 hover:bg-white/10 transition-colors duration-300">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="iconify text-2xl text-primary" data-icon="mdi:lightbulb-outline"></span>
                                <h3 class="text-xl font-semibold text-white">Como podemos ajudar?</h3>
                            </div>
                            <p class="text-gray-300">
                                Você pode tentar as seguintes opções para encontrar o que procura:
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center gap-2 text-gray-300">
                                    <span class="iconify text-primary" data-icon="mdi:arrow-right-circle-outline"></span>
                                    Verificar a URL digitada
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <span class="iconify text-primary" data-icon="mdi:arrow-right-circle-outline"></span>
                                    Navegar pelo menu principal
                                </li>
                                <li class="flex items-center gap-2 text-gray-300">
                                    <span class="iconify text-primary" data-icon="mdi:arrow-right-circle-outline"></span>
                                    Usar nossa busca
                                </li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="text-center space-y-4">
                        <p class="text-gray-300 mb-6">
                            Não encontrou o que procura? Entre em contato conosco para receber ajuda personalizada.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <?php 
                            $text = 'Voltar para a página inicial';
                            $href = '/';
                            $variant = 'primary';
                            $attributes = [
                                'class' => 'group',
                                'data-icon' => 'mdi:home-outline'
                            ];
                            include 'src/components/common/button.php'; 
                            ?>
                            <?php 
                            $text = 'Fale conosco';
                            $href = '/contato';
                            $variant = 'secondary';
                            $attributes = [
                                'class' => 'group',
                                'data-icon' => 'mdi:email-outline'
                            ];
                            include 'src/components/common/button.php'; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .btn {
            @apply inline-flex items-center justify-center px-6 py-3 rounded-lg font-medium transition-all duration-300 transform hover:scale-105;
        }

        .btn-primary {
            @apply bg-primary text-white hover:bg-primary-dark;
        }

        .btn-secondary {
            @apply bg-white/10 text-white hover:bg-white/20;
        }
    </style>
<?php $this->stop() ?> 