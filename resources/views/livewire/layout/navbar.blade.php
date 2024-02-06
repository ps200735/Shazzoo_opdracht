


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="mb-2 navbar-nav me-auto mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="{{ route('products') }}">producten</a></li>

            </ul>

            @auth
            <form class="d-flex">
                <livewire:shop-cart.cartcounter>

                    <livewire:logout />
            </form>

            @endauth
            @guest
            <ul class="mb-2 navbar-nav me-auto mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            </ul>
            @endguest


        </div>
    </div>
</nav>
