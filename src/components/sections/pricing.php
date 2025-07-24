<?php
$show_toggle = $show_toggle ?? true;
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
        <div class="max-w-3xl mx-auto text-center mb-16">
            <?= $this->insert('components/common/badge', [
                'text' => 'Preços',
                'color' => 'primary',
                'size' => 'md',
                'icon' => 'heroicons:currency-dollar',
            ]) ?>
            
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 tracking-tight">
                <?= $title ?>
            </h2>
            <h3 class="text-2xl md:text-3xl font-semibold mb-6 text-primary">
                <?= $subtitle ?>
            </h3>
            <p class="text-xl text-gray-600 leading-relaxed">
                <?= $description ?>
            </p>
        </div>

        <?php if ($show_toggle): ?>
            <div class="flex justify-center mb-12">
                <div class="bg-gray-100 p-1 rounded-2xl">
                    <div class="flex items-center space-x-4">
                        <button class="px-6 py-3 rounded-xl font-medium transition-all duration-300 bg-white text-gray-900 shadow-sm" id="monthly-toggle">
                            Mensal
                        </button>
                        <button class="px-6 py-3 rounded-xl font-medium transition-all duration-300 text-gray-600 hover:text-gray-900" id="yearly-toggle">
                            Anual <span class="text-success font-bold">-20%</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <?php foreach ($plans as $plan): ?>
                <div class="relative">
                    <?php if ($plan['popular']): ?>
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-20">
                            <?= $this->insert('components/common/badge', [
                                'text' => 'Mais Popular',
                                'color' => $plan['color'],
                                'size' => 'sm',
                                'icon' => 'heroicons:star',
                            ]) ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2 <?= $plan['popular'] ? 'ring-2 ring-' . $plan['color'] . ' relative z-10' : '' ?>">
                        <div class="text-center mb-8">
                            <h4 class="text-2xl font-bold text-gray-900 mb-2"><?= $plan['name'] ?></h4>
                            <p class="text-gray-600 mb-6"><?= $plan['description'] ?></p>
                            
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-gray-900"><?= $plan['price'] ?></span>
                                <span class="text-gray-600"><?= $plan['period'] ?></span>
                            </div>
                        </div>
                        
                        <ul class="space-y-4 mb-8">
                            <?php foreach ($plan['features'] as $feature): ?>
                                <li class="flex items-center space-x-3">
                                    <span class="iconify w-5 h-5 text-success" data-icon="heroicons:check-circle"></span>
                                    <span class="text-gray-700"><?= $feature ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div class="text-center">
                            <?= $this->insert('components/common/button', [
                                'text' => $plan['button_text'],
                                'href' => $plan['button_href'],
                                'style' => $plan['popular'] ? 'solid' : 'outline',
                                'color' => $plan['color'],
                                'size' => 'lg',
                                'customClass' => 'w-full group',
                            ]) ?>
                        </div>
                        
                        <?php if ($plan['popular']): ?>
                            <div class="mt-4 text-center">
                                <p class="text-sm text-gray-500">Sem compromisso • Cancele a qualquer momento</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-16">
            <div class="inline-flex items-center space-x-2 text-gray-600 mb-6">
                <span class="iconify w-5 h-5" data-icon="heroicons:information-circle"></span>
                <p>Precisa de um plano personalizado? Entre em contato conosco.</p>
            </div>
            <div class="flex justify-center space-x-4">
                <?= $this->insert('components/common/button', [
                    'text' => 'Falar com Vendas',
                    'icon' => 'heroicons:phone',
                    'href' => '/contato',
                    'style' => 'outline',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
                <?= $this->insert('components/common/button', [
                    'text' => 'Ver Comparativo',
                    'icon' => 'heroicons:chart-bar',
                    'href' => '#pricing-comparison',
                    'style' => 'solid',
                    'size' => 'lg',
                    'customClass' => 'group',
                ]) ?>
            </div>
        </div>
    </div>
</section>

<?php if ($show_toggle): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const monthlyToggle = document.getElementById('monthly-toggle');
    const yearlyToggle = document.getElementById('yearly-toggle');
    
    if (monthlyToggle && yearlyToggle) {
        monthlyToggle.addEventListener('click', function() {
            monthlyToggle.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
            monthlyToggle.classList.remove('text-gray-600');
            yearlyToggle.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
            yearlyToggle.classList.add('text-gray-600');
        });
        
        yearlyToggle.addEventListener('click', function() {
            yearlyToggle.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
            yearlyToggle.classList.remove('text-gray-600');
            monthlyToggle.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
            monthlyToggle.classList.add('text-gray-600');
        });
    }
});
</script>
<?php endif; ?> 