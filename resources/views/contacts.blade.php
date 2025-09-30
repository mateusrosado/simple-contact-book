@extends('layouts.app')

@section('title', 'Meus Contatos - ContactBook')

@section('content')
    <section class="contacts">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('problem'))
            <div class="alert alert-error">
                {{ session('problem') }}
            </div>
        @endif
        <h3>Olá, <span>{{auth()->user()->name}}</span>!</h3>
        <form method="GET" action="{{ route('contacts') }}" class="search">
            <x-default-input id='search' placeholder="Buscar por nome ou email..." value="{{ request('search') }}"/>
            <x-default-button type="submit"><i class="fa-solid fa-magnifying-glass"></i></x-default-button>
        </form>
        <x-default-button id="btn-create-contact">Criar contato</x-default-button>
        @if($contacts)
            <div class="contacts-box">
                @foreach($contacts as $contact)
                    <x-contact :contact="$contact"/>
                @endforeach
            </div>
        @else  
            <div>
                Parece que você ainda não tem contatos, clique no botão abaixo para começar.
            </div>
        @endif
    </section>
    <x-contact-create/>
@endsection