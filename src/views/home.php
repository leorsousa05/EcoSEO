<?php
$pagesConfig = require __DIR__ . '/../config/pages.php';
$siteConfig = require __DIR__ . '/../config/site.php';
$this->layout('layouts/base', $pagesConfig['home']);
?>

<?php $this->start('main_content') ?>
    <?= $this->insert('components/sections/hero', [
        'title' => $siteConfig['name'],
        'subtitle' => 'Desenvolvido para Performance e Acessibilidade',
        'description' => $siteConfig['tagline'],
        'features' => [
            [
                'icon' => 'heroicons:bolt',
                'text' => 'Performance otimizada com Core Web Vitals',
            ],
            [
                'icon' => 'heroicons:device-phone-mobile',
                'text' => 'Design responsivo para todos os dispositivos',
            ],
            [
                'icon' => 'heroicons:shield-check',
                'text' => 'WCAG 2.1 AA compliant',
            ],
        ],
        'buttons' => [
            [
                'text' => 'Saiba mais',
                'icon' => 'heroicons:arrow-right',
                'href' => '#features',
                'variant' => 'primary',
            ],
            [
                'text' => 'Ver Documentação',
                'icon' => 'heroicons:book-open',
                'href' => '#docs',
                'variant' => 'outline',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/features', [
        'title' => 'Funcionalidades Avançadas',
        'subtitle' => 'Tudo que você precisa para crescer',
        'description' => 'Nossa plataforma oferece recursos poderosos projetados para maximizar sua eficiência e resultados.',
        'layout' => 'grid',
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
                'icon' => 'heroicons:lifebuoy',
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
        'title' => 'Resultados que Falam por Si',
        'subtitle' => 'Números que comprovam nossa eficiência',
        'description' => 'Veja como nossa solução está transformando negócios em todo o Brasil.',
        'layout' => 'grid',
        'background' => 'dark',
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
            [
                'number' => '24/7',
                'label' => 'Suporte',
                'icon' => 'heroicons:lifebuoy',
                'color' => 'info',
                'description' => 'Assistência técnica disponível',
            ],
            [
                'number' => '50+',
                'label' => 'Integrações',
                'icon' => 'heroicons:puzzle-piece',
                'color' => 'secondary',
                'description' => 'Com ferramentas populares',
            ],
            [
                'number' => '15min',
                'label' => 'Setup',
                'icon' => 'heroicons:rocket-launch',
                'color' => 'error',
                'description' => 'Tempo médio de configuração',
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/about', [
        'title' => 'Sobre o EcoSEO',
        'description' => 'Um template moderno e otimizado para SEO, criado para desenvolvedores e empresas que buscam excelência em performance e acessibilidade.',
        'features' => [
            [
                'icon' => 'heroicons:rocket-launch',
                'title' => 'Performance Otimizada',
                'text' => 'Estrutura limpa e eficiente, com foco em velocidade de carregamento e SEO. Pontuação máxima em Core Web Vitals.',
                'list' => [
                    'Lazy loading inteligente',
                    'Otimização de imagens',
                    'Minificação automática',
                ],
            ],
            [
                'icon' => 'heroicons:sparkles',
                'title' => 'Design Responsivo',
                'text' => 'Interface adaptativa que funciona perfeitamente em qualquer dispositivo, desde smartphones até monitores ultrawide.',
                'list' => [
                    'Layout fluido',
                    'Breakpoints customizados',
                    'Mobile-first approach',
                ],
            ],
            [
                'icon' => 'heroicons:shield-check',
                'title' => 'Acessibilidade',
                'text' => 'Desenvolvido seguindo as diretrizes WCAG 2.1, garantindo que seu conteúdo seja acessível para todos os usuários.',
                'list' => [
                    'ARIA landmarks',
                    'Contraste adequado',
                    'Navegação por teclado',
                ],
            ],
        ],
    ]) ?>

    <?= $this->insert('components/sections/testimonials', [
        'title' => 'O que nossos clientes dizem',
        'subtitle' => 'Depoimentos reais de quem confia em nossa solução',
        'description' => 'Descubra por que centenas de empresas escolhem nossa plataforma para seus projetos.',
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

    <?= $this->insert('components/sections/pricing', [
        'title' => 'Planos que se adaptam ao seu negócio',
        'subtitle' => 'Escolha o plano ideal para seu projeto',
        'description' => 'Oferecemos opções flexíveis para atender às necessidades de empresas de todos os tamanhos.',
        'show_toggle' => true,
        'plans' => [
            [
                'name' => 'Starter',
                'price' => 'R$ 99',
                'period' => '/mês',
                'description' => 'Perfeito para pequenas empresas e startups',
                'features' => [
                    'Até 1.000 usuários',
                    '5GB de armazenamento',
                    'Suporte por email',
                    'Atualizações mensais',
                    'API básica',
                    'Relatórios básicos',
                ],
                'popular' => false,
                'color' => 'primary',
                'button_text' => 'Começar Grátis',
                'button_href' => '/signup',
            ],
            [
                'name' => 'Professional',
                'price' => 'R$ 299',
                'period' => '/mês',
                'description' => 'Ideal para empresas em crescimento',
                'features' => [
                    'Até 10.000 usuários',
                    '50GB de armazenamento',
                    'Suporte prioritário',
                    'Atualizações semanais',
                    'API completa',
                    'Relatórios avançados',
                    'Integrações personalizadas',
                    'Backup automático',
                ],
                'popular' => true,
                'color' => 'success',
                'button_text' => 'Escolher Professional',
                'button_href' => '/signup',
            ],
            [
                'name' => 'Enterprise',
                'price' => 'R$ 999',
                'period' => '/mês',
                'description' => 'Para grandes corporações',
                'features' => [
                    'Usuários ilimitados',
                    'Armazenamento ilimitado',
                    'Suporte 24/7',
                    'Atualizações em tempo real',
                    'API personalizada',
                    'Relatórios customizados',
                    'Integrações avançadas',
                    'SLA garantido',
                    'Treinamento incluído',
                    'Consultoria dedicada',
                ],
                'popular' => false,
                'color' => 'warning',
                'button_text' => 'Falar com Vendas',
                'button_href' => '/contato',
            ],
        ],
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
                'variant' => 'primary',
            ],
            [
                'text' => 'Falar com Vendas',
                'icon' => 'heroicons:phone',
                'href' => '/contato',
                'variant' => 'outline',
            ],
        ],
        'background' => 'gradient',
        'layout' => 'centered',
    ]) ?>

    <?= $this->insert('components/sections/contact') ?>
    
<?php $this->stop() ?> 
