@extends('layouts.app')

@section('title', 'ContactBook')

@section('content')
    <section class="home">
        <div>
            <div>Seus Contatos,</div>
            <div>Sem o Caos.</div>
            <div>Simples Assim.</div>
        </div>

        <x-default-button linkto="{{ auth()->check() ? 'contacts' : 'register' }}">{{ auth()->check() ? 'Ir para Agenda de Contatos' : 'Comece a Organizar Gratuitamente' }}</x-default-button>
    </section>
@endsection