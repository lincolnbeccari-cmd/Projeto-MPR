
@extends('mpr.layout')

@section('title', 'Cadastros | Projeto MPR')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">GERENCIAMENTO</p>
        <h1>Cadastros</h1>
        <p class="muted">
            Consulte e acompanhe os chamados de manutenção da escola.
        </p>
    </div>

    <a href="{{ route('mpr.maintenance.create') }}"
       class="btn btn-primary">
        + Novo chamado
    </a>
</div>

<section class="panel">

    <div class="toolbar">

        <label class="search-box">
            <span>⌕</span>
            <input type="search"
                   id="tableSearch"
                   placeholder="Buscar chamado ou problema...">
        </label>

        <select id="statusFilter">
            <option value="">Todos os status</option>
            <option>Aberto</option>
            <option>Em andamento</option>
            <option>Concluído</option>
        </select>

    </div>

    <div class="table-wrap">
        <table id="maintenanceTable">

            <thead>
                <tr>
                    <th>Código</th>
                    <th>Problema</th>
                    <th>Solicitante</th>
                    <th>Setor</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>#MPR-104</td>
                    <td>Projetor não liga</td>
                    <td>Mariana Costa</td>
                    <td>Sala 12</td>
                    <td><span class="pill high">Alta</span></td>
                    <td><span class="pill progress-status">Em andamento</span></td>
                    <td>19/10/2026</td>
                </tr>

                <tr>
                    <td>#MPR-103</td>
                    <td>Vazamento na torneira</td>
                    <td>Pedro Alves</td>
                    <td>Banheiro</td>
                    <td><span class="pill medium">Média</span></td>
                    <td><span class="pill open-status">Aberto</span></td>
                    <td>18/10/2026</td>
                </tr>

                <tr>
                    <td>#MPR-102</td>
                    <td>Computador sem conexão</td>
                    <td>Lucas Santos</td>
                    <td>Laboratório</td>
                    <td><span class="pill low">Baixa</span></td>
                    <td><span class="pill done-status">Concluído</span></td>
                    <td>17/10/2026</td>
                </tr>
            </tbody>

        </table>
    </div>

    <div class="table-footer">
        Exibindo dados demonstrativos do layout.
    </div>

</section>

@endsection
