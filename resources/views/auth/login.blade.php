@extends('layouts.app')

@section('title', 'Entrar - ContactBook')

@section('content')

    <section class="login">
        <form method="POST" action="{{ route('auth') }}" class="form">
            @csrf
            <div class="formRow">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
                <x-default-input id='email' type='email' labelText='E-mail' value="{{ old('email') }}" required/>
            </div>
            <div class="formRow">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
                <x-default-input id='password' type='password' labelText='Senha'/>
                <span><a href="{{ route('forgot-password') }}">Esqueceu a senha?</a></span>
            </div>
            <div class="formRow">
                <x-default-button type="submit">Entrar</x-default-button>
            <span>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></span>
            </div>
            @if($message = Session::get('status'))
            <div class="formRow error">{{ $message }}</div>
            @endif
        </form>
    </section>

@endsection