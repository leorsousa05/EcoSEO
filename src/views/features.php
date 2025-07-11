<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$siteConfig = require __DIR__ . '/../config/site.php';

$pageData = [
    'title' => 'Funcionalidades - ' . $siteConfig['name'],
    'description' => 'Descubra todas as funcionalidades avançadas da nossa plataforma.',
    'keywords' => 'funcionalidades, recursos, plataforma, tecnologia',
];

$this->layout('layouts/base', $pageData);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => 'Funcionalidades Avançadas',
        'subtitle' => 'Tudo que você precisa para crescer',
        'description' => 'Nossa plataforma oferece recursos poderosos projetados para maximizar sua eficiência e resultados.',
        'features' => [
            [
                'icon' => 'heroicons:rocket-launch',
                'text' => 'Performance otimizada com Core Web Vitals',
            ],
            [
                'icon' => 'heroicons:shield-check',
                'text' => 'Segurança de nível enterprise',
            ],
            [
                'icon' => 'heroicons:sparkles',
                'text' => 'Interface moderna e intuitiva',
            ],
        ],
        'buttons' => [
            [
                'text' => 'Ver Demonstração',
                'icon' => 'heroicons:play',
                'href' => '#demo',
                'style' => 'solid',
            ],
            [
                'text' => 'Documentação',
                'icon' => 'heroicons:book-open',
                'href' => '#docs',
                'style' => 'outline',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/features', [
        'title' => 'Recursos Principais',
        'subtitle' => 'Funcionalidades que fazem a diferença',
        'description' => 'Cada recurso foi cuidadosamente desenvolvido para otimizar seu fluxo de trabalho.',
        'layout' => 'list',
        'features' => [
            [
                'icon' => 'heroicons:rocket-launch',
                'title' => 'Performance Otimizada',
                'description' => 'Sistema desenvolvido com foco em velocidade e eficiência máxima.',
                'color' => 'primary',
                'stats' => '99.9% uptime',
            ],
            [
                'icon' => 'heroicons:shield-check',
                'title' => 'Segurança Avançada',
                'description' => 'Proteção de dados com criptografia de ponta a ponta.',
                'color' => 'success',
                'stats' => 'SSL 256-bit',
            ],
            [
                'icon' => 'heroicons:device-phone-mobile',
                'title' => 'Design Responsivo',
                'description' => 'Interface adaptativa que funciona em qualquer dispositivo.',
                'color' => 'info',
                'stats' => '100% mobile',
            ],
            [
                'icon' => 'heroicons:sparkles',
                'title' => 'Inovação Constante',
                'description' => 'Atualizações regulares com as últimas tecnologias.',
                'color' => 'warning',
                'stats' => 'Mensal',
            ],
            [
                'icon' => 'heroicons:support',
                'title' => 'Suporte 24/7',
                'description' => 'Equipe especializada disponível a qualquer momento.',
                'color' => 'error',
                'stats' => '24/7',
            ],
            [
                'icon' => 'heroicons:chart-bar',
                'title' => 'Analytics Avançado',
                'description' => 'Relatórios detalhados para otimizar seus resultados.',
                'color' => 'secondary',
                'stats' => 'Real-time',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/stats', [
        'title' => 'Números que Impressionam',
        'subtitle' => 'Resultados reais de nossos clientes',
        'description' => 'Veja como nossa solução está transformando negócios em todo o Brasil.',
        'layout' => 'cards',
        'background' => 'light',
        'stats' => [
            [
                'number' => '10.000+',
                'label' => 'Clientes Ativos',
                'icon' => 'heroicons:users',
                'color' => 'primary',
                'description' => 'Empresas que confiam em nossa solução',
            ],
            [
                'number' => '99.9%',
                'label' => 'Uptime',
                'icon' => 'heroicons:server',
                'color' => 'success',
                'description' => 'Disponibilidade garantida',
            ],
            [
                'number' => '500%',
                'label' => 'Aumento Médio',
                'icon' => 'heroicons:chart-bar',
                'color' => 'warning',
                'description' => 'Em conversões de clientes',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/testimonials', [
        'title' => 'O que nossos clientes dizem',
        'subtitle' => 'Depoimentos reais de quem confia em nossa solução',
        'description' => 'Descubra por que centenas de empresas escolhem nossa plataforma para seus projetos.',
        'layout' => 'grid',
    ]) ?>

    <?= $this->insert('components/sections/pricing', [
        'title' => 'Planos que se adaptam ao seu negócio',
        'subtitle' => 'Escolha o plano ideal para seu projeto',
        'description' => 'Oferecemos opções flexíveis para atender às necessidades de empresas de todos os tamanhos.',
        'show_toggle' => false,
    ]) ?>

    <?= $this->insert('components/sections/cta', [
        'title' => 'Pronto para experimentar?',
        'subtitle' => 'Comece gratuitamente hoje mesmo',
        'description' => 'Teste todas as funcionalidades por 30 dias sem compromisso.',
        'buttons' => [
            [
                'text' => 'Começar Grátis',
                'icon' => 'heroicons:rocket-launch',
                'href' => '/signup',
                'style' => 'solid',
                'color' => 'primary',
            ],
            [
                'text' => 'Ver Demonstração',
                'icon' => 'heroicons:play',
                'href' => '#demo',
                'style' => 'outline',
            ],
        ],
        'background' => 'light',
        'layout' => 'split',
    ]) ?>
    
<?php $this->stop() ?> 