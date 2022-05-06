
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Меню</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">На главную</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route("showCart")}}">Перейти в корзину</a>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("login")}}">Залогиниться</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("Create.Account")}}">Создать аккаунт</a>
                </li>
                @endauth
            </ul>
            <form class="d-flex" action="{{route("search")}}">
                <input class="form-control me-2" name="search1" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
        </div>
    </div>



    @auth @else @endauth
</nav>
