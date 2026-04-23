<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulários DISC Preenchidos</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Paleta Dark & Azul Tech */
            --bg-color: #060b14;
            --surface: #0d1424;
            --surface-hover: #151e32;
            --border: #1e293b;
            --border-light: rgba(59, 130, 246, 0.15);
            
            /* Destaques */
            --accent: #3b82f6;       /* Azul Tech */
            --accent-glow: rgba(59, 130, 246, 0.3);
            --accent-purple: #8b5cf6;
            --accent-green: #10b981;
            --accent-gold: #f59e0b;
            
            /* Textos */
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            
            --radius-lg: 16px;
            --radius-md: 10px;
            --radius-sm: 6px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-color);
            background-image: 
                radial-gradient(at 0% 0%, rgba(15, 23, 42, 1) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(30, 27, 75, 0.5) 0px, transparent 50%);
            background-attachment: fixed;
            color: var(--text-main);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* ── CONTAINER PRINCIPAL ── */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding-bottom: 60px;
        }

        /* ── HEADER ── */
        .disc-header {
            position: relative;
            padding: 60px 40px 40px;
            overflow: hidden;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(180deg, rgba(13, 20, 36, 0.4) 0%, transparent 100%);
        }

        .disc-header::before {
            content: 'DISC';
            position: absolute;
            right: 0;
            top: -20px;
            font-family: 'Syne', sans-serif;
            font-size: 180px;
            font-weight: 800;
            color: rgba(59, 130, 246, 0.03);
            pointer-events: none;
            user-select: none;
            line-height: 1;
        }

        .disc-header h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(28px, 5vw, 42px);
            font-weight: 800;
            letter-spacing: -0.03em;
            background: linear-gradient(120deg, #ffffff 20%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        .disc-header p {
            color: var(--text-muted);
            font-size: 15px;
            font-weight: 400;
            letter-spacing: 0.02em;
        }

        /* ── STATS CARDS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 40px 40px 0;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: var(--card-color, var(--border));
        }

        /* Glow effect on hover */
        .stat-card::after {
            content: '';
            position: absolute;
            top: -50px; left: -50px;
            width: 100px; height: 100px;
            background: var(--card-color);
            filter: blur(60px);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .stat-card:hover::after { opacity: 0.15; }

        .stat-card.blue { --card-color: var(--accent); border-color: rgba(59, 130, 246, 0.3); }
        .stat-card.purple { --card-color: var(--accent-purple); }
        .stat-card.green { --card-color: var(--accent-green); }
        .stat-card.gold { --card-color: var(--accent-gold); }

        .stat-label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .stat-value {
            font-family: 'Syne', sans-serif;
            font-size: 40px;
            font-weight: 800;
            line-height: 1;
            color: var(--text-main);
        }

        /* ── TABLE SECTION ── */
        .table-section {
            padding: 40px 40px 60px;
        }

        .table-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
            flex-wrap: wrap;
        }

        .table-title {
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 10px 16px;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .search-box:focus-within {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15), inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .search-box svg {
            color: var(--text-muted);
            flex-shrink: 0;
            transition: color 0.3s ease;
        }

        .search-box:focus-within svg { color: var(--accent); }

        .search-box input {
            background: none;
            border: none;
            outline: none;
            color: var(--text-main);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            width: 240px;
        }

        .search-box input::placeholder { color: var(--text-muted); }

        /* ── TABLE ── */
        .table-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
        }

        thead th {
            padding: 16px 24px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.2s ease;
        }

        tbody tr:last-child { border-bottom: none; }

        tbody tr:hover { background: var(--surface-hover); }

        tbody td {
            padding: 18px 24px;
            font-size: 14px;
            vertical-align: middle;
        }

        /* Avatar */
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-purple));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.3);
        }

        .name-cell {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .name-text {
            font-weight: 600;
            color: var(--text-main);
            font-size: 15px;
        }

        .email-text {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* Cargo badge */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: rgba(59, 130, 246, 0.1);
            color: #60a5fa;
            border: 1px solid var(--border-light);
            white-space: nowrap;
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-doc {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            white-space: nowrap;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-doc svg { 
            width: 14px; 
            height: 14px; 
            flex-shrink: 0; 
        }

        .btn-basic {
            background: rgba(59, 130, 246, 0.1);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .btn-basic:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.4);
            color: #ffffff;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.15);
        }

        .btn-premium {
            background: rgba(245, 158, 11, 0.1);
            color: #fcd34d;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .btn-premium:hover {
            background: rgba(245, 158, 11, 0.2);
            border-color: rgba(245, 158, 11, 0.4);
            color: #ffffff;
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.15);
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            background: var(--surface-hover);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .empty-state h3 {
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* Pagination Footer */
        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-top: 1px solid var(--border);
            font-size: 14px;
            color: var(--text-muted);
            flex-wrap: wrap;
            gap: 10px;
            background: rgba(15, 23, 42, 0.3);
        }

        /* JS Filtering Class */
        tr.hidden-row { display: none; }

        /* Responsividade */
        @media (max-width: 900px) {
            thead th:nth-child(3),
            tbody td:nth-child(3) { display: none; }
        }

        @media (max-width: 768px) {
            .disc-header { padding: 40px 20px 30px; }
            .stats-grid { padding: 30px 20px 0; grid-template-columns: 1fr 1fr; }
            .table-section { padding: 30px 20px 40px; }
            
            .disc-header::before { display: none; }
            
            .search-box { width: 100%; }
            .search-box input { width: 100%; }
            
            .btn-doc span { display: none; }
            .btn-doc { padding: 10px; }
            .btn-doc svg { width: 16px; height: 16px; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            thead th:nth-child(4),
            tbody td:nth-child(4) { display: none; }
            tbody td { padding: 16px; }
        }
    </style>
</head>
<body>

    @php
        // Cálculos
        $total     = $funcionarios->count();
        $comEmail  = $funcionarios->whereNotNull('email')->count();
        $semSetor  = $funcionarios->whereNull('setor')->count();
        $hoje      = $funcionarios->filter(fn($f) => optional($f->created_at)->isToday())->count();
    @endphp

    <div class="container">
        <header class="disc-header">
            <h1>Formulários DISC</h1>
            <p>Questionários preenchidos · Resultados individuais</p>
        </header>

        <section class="stats-grid">
            <div class="stat-card blue">
                <div class="stat-label">Total de preenchimentos</div>
                <div class="stat-value">{{ $total }}</div>
            </div>
            <div class="stat-card purple">
                <div class="stat-label">Com e-mail registrado</div>
                <div class="stat-value">{{ $comEmail }}</div>
            </div>
            <div class="stat-card green">
                <div class="stat-label">Sem setor definido</div>
                <div class="stat-value">{{ $semSetor }}</div>
            </div>
            <div class="stat-card gold">
                <div class="stat-label">Preenchidos hoje</div>
                <div class="stat-value">{{ $hoje }}</div>
            </div>
        </section>

        <section class="table-section">
            <div class="table-toolbar">
                <span class="table-title">Todos os registros</span>

                <div class="search-box">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" id="searchInput" placeholder="Buscar por nome ou e-mail...">
                </div>
            </div>

            <div class="table-wrap">
                @if($funcionarios->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="9" y1="15" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <h3>Nenhum formulário encontrado</h3>
                        <p>Ainda não há preenchimentos registrados no sistema.</p>
                    </div>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Funcionário</th>
                                <th>Cargo / CPF</th>
                                <th>Data</th>
                                <th>Documentos</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($funcionarios as $index => $funcionario)
                            <tr data-search="{{ strtolower($funcionario->nome . ' ' . $funcionario->email) }}">
                                <td style="color: var(--text-muted); font-size: 13px; width: 50px;">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <td>
                                    <div class="name-cell">
                                        <div class="avatar">
                                            {{ strtoupper(substr($funcionario->nome ?? 'N', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="name-text">{{ $funcionario->nome ?? '—' }}</div>
                                            <div class="email-text">{{ $funcionario->email ?? 'Sem e-mail' }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if($funcionario->cargo ?? $funcionario->cpf ?? null)
                                        <span class="badge">{{ $funcionario->cargo ?? $funcionario->cpf ?? '—' }}</span>
                                    @else
                                        <span style="color: var(--text-muted); font-size: 13px;">—</span>
                                    @endif
                                </td>

                                <td style="color: var(--text-muted); font-size: 13px; white-space: nowrap;">
                                    {{ optional($funcionario->created_at)->format('d/m/Y') ?? '—' }}
                                </td>

                                <td>
                                    <div class="actions">
                                        <a href="/disc/documento/resultado/{{ $funcionario->id }}"
                                           class="btn-doc btn-basic"
                                           target="_blank"
                                           title="Relatório Básico">
                                            <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                            </svg>
                                            <span>Básico</span>
                                        </a>

                                        <a href="/disc/documento/premium/resultado/{{ $funcionario->id }}"
                                           class="btn-doc btn-premium"
                                           target="_blank"
                                           title="Relatório Premium">
                                            <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                            </svg>
                                            <span>Premium</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        <span id="countInfo">{{ $total }} registro{{ $total !== 1 ? 's' : '' }} no total</span>
                        <span id="filterInfo" style="display:none; color: var(--accent); font-size: 13px; font-weight: 500;"></span>
                    </div>
                @endif
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('searchInput');
            const rows = document.querySelectorAll('#tableBody tr');
            const info = document.getElementById('countInfo');
            const fInfo = document.getElementById('filterInfo');
            
            if (!input) return; // Evita erro se a tabela estiver vazia (empty state)

            const total = rows.length;

            input.addEventListener('input', () => {
                const q = input.value.toLowerCase().trim();
                let visible = 0;

                rows.forEach(row => {
                    const searchData = row.dataset.search || '';
                    const match = !q || searchData.includes(q);
                    row.classList.toggle('hidden-row', !match);
                    if (match) visible++;
                });

                if (q) {
                    info.innerHTML = `Exibindo <strong>${visible}</strong> de ${total} registros`;
                    fInfo.textContent = `Filtro ativo: "${input.value}"`;
                    fInfo.style.display = 'inline';
                } else {
                    info.textContent = `${total} registro${total !== 1 ? 's' : ''} no total`;
                    fInfo.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>   