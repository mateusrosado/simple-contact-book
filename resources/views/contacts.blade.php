@extends('layouts.app')

@section('title', 'Meus Contatos - ContactBook')

@section('content')
    <section class="contacts">
        <h3>Olá, <span>{{auth()->user()->name}}</span>!</h3>
        @if($contacts)
            @foreach($contacts as $contact)
                <p>{{$contact->name}}</p>
            @endforeach
        @else  
            <div>
                Parece que você ainda não tem contatos, clique no botão abaixo para começar.
            </div>
        @endif
        <x-default-button id="btn-create-contact">Criar contato</x-default-button>
    </section>
    <x-modal title="Novo contato">
        <form method="POST" action="{{ route('contact.store') }}" class="form">
            @csrf
            <div class="formRow">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
                <x-default-input id='name' labelText='Nome' value="{{ old('name') }}" required/>
            </div>
            <div class="formRow">
                @error('phone')
                    <p class="error">{{ $message }}</p>
                @enderror
                <x-default-input id='phone' labelText='Telefone' value="{{ old('phone') }}" required/>
            </div>
            <div class="formRow">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
                <x-default-input id='email' type='email' labelText='E-mail' value="{{ old('email') }}" required/>
            </div>
            <div class="formRow">
                <x-default-button type="submit">Criar Contato</x-default-button>
            </div>
            @if($message = Session::get('status'))
            <div class="formRow error">{{ $message }}</div>
            @endif
        </form>
    </x-modal>
@endsection

@push('scripts')
    <script>
        const btnCreateContact = document.getElementById('btn-create-contact');
        const boxModal = document.getElementById('modal-box');
        const closeModal = document.getElementById('close-modal');

        btnCreateContact.addEventListener('click', (e) => {
            e.preventDefault();
            boxModal.classList.add('opened');
        });
        closeModal.addEventListener('click', (e) => {
            e.preventDefault();
            boxModal.classList.remove('opened');
        });
    </script>
@endpush