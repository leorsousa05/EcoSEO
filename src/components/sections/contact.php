<?php
use App\Core\Mailer;

$config = require __DIR__ . '/../../config/email.php';
$siteConfig = require __DIR__ . '/../../config/site.php';

$feedback = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? 'Contato pelo site');
    $message = nl2br(htmlspecialchars($_POST['message'] ?? ''));

    $mailer = new Mailer();
    $toEmail = $config['to_email'] ?? $config['username'];
    $body = "<p><strong>Nome:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Assunto:</strong> {$subject}</p>";
    $body .= "<p><strong>Mensagem:</strong><br>{$message}</p>";

    $sent = $mailer->send($toEmail, "Contato: {$subject}", $body, strip_tags($body));

    if ($sent) {
        $feedback = '<div class="p-4 mb-4 text-success bg-success-light rounded-lg transform transition-all duration-300 ease-in-out">Sua mensagem foi enviada com sucesso!</div>';
    } else {
        $feedback = '<div class="p-4 mb-4 text-error bg-error-light rounded-lg transform transition-all duration-300 ease-in-out">Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.</div>';
    }
}
?>

<section id="contato" class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="container mx-auto px-4 relative">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl font-bold mb-6 text-gray-900">Entre em Contato</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                Estamos prontos para ajudar você a alcançar seus objetivos. Preencha o formulário abaixo ou utilize nossos canais de atendimento para falar com nossa equipe.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <div class="bg-white p-10 rounded-2xl shadow-xl transform transition-all duration-300 hover:shadow-2xl">
                <h3 class="text-2xl font-bold mb-8 text-gray-900">Informações de Contato</h3>
                
                <div class="space-y-8">
                    <div class="flex items-start space-x-5 group">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-success-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-success">
                                <span class="iconify w-6 h-6 text-success group-hover:text-white" data-icon="mdi:whatsapp"></span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">WhatsApp</h4>
                            <a href="https://wa.me/<?= $siteConfig['whatsapp']['number'] ?>" 
                               class="text-success hover:text-success-hover transition-colors duration-300 inline-flex items-center">
                                <?= $siteConfig['whatsapp']['display'] ?>
                                <span class="iconify ml-2 w-4 h-4" data-icon="mdi:arrow-right"></span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-5 group">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-info-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-info">
                                <span class="iconify w-6 h-6 text-info group-hover:text-white" data-icon="mdi:email"></span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">Email</h4>
                            <a href="mailto:<?= $siteConfig['email']['primary'] ?>" 
                               class="text-info hover:text-info-hover transition-colors duration-300 inline-flex items-center">
                                <?= $siteConfig['email']['primary'] ?>
                                <span class="iconify ml-2 w-4 h-4" data-icon="mdi:arrow-right"></span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-5 group">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-error-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-error">
                                <span class="iconify w-6 h-6 text-error group-hover:text-white" data-icon="mdi:map-marker"></span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">Localização</h4>
                            <p class="text-gray-600 leading-relaxed">
                                <?= $siteConfig['address']['street'] ?><br>
                                <?= $siteConfig['address']['city'] ?> - <?= $siteConfig['address']['state'] ?><br>
                                CEP: <?= $siteConfig['address']['zip'] ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-5 group">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-warning-light rounded-xl flex items-center justify-center transform transition-all duration-300 group-hover:scale-110 group-hover:bg-warning">
                                <span class="iconify w-6 h-6 text-warning group-hover:text-white" data-icon="mdi:clock"></span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900 mb-1">Horário de Funcionamento</h4>
                            <p class="text-gray-600 leading-relaxed">
                                <?= $siteConfig['business_hours']['weekdays'] ?><br>
                                <?= $siteConfig['business_hours']['saturday'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-10 rounded-2xl shadow-xl transform transition-all duration-300 hover:shadow-2xl">
                <h3 class="text-2xl font-bold mb-8 text-gray-900">Envie sua Mensagem</h3>
                <?= $feedback ?>
                <form method="post" class="space-y-6">
                    <div class="relative">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome</label>
                        <div class="relative">
                            <span class="iconify absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" data-icon="mdi:account"></span>
                            <input type="text" name="name" id="name" required 
                                   class="pl-10 w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300"
                                   placeholder="Seu nome completo">
                        </div>
                    </div>
                    
                    <div class="relative">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <span class="iconify absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" data-icon="mdi:email"></span>
                            <input type="email" name="email" id="email" required 
                                   class="pl-10 w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300"
                                   placeholder="seu@email.com">
                        </div>
                    </div>
                    
                    <div class="relative">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Assunto</label>
                        <div class="relative">
                            <span class="iconify absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" data-icon="mdi:tag"></span>
                            <input type="text" name="subject" id="subject" required 
                                   class="pl-10 w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300"
                                   placeholder="Assunto da mensagem">
                        </div>
                    </div>
                    
                    <div class="relative">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Mensagem</label>
                        <div class="relative">
                            <span class="iconify absolute left-3 top-4 w-5 h-5 text-gray-400" data-icon="mdi:message"></span>
                            <textarea name="message" id="message" rows="5" required 
                                      class="pl-10 w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300"
                                      placeholder="Digite sua mensagem aqui..."></textarea>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <?= $this->insert('components/common/button', [
                            'text' => 'Enviar Mensagem',
                            'type' => 'submit',
                            'variant' => 'primary',
                            'icon' => 'mdi:send'
                        ]) ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> 