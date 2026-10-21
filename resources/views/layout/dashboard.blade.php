
@extends('mpr.layout')

@section('title', 'Visão geral | Projeto MPR')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">PAINEL DE MANUTENÇÃO</p>
        <h1>Visão geral</h1>
        <p class="muted">
            Acompanhe os problemas e os atendimentos da escola.
        </p>
    </div>

    <a class="btn btn-primary"
       href="{{ route('mpr.maintenance.create') }}">
        + Novo chamado
    </a>
</div>

<section class="stats-grid">

    <article class="stat-card">
        <span class="stat-icon red">▤</span>
        <p>Chamados abertos</p>
        <strong>24</strong>
        <small class="danger-text">Precisam de atenção</small>
    </article>

    <article class="stat-card">
        <span class="stat-icon green">✓</span>
        <p>Chamados resolvidos</p>
        <strong>97</strong>
        <small class="positive-text">Atendimentos concluídos</small>
    </article>

    <article class="stat-card">
        <span class="stat-icon amber">◷</span>
        <p>Em andamento</p>
        <strong>31</strong>
        <small class="muted">Em atendimento pela equipe</small>
    </article>

    <article class="stat-card">
        <span class="stat-icon blue">◷</span>
        <p>Tempo médio</p>
        <strong>2,4 dias</strong>
        <small class="muted">Para resolução</small>
    </article>

</section>

<section class="content-grid dashboard-grid">

    <article class="panel chart-panel">

        <div class="panel-heading">
            <div>
                <h2>Andamento dos chamados</h2>
                <p>Volume dos últimos 7 dias</p>
            </div>

            <span class="text-action">Últimos 7 dias</span>
        </div>

        <div class="chart-layout">

            <div class="bar-chart">

                @foreach ([
                    ['Seg', 48],
                    ['Ter', 65],
                    ['Qua', 54],
                    ['Qui', 76],
                    ['Sex', 68],
                    ['Sáb', 92],
                    ['Dom', 72]
                ] as $bar)

                    <div class="bar-column">
                        <div class="bar"
                             style="height: {{ $bar[1] }}%">
                        </div>

                        <span>{{ $bar[0] }}</span>
                    </div>

                @endforeach

            </div>

            <div class="chart-summary">

                <div class="resolution-box">
                    <span>Taxa de resolução</span>
                    <strong>76%</strong>
                    <small>↑ 8% nesta semana</small>
                </div>

                <div class="summary-line">
                    <span>Em andamento</span>
                    <b>31</b>
                </div>

                <div class="summary-line">
                    <span>Concluídos</span>
                    <b>97</b>
                </div>

            </div>
        </div>
    </article>

    <article class="panel priority-panel">

        <div class="panel-heading">
            <div>
                <h2>Chamados por prioridade</h2>
                <p>Distribuição atual</p>
            </div>
        </div>

        @foreach ([
            ['Alta', 8, '#bc2323'],
            ['Média', 14, '#d79b28'],
            ['Baixa', 9, '#32815c']
        ] as $prioridade)

            <div class="priority-row">

                <div>
                    <span class="priority-dot"
                          style="background: {{ $prioridade[2] }}">
                    </span>

                    {{ $prioridade[0] }}

                    <b>{{ $prioridade[1] }}</b>
                </div>

                <div class="progress">
                    <span style="
                        width: {{ $prioridade[1] * 4 }}%;
                        background: {{ $prioridade[2] }}">
                    </span>
                </div>

            </div>

        @endforeach

    </article>

</section>

<section class="content-grid lower-grid">

    <article class="panel">

        <div class="panel-heading">
            <div>
                <h2>Chamados recentes</h2>
                <p>Últimas solicitações registradas</p>
            </div>

            <a class="text-action"
               href="{{ route('mpr.maintenance.index') }}">
                Ver todos →
            </a>
        </div>

        <div class="table-wrap">

            <table>
                <thead>
                    <tr>
                        <th>Chamado</th>
                        <th>Problema</th>
                        <th>Setor</th>
                        <th>Prioridade</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>#MPR-104</td>
                        <td>Projetor não liga</td>
                        <td>Sala 12</td>
                        <td><span class="pill high">Alta</span></td>
                        <td><span class="pill progress-status">Em andamento</span></td>
                    </tr>

                    <tr>
                        <td>#MPR-103</td>
                        <td>Vazamento na torneira</td>
                        <td>Banheiro</td>
                        <td><span class="pill medium">Média</span></td>
                        <td><span class="pill open-status">Aberto</span></td>
                    </tr>

                    <tr>
                        <td>#MPR-102</td>
                        <td>Computador sem conexão</td>
                        <td>Laboratório</td>
                        <td><span class="pill low">Baixa</span></td>
                        <td><span class="pill done-status">Concluído</span></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </article>

</section>

@endsection
