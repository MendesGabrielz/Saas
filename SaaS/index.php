<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/output.css">
    <script src="https://unpkg.com/htmx.org@1.11.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Painel SaaS</title>
</head>

<body class="min-h-screen bg-slate-950 text-slate-100">
        <aside class="fixed inset-y-0 left-0 w-80 border-r border-slate-800 bg-slate-950 p-6 overflow-y-auto">
            <div class="flex items-center gap-4">
                <img src="assets/img/LogoTeste.jpg" alt="Logo" class="h-16 w-16 rounded-3xl object-cover ring-2 ring-indigo-500/30">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Painel</p>
                    <h1 class="text-xl font-semibold text-white">Arus</h1>
                </div>
            </div>

            <?php
            $menu = [
                'home' => 'Início',
                'agenda' => 'Agenda',
                'vendas' => 'Vendas',
                'clientes' => 'Clientes',
                'profissionais' => 'Profissionais',
                'financeiro' => 'Financeiro',
                'sair' => 'Sair'
            ];
            ?>

            <nav class="mt-10 space-y-2">
                <?php foreach ($menu as $page => $label):
                    if ($page === 'sair') {
                        continue;
                    }
                    $extraClass = 'border border-slate-800 bg-slate-900 px-4 py-3 text-sm font-medium text-slate-200 transition duration-200 hover:border-indigo-500 hover:bg-slate-800 hover:text-white hover:scale-105';
                ?>
                    <a
                        href="?page=<?= $page ?>"
                        hx-get="conteudo.php?page=<?= $page ?>"
                        hx-target="#conteudo"
                        hx-swap="innerHTML"
                        hx-push-url="true"
                        class="block rounded-3xl px-4 py-3 text-sm font-medium transition text-center <?= $extraClass ?>">
                        <?= $label ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="mt-auto pt-6">
                <a
                    href="?page=sair"
                    hx-get="conteudo.php?page=sair"
                    hx-target="#conteudo"
                    hx-swap="innerHTML"
                    hx-push-url="true"
                    class="block rounded-3xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm font-medium text-slate-400 transition duration-200 hover:border-red-500 hover:bg-red-950/40 hover:text-red-400 hover:scale-105 text-center">
                    Sair
                </a>
            </div>
        </aside>

        <main class="ml-80 min-h-screen bg-slate-900">
            <header class="flex items-center justify-between border-b border-slate-800 px-8 py-6">
                <div>

                    <div class="relative w-full max-w-md"> <input
                            type="text"
                            placeholder="Pesquisar..."
                            class="w-full pl-5 pr-24 py-3 rounded-full bg-slate-900 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 shadow-sm transition">

                        <button
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-blue-600 hover:bg-blue-500 text-white text-sm font-medium px-4 py-2 rounded-full transition-colors">
                            Buscar
                        </button>
                    </div>

                </div>
                <div class="flex items-center gap-3">
                    <button class="rounded-2xl bg-slate-800 px-4 py-2 text-sm font-medium text-slate-200 hover:bg-slate-700">Notificações</button>
                    <button class="rounded-2xl bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400">Minha Conta</button>
                </div>
            </header>

            <section id="conteudo" class="p-8">
                <?php include 'conteudo.php'; ?>
            </section>
        </main>
</body>

</html>