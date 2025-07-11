<?php
$title = $title ?? 'Perguntas Frequentes';
$subtitle = $subtitle ?? 'Tire suas dúvidas';
$description = $description ?? 'Respostas para as principais dúvidas sobre nossos serviços e processos.';
$faqs = $faqs ?? [];
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
                'text' => 'FAQ',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:question-mark-circle',
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

        <div class="max-w-4xl mx-auto space-y-6">
            <?php foreach ($faqs as $faq): ?>
                <div class="bg-white bg-opacity-10 backdrop-blur-lg p-8 rounded-2xl shadow-xl">
                    <h4 class="text-xl font-semibold text-black mb-4"><?= $faq['question'] ?></h4>
                    <p class="text-gray-700 leading-relaxed"><?= $faq['answer'] ?></p>
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