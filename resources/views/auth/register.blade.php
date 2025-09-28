@if($message = Session::get('erro'))
    <div class="error">{{ $mensage }}</div>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="error">{{ $error }}</div>
    @endforeach
@endif
<form method="POST" action="{{ route('register.create') }}">
    @csrf
    <label for="name">Nome: </label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    <label for="email">E-mail: </label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    <label for="password">Senha: </label>
    <input type="password" id="password" name="password" value="{{ old('password') }}" required>
    <button type="submit">Criar conta</button>
    <span>Já tem uma conta? <a href="{{route('login')}}">Entrar</a></span>
</form>