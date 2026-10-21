
@extends('mpr.layout')

@section('title', 'Cadastro de conta | Projeto MPR')
@section('auth', true)

@section('content')

<div class="auth-wrap">

    <a class="brand auth-brand" href="{{ route('mpr.dashboard') }}">
        <span class="brand-mark">▱</span>
        <span>Projeto MPR</span>
    </a>

    <section class="panel auth-card">

        <p class="eyebrow">ACESSO AO SISTEMA</p>
        <h1>Criar conta</h1>

        <p class="muted">
            Cadastre seus dados para acessar o Projeto MPR.
        </p>

        <form data-demo-form>

            <label class="field">
                Nome completo
                <input type="text" name="nome"
                       placeholder="Seu nome" required>
            </label>

            <label class="field">
                E-mail
                <input type="email" name="email"
                       placeholder="seuemail@escola.com" required>
            </label>

            <label class="field">
                Setor
                <select name="setor" required>
                    <option value="">Selecione seu setor</option>
                    <option>Administrativo</option>
                    <option>Professor</option>
                    <option>Manutenção</option>
                    <option>Direção</option>
                </select>
            </label>

            <label class="field">
                Senha
                <input type="password" name="senha"
                       minlength="8"
                       placeholder="Mínimo de 8 caracteres" required>
            </label>

            <label class="field">
                Confirmar senha
                <input type="password" name="confirmar_senha"
                       minlength="8"
                       placeholder="Digite novamente" required>
            </label>

            <div class="form-actions">
                <button class="btn btn-primary full-btn" type="submit">
                    Criar conta
                </button>
            </div>

        </form>

        <p class="auth-foot">
            Já tem uma conta?
            <a href="{{ route('mpr.login') }}">Entrar</a>
        </p>

        <p class="form-hint">
            Configure o cadastro no Laravel para registrar usuários no banco.
        </p>

    </section>

</div>

@endsection
