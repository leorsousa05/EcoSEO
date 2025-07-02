# EcoSEO - Template PHP Otimizado para SEO

**EcoSEO** é um template moderno e de alta performance para criação de websites, construído com **PHP**, **Tailwind CSS** e **Vite**. Ele foi projetado com foco total em **SEO (Search Engine Optimization)**, performance e acessibilidade, oferecendo uma base sólida e produtiva para desenvolvedores e agências.

## 🚀 Principais Características

O template já vem com uma série de otimizações e funcionalidades prontas para usar:

  - **SEO Otimizado:**

      - **Meta Tags Dinâmicas:** Títulos, descrições e palavras-chave gerados por página.
      - **Open Graph & Twitter Cards:** Tags para compartilhamento otimizado em redes sociais.
      - **URLs Canônicas:** Geração automática de `link rel="canonical"` para evitar conteúdo duplicado.
      - **Sitemap.xml Dinâmico:** Geração automática do `sitemap.xml` a partir das rotas e de uma API.
      - **Robots.txt:** Arquivo `robots.txt` gerado dinamicamente para instruir os crawlers.
      - **Dados Estruturados (Schema.org):** Base preparada para fácil implementação de JSON-LD.

  - **Design e Componentes:**

      - **Tailwind CSS:** Um framework CSS utility-first para prototipação rápida e design moderno.
      - **Componentização:** O projeto é dividido em seções e componentes reutilizáveis (cabeçalho, rodapé, botões, etc.).
      - **Design Responsivo:** Totalmente adaptado para desktops, tablets e smartphones.
      - **Sistema de Cores Centralizado:** Fácil personalização das cores primária, secundária, sucesso, erro, etc. através de variáveis CSS.

  - **Performance e Desenvolvimento:**

      - **Vite:** Utiliza Vite para um ambiente de desenvolvimento extremamente rápido com Hot Module Replacement (HMR).
      - **PHP 8+:** Estrutura backend simples e eficiente, sem a necessidade de um framework complexo.
      - **Roteamento Dinâmico:** Sistema de rotas limpas e amigáveis para SEO usando `FastRoute`.
      - **Conteúdo via API:** Inclui um `ApiClient` para buscar conteúdo de um backend externo, ideal para desacoplar o front-end.

## 🛠️ Tecnologias Utilizadas

  - **Backend:** PHP
  - **Frontend:** Tailwind CSS, JavaScript (com suporte a módulos)
  - **Build Tool:** Vite
  - **Gerenciadores de Pacotes:** Composer (PHP) e NPM (JS)
  - **Bibliotecas:**
      - `league/plates`: Sistema de templates nativo para PHP.
      - `nikic/fast-route`: Roteador rápido para PHP.
      - `@glidejs/glide`: Carrossel leve e eficiente.
      - `iconify/iconify`: Milhares de ícones open source.

## 📦 Instalação e Uso

Siga os passos abaixo para rodar o projeto localmente.

1.  **Clone o repositório:**

    ```bash
    git clone https://github.com/leorsousa05/ecoseo.git
    cd ecoseo
    ```

2.  **Instale as dependências do PHP:**

    ```bash
    composer install
    ```

3.  **Instale as dependências do Node.js:**

    ```bash
    npm install
    ```

4.  **Inicie o ambiente de desenvolvimento:**
    O comando abaixo irá iniciar o servidor PHP e o Vite simultaneamente.

    ```bash
    npm run dev
    ```

5.  **Acesse o projeto:**
    O site estará disponível em `http://localhost:8000`.

## 🏗️ Estrutura do Projeto

A estrutura de pastas foi pensada para ser intuitiva e escalável.

```
ecoseo/
├── public/              # Diretório público, destino dos arquivos de build
├── src/
│   ├── assets/          # Arquivos CSS e JS fontes
│   ├── components/      # Componentes PHP reutilizáveis
│   ├── config/          # Arquivos de configuração do site e e-mail
│   ├── Core/            # Classes principais (Router, Mailer, ApiClient)
│   └── views/           # Arquivos de visualização (páginas e layouts)
├── .gitignore           # Arquivos e pastas ignorados pelo Git
├── composer.json        # Dependências do PHP
├── package.json         # Dependências do Node.js e scripts
├── router.php           # Roteador para o servidor de desenvolvimento do PHP
└── vite.config.js       # Configurações do Vite
```

## 🎨 Personalização

### Configurações Gerais

As principais informações do site, como nome, contatos e redes sociais, podem ser alteradas no arquivo:
`src/config/site.php`

### Cores e Estilos

As cores, fontes e espaçamentos são centralizados no arquivo `src/assets/css/style.css` dentro do bloco `@theme`. Altere as variáveis CSS para customizar a aparência de todo o site.

```css
@theme {
  --color-primary: #8b5cf6; /* Cor primária */
  --color-secondary: #6b7280; /* Cor secundária */
  /* ... outras variáveis */
}
```

### Adicionando Novas Páginas (Rotas)

Para criar uma nova página, siga estes dois passos:

1.  **Adicione a rota** no arquivo `src/Core/Router.php`.

    ```php
    // Exemplo de nova rota para uma página de "Portfólio"
    $r->addRoute('GET', $baseUrl . '/portfolio', 'views/portfolio');
    ```

2.  **Crie o arquivo da view** em `src/views/portfolio.php`. Você pode usar a estrutura de outras páginas como base.

    ```php
    <?php
    $this->layout('views/layouts/base', [
        'title' => 'Portfólio - ' . $siteConfig['name'],
        'description' => 'Conheça nossos trabalhos.'
    ]);
    ?>

    <?php $this->start('main_content') ?>
        <h1>Nossa página de Portfólio</h1>
        <?php $this->stop() ?>
    ```

## 📦 Build para Produção

Para compilar e otimizar os arquivos CSS e JavaScript para o ambiente de produção, rode o comando:

```bash
npm run build
```

Este comando irá gerar os arquivos finais no diretório `public/assets/`. O `layout/base.php` já está configurado para carregar os arquivos corretos automaticamente, seja em ambiente de desenvolvimento ou produção.

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 🤝 Contribuição

Contribuições são muito bem-vindas\! Por favor, abra uma *issue* para discutir o que você gostaria de mudar ou envie um *pull request*.

## 📧 Contato

Leonardo Sousa – contato.leonardo.ribeiro.sousa@gmail.com