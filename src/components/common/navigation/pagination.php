<?php
$currentPage = $currentPage ?? 1;
$totalPages = $totalPages ?? 1;
$baseUrl = $baseUrl ?? '';
$showFirstLast = $showFirstLast ?? true;
$showPrevNext = $showPrevNext ?? true;
$maxVisible = $maxVisible ?? 5;
$attributes = $attributes ?? [];

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}

$getPageUrl = function($page) use ($baseUrl) {
    if (strpos($baseUrl, '?') !== false) {
        return $baseUrl . '&page=' . $page;
    }
    return $baseUrl . '?page=' . $page;
};

$visiblePages = [];
$start = max(1, $currentPage - floor($maxVisible / 2));
$end = min($totalPages, $start + $maxVisible - 1);

if ($end - $start + 1 < $maxVisible) {
    $start = max(1, $end - $maxVisible + 1);
}

for ($i = $start; $i <= $end; $i++) {
    $visiblePages[] = $i;
}
?>

<?php if ($totalPages > 1): ?>
    <nav class="flex items-center justify-center space-x-1" aria-label="Pagination"<?= $attrString ?>>
        <?php if ($showFirstLast && $currentPage > 1): ?>
            <a href="<?= $getPageUrl(1) ?>" 
               class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200"
               aria-label="Primeira página">
                <span class="iconify w-4 h-4" data-icon="heroicons:chevron-double-left"></span>
            </a>
        <?php endif; ?>

        <?php if ($showPrevNext && $currentPage > 1): ?>
            <a href="<?= $getPageUrl($currentPage - 1) ?>" 
               class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200"
               aria-label="Página anterior">
                <span class="iconify w-4 h-4" data-icon="heroicons:chevron-left"></span>
            </a>
        <?php endif; ?>

        <?php foreach ($visiblePages as $page): ?>
            <?php if ($page == $currentPage): ?>
                <span class="px-3 py-2 text-sm font-medium text-white bg-primary border border-primary rounded-md">
                    <?= $page ?>
                </span>
            <?php else: ?>
                <a href="<?= $getPageUrl($page) ?>" 
                   class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200">
                    <?= $page ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($showPrevNext && $currentPage < $totalPages): ?>
            <a href="<?= $getPageUrl($currentPage + 1) ?>" 
               class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200"
               aria-label="Próxima página">
                <span class="iconify w-4 h-4" data-icon="heroicons:chevron-right"></span>
            </a>
        <?php endif; ?>

        <?php if ($showFirstLast && $currentPage < $totalPages): ?>
            <a href="<?= $getPageUrl($totalPages) ?>" 
               class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200"
               aria-label="Última página">
                <span class="iconify w-4 h-4" data-icon="heroicons:chevron-double-right"></span>
            </a>
        <?php endif; ?>
    </nav>
<?php endif; ?> 