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
    
    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $this->e($ogUrl ?? $seoConfig['seo']['domain'] . $_SERVER['REQUEST_URI']) ?>" />
    <meta property="og:title" content="<?= $this->e($ogTitle ?? ($title ?? $seoConfig['seo']['title'])) ?>" />
    <meta property="og:description" content="<?= $this->e($ogDescription ?? ($description ?? $seoConfig['seo']['description'])) ?>" />
    <meta property="og:image" content="<?= $this->e($ogImage ?? $seoConfig['seo']['og_image']) ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?= $this->e($ogUrl ?? $seoConfig['seo']['domain'] . $_SERVER['REQUEST_URI']) ?>" />
    <meta name="twitter:title" content="<?= $this->e($ogTitle ?? ($title ?? $seoConfig['seo']['title'])) ?>" />
    <meta name="twitter:description" content="<?= $this->e($ogDescription ?? ($description ?? $seoConfig['seo']['description'])) ?>" />
    <meta name="twitter:image" content="<?= $this->e($ogImage ?? $seoConfig['seo']['og_image']) ?>" />

    <link rel="canonical" href="<?= $this->e($canonicalUrl ?? $seoConfig['seo']['domain'] . $_SERVER['REQUEST_URI']) ?>" />

    <script type="application/ld+json">
    <?= json_encode([
      "@context" => "https://schema.org",
      "@type" => "LocalBusiness",
      "name" => $siteConfig['name'],
      "image" => $seoConfig['seo']['og_image'],
      "@id" => $seoConfig['seo']['domain'],
      "url" => $seoConfig['seo']['domain'],
      "telephone" => $siteConfig['phone']['number'],
      "description" => $seoConfig['seo']['description'],
      "address" => [
        "@type" => "PostalAddress",
        "streetAddress" => $seoConfig['address']['street'],
        "addressLocality" => $seoConfig['address']['city'],
        "addressRegion" => $seoConfig['address']['state'],
        "postalCode" => $seoConfig['address']['zip'],
        "addressCountry" => "BR"
      ],
      "openingHoursSpecification" => [
        [
          "@type" => "OpeningHoursSpecification",
          "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens" => "09:00",
          "closes" => "18:00"
        ],
        [
          "@type" => "OpeningHoursSpecification",
          "dayOfWeek" => "Saturday",
          "opens" => "09:00",
          "closes" => "12:00"
        ]
      ],
      "sameAs" => [
        $seoConfig['social']['facebook'],
        $seoConfig['social']['twitter'],
        $seoConfig['social']['instagram'],
        $seoConfig['social']['linkedin']
      ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
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
        <link rel="stylesheet" href="/assets/style.css" />
        <script type="module" src="http://localhost:5173/@vite/client"></script>
        <script type="module" src="http://localhost:5173/assets/js/main.js"></script>
    <?php else: ?>
        <?php foreach (glob($assetsDir . '/main-*.css') as $css): ?>
            <link rel="stylesheet" href="/assets/<?= basename($css) ?>" />
        <?php endforeach; ?>
        <?php foreach (glob($assetsDir . '/main-*.js') as $js): ?>
            <script type="module" src="/assets/<?= basename($js) ?>"></script>
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
