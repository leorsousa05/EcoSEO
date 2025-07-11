# Componentes Reutilizáveis

Esta biblioteca de componentes foi criada para ser usada em qualquer tipo de projeto PHP. Todos os componentes seguem as convenções do projeto e usam as classes CSS semânticas definidas em `style.css`.

## 📁 Estrutura dos Componentes

```
src/components/
├── common/
│   ├── form/           # Componentes de formulário
│   ├── layout/         # Componentes de layout
│   ├── navigation/     # Componentes de navegação
│   ├── media/          # Componentes de mídia
│   ├── feedback/       # Componentes de feedback
│   ├── data/           # Componentes de dados
│   ├── interaction/    # Componentes de interação
│   └── sections/       # Seções específicas do site
```

## 🎨 Componentes de Formulário

### Input
```php
<?= $this->insert('components/common/form/input', [
    'type' => 'email',
    'name' => 'email',
    'label' => 'Email',
    'placeholder' => 'seu@email.com',
    'required' => true,
    'icon' => 'heroicons:envelope',
    'error' => $errors['email'] ?? '',
    'help' => 'Digite seu email válido'
]) ?>
```

### Textarea
```php
<?= $this->insert('components/common/form/textarea', [
    'name' => 'message',
    'label' => 'Mensagem',
    'placeholder' => 'Digite sua mensagem...',
    'rows' => 5,
    'required' => true,
    'icon' => 'heroicons:chat-bubble-left'
]) ?>
```

### Select
```php
<?= $this->insert('components/common/form/select', [
    'name' => 'category',
    'label' => 'Categoria',
    'options' => [
        'seo' => 'SEO',
        'marketing' => 'Marketing Digital',
        'design' => 'Design'
    ],
    'placeholder' => 'Selecione uma categoria',
    'required' => true
]) ?>
```

## 🏗️ Componentes de Layout

### Container
```php
<?= $this->insert('components/common/layout/container', [
    'size' => 'lg',
    'padding' => true,
    'centered' => true,
    'content' => '<p>Conteúdo aqui</p>'
]) ?>
```

### Grid
```php
<?= $this->insert('components/common/layout/grid', [
    'cols' => 3,
    'gap' => 6,
    'align' => 'center',
    'justify' => 'between',
    'content' => '<div>Item 1</div><div>Item 2</div><div>Item 3</div>'
]) ?>
```

## 🧭 Componentes de Navegação

### Breadcrumb
```php
<?= $this->insert('components/common/navigation/breadcrumb', [
    'items' => [
        ['name' => 'Início', 'url' => '/'],
        ['name' => 'Produtos', 'url' => '/produtos'],
        ['name' => 'Detalhes']
    ],
    'separator' => 'chevron-right'
]) ?>
```

### Pagination
```php
<?= $this->insert('components/common/navigation/pagination', [
    'currentPage' => 3,
    'totalPages' => 10,
    'baseUrl' => '/produtos',
    'showFirstLast' => true,
    'showPrevNext' => true,
    'maxVisible' => 5
]) ?>
```

## 📺 Componentes de Mídia

### Image
```php
<?= $this->insert('components/common/media/image', [
    'src' => '/images/product.jpg',
    'alt' => 'Produto',
    'width' => '400',
    'height' => '300',
    'lazy' => true,
    'rounded' => true,
    'shadow' => true,
    'overlay' => true,
    'caption' => 'Descrição da imagem'
]) ?>
```

### Video
```php
<?= $this->insert('components/common/media/video', [
    'src' => '/videos/demo.mp4',
    'poster' => '/images/poster.jpg',
    'controls' => true,
    'autoplay' => false,
    'loop' => false,
    'muted' => false,
    'rounded' => true
]) ?>
```

## 💬 Componentes de Feedback

### Loading
```php
<?= $this->insert('components/common/feedback/loading', [
    'type' => 'spinner', // spinner, dots, pulse
    'size' => 'md', // xs, sm, md, lg, xl
    'text' => 'Carregando...',
    'overlay' => false
]) ?>
```

### Empty State
```php
<?= $this->insert('components/common/feedback/empty-state', [
    'title' => 'Nenhum produto encontrado',
    'description' => 'Não há produtos disponíveis no momento.',
    'icon' => 'heroicons:shopping-bag',
    'action' => [
        'text' => 'Adicionar Produto',
        'href' => '/produtos/novo',
        'variant' => 'primary'
    ]
]) ?>
```

## 📊 Componentes de Dados

### Table
```php
<?= $this->insert('components/common/data/table', [
    'headers' => ['Nome', 'Email', 'Status', 'Ações'],
    'rows' => [
        ['João Silva', 'joao@email.com', 'Ativo', '<button>Editar</button>'],
        ['Maria Santos', 'maria@email.com', 'Inativo', '<button>Editar</button>']
    ],
    'striped' => true,
    'hover' => true,
    'bordered' => false,
    'compact' => false
]) ?>
```

### Card
```php
<?= $this->insert('components/common/data/card', [
    'title' => 'Produto Premium',
    'subtitle' => 'R$ 99,90/mês',
    'content' => '<p>Descrição do produto...</p>',
    'image' => [
        'src' => '/images/product.jpg',
        'alt' => 'Produto Premium',
        'overlay' => 'Premium'
    ],
    'actions' => [
        [
            'text' => 'Comprar',
            'href' => '/comprar',
            'variant' => 'primary'
        ],
        [
            'text' => 'Saiba Mais',
            'href' => '/produto/1',
            'variant' => 'secondary'
        ]
    ],
    'footer' => '<p class="text-sm text-gray-500">* Condições especiais</p>',
    'elevated' => true,
    'bordered' => false
]) ?>
```

## 🎯 Componentes de Interação

### Modal
```php
<?= $this->insert('components/common/interaction/modal', [
    'id' => 'product-modal',
    'title' => 'Detalhes do Produto',
    'content' => '<p>Conteúdo do modal...</p>',
    'size' => 'lg', // sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, full
    'closeOnOverlay' => true,
    'showCloseButton' => true,
    'footer' => '<button onclick="closeModal(\'product-modal\')">Fechar</button>'
]) ?>

<!-- Para abrir o modal -->
<button onclick="openModal('product-modal')">Abrir Modal</button>
```

### Tooltip
```php
<?= $this->insert('components/common/interaction/tooltip', [
    'content' => '<span class="iconify w-5 h-5 text-gray-400" data-icon="heroicons:question-mark-circle"></span>',
    'text' => 'Informação adicional sobre este campo',
    'position' => 'top', // top, bottom, left, right
    'trigger' => 'hover' // hover, click
]) ?>
```

## 🎨 Convenções de Design

### Cores Semânticas
Todos os componentes usam as classes CSS definidas em `style.css`:

- `text-primary`, `bg-primary` - Cor primária
- `text-secondary`, `bg-secondary` - Cor secundária
- `text-success`, `bg-success` - Sucesso
- `text-error`, `bg-error` - Erro
- `text-warning`, `bg-warning` - Aviso
- `text-info`, `bg-info` - Informação

### Responsividade
Os componentes são responsivos por padrão e usam as classes do Tailwind CSS:
- `sm:` - 640px+
- `md:` - 768px+
- `lg:` - 1024px+
- `xl:` - 1280px+
- `2xl:` - 1536px+

### Acessibilidade
Todos os componentes incluem:
- Atributos ARIA apropriados
- Navegação por teclado
- Contraste adequado
- Textos alternativos

## 🔧 Personalização

### Atributos Customizados
Todos os componentes aceitam atributos HTML customizados:

```php
<?= $this->insert('components/common/form/input', [
    'name' => 'email',
    'label' => 'Email',
    'attributes' => [
        'data-testid' => 'email-input',
        'data-validation' => 'email'
    ]
]) ?>
```

### Classes CSS Customizadas
Você pode adicionar classes CSS customizadas:

```php
<?= $this->insert('components/common/button', [
    'text' => 'Enviar',
    'variant' => 'primary',
    'attributes' => [
        'class' => 'custom-button-class'
    ]
]) ?>
```

## 📝 Exemplos de Uso

### Formulário de Contato
```php
<form method="post" class="space-y-6">
    <?= $this->insert('components/common/form/input', [
        'type' => 'text',
        'name' => 'name',
        'label' => 'Nome',
        'required' => true,
        'icon' => 'heroicons:user'
    ]) ?>
    
    <?= $this->insert('components/common/form/input', [
        'type' => 'email',
        'name' => 'email',
        'label' => 'Email',
        'required' => true,
        'icon' => 'heroicons:envelope'
    ]) ?>
    
    <?= $this->insert('components/common/form/textarea', [
        'name' => 'message',
        'label' => 'Mensagem',
        'required' => true,
        'icon' => 'heroicons:chat-bubble-left'
    ]) ?>
    
    <?= $this->insert('components/common/button', [
        'text' => 'Enviar Mensagem',
        'type' => 'submit',
        'variant' => 'primary'
    ]) ?>
</form>
```

### Lista de Produtos
```php
<?= $this->insert('components/common/layout/grid', [
    'cols' => 3,
    'gap' => 6,
    'content' => implode('', array_map(function($product) {
        return $this->insert('components/common/data/card', [
            'title' => $product['name'],
            'subtitle' => $product['price'],
            'content' => $product['description'],
            'image' => [
                'src' => $product['image'],
                'alt' => $product['name']
            ],
            'actions' => [
                [
                    'text' => 'Comprar',
                    'href' => '/comprar/' . $product['id'],
                    'variant' => 'primary'
                ]
            ]
        ]);
    }, $products))
]) ?>
```

## 🚀 Boas Práticas

1. **Sempre use os componentes existentes** antes de criar novos
2. **Mantenha a consistência** usando as mesmas variáveis e padrões
3. **Teste a responsividade** em diferentes tamanhos de tela
4. **Verifique a acessibilidade** usando ferramentas como Lighthouse
5. **Documente componentes customizados** para reutilização futura
6. **Use as classes CSS semânticas** definidas no projeto
7. **Mantenha os componentes simples** e focados em uma responsabilidade

## 🔄 Atualizações

Para adicionar novos componentes:

1. Crie o arquivo na pasta apropriada
2. Siga as convenções de nomenclatura
3. Use as classes CSS semânticas
4. Adicione documentação
5. Teste em diferentes contextos
6. Atualize este README se necessário 