<div class="modal-box" id="{{ $id }}" data-contact-id="{{ $contactid }}">
    <div class="modal">
        <div class="header">
            <h1>{{ $title }}</h1>
            <i class="fa-solid fa-xmark close-modal-{{ $mode }}"></i>
        </div>
        <div class="content">
            {{ $slot }}
        </div>
    </div>
</div>