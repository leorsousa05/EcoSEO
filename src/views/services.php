<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$siteConfig = require __DIR__ . '/../config/site.php';
$servicesConfig = require __DIR__ . '/../config/services.php';

$pageData = [
    'title' => 'Serviços - ' . $siteConfig['name'],
    'description' => 'Conheça nossos serviços especializados em SEO, desenvolvimento web, marketing digital e muito mais.',
    'keywords' => 'serviços, SEO, desenvolvimento web, marketing digital, consultoria',
];

$this->layout('layouts/base', $pageData);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => 'Nossos Serviços',
        'subtitle' => 'Soluções completas para seu negócio digital',
        'description' => 'Oferecemos serviços especializados em SEO, desenvolvimento web, marketing digital e muito mais para impulsionar sua presença online.',
        'features' => [
            [
                'icon' => 'heroicons:rocket-launch',
                'text' => 'Resultados comprovados em 30 dias',
            ],
            [
                'icon' => 'heroicons:shield-check',
                'text' => 'Metodologia testada e aprovada',
            ],
            [
                'icon' => 'heroicons:users',
                'text' => 'Equipe especializada e certificada',
            ],
        ],
        'buttons' => [
            [
                'text' => 'Solicitar Orçamento',
                'icon' => 'heroicons:phone',
                'href' => '/contato',
                'variant' => 'primary',
            ],
            [
                'text' => 'Ver Portfólio',
                'icon' => 'heroicons:eye',
                'href' => '#portfolio',
                'variant' => 'outline',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/features', [
        'title' => 'Serviços Especializados',
        'subtitle' => 'Soluções personalizadas para cada necessidade',
        'description' => 'Nossa equipe oferece serviços completos para transformar sua presença digital e gerar resultados reais para seu negócio.',
        'layout' => 'grid',
        'features' => array_map(function($service) {
            return [
                'icon' => $service['icon'],
                'title' => $service['name'],
                'description' => $service['short_description'],
                'color' => $service['color'],
                'stats' => $service['price'],
                'button' => [
                    'text' => 'Saiba Mais',
                    'href' => '/' . $service['id'],
                    'variant' => 'outline',
                    'icon' => 'heroicons:arrow-right',
                ],
            ];
        }, $servicesConfig['services']),
    ]) ?>

    <?= $this->insert('components/sections/detailed-services', [
        'title' => 'Serviços Detalhados',
        'subtitle' => 'Cada serviço com foco em resultados',
        'description' => 'Conheça em detalhes cada um dos nossos serviços e como eles podem transformar seu negócio.',
        'services' => $servicesConfig['services'],
    ]) ?>

    <?= $this->insert('components/sections/testimonials', [
        'title' => 'O que nossos clientes dizem',
        'subtitle' => 'Depoimentos reais de quem confia em nossos serviços',
        'description' => 'Descubra por que centenas de empresas escolhem nossos serviços para seus projetos.',
        'layout' => 'carousel',
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
        }, $servicesConfig['testimonials']),
    ]) ?>

    <?= $this->insert('components/sections/faq', [
        'title' => 'Perguntas Frequentes',
        'subtitle' => 'Tire suas dúvidas',
        'description' => 'Respostas para as principais dúvidas sobre nossos serviços e processos.',
        'faqs' => $servicesConfig['faq'],
    ]) ?>

    <?= $this->insert('components/sections/cta', [
        'title' => 'Pronto para transformar seu negócio?',
        'subtitle' => 'Vamos conversar sobre como podemos ajudar você',
        'description' => 'Agende uma consultoria gratuita e descubra como nossos serviços podem impulsionar seus resultados.',
        'buttons' => [
            [
                'text' => 'Agendar Consultoria',
                'icon' => 'heroicons:calendar',
                'href' => '/contato',
                'style' => 'solid',
                'color' => 'primary',
            ],
            [
                'text' => 'Ver Portfólio',
                'icon' => 'heroicons:eye',
                'href' => '#portfolio',
                'style' => 'outline',
            ],
        ],
        'background' => 'gradient',
        'layout' => 'centered',
    ]) ?>
    
<?php $this->stop() ?> 