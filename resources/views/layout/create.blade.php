
@extends('mpr.layout')

@section('title', 'Cadastrar manutenção | Projeto MPR')

@section('content')

<div class="breadcrumb">
    <a href="{{ route('mpr.maintenance.index') }}">Cadastros</a>
    <span>›</span>
    <span>Novo chamado</span>
</div>

<div class="page-heading">
    <div>
        <h1>Cadastrar manutenção</h1>
        <p class="muted">
            Preencha as informações para registrar um novo problema.
        </p>
    </div>
</div>

<div class="form-layout">

    <form class="panel form-panel"
          method="POST"
          action="#"
          enctype="multipart/form-data"
          data-demo-form>

        @csrf

        <div class="section-title">
            <span class="stat-icon red">▤</span>

            <div>
                <h2>Dados do chamado</h2>
                <p>
                    Informe os dados principais para identificar
                    e priorizar o atendimento.
                </p>
            </div>
        </div>

        <div class="form-grid">

            <label class="field full">
                Título do problema *
                <input type="text"
                       name="titulo"
                       placeholder="Ex.: Computador não liga"
                       required>
            </label>

            <label class="field">
                Setor / Local *
                <select name="setor" required>
                    <option value="">Selecione um setor</option>
                    <option>Sala de aula</option>
                    <option>Laboratório</option>
                    <option>Biblioteca</option>
                    <option>Banheiro</option>
                    <option>Secretaria</option>
                    <option>Corredor</option>
                    <option>Outro</option>
                </select>
            </label>

            <label class="field">
                Categoria *
                <select name="categoria" required>
                    <option value="">Selecione uma categoria</option>
                    <option>Elétrica</option>
                    <option>Hidráulica</option>
                    <option>Informática</option>
                    <option>Mobiliário</option>
                    <option>Estrutura</option>
                    <option>Outro</option>
                </select>
            </label>

            <label class="field">
                Prioridade *
                <select name="prioridade" required>
                    <option value="">Selecione a prioridade</option>
                    <option>Baixa</option>
                    <option>Média</option>
                    <option>Alta</option>
                    <option>Urgente</option>
                </select>
            </label>

            <label class="field">
                Solicitante
                <input type="text"
                       name="solicitante"
                       placeholder="Nome do solicitante">
            </label>

            <label class="field full">
                Descrição detalhada *
                <textarea name="descricao"
                          rows="5"
                          placeholder="Explique o problema e onde aconteceu..."
                          required></textarea>
            </label>

            <label class="field full">
                Imagem ou anexo
                <input type="file"
                       name="anexo"
                       accept="image/*,.pdf">
            </label>

        </div>

        <div class="form-actions">
            <a href="{{ route('mpr.maintenance.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                Registrar chamado
            </button>
        </div>

        <p class="form-hint">
            Formulário visual. A gravação depende da integração
            com a rota e o banco de dados.
        </p>

    </form>

    <aside class="panel tip-panel">
        <span class="stat-icon amber">✦</span>

        <h2>Dica para o registro</h2>

        <p>
            Descreva o problema com clareza e indique o local exato.
            Isso ajuda a equipe a identificar o que precisa ser feito.
        </p>

        <ul>
            <li>Escolha uma prioridade adequada.</li>
            <li>Informe o setor correto.</li>
            <li>Adicione uma imagem, se necessário.</li>
        </ul>
    </aside>

</div>

@endsection
