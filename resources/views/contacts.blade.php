@extends('layouts.app')

@section('title', 'Meus Contatos - ContactBook')

@section('content')
    <section class="contacts">
        <h3>Olá, <span>{{ auth()->user()->name }}</span>!</h3>

        {{-- Campo de busca --}}
        <form method="GET" action="{{ route('contacts') }}">
            <input type="text" name="q" placeholder="Buscar por nome ou email" value="{{ request('q') }}">
            <button type="submit">Buscar</button>
        </form>

        {{-- Lista de contatos --}}
        @if($contacts->count())
            @foreach($contacts as $contact)
                <div>
                    <p><strong>{{ $contact->name }}</strong> - {{ $contact->email }}</p>
                    <button onclick="openModal({{ $contact->id }})">Editar</button>
                </div>

                {{-- Modal para edição do contato --}}
                <x-modal :title="'Editar Contato'" :contact="$contact" mode="edit"/>
            @endforeach
        @else  
            <div>
                Parece que você ainda não tem contatos, clique no botão abaixo para começar.
            </div>
        @endif

        {{-- Modal para criar novo contato --}}
        <button onclick="openModal()">Criar contato</button>
        <x-modal title="Novo Contato" mode="create"/>
    </section>
@endsection

@push('scripts')
    <script>
        function openModal(id = null) {
            const modal = id ? document.querySelector(`#modal-box[data-id="${id}"]`) : document.querySelector('#modal-box');
            modal.classList.add('opened');
        }
        document.querySelectorAll('#close-modal').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                e.target.closest('.modal').classList.remove('opened');
            });
        });
    </script>
@endpush
