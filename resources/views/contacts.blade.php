@extends('layouts.app')

@section('title', 'Meus Contatos - ContactBook')

@section('content')
    <section class="contacts">
        <div id="toast-container">
            @if (session('success'))
                <div class="toast success show">
                    <div class="toast-message">{{ session('success') }}</div>
                </div>
            @endif
            @if (session('problem'))
                <div class="toast error show">
                    <div class="toast-message">{{ session('problem') }}</div>
                </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="toast error show">
                        <div class="toast-message">{{ $error }}</div>
                    </div>
                @endforeach
            @endif
        </div>
        <h3>Olá, <span>{{auth()->user()->name}}</span>!</h3>
        <form method="GET" action="{{ route('contacts') }}" class="search">
            <x-default-input id='search' placeholder="Buscar por nome ou email..." value="{{ request('search') }}"/>
            <x-default-button type="submit" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></x-default-button>
        </form>
        <x-default-button id="btn-create-contact">Criar contato</x-default-button>
        @if($contacts->isNotEmpty())
            <div class="contacts-box">
                @foreach($contacts as $contact)
                    <x-contact :contact="$contact"/>
                @endforeach
            </div>
        @else  
            <div class="empty-list">
                Sua lista está vazia. Adicione um contato no botão "Criar contato".
            </div>
        @endif
    </section>
    <x-contact-create/>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toasts = document.querySelectorAll('#toast-container .toast');

            toasts.forEach((toast, index) => {
                setTimeout(() => {
                    toast.classList.add('show');
                }, index * 400);

                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000 + index * 400);
            });
        });
    </script>
    @endpush
@endsection

