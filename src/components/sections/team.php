<?php
$title = $title ?? 'Nossa Equipe';
$subtitle = $subtitle ?? 'Especialistas apaixonados por resultados';
$description = $description ?? 'Nossa equipe é composta por profissionais experientes e certificados, dedicados a entregar soluções excepcionais.';
$members = $members ?? [
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
];
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
                'text' => 'Equipe',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:users',
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($members as $member): ?>
                <div class="bg-white p-8 rounded-2xl shadow-xl transform transition-all duration-300 hover:bg-neutral-100 hover:-translate-y-2">
                    <div class="text-center mb-6">
                        <?= $this->insert('components/common/media/image', [
                            'src' => $member['avatar'],
                            'alt' => $member['name'] . ' - ' . $member['role'],
                            'attributes' => [
                                'class' => 'w-24 h-24 rounded-full mx-auto mb-4 object-cover',
                                'loading' => 'lazy',
                            ],
                        ]) ?>
                        <h4 class="text-xl font-semibold text-black"><?= $member['name'] ?></h4>
                        <p class="text-primary font-medium"><?= $member['role'] ?></p>
                    </div>
                    <p class="text-black leading-relaxed text-center">
                        <?= $member['description'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> 