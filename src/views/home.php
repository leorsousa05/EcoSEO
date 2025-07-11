<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$siteConfig = require __DIR__ . '/../config/site.php';
$this->layout('layouts/base', $pagesConfig['home']);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $siteConfig['name'],
        'description' => $siteConfig['tagline'],
        'buttons' => [
            [
                'text' => 'Saiba mais',
                'href' => '#',
                'variant' => 'primary',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/features', [
        'title' => 'Funcionalidades Avançadas',
        'subtitle' => 'Tudo que você precisa para crescer',
        'description' => 'Nossa plataforma oferece recursos poderosos projetados para maximizar sua eficiência e resultados.',
        'layout' => 'grid',
    ]) ?>

    <?= $this->insert('components/sections/stats', [
        'title' => 'Resultados que Falam por Si',
        'subtitle' => 'Números que comprovam nossa eficiência',
        'description' => 'Veja como nossa solução está transformando negócios em todo o Brasil.',
        'layout' => 'grid',
        'background' => 'dark',
    ]) ?>

    <?= $this->insert('components/sections/about') ?>

    <?= $this->insert('components/sections/testimonials', [
        'title' => 'O que nossos clientes dizem',
        'subtitle' => 'Depoimentos reais de quem confia em nossa solução',
        'description' => 'Descubra por que centenas de empresas escolhem nossa plataforma para seus projetos.',
        'layout' => 'carousel',
    ]) ?>

    <?= $this->insert('components/sections/pricing', [
        'title' => 'Planos que se adaptam ao seu negócio',
        'subtitle' => 'Escolha o plano ideal para seu projeto',
        'description' => 'Oferecemos opções flexíveis para atender às necessidades de empresas de todos os tamanhos.',
        'show_toggle' => true,
    ]) ?>

    <?= $this->insert('components/sections/cta', [
        'title' => 'Pronto para transformar seu negócio?',
        'subtitle' => 'Junte-se a milhares de empresas que já confiam em nossa solução',
        'description' => 'Comece gratuitamente hoje mesmo e veja como podemos transformar seu negócio.',
        'buttons' => [
            [
                'text' => 'Começar Grátis',
                'icon' => 'heroicons:rocket-launch',
                'href' => '/signup',
                'style' => 'solid',
                'color' => 'primary',
            ],
            [
                'text' => 'Falar com Vendas',
                'icon' => 'heroicons:phone',
                'href' => '/contato',
                'style' => 'outline',
            ],
        ],
        'background' => 'gradient',
        'layout' => 'centered',
    ]) ?>

    <?= $this->insert('components/sections/contact') ?>
    
<?php $this->stop() ?> 
