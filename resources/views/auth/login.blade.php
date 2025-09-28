@if($message = Session::get('status'))
    <div class="error">{{ $message }}</div>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="error">{{ $error }}</div>
    @endforeach
@endif
<form method="POST" action="{{ route('auth') }}">
    @csrf
    <label for="email">E-mail: </label>
    <input type="email" id="email" name="email" required>
    <label for="password">Senha: </label>
    <input type="password" id="password" name="password" required>
    <span><a href="{{ route('forgot-password') }}">Esqueceu a senha?</a></span>
    <button type="submit">Entrar</button>
    <span>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></span>
</form>