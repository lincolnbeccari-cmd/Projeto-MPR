
@extends('mpr.layout')

@section('title', 'Login | Projeto MPR')
@section('auth', true)

@section('content')

<div class="auth-wrap">

    <a class="brand auth-brand" href="{{ route('mpr.dashboard') }}">
        <span class="brand-mark">▱</span>
        <span>Projeto MPR</span>
    </a>

    <section class="panel auth-card">

        <p class="eyebrow">BEM-VINDO DE VOLTA</p>
        <h1>Entrar na conta</h1>

        <p class="muted">
            Acesse o sistema para acompanhar os chamados de manutenção.
        </p>

        <form data-demo-form>

            <label class="field">
                E-mail
                <input type="email"
                       name="email"
                       placeholder="seuemail@escola.com"
                       required>
            </label>

            <label class="field">
                Senha
                <input type="password"
                       name="senha"
                       placeholder="Digite sua senha"
                       required>
            </label>

            <div class="form-actions">
                <button class="btn btn-primary full-btn" type="submit">
                    Entrar
                </button>
            </div>

        </form>

        <p class="auth-foot">
            Ainda não tem uma conta?
            <a href="{{ route('mpr.register') }}">Criar conta</a>
        </p>

        <p class="form-hint">
            Configure a autenticação do Laravel para habilitar o login real.
        </p>

    </section>

</div>

@endsection
