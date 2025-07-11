<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$siteConfig = require __DIR__ . '/../config/site.php';

$pageData = [
    'title' => 'Sobre Nós - ' . $siteConfig['name'],
    'description' => 'Conheça nossa história, missão, valores e a equipe por trás dos resultados excepcionais.',
    'keywords' => 'sobre, empresa, equipe, missão, valores, história',
];

$this->layout('layouts/base', $pageData);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => 'Sobre Nós',
        'subtitle' => 'Transformando negócios através da tecnologia',
        'description' => 'Somos uma empresa especializada em soluções digitais, focada em gerar resultados reais para nossos clientes através de estratégias inovadoras e tecnologia de ponta.',
        'features' => [
            [
                'icon' => 'heroicons:users',
                'text' => 'Equipe de especialistas certificados',
            ],
            [
                'icon' => 'heroicons:chart-bar',
                'text' => 'Resultados comprovados e mensuráveis',
            ],
            [
                'icon' => 'heroicons:heart',
                'text' => 'Paixão por excelência e inovação',
            ],
        ],
        'buttons' => [
            [
                'text' => 'Conheça Nossa Equipe',
                'icon' => 'heroicons:users',
                'href' => '#team',
                'style' => 'solid',
            ],
            [
                'text' => 'Nossos Valores',
                'icon' => 'heroicons:heart',
                'href' => '#values',
                'style' => 'outline',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/history') ?>

    <?= $this->insert('components/sections/features', [
        'title' => 'Nossa Missão, Visão e Valores',
        'subtitle' => 'Os pilares que guiam nosso trabalho',
        'description' => 'Nossos valores fundamentais são a base de tudo que fazemos, garantindo excelência e resultados consistentes para nossos clientes.',
        'layout' => 'grid',
        'features' => [
            [
                'icon' => 'heroicons:light-bulb',
                'title' => 'Missão',
                'description' => 'Transformar negócios através de soluções digitais inovadoras, proporcionando crescimento sustentável e resultados mensuráveis para nossos clientes.',
                'color' => 'primary',
                'stats' => 'Transformação Digital',
            ],
            [
                'icon' => 'heroicons:eye',
                'title' => 'Visão',
                'description' => 'Ser referência nacional em soluções digitais, reconhecida pela excelência, inovação e capacidade de gerar resultados excepcionais.',
                'color' => 'success',
                'stats' => 'Referência Nacional',
            ],
            [
                'icon' => 'heroicons:heart',
                'title' => 'Valores',
                'description' => 'Excelência, transparência, inovação, compromisso com resultados e relacionamento duradouro com nossos clientes.',
                'color' => 'warning',
                'stats' => 'Excelência Total',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/team', [
        'id' => 'team',
    ]) ?>

    <?= $this->insert('components/sections/stats', [
        'title' => 'Números que Comprovam Nossa Excelência',
        'subtitle' => 'Resultados reais de nossos projetos',
        'description' => 'Nossa trajetória é marcada por números impressionantes que demonstram nossa capacidade de entregar resultados excepcionais.',
        'layout' => 'grid',
        'background' => 'light',
        'stats' => [
            [
                'number' => '500+',
                'label' => 'Projetos Entregues',
                'icon' => 'heroicons:rocket-launch',
                'color' => 'primary',
                'description' => 'Soluções implementadas com sucesso',
            ],
            [
                'number' => '98%',
                'label' => 'Satisfação dos Clientes',
                'icon' => 'heroicons:heart',
                'color' => 'success',
                'description' => 'Clientes satisfeitos com nossos serviços',
            ],
            [
                'number' => '300%',
                'label' => 'Aumento Médio',
                'icon' => 'heroicons:chart-bar',
                'color' => 'warning',
                'description' => 'Em tráfego orgânico dos clientes',
            ],
            [
                'number' => '24/7',
                'label' => 'Suporte Técnico',
                'icon' => 'heroicons:lifebuoy',
                'color' => 'info',
                'description' => 'Assistência disponível sempre',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/testimonials', [
        'title' => 'O que nossos clientes dizem sobre nós',
        'subtitle' => 'Depoimentos que comprovam nossa qualidade',
        'description' => 'Descubra por que centenas de empresas confiam em nossa equipe para seus projetos.',
        'layout' => 'carousel',
    ]) ?>

    <?= $this->insert('components/sections/cta', [
        'title' => 'Vamos trabalhar juntos?',
        'subtitle' => 'Transforme seu negócio com nossa equipe',
        'description' => 'Entre em contato conosco e descubra como podemos ajudar você a alcançar seus objetivos digitais.',
        'buttons' => [
            [
                'text' => 'Falar Conosco',
                'icon' => 'heroicons:phone',
                'href' => '/contato',
                'style' => 'solid',
                'color' => 'primary',
            ],
            [
                'text' => 'Ver Serviços',
                'icon' => 'heroicons:wrench-screwdriver',
                'href' => '/servicos',
                'style' => 'outline',
            ],
        ],
        'background' => 'gradient',
        'layout' => 'centered',
    ]) ?>
    
<?php $this->stop() ?> 