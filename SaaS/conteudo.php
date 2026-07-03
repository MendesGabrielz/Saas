<?php
$allowedPages = [
    'home' => __DIR__ . '/pages/home.php',
    'agenda' => __DIR__ . '/pages/agenda.php',
    'vendas' => __DIR__ . '/pages/vendas.php',
    'clientes' => __DIR__ . '/pages/clientes.php',
    'profissionais' => __DIR__ . '/pages/profissionais.php',
    'financeiro' => __DIR__ . '/pages/financeiro.php',
];

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
if (!$page || !array_key_exists($page, $allowedPages)) {
    $page = 'home';
}

$file = $allowedPages[$page];
if (!is_file($file) || strpos(realpath($file), realpath(__DIR__)) !== 0) {
    http_response_code(404);
    echo '<div class="rounded-3xl border border-rose-500/20 bg-rose-500/10 p-8 text-rose-100 shadow-sm">';
    echo '<h2 class="text-2xl font-semibold">Página não encontrada</h2>';
    echo '<p class="mt-3 text-slate-300">A página solicitada não está disponível.</p>';
    echo '</div>';
    return;
}

include $file;
