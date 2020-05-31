<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList - @yield("title")</title>
    <link rel="stylesheet" href="{{mix('css/style.css')}}">
</head>

<body>
    <header id=header>
        <div class="left">
            <a href="/">Todo List</a>
        </div>
        <div class="right">
            <!-- Right Side Of Navbar -->
            <ul class="user">
                <!-- Authentication Links -->
                @guest
                <li class="user__login">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="user__register">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規アカウント作成') }}</a>
                </li>
                @endif
                @else
                <li class="user__menu">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" @click="menu =! menu">
                        {{ Auth::user()->name }}<span class="caret"></span>
                    </a>

                    <ul class="user__menu-list" v-if="menu">
                        <li><a href="/">ホーム</a></li>
                        <li><a href="mypage">マイページ</a></li>
                        <li><a href="post">投稿</a></li>
                        <li><a href="changepass">パスワード変更</a></li>
                        <li>
                            <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </header>
    <main id="main">
        @yield("content")
    </main>
    <script src="{{mix('js/main.js')}}"></script>
</body>

</html>