<?php
/**
 * Hero Section for About Page
 * 
 * This component creates a visually appealing hero section for the About page,
 * featuring responsive design, animations, and SEO-friendly structure.
 */
?>

<section class="relative min-h-[90vh] bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Parallax Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-[url('/assets/images/pattern.svg')] opacity-10"></div>
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-primary/20 to-transparent"></div>
    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-7xl mx-auto">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Column: Text Content -->
                <div class="space-y-8 animate-fade-in">
                    <!-- Main Title -->
                    <div class="space-y-4">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                            <span class="bg-gradient-to-r from-primary to-primary-dark bg-clip-text text-transparent">
                                Nossa História
                            </span>
                        </h1>
                        <div class="h-1 w-24 bg-gradient-to-r from-primary to-primary-dark rounded-full"></div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-6">
                        <p class="text-lg md:text-xl text-gray-300 leading-relaxed">
                            Somos uma empresa dedicada a transformar ideias em realidade digital, 
                            combinando expertise técnica com criatividade para entregar soluções 
                            que fazem a diferença.
                        </p>
                        
                        <!-- Key Features List -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start space-x-4 group">
                                <span class="iconify text-2xl text-primary group-hover:scale-110 transition-transform" data-icon="mdi:rocket-launch-outline"></span>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-2">Inovação Constante</h3>
                                    <p class="text-gray-400">Sempre à frente com as últimas tecnologias e tendências do mercado.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <span class="iconify text-2xl text-primary group-hover:scale-110 transition-transform" data-icon="mdi:account-group-outline"></span>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-2">Equipe Especializada</h3>
                                    <p class="text-gray-400">Profissionais altamente qualificados e apaixonados pelo que fazem.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <span class="iconify text-2xl text-primary group-hover:scale-110 transition-transform" data-icon="mdi:chart-line"></span>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-2">Resultados Comprovados</h3>
                                    <p class="text-gray-400">Histórico de sucesso em projetos de diversos segmentos.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <span class="iconify text-2xl text-primary group-hover:scale-110 transition-transform" data-icon="mdi:handshake-outline"></span>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-2">Parceria Duradoura</h3>
                                    <p class="text-gray-400">Construímos relacionamentos baseados em confiança e resultados.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <?= $this->insert('components/common/button', [
                            'text' => 'Fale Conosco',
                            'href' => '/contato',
                            'variant' => 'primary',
                            'attributes' => [
                                'class' => 'group'
                            ]
                        ]) ?>
                        <?= $this->insert('components/common/button', [
                            'text' => 'Conheça Nossos Trabalhos', 
                            'href' => '/portfolio',
                            'variant' => 'secondary',
                            'attributes' => [
                                'class' => 'group'
                            ]
                        ]) ?>
                    </div>
                </div>

                <!-- Right Column: Visual Element -->
                <div class="relative">
                    <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                        <img 
                            src="https://placehold.co/800x600" 
                            alt="Nossa equipe em ação" 
                            class="w-full h-auto rounded-2xl shadow-2xl"
                            loading="lazy"
                        />
                    </div>
                    
                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-primary/20 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-primary-dark/20 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <span class="iconify text-3xl text-white/50" data-icon="mdi:chevron-down"></span>
    </div>
</section>

<style>
@keyframes fade-in {
    from { 
        opacity: 0; 
        transform: translateY(20px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out forwards;
}


.parallax {
    transform: translateY(var(--parallax-offset, 0));
    transition: transform 0.1s linear;
}


@media (max-width: 768px) {
    .text-6xl {
        font-size: 2.5rem;
    }
    
    .text-5xl {
        font-size: 2rem;
    }
    
    .text-4xl {
        font-size: 1.75rem;
    }
}
</style>

<script>
// Parallax Effect
document.addEventListener('DOMContentLoaded', function() {
    const parallaxElements = document.querySelectorAll('.parallax');
    
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            element.style.setProperty('--parallax-offset', `${scrolled * speed}px`);
        });
    });
});

// Intersection Observer for Fade-in Animation
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.animate-on-scroll').forEach(element => {
    observer.observe(element);
});
</script>
