
@extends('mpr.layout')

@section('title', 'Relatórios | Projeto MPR')

@section('content')

<div class="page-heading">
    <div>
        <p class="eyebrow">ACOMPANHAMENTO</p>
        <h1>Relatórios</h1>
        <p class="muted">
            Visualize os dados de manutenção da escola.
        </p>
    </div>
</div>

<section class="stats-grid report-stats">

    <article class="stat-card">
        <p>Total de chamados</p>
        <strong>152</strong>
        <small class="muted">No período demonstrativo</small>
    </article>

    <article class="stat-card">
        <p>Resolvidos</p>
        <strong>97</strong>
        <small class="positive-text">63,8% do total</small>
    </article>

    <article class="stat-card">
        <p>Pendentes</p>
        <strong>55</strong>
        <small class="danger-text">Aguardando atendimento</small>
    </article>

</section>

<section class="panel report-panel">

    <div class="section-title">
        <span class="stat-icon red">▤</span>
        <div>
            <h2>Gerar relatório</h2>
            <p>Defina o período e os filtros da consulta.</p>
        </div>
    </div>

    <form id="reportForm">

        <div class="form-grid">

            <label class="field">
                Data inicial
                <input type="date" name="inicio" required>
            </label>

            <label class="field">
                Data final
                <input type="date" name="fim" required>
            </label>

            <label class="field">
                Status
                <select name="status">
                    <option value="">Todos</option>
                    <option>Aberto</option>
                    <option>Em andamento</option>
                    <option>Concluído</option>
                </select>
            </label>

            <label class="field">
                Prioridade
                <select name="prioridade">
                    <option value="">Todas</option>
                    <option>Baixa</option>
                    <option>Média</option>
                    <option>Alta</option>
                    <option>Urgente</option>
                </select>
            </label>

        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-secondary">
                Limpar filtros
            </button>

            <button type="button"
                    class="btn btn-primary"
                    id="exportCsv">
                Exportar CSV
            </button>
        </div>

    </form>

</section>

@endsection
