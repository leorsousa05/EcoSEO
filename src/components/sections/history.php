<?php
$title = $title ?? 'Uma Jornada de Inovação e Resultados';
$description = $description ?? 'Fundada em 2020, nossa empresa nasceu da paixão por tecnologia e da vontade de transformar negócios através de soluções digitais inovadoras.';
$longDescription = $longDescription ?? 'Ao longo dos anos, ajudamos mais de 500 empresas a alcançarem seus objetivos digitais, sempre com foco em resultados mensuráveis e crescimento sustentável. Nossa missão é democratizar o acesso à tecnologia de qualidade, tornando-a acessível para empresas de todos os tamanhos.';
$stats = $stats ?? [
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
];
$image = $image ?? 'https://placehold.co/600x400/222/fff?text=Nossa+História';
$imageAlt = $imageAlt ?? 'Nossa história e jornada';
$attributes = $attributes ?? [];
$customClass = $customClass ?? '';

$attrs = '';
foreach ($attributes as $key => $value) {
    $attrs .= " $key=\"$value\"";
}
?>

<section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden"<?= $attrs ?>>
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    
    <div class="container relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <?= $this->insert('components/common/badge', [
                    'text' => 'Nossa História',
                    'color' => 'primary',
                    'size' => 'md',
                    'icon' => 'heroicons:book-open',
                ]) ?>
                
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 tracking-tight">
                    <?= $title ?>
                </h2>
                
                <p class="text-xl text-gray-600 leading-relaxed">
                    <?= $description ?>
                </p>
                
                <p class="text-xl text-gray-600 leading-relaxed">
                    <?= $longDescription ?>
                </p>
                
                <div class="grid grid-cols-3 gap-8 pt-8">
                    <?php foreach ($stats as $stat): ?>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary"><?= $stat['number'] ?></div>
                            <div class="text-sm text-gray-600"><?= $stat['label'] ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="relative">
                <div class="relative z-10">
                    <img src="<?= $image ?>"
                         alt="<?= $imageAlt ?>"
                         loading="lazy"
                         decoding="async"
                         class="w-full h-auto rounded-2xl shadow-2xl transform transition-all duration-500 hover:scale-105"
                    />
                </div>
                <div class="absolute -bottom-4 -right-4 w-full h-full bg-primary opacity-20 rounded-2xl transform rotate-3"></div>
            </div>
        </div>
    </div>
</section> 