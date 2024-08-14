<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('/images/justine.png') }}" class="img-fluid" /><span>JC Music</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="{{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}"><i class="material-icons">home</i><span>HOME
                </span></a>
        </li>
        <li class="{{ request()->is('about') ? 'active' : '' }}">
            <a href="{{ route('about') }}"><i class="material-icons">info</i><span>About
                </span></a>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">menu</i><span>MENU</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                <li class="{{ request()->is('viewproducts') ? 'active' : '' }}">
                    <a href="{{ route('viewproducts') }}">View Products</a>
                </li>
            </ul>
        </li>

        </li>
        <li class="dropdown">
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">library_books</i><span>TRANSACTION</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                <li class="{{ request()->is('orders') ? 'active' : '' }}">
                    <a href="{{ route('orders') }}">My Orders</a>
                </li>
                <li class="{{ request()->is('rents') ? 'active' : '' }}">
                    <a href="{{ route('rents') }}">Rented Items</a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->is('cart') ? 'active' : '' }}">
            <a href="{{ route('cart') }}"><i class="material-icons">shopping_cart</i><span>Cart
                </span></a>
        </li>
        <li class="{{ request()->is('profile') ? 'active' : '' }}">
            <a href="{{ route('profile') }}"><i class="material-icons">account_circle</i><span>Profile
                </span></a>
        </li>
        <li class="">
            <a href="#!" id="logout"><i class="material-icons">logout</i><span>Logout
                </span></a>
        </li>


    </ul>


</nav>