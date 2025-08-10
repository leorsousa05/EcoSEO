<?php 
$siteConfig = require __DIR__ . '/../config/site.php'; 
$seoConfig = require __DIR__ . '/../config/seo.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $this->e($title ?? $seoConfig['seo']['title']) ?></title>
    <meta name="description" content="<?= $this->e($description ?? $seoConfig['seo']['description']) ?>" />
    <meta name="keywords" content="<?= $this->e($keywords ?? $seoConfig['seo']['keywords']) ?>" />
    
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $this->e($ogUrl ?? $seoConfig['seo']['domain'] . $_SERVER['REQUEST_URI']) ?>" />
    <meta property="og:title" content="<?= $this->e($ogTitle ?? ($title ?? $seoConfig['seo']['title'])) ?>" />
    <meta property="og:description" content="<?= $this->e($ogDescription ?? ($description ?? $seoConfig['seo']['description'])) ?>" />
    <meta property="og:image" content="<?= $this->e($ogImage ?? $seoConfig['seo']['og_image']) ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?= $this->e($ogUrl ?? $seoConfig['seo']['domain'] . $_SERVER['REQUEST_URI']) ?>" />
    <meta name="twitter:title" content="<?= $this->e($ogTitle ?? ($title ?? $seoConfig['seo']['title'])) ?>" />
    <meta name="twitter:description" content="<?= $this->e($ogDescription ?? ($description ?? $seoConfig['seo']['description'])) ?>" />
    <meta name="twitter:image" content="<?= $this->e($ogImage ?? $seoConfig['seo']['og_image']) ?>" />
    <?php if($siteConfig["favicon_url_32"]) { ?>
    <link rel="icon" type="image/png" href="<?= $siteConfig["favicon_url_32"] ?>" sizes="32x32">
    <?php } ?>
    <?php if($siteConfig["favicon_url_16"]) { ?>
    <link rel="icon" type="image/png" href="<?= $siteConfig["favicon_url_16"] ?>" sizes="16x16">
    <?php } ?>

    <link rel="canonical" href="<?= $this->e($canonicalUrl ?? $seoConfig['seo']['domain'] . $_SERVER['REQUEST_URI']) ?>" />

    <?php
    use App\Core\SchemaGenerator;
    $schemaGenerator = new SchemaGenerator();
    $schemaType = $schemaType ?? 'localBusiness';
    $customSchemaData = $customSchemaData ?? [];
    ?>
    <script type="application/ld+json">
    <?= $schemaGenerator->generateJson($schemaType, $customSchemaData) ?>
    </script>

    <?php if (!empty($siteConfig['gtm'])): ?>
        <script>
            function loadGTM() {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var gtmScript = document.createElement('script');   
                gtmScript.async = true;
                gtmScript.src = 'https://www.googletagmanager.com/gtm.js?id=<?= $siteConfig['gtm'] ?>';
                document.head.appendChild(gtmScript);
            }

            function checkUserActivity() {
                document.removeEventListener('mousemove', checkUserActivity);
                document.removeEventListener('keydown', checkUserActivity);
                document.removeEventListener('scroll', checkUserActivity);
                loadGTM();
            }

            document.addEventListener('mousemove', checkUserActivity, { once: true });
            document.addEventListener('keydown', checkUserActivity, { once: true });
            document.addEventListener('scroll', checkUserActivity, { once: true });
        </script>
    <?php endif; ?>

    <?php
    $assetsDir = 'public/assets';
    $buildJsFiles = glob($assetsDir . '/main-*.js');
    $isDev = empty($buildJsFiles);
    ?>

    <?php if ($isDev): ?>
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/assets/js/main.js"></script>
    <?php else: ?>
        <?php foreach (glob($assetsDir . '/main-*.css') as $css): ?>
            <link rel="stylesheet" href="/public/assets/<?= basename($css) ?>" />
        <?php endforeach; ?>
        <?php foreach (glob($assetsDir . '/main-*.js') as $js): ?>
            <script type="module" src="/public/assets/<?= basename($js) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?= $this->insert('components/sections/header') ?>

    <main class="min-h-[30vh] mt-[80px]">
        <?= $this->section('main_content') ?>
    </main>

    <?= $this->insert('components/sections/footer') ?>

    <?= $this->insert('components/common/whatsapp-float') ?>
    <?= $this->insert('components/common/privacy-popup') ?>

    <?php if (!empty($siteConfig['gtm'])): ?>
        <noscript>
          <iframe src="https://www.googletagmanager.com/ns.html?id=<?= $siteConfig['gtm'] ?>"
          height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
    <?php endif; ?>
</body>
</html>
