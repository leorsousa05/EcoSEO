<?php

return [
    'name' => 'Sua Empresa',
    'description' => 'Soluções digitais para seu negócio crescer.',
    'tagline' => 'Bem-vindo ao nosso site',
    'gtm' => 'GTM-XXXXXXX',
    'favicon_url_32' => "https://placehold.co/32x32/png",
    'favicon_url_16' => "https://placehold.co/16x16/png",
    
    // Configuração da API - Desabilitada por padrão
    'api_enabled' => false,
    'api_config' => [
        'base_url' => '', // URL da API (ex: https://api.seudominio.com)
        'token' => '', // Token de autenticação da API
        'enabled' => false, // Habilita/desabilita as requisições à API
    ],
    
    // Para habilitar a API, altere para:
    // 'api_enabled' => true,
    // 'api_config' => [
    //     'base_url' => 'https://api.seudominio.com',
    //     'token' => 'seu_token_aqui',
    //     'enabled' => true,
    // ],
    
    'whatsapp' => [
        'number' => '5511999999999',
        'display' => '(11) 99999-9999',
        'message' => 'Olá! Gostaria de mais informações.',
    ],
    'phone' => [
        'number' => '1133334444',
        'display' => '(11) 3333-4444',
    ],
    'email' => [
        'primary' => 'contato@exemplo.com',
        'support' => 'suporte@exemplo.com',
    ],
]; 