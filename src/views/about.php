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
                'variant' => 'primary',
            ],
            [
                'text' => 'Nossos Valores',
                'icon' => 'heroicons:heart',
                'href' => '#values',
                'variant' => 'outline',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/history', [
        'title' => 'Uma Jornada de Inovação e Resultados',
        'description' => 'Fundada em 2020, nossa empresa nasceu da paixão por tecnologia e da vontade de transformar negócios através de soluções digitais inovadoras.',
        'longDescription' => 'Ao longo dos anos, ajudamos mais de 500 empresas a alcançarem seus objetivos digitais, sempre com foco em resultados mensuráveis e crescimento sustentável. Nossa missão é democratizar o acesso à tecnologia de qualidade, tornando-a acessível para empresas de todos os tamanhos.',
        'stats' => [
            [
                'number' => '500+',
                'label' => 'Clientes Atendidos',
            ],
            [
                'number' => '5+',
                'label' => 'Anos de Experiência',
            ],
            [
                'number' => '98%',
                'label' => 'Satisfação dos Clientes',
            ],
        ],
        'image' => 'https://placehold.co/600x400/222/fff?text=Nossa+História',
        'imageAlt' => 'Nossa história e jornada',
    ]) ?>

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
        'title' => 'Nossa Equipe',
        'subtitle' => 'Especialistas apaixonados por resultados',
        'description' => 'Nossa equipe é composta por profissionais experientes e certificados, dedicados a entregar soluções excepcionais.',
        'members' => [
            [
                'name' => 'João Silva',
                'role' => 'CEO & Fundador',
                'description' => 'Especialista em estratégia digital com mais de 10 anos de experiência. Apaixonado por inovação e resultados.',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face',
            ],
            [
                'name' => 'Mario Costa',
                'role' => 'Diretora de Marketing',
                'description' => 'Especialista em marketing digital e SEO. Responsável por estratégias que geram resultados excepcionais.',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face',
            ],
            [
                'name' => 'Carlos Santos',
                'role' => 'CTO',
                'description' => 'Desenvolvedor full-stack com expertise em tecnologias modernas. Focado em criar soluções escaláveis.',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop&crop=face',
            ],
        ],
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
        'testimonials' => [
            [
                'name' => 'Maria Silva',
                'role' => 'CEO, TechCorp',
                'company' => 'TechCorp',
                'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face',
                'content' => 'A implementação foi incrivelmente suave. O suporte técnico é excepcional e os resultados superaram nossas expectativas.',
                'rating' => 5,
                'verified' => true,
            ],
            [
                'name' => 'João Santos',
                'role' => 'Diretor de Marketing',
                'company' => 'Inovação Digital',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
                'content' => 'A performance e confiabilidade são impressionantes. Conseguimos aumentar nossa conversão em 300% no primeiro mês.',
                'rating' => 5,
                'verified' => true,
            ],
            [
                'name' => 'Ana Costa',
                'role' => 'Desenvolvedora Senior',
                'company' => 'StartupXYZ',
                'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face',
                'content' => 'A documentação é clara e a API é muito bem estruturada. Facilita muito nosso desenvolvimento.',
                'rating' => 5,
                'verified' => true,
            ],
            [
                'name' => 'Carlos Oliveira',
                'role' => 'CTO',
                'company' => 'E-commerce Plus',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
                'content' => 'A escalabilidade é fantástica. Conseguimos crescer de 100 para 10.000 usuários sem problemas.',
                'rating' => 5,
                'verified' => true,
            ],
            [
                'name' => 'Lucia Ferreira',
                'role' => 'Gerente de Produto',
                'company' => 'SaaS Solutions',
                'avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face',
                'content' => 'O time de suporte é muito responsivo e sempre tem soluções criativas para nossos desafios.',
                'rating' => 5,
                'verified' => true,
            ],
            [
                'name' => 'Roberto Lima',
                'role' => 'Fundador',
                'company' => 'Innovation Labs',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face',
                'content' => 'Investir nesta solução foi uma das melhores decisões que tomamos. ROI impressionante.',
                'rating' => 5,
                'verified' => true,
            ],
        ],
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
                'variant' => 'primary',
            ],
            [
                'text' => 'Ver Serviços',
                'icon' => 'heroicons:wrench-screwdriver',
                'href' => '/servicos',
                'variant' => 'outline',
            ],
        ],
        'background' => 'gradient',
        'layout' => 'centered',
    ]) ?>
    
<?php $this->stop() ?> 