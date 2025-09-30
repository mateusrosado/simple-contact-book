<x-modal title="Novo contato" id="modal-box-create" mode="create">
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
            <x-default-input id='address' labelText='Endereço' value="{{ old('address') }}"/>
        </div>
        <div class="formRow">
            <x-default-button type="submit">Criar Contato</x-default-button>
        </div>
        @if($message = Session::get('status'))
        <div class="formRow error">{{ $message }}</div>
        @endif
    </form>
</x-modal>

@pushOnce('scripts')
    <script>
        const btnCreateContact = document.getElementById('btn-create-contact');
        const boxModal = document.getElementById('modal-box-create');
        const closeModal = document.getElementsByClassName('close-modal-create');

        btnCreateContact.addEventListener('click', (e) => {
            e.preventDefault();
            boxModal.classList.add('opened');
        });
        if (closeModal[0]) {
            closeModal[0].addEventListener('click', (e) => {
                e.preventDefault();
                boxModal.classList.remove('opened');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {

            const phoneInputs = document.querySelectorAll('input[name="phone"]');

            phoneInputs.forEach(input => {
                input.addEventListener('input', handlePhoneInput);
            });

            function handlePhoneInput(event) {
                let value = event.target.value;

                value = value.replace(/\D/g, '');
                value = value.substring(0, 11);

                if (value.length > 10) {
                    value = value.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, '($1) $2 $3-$4');
                } else if (value.length > 5) {
                    value = value.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
                } else if (value.length > 2) {
                    value = value.replace(/^(\d{2})(\d*)$/, '($1) $2');
                }

                event.target.value = value;
            }

        });
    </script>
@endpushOnce