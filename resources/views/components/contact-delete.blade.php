<x-modal title="Tem certeza?" id="" mode="destroy" contactid="destroy-{{ $id }}">
    <form method="POST" action="{{ route('contact.destroy', $id) }}" class="form">
        @csrf
        @method('DELETE')

        <div class="formRow">
            <p>Tem certeza que deseja excluir o contato {{ $name }}?</p>
        </div>
        <div class="formRow">
            <x-default-button type="submit" color="red">Excluir</x-default-button>
            <x-default-button color="gray" class="btn-close-modal-destroy">Cancelar</x-default-button>
        </div>
    </form>
</x-modal>

@pushOnce('scripts')
    <script>
        const btnsContactDestroys = document.querySelectorAll('.btn-contact-destroy');
        const iconsCloseModalDestroys = document.querySelectorAll('.close-modal-destroy');
        const btnsCloseModalDestroys = document.querySelectorAll('.btn-close-modal-destroy');

        btnsContactDestroys.forEach(btnContactDestroy => {
            btnContactDestroy.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = btnContactDestroy.parentNode.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='destroy-${contactId}']`)
                modal.classList.add('opened');
            });
        });

        iconsCloseModalDestroys.forEach(iconCloseModalDestroy => {
            iconCloseModalDestroy.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = iconCloseModalDestroy.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='${contactId}']`)
                modal.classList.remove('opened');
            });
        });

        btnsCloseModalDestroys.forEach(btnCloseModalDestroy => {
            btnCloseModalDestroy.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = btnCloseModalDestroy.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='${contactId}']`)
                modal.classList.remove('opened');
            });
        });
    </script>
@endpushOnce