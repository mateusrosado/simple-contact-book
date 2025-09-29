<div class="modal-box" id="modal-box">
    <div class="modal">
        <div class="header">
            <h1>{{ $title }}</h1>
            <span id="close-modal">✖</span>
        </div>
        <div class="content">
            {{ $slot }}
        </div>
    </div>
</div>