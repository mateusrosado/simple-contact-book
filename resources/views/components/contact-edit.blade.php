<x-modal title="Editar" id="" contactid="update-{{ $contact->id }}" mode="update">
    <form method="POST" action="{{ route('contact.update', $contact) }}" class="form">
        @method('PUT')
        @csrf
        <div class="formRow">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
            <x-default-input id='name' labelText='Nome' value="{{ old('name', $contact?->name) }}" required/>
        </div>
        <div class="formRow">
            @error('phone')
                <p class="error">{{ $message }}</p>
            @enderror
            <x-default-input id='phone' labelText='Telefone' value="{{ old('phone', $contact?->phone) }}" required/>
        </div>
        <div class="formRow">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <x-default-input id='email' type='email' labelText='E-mail' value="{{ old('email', $contact?->email) }}" required/>
        </div>
        <div class="formRow">
            <x-default-input id='address' labelText='Endereço' value="{{ old('address', $contact?->address) }}"/>
        </div>
        <div class="formRow">
            <x-default-button type="submit">Salvar Alterações</x-default-button>
        </div>
        @if($message = Session::get('status'))
        <div class="formRow error">{{ $message }}</div>
        @endif
    </form>
</x-modal>

@pushOnce('scripts')
    <script>
        const btnsContactUpdates = document.querySelectorAll('.btn-contact-eddit');
        const iconsCloseModalUpdates = document.querySelectorAll('.close-modal-update');

        btnsContactUpdates.forEach(btnContactUpdate => {
            btnContactUpdate.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = btnContactUpdate.parentNode.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='update-${contactId}']`)
                modal.classList.add('opened');
            });
        });

        iconsCloseModalUpdates.forEach(iconCloseModalUpdate => {
            iconCloseModalUpdate.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = iconCloseModalUpdate.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='${contactId}']`)
                modal.classList.remove('opened');
            });
        });
    </script>
@endpushOnce