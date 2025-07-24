<?php
$servicesConfig = require __DIR__ . '/../config/services.php';
$siteConfig = require __DIR__ . '/../config/site.php';
$serviceId = $this->e($serviceId ?? '');

$service = null;
foreach ($servicesConfig['services'] as $s) {
    if ($s['id'] === $serviceId) {
        $service = $s;
        break;
    }
}

if (!$service) {
    header("HTTP/1.0 404 Not Found");
    echo $this->insert('views/404');
    exit;
}

$pageData = [
    'title' => $service['name'] . ' - ' . $siteConfig['name'],
    'description' => $service['description'],
    'keywords' => 'serviço, ' . strtolower($service['name']) . ', ' . $siteConfig['name'],
    'ogTitle' => $service['name'],
    'ogDescription' => $service['description'],
    'canonicalUrl' => $siteConfig['domain'] . '/' . $service['id'],
];

$this->layout('layouts/base', $pageData);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $service['name'],
        'subtitle' => $service['short_description'],
        'description' => $service['description'],
        'features' => [
            [
                'icon' => 'heroicons:check-circle',
                'text' => 'Resultados garantidos',
            ],
            [
                'icon' => 'heroicons:clock',
                'text' => $service['duration'],
            ],
            [
                'icon' => 'heroicons:currency-dollar',
                'text' => $service['price'],
            ],
        ],
        'buttons' => [
            [
                'text' => 'Solicitar Orçamento',
                'icon' => 'heroicons:phone',
                'href' => '/contato',
                'style' => 'solid',
            ],
            [
                'text' => 'Ver Todos os Serviços',
                'icon' => 'heroicons:arrow-left',
                'href' => '/servicos',
                'style' => 'outline',
            ],
        ],
        'background' => 'gradient',
    ]) ?>

    <?= $this->insert('components/sections/service-features', [
        'service' => $service,
    ]) ?>

    <?= $this->insert('components/sections/service-info', [
        'service' => $service,
    ]) ?>

    <?php 
    $serviceTestimonials = array_filter($servicesConfig['testimonials'], function($testimonial) use ($service) {
        return $testimonial['service'] === $service['id'];
    });
    ?>

    <?php if (!empty($serviceTestimonials)): ?>
        <?= $this->insert('components/sections/testimonials', [
            'title' => 'Depoimentos sobre ' . $service['name'],
            'subtitle' => 'Veja o que nossos clientes dizem sobre este serviço',
            'description' => 'Resultados reais de clientes que contrataram nosso serviço de ' . strtolower($service['name']) . '.',
            'layout' => 'grid',
            'testimonials' => array_map(function($testimonial) {
                return [
                    'name' => $testimonial['name'],
                    'role' => $testimonial['role'],
                    'company' => $testimonial['company'],
                    'content' => $testimonial['content'],
                    'rating' => $testimonial['rating'],
                    'verified' => true,
                    'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
                ];
            }, $serviceTestimonials),
        ]) ?>
    <?php endif; ?>

    <?= $this->insert('components/sections/faq', [
        'title' => 'Perguntas frequentes sobre ' . $service['name'],
        'subtitle' => 'Tire suas dúvidas sobre este serviço',
        'description' => 'Respostas para as principais dúvidas sobre nossos serviços e processos.',
        'faqs' => $servicesConfig['faq'],
    ]) ?>

    <?= $this->insert('components/sections/cta', [
        'title' => 'Pronto para começar com ' . $service['name'] . '?',
        'subtitle' => 'Vamos conversar sobre seu projeto',
        'description' => 'Agende uma consultoria gratuita e descubra como este serviço pode transformar seus resultados.',
        'buttons' => [
            [
                'text' => 'Solicitar Orçamento',
                'icon' => 'heroicons:phone',
                'href' => '/contato',
                'style' => 'solid',
                'color' => 'primary',
            ],
            [
                'text' => 'Ver Outros Serviços',
                'icon' => 'heroicons:arrow-right',
                'href' => '/servicos',
                'style' => 'outline',
            ],
        ],
        'background' => 'gradient',
        'layout' => 'centered',
    ]) ?>

<?php $this->stop() ?> 