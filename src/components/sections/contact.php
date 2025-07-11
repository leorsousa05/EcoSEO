<?php
use App\Core\Mailer;

$config = require __DIR__ . '/../../config/email.php';
$siteConfig = require __DIR__ . '/../../config/site.php';
$seoConfig = require __DIR__ . '/../../config/seo.php';

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
        $feedback = $this->insert('components/common/alert', [
            'type' => 'success',
            'message' => 'Sua mensagem foi enviada com sucesso!',
        ]);
    } else {
        $feedback = $this->insert('components/common/alert', [
            'type' => 'error',
            'message' => 'Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.',
        ]);
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
                                <?= $seoConfig['address']['street'] ?><br>
                                <?= $seoConfig['address']['city'] ?> - <?= $seoConfig['address']['state'] ?><br>
									CEP: <?= $seoConfig['address']['zip'] ?>
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
									<?= $seoConfig['business_hours']['weekdays'] ?><br>
                                <?= $seoConfig['business_hours']['saturday'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-10 rounded-2xl shadow-xl transform transition-all duration-300 hover:shadow-2xl">
                <h3 class="text-2xl font-bold mb-8 text-gray-900">Envie sua Mensagem</h3>
                <?= $feedback ?>
                <form method="post" class="space-y-6">
                    <?= $this->insert('components/common/form/input', [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'Nome',
                        'placeholder' => 'Seu nome completo',
                        'required' => true,
                        'icon' => 'mdi:account',
                    ]) ?>
                    
                    <?= $this->insert('components/common/form/input', [
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email',
                        'placeholder' => 'seu@email.com',
                        'required' => true,
                        'icon' => 'mdi:email',
                    ]) ?>
                    
                    <?= $this->insert('components/common/form/input', [
                        'type' => 'text',
                        'name' => 'subject',
                        'label' => 'Assunto',
                        'placeholder' => 'Assunto da mensagem',
                        'required' => true,
                        'icon' => 'mdi:tag',
                    ]) ?>
                    
                    <?= $this->insert('components/common/form/textarea', [
                        'name' => 'message',
                        'label' => 'Mensagem',
                        'placeholder' => 'Digite sua mensagem aqui...',
                        'required' => true,
                        'rows' => 5,
                        'icon' => 'mdi:message',
                    ]) ?>
                    
                    <div class="flex justify-end">
                        <?= $this->insert('components/common/button', [
                            'text' => 'Enviar Mensagem',
                            'type' => 'submit',
                            'variant' => 'primary',
                            'icon' => 'mdi:send',
                        ]) ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> 
