<?php
$products = $products ?? [
    [
        'id' => 1,
        'name' => 'Produto Premium',
        'description' => 'Descrição detalhada do produto premium com suas principais características e benefícios.',
        'image' => 'https://placehold.co/600x400/8b5cf6/ffffff?text=Produto+Premium',
        'features' => ['Recurso 1', 'Recurso 2', 'Recurso 3'],
        'price' => 'R$ 999,00',
    ],
    [
        'id' => 2,
        'name' => 'Produto Standard',
        'description' => 'Descrição detalhada do produto standard com suas principais características e benefícios.',
        'image' => 'https://placehold.co/600x400/6b7280/ffffff?text=Produto+Standard',
        'features' => ['Recurso 1', 'Recurso 2', 'Recurso 3'],
        'price' => 'R$ 699,00',
    ],
    [
        'id' => 3,
        'name' => 'Produto Básico',
        'description' => 'Descrição detalhada do produto básico com suas principais características e benefícios.',
        'image' => 'https://placehold.co/600x400/10b981/ffffff?text=Produto+Básico',
        'features' => ['Recurso 1', 'Recurso 2', 'Recurso 3'],
        'price' => 'R$ 399,00',
    ],
];
?>

<section class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden" id="produtos">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container mx-auto px-4 relative">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold mb-6 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                Nossos Produtos
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                Conheça nossa linha completa de produtos desenvolvidos com as mais avançadas tecnologias e materiais de alta qualidade.
            </p>
        </div>

        <div class="glide products-carousel mb-16">
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
                    <?php foreach ($products as $product): ?>
                        <div class="glide__slide">
                            <div class="bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                <div class="relative group overflow-hidden rounded-xl mb-6">
                                    <img src="<?= $product['image'] ?>" 
                                         alt="<?= $product['name'] ?>" 
                                         class="w-full h-64 object-cover rounded-xl transform transition-transform duration-500 group-hover:scale-105"
                                         loading="lazy">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                
                                <h3 class="text-2xl font-semibold text-gray-900 mb-4"><?= $product['name'] ?></h3>
                                
                                <p class="text-gray-600 mb-6 leading-relaxed">
                                    <?= $product['description'] ?>
                                </p>
                                
                                <ul class="space-y-3 mb-6">
                                    <?php foreach ($product['features'] as $feature): ?>
                                        <li class="flex items-center space-x-3 text-gray-600">
                                            <span class="iconify w-5 h-5 text-primary" data-icon="mdi:check-circle"></span>
                                            <span><?= $feature ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-primary"><?= $product['price'] ?></span>
                                    <?= $this->insert('components/common/button', [
                                        'text' => 'Saiba Mais',
                                        'href' => '#',
                                        'variant' => 'primary',
                                        'icon' => 'mdi:arrow-right',
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="glide__bullets mt-8" data-glide-el="controls[nav]">
                <?php foreach ($products as $index => $product): ?>
                    <button class="glide__bullet" data-glide-dir="=<?= $index ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-16 text-center">
            <div class="inline-flex items-center space-x-2 text-gray-600 mb-6">
                <span class="iconify w-5 h-5" data-icon="mdi:information"></span>
                <p>Não encontrou o que procura? Entre em contato conosco.</p>
            </div>
            <div class="flex justify-center space-x-4">
                <?= $this->insert('components/common/button', [
                    'text' => 'Fale Conosco',
                    'href' => '/contato',
                    'variant' => 'primary',
                    'icon' => 'mdi:email',
                ]) ?>
                <?= $this->insert('components/common/button', [
                    'text' => 'Ver Todos',
                    'href' => '#',
                    'variant' => 'secondary',
                    'icon' => 'mdi:arrow-right',
                ]) ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    new Glide('.products-carousel', {
        type: 'carousel',
        perView: 3,
        gap: 32,
        breakpoints: {
            1024: {
                perView: 2
            },
            768: {
                perView: 1
            }
        },
        autoplay: 5000,
        hoverpause: true
    }).mount();
});
</script>
