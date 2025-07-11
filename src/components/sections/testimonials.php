<?php
$title = $title ?? 'O que nossos clientes dizem';
$subtitle = $subtitle ?? 'Depoimentos reais de quem confia em nossa solução';
$description = $description ?? 'Descubra por que centenas de empresas escolhem nossa plataforma para seus projetos.';
$testimonials = $testimonials ?? [
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
];
$layout = $layout ?? 'carousel';
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="py-24 bg-gradient-to-b from-gray-900 to-gray-800 relative overflow-hidden"<?= $attrs ?>>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-primary rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute -bottom-8 right-1/4 w-64 h-64 bg-secondary rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
    </div>

    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <?= $this->insert('components/common/badge', [
                'text' => 'Depoimentos',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:star',
            ]) ?>
            
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white tracking-tight">
                <?= $title ?>
            </h2>
            <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                <?= $subtitle ?>
            </h3>
            <p class="text-xl text-gray-300 leading-relaxed">
                <?= $description ?>
            </p>
        </div>

        <?php if ($layout === 'carousel'): ?>
            <div class="glide testimonials-carousel">
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        <?php foreach ($testimonials as $testimonial): ?>
                            <div class="glide__slide">
                                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:bg-opacity-15">
                                    <div class="flex items-center space-x-4 mb-6">
                                        <?= $this->insert('components/common/media/image', [
                                            'src' => $testimonial['avatar'],
                                            'alt' => $testimonial['name'],
                                            'attributes' => [
                                                'class' => 'w-16 h-16 rounded-full object-cover',
                                                'loading' => 'lazy',
                                            ],
                                        ]) ?>
                                        <div class="flex-1">
                                            <h4 class="text-xl font-semibold text-gray-900"><?= $testimonial['name'] ?></h4>
                                            <p class="text-gray-700"><?= $testimonial['role'] ?></p>
                                            <p class="text-primary font-medium"><?= $testimonial['company'] ?></p>
                                        </div>
                                        <?php if ($testimonial['verified']): ?>
                                            <div class="flex-shrink-0">
                                                <span class="iconify w-6 h-6 text-success" data-icon="heroicons:check-badge"></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="flex items-center space-x-1 mb-4">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="iconify w-5 h-5 <?= $i <= $testimonial['rating'] ? 'text-warning' : 'text-gray-400' ?>" data-icon="heroicons:star"></span>
                                        <?php endfor; ?>
                                    </div>
                                    
                                    <blockquote class="text-gray-700 leading-relaxed text-lg italic">
                                        "<?= $testimonial['content'] ?>"
                                    </blockquote>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="glide__bullets mt-8" data-glide-el="controls[nav]">
                    <?php foreach ($testimonials as $index => $testimonial): ?>
                        <button class="glide__bullet" data-glide-dir="=<?= $index ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:bg-opacity-15 hover:-translate-y-2">
                        <div class="flex items-center space-x-4 mb-6">
                            <?= $this->insert('components/common/media/image', [
                                'src' => $testimonial['avatar'],
                                'alt' => $testimonial['name'],
                                'attributes' => [
                                    'class' => 'w-16 h-16 rounded-full object-cover',
                                    'loading' => 'lazy',
                                ],
                            ]) ?>
                            <div class="flex-1">
                                <h4 class="text-xl font-semibold text-gray-900"><?= $testimonial['name'] ?></h4>
                                <p class="text-gray-700"><?= $testimonial['role'] ?></p>
                                <p class="text-primary font-medium"><?= $testimonial['company'] ?></p>
                            </div>
                            <?php if ($testimonial['verified']): ?>
                                <div class="flex-shrink-0">
                                    <span class="iconify w-6 h-6 text-success" data-icon="heroicons:check-badge"></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex items-center space-x-1 mb-4">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="iconify w-5 h-5 <?= $i <= $testimonial['rating'] ? 'text-warning' : 'text-gray-400' ?>" data-icon="heroicons:star"></span>
                            <?php endfor; ?>
                        </div>
                        
                        <blockquote class="text-gray-700 leading-relaxed text-lg italic">
                            "<?= $testimonial['content'] ?>"
                        </blockquote>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="text-center mt-16">
            <div class="inline-flex items-center space-x-2 text-gray-300 mb-6">
                <span class="iconify w-5 h-5" data-icon="heroicons:information-circle"></span>
                <p>Mais de 500+ clientes satisfeitos em todo o Brasil</p>
            </div>
            <div class="flex justify-center space-x-4">
                <?= $this->insert('components/common/button', [
                    'text' => 'Ver Mais Depoimentos',
                    'icon' => 'heroicons:arrow-right',
                    'href' => '#testimonials',
                    'style' => 'outline',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
                <?= $this->insert('components/common/button', [
                    'text' => 'Seja Nosso Cliente',
                    'icon' => 'heroicons:heart',
                    'href' => '/contato',
                    'style' => 'solid',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
            </div>
        </div>
    </div>
</section>