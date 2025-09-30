@extends('layouts.app')

@section('title', 'Cadastrar - ContactBook')

@section('content')

    <section class="register">
        <h2>Cadastrar</h2>
        <form method="POST" action="{{ route('register.store') }}" class="form">
            @csrf
            <div class="formRow">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
                <x-default-input id='name' labelText='Nome' value="{{ old('name') }}" required/>
            </div>
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
                <x-default-input id='password' type='password' labelText='Senha' required/>
            </div>
            <div class="formRow">
                <x-default-button type="submit">Criar conta</x-default-button>
                <span>Já tem uma conta? <a href="{{route('login')}}">Entrar</a></span>
            </div>
        </form>
    </section>
    
@endsection