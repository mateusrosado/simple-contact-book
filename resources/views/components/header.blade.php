<header>
    <div class="head_left">
        <a href="{{route('home')}}">
            ContactBook
        </a>
    </div>

    <div class="head_right">
        @auth
            <div class="menu_profile">
                <div class="user_picture">{{substr(auth()->user()->name, 0, 1)}}</div>

                <nav>
                    <div class="user_infos">
                        <span>{{auth()->user()->name}}</span>
                    </div>

                    <ul>
                        <li>
                            <a href="/contacts">Minhas Anotações</a>
                        </li>
                        <li>
                            <a href="/logout">Sair</a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endauth

        @guest
            <x-default-button class='' id='' linkto='register'>Criar Conta</x-default-button>
            <x-default-button class='btn_login' id='' linkto='login'>Login</x-default-button>
        @endguest
    </div>
</header>