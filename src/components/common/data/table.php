<?php
$headers = $headers ?? [];
$rows = $rows ?? [];
$striped = $striped ?? true;
$hover = $hover ?? true;
$bordered = $bordered ?? false;
$compact = $compact ?? false;
$attributes = $attributes ?? [];

$classes = 'w-full';
$classes .= $bordered ? ' border border-gray-200' : '';
$classes .= $compact ? ' text-sm' : '';

$attrString = '';
foreach ($attributes as $key => $value) {
    $attrString .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
}
?>

<div class="overflow-x-auto">
    <table class="<?= $classes ?>"<?= $attrString ?>>
        <?php if (!empty($headers)): ?>
            <thead class="bg-gray-50">
                <tr>
                    <?php foreach ($headers as $header): ?>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <?= htmlspecialchars($header) ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
        <?php endif; ?>
        
        <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($rows as $index => $row): ?>
                <tr class="<?= $striped && $index % 2 === 1 ? 'bg-gray-50' : '' ?><?= $hover ? ' hover:bg-gray-100' : '' ?>">
                    <?php foreach ($row as $cell): ?>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?= is_string($cell) ? htmlspecialchars($cell) : $cell ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div> 