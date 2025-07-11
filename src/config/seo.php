<?php 

return [
    'address' => [
        'street' => 'Rua Exemplo, 123',
        'neighborhood' => 'Centro',
        'city' => 'São Paulo',
        'state' => 'SP',
        'zip' => '01234-567',
        'country' => 'BR',
        'full' => 'Rua Exemplo, 123, Centro, São Paulo - SP, CEP: 01234-567',
    ],

    'business_hours' => [
        'weekdays' => 'Segunda a Sexta: 9h às 18h',
        'saturday' => 'Sábado: 9h às 12h',
        'sunday' => 'Domingo: Fechado',
        'opens' => '09:00',
        'closes' => '18:00',
        'saturday_opens' => '09:00',
        'saturday_closes' => '12:00',
    ],

    'social' => [
        'facebook' => 'https://facebook.com/exemplo',
        'instagram' => 'https://instagram.com/exemplo',
        'linkedin' => 'https://linkedin.com/company/exemplo',
        'twitter' => 'https://twitter.com/exemplo',
        'youtube' => 'https://youtube.com/@exemplo',
    ],

    'seo' => [
        'title' => 'Sua Empresa',
        'description' => 'Soluções digitais para seu negócio crescer.',
        'keywords' => 'seo, template, otimização, marketing digital',
        'og_image' => 'https://seusite.com/images/default.jpg',
        'domain' => 'https://seusite.com',
        'author' => 'Sua Empresa',
        'publisher' => 'Sua Empresa',
        'language' => 'pt-BR',
    ],

    'business' => [
        'type' => 'LocalBusiness',
        'price_range' => '$$',
        'currencies_accepted' => 'BRL',
        'payment_accepted' => 'Cash, Credit Card, Debit Card, PIX',
        'founded' => '2020',
        'employees' => '10-50',
        'legal_name' => 'Sua Empresa Ltda',
        'tax_id' => '12.345.678/0001-90',
        'duns' => '',
        'naics' => '',
        'iso_6523_code' => '',
    ],

    'contact' => [
        'contact_type' => 'customer service',
        'telephone' => '+55 11 99999-9999',
        'email' => 'contato@exemplo.com',
        'available_language' => ['Portuguese', 'English'],
        'area_served' => 'BR',
        'service_area' => [
            'São Paulo',
            'Rio de Janeiro',
            'Belo Horizonte',
        ],
    ],

    'reviews' => [
        'aggregate_rating' => '4.5',
        'review_count' => '150',
        'best_rating' => '5',
        'worst_rating' => '1',
    ],

    'products' => [
        'offers_service' => true,
        'offers_products' => true,
        'service_types' => [
            'SEO Consulting',
            'Web Development',
            'Digital Marketing',
        ],
        'product_categories' => [
            'Software',
            'Templates',
            'Consulting Services',
        ],
    ],

    'geo' => [
        'latitude' => '-23.5505',
        'longitude' => '-46.6333',
        'geo_radius' => '50',
        'geo_midpoint' => 'São Paulo, SP',
    ],
];
