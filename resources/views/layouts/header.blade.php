<nav class="navbar navbar-expand-md bg-main fixed-top-sm justify-content-start flex-nowrap navbar-dark pt-4 pb-4">
    <a href="/" class="navbar-brand">BulveyzCasts</a>
    <ul class="nav navbar-nav navbar-logo ml-auto d-none d-md-none d-lg-block">
        <li class="nav-item search">
            <div class="input-group mb-3 pt-2">
                <label class="search-img">
                    <input type="text" id="template-links" class="form-control w400 hidden-xs-down" placeholder="Что вы хотите изучать?" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </label>
                <div class="search-box">
                    <ul class="list-group" id="search-result">
                    
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav flex-row ml-auto d-none d-md-none d-lg-flex">
        @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link px-2" href="/user/noty">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-premain">{{request()->user()->notifications()->count()}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="/user/profile">Аккаунт</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="/logout">Выйти</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link px-2" href="/login">Войти</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="/register">Регистрация</a>
            </li>
        @endif
    </ul>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<nav class="navbar bg-premain navbar-expand-md navbar-dark p-0">
    <div class="navbar-collapse collapse pt-2 pt-md-0" id="navbar2">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::path() === 'catalog' ? ' active' : '' }}">
                <a class="nav-link" href="/catalog?category_casts=1">Каталог</a>
            </li>
            <li class="nav-item {{ Request::path() === 'cast' ? ' active' : '' }}">
                <a class="nav-link" href="/cast">Серии</a>
            </li>
            <li class="nav-item {{ Request::path() === 'discussion' ? ' active' : '' }}">
                <a class="nav-link" href="/discussion">Обсуждения</a>
            </li>
            <li class="nav-item {{ Request::path() === 'blog' ? ' active' : '' }}">
                <a class="nav-link" href="/blog">Блог</a>
            </li>
        </ul>
    </div>
</nav>
