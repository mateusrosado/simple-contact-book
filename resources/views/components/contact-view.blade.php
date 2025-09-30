<x-modal title="" id="" mode="view" contactid="view-{{ $contact->id }}">
    <div class="person">
        <div class="picture">{{substr($contact->name, 0, 1)}}</div>
        <span class="name">{{$contact->name}}</span>
    </div>
    <div class="info-box">
        <i class="fa-solid fa-phone"></i>
        <span>{{$contact->phone}}</span>
    </div>
    <div class="info-box">
        <i class="fa-solid fa-envelope"></i>
        <span>{{$contact->email}}</span>
    </div>
    @if($contact->address)
        <div class="info-box">
            <i class="fa-solid fa-location-dot"></i>
            <span>{{$contact->address}}</span>
        </div>
    @endif
</x-modal>

@pushOnce('scripts')
    <script>
        const btnsContactViews = document.querySelectorAll('.btn-contact-view');
        const iconsCloseModalViews = document.querySelectorAll('.close-modal-view');

        btnsContactViews.forEach(btnContactView => {
            btnContactView.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = btnContactView.parentNode.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='view-${contactId}']`)
                modal.classList.add('opened');
            });
        });

        iconsCloseModalViews.forEach(iconCloseModalView => {
            iconCloseModalView.addEventListener('click', (e) => {
                e.preventDefault();
                
                const contactId = iconCloseModalView.parentNode.parentNode.parentNode.dataset.contactId;
                const modal = document.querySelector(`[data-contact-id='${contactId}']`)
                modal.classList.remove('opened');
            });
        });
    </script>
@endpushOnce