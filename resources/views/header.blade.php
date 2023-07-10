
<header>
@guest
    <nav class="navbar">
      <a href="#" class="navbar-brand">LOGO</a>
      <ul class="navbar-menu">
        <li class="navbar-menu-item" data-menu="menu-1">
          <a href="#"><i class="fa-regular fa-user"></i>ゲスト</a>
          <div class="navbar-submenu-wrapper" id="menu-1">
            <ul class="navbar-submenu">
              <li class="navbar-submenu-item">
                <a href="{{route('login')}}">ログイン<i class="fa-solid fa-right-to-bracket" style="color: #000000;"></i></a>
              </li>
              <li class="navbar-submenu-item">
                <a href="{{route('register')}}">新規登録<i class="fa-solid fa-address-card"></i></a>
              </li>
            </ul>
          </div>
          <li class="navbar-menu-item" data-menu="menu-2">
            <a href="{{route('products')}}">商品一覧</a>
          </li>
        </li>
      </ul>
    </nav>
@endguest

@auth
    <nav class="navbar">
        <a href="{{route('index')}}" class="navbar-brand">LOGO</a>
        <ul class="navbar-menu">
          <li class="navbar-menu-item" data-menu="menu-1">
            <a href="#"><i class="fa-regular fa-user"></i>{{Auth::user()->name}}</a>
            <div class="navbar-submenu-wrapper" id="menu-1">
              <ul class="navbar-submenu">
                <li class="navbar-submenu-item">
                    <a href="{{route('mypage')}}">マイページ<i class="fa-solid fa-address-card"></i></a>
                </li>
                <li class="navbar-submenu-item">
                    <a href="{{route('mycart')}}">カート<i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="navbar-submenu-item">
                    <a href="{{route('likeItems')}}">イイネ<i class="fas fa-heart"></i></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="navbar-menu-item" data-menu="menu-2">
            <a href="{{route('products')}}">商品一覧</a>
          </li>
          <li class="navbar-menu-item js-box" data-menu="menu-3">
            <form method="POST" name="logout_form" action="{{ route('logout') }}">
                @csrf
                <a class="js-btn" href="javascript:logout_form.submit()">ログアウト</a>
            </form>
            @can('isAdmin')
            <li class="navbar-menu-item" data-menu="menu-4">
                  <a href="{{route('admin')}}">管理画面</a>
            </li>
            @endcan
        </ul>
      </nav>
@endauth
    <div class="logo">
        <a href="{{route('index')}}">
            <span class="logo_size">
                <img class="logoImage" src="{{asset('storage/sample/22168666.png')}}" alt="">
            </span>
        </a>
    </div>
</div>
</div>    
</div> 
</div>

</header>