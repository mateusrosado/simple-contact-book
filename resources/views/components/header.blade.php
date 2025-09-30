<header>
    <div class="left">
        <a href="{{route('home')}}"><i class="fa-regular fa-address-book"></i> ContactBook&trade;</a>
    </div>

    <div class="right">
        @auth
            <details>
                <summary>
                    <div class="picture">{{ Str::upper(substr(auth()->user()->name, 0, 1)) }}</div>
                </summary>
                <nav>
                    <div class="info">
                        <span>{{auth()->user()->name}}</span>
                    </div>

                    <ul>
                        <li>
                            <form method="POST" action="{{ route('theme.update') }}">
                                @csrf

                                <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ auth()->user()?->theme === 'dark' ? 'Ver no tema claro' : 'Ver no tema escuro' }}
                                </a>
                            </form>
                        </li>
                        <li>
                            <a href="/contacts">Meus Contatos</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </details>
        @endauth

        @guest
            <x-default-button linkto='register' color="leaked">Criar Conta</x-default-button>
            <x-default-button linkto='login'>Login</x-default-button>
        @endguest
    </div>
</header>