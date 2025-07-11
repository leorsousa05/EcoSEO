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
                'style' => 'solid',
            ],
            [
                'text' => 'Ver Portfólio',
                'icon' => 'heroicons:eye',
                'href' => '#portfolio',
                'style' => 'outline',
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
            ];
        }, $servicesConfig['services']),
    ]) ?>

    <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        
        <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <?= $this->insert('components/common/badge', [
                    'text' => 'Serviços',
                    'color' => 'primary',
                    'size' => 'md',
                    'icon' => 'heroicons:wrench-screwdriver',
                ]) ?>
                
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 tracking-tight">
                    Serviços Detalhados
                </h2>
                <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                    Cada serviço com foco em resultados
                </h3>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Conheça em detalhes cada um dos nossos serviços e como eles podem transformar seu negócio.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <?php foreach ($servicesConfig['services'] as $service): ?>
                    <div class="bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-16 h-16 bg-<?= $service['color'] ?>-light rounded-2xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-<?= $service['color'] ?>">
                                <span class="iconify w-8 h-8 text-<?= $service['color'] ?> group-hover:text-white transition-colors duration-300" data-icon="<?= $service['icon'] ?>"></span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-2xl font-semibold text-gray-900"><?= $service['name'] ?></h4>
                                <p class="text-<?= $service['color'] ?> font-medium"><?= $service['price'] ?></p>
                            </div>
                            <?php if ($service['popular']): ?>
                                <div class="flex-shrink-0">
                                    <?= $this->insert('components/common/badge', [
                                        'text' => 'Mais Popular',
                                        'color' => $service['color'],
                                        'size' => 'sm',
                                        'icon' => 'heroicons:star',
                                    ]) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed mb-6">
                            <?= $service['description'] ?>
                        </p>
                        
                        <div class="mb-6">
                            <h5 class="font-semibold text-gray-900 mb-3">O que está incluído:</h5>
                            <ul class="space-y-2">
                                <?php foreach (array_slice($service['features'], 0, 4) as $feature): ?>
                                    <li class="flex items-center space-x-3 text-gray-600">
                                        <span class="iconify w-5 h-5 text-success" data-icon="heroicons:check-circle"></span>
                                        <span><?= $feature ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="mb-6">
                            <h5 class="font-semibold text-gray-900 mb-3">Resultados esperados:</h5>
                            <ul class="space-y-2">
                                <?php foreach ($service['benefits'] as $benefit): ?>
                                    <li class="flex items-center space-x-3 text-gray-600">
                                        <span class="iconify w-5 h-5 text-warning" data-icon="heroicons:chart-bar"></span>
                                        <span><?= $benefit ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <div class="text-sm text-gray-500">
                                <span class="iconify w-4 h-4 inline mr-1" data-icon="heroicons:clock"></span>
                                <?= $service['duration'] ?>
                            </div>
                            <?= $this->insert('components/common/button', [
                                'text' => 'Solicitar Orçamento',
                                'href' => '/contato?service=' . $service['id'],
                                'style' => 'solid',
                                'color' => $service['color'],
                                'size' => 'sm',
                            ]) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

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

    <section class="py-24 bg-gradient-to-b from-gray-900 to-gray-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-1/4 w-64 h-64 bg-primary rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute -bottom-8 right-1/4 w-64 h-64 bg-secondary rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        </div>

        <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <?= $this->insert('components/common/badge', [
                    'text' => 'FAQ',
                    'color' => 'primary',
                    'size' => 'md',
                    'icon' => 'heroicons:question-mark-circle',
                ]) ?>
                
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white tracking-tight">
                    Perguntas Frequentes
                </h2>
                <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                    Tire suas dúvidas
                </h3>
                <p class="text-xl text-gray-300 leading-relaxed">
                    Respostas para as principais dúvidas sobre nossos serviços e processos.
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6">
                <?php foreach ($servicesConfig['faq'] as $faq): ?>
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl">
                        <h4 class="text-xl font-semibold text-white mb-4"><?= $faq['question'] ?></h4>
                        <p class="text-gray-300 leading-relaxed"><?= $faq['answer'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-16">
                <?= $this->insert('components/common/button', [
                    'text' => 'Falar com Especialista',
                    'icon' => 'heroicons:phone',
                    'href' => '/contato',
                    'style' => 'solid',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
            </div>
        </div>
    </section>

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