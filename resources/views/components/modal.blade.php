<div style="max-width:600px; margin:auto; font-family:Arial,sans-serif; color:white;">

    <!-- Pesquisa -->
    <form method="GET" style="margin-bottom:15px; display:flex; gap:10px;">
        <input type="text" name="search" placeholder="Pesquisar por nome ou email" 
               value="{{ request('search') }}" 
               style="flex:1; padding:8px; border-radius:5px; border:none;">
        <button type="submit" style="background:#28a745; border:none; padding:10px; border-radius:5px; cursor:pointer;">
            Buscar
        </button>
    </form>

    <!-- Botão adicionar novo contato -->
    <button id="toggleAddForm" 
            style="background:#28a745; border:none; padding:10px 20px; margin-bottom:15px; cursor:pointer; border-radius:5px;">
        Adicionar Novo Contato
    </button>

    <!-- Formulário criação/edição -->
    <form id="addForm" method="POST" 
          action="{{ isset($editContact) ? route('contact.update', $editContact->id) : route('contact.store') }}" 
          style="display:none; flex-direction:column; gap:10px; margin-bottom:20px; background:#1f2937; padding:15px; border-radius:5px;">
        @csrf
        @if(isset($editContact))
            @method('PUT')
        @endif

        <input type="text" name="name" placeholder="Nome" required 
               value="{{ old('name', $editContact->name ?? '') }}" 
               style="padding:8px; border-radius:5px; border:none;">

        <input type="text" name="phone" id="phone" placeholder="Telefone (XX) XXXXX-XXXX" required
               value="{{ old('phone', $editContact->phone ?? '') }}" 
               maxlength="15" 
               style="padding:8px; border-radius:5px; border:none;">

        <input type="email" name="email" placeholder="E-mail" 
               value="{{ old('email', $editContact->email ?? '') }}" 
               style="padding:8px; border-radius:5px; border:none;">

        <input type="text" name="address" placeholder="Endereço" 
               value="{{ old('address', $editContact->address ?? '') }}" 
               style="padding:8px; border-radius:5px; border:none;">

        <button type="submit" style="background:#28a745; border:none; padding:10px; border-radius:5px; cursor:pointer;">
            {{ isset($editContact) ? 'Atualizar' : 'Adicionar' }}
        </button>
    </form>

    <!-- Lista de contatos -->
    <div>
        @foreach($contacts as $contact)
            <div style="background:#1f2937; margin-bottom:10px; border-radius:5px; overflow:hidden;">
                <div class="contact-name" 
                     style="padding:10px; cursor:pointer; font-weight:bold; background:#111827;">
                    {{ $contact->name }}
                </div>

                <div class="contact-details" style="display:none; padding:10px; border-top:1px solid #374151;">
                    <p>Telefone: {{ $contact->phone }}</p>
                    <p>Email: {{ $contact->email }}</p>
                    <p>Endereço: {{ $contact->address ?? '-' }}</p>

                    <form method="GET" action="{{ route('contacts') }}" style="display:inline;">
                        <input type="hidden" name="edit" value="{{ $contact->id }}">
                        <button type="submit" style="margin-right:10px; background:none; border:none; color:#28a745; cursor:pointer;">
                            Editar
                        </button>
                    </form>

                    <form method="POST" action="{{ route('contact.destroy', $contact->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Deseja realmente excluir?')" 
                                style="background:none; border:none; color:#dc3545; cursor:pointer;">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    
    document.getElementById('toggleAddForm').addEventListener('click', function() {
        const form = document.getElementById('addForm');
        form.style.display = form.style.display === 'none' ? 'flex' : 'none';
    });

    
    document.querySelectorAll('.contact-name').forEach(function(element) {
        element.addEventListener('click', function() {
            const details = this.nextElementSibling;
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
        });
    });

    
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        let digits = e.target.value.replace(/\D/g, '');
        if(digits.length > 11) digits = digits.slice(0,11);
        let formatted = digits;
        if(digits.length > 2 && digits.length <= 6) {
            formatted = `(${digits.slice(0,2)}) ${digits.slice(2)}`;
        } else if(digits.length > 6) {
            formatted = `(${digits.slice(0,2)}) ${digits.slice(2,7)}-${digits.slice(7)}`;
        }
        e.target.value = formatted;
    });

    
    document.getElementById('addForm').addEventListener('submit', function(e) {
        const digits = phoneInput.value.replace(/\D/g,''); 
        if(digits.length !== 11) {
            alert('O telefone deve ter exatamente 11 dígitos!');
            e.preventDefault();
            return;
        }
        phoneInput.value = digits; 
    });

    
    @if(isset($editContact))
        document.getElementById('addForm').style.display = 'flex';
    @endif
</script>
