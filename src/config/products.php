<?php

return [
    'products' => [
        [
            'id' => 1,
            'name' => 'Produto Premium',
            'description' => 'Descrição detalhada do produto premium com suas principais características e benefícios.',
            'image' => 'https://placehold.co/600x400/8b5cf6/ffffff?text=Produto+Premium',
            'features' => ['Recurso 1', 'Recurso 2', 'Recurso 3'],
            'price' => 'R$ 999,00',
            'href' => '#',
        ],
        [
            'id' => 2,
            'name' => 'Produto Standard',
            'description' => 'Descrição detalhada do produto standard com suas principais características e benefícios.',
            'image' => 'https://placehold.co/600x400/6b7280/ffffff?text=Produto+Standard',
            'features' => ['Recurso 1', 'Recurso 2', 'Recurso 3'],
            'price' => 'R$ 699,00',
            'href' => '#',
        ],
        [
            'id' => 3,
            'name' => 'Produto Básico',
            'description' => 'Descrição detalhada do produto básico com suas principais características e benefícios.',
            'image' => 'https://placehold.co/600x400/10b981/ffffff?text=Produto+Básico',
            'features' => ['Recurso 1', 'Recurso 2', 'Recurso 3'],
            'price' => 'R$ 399,00',
            'href' => '#',
        ],
    ],
    'carousel_config' => [
        'type' => 'carousel',
        'perView' => 3,
        'gap' => 32,
        'breakpoints' => [
            1024 => ['perView' => 2],
            768 => ['perView' => 1],
        ],
        'autoplay' => 5000,
        'hoverpause' => true,
    ],
]; 