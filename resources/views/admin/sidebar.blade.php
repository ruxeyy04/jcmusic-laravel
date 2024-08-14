<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('/images/justine.png') }}" class="img-fluid" /><span>JC Music</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="{{ request()->is('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}"><i class="material-icons">home</i><span>HOME
                </span></a>
        </li>

        <li class="{{ Request::is('admin.aboutpage') ? 'active' : '' }}">
            <a href="{{ route('admin.aboutpage') }}">
                <i class="material-icons">info</i><span>About</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">menu</i><span>MENU</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                <li class="{{ request()->is('admin.viewproductspage') ? 'active' : '' }}">
                    <a href="{{ route('admin.viewproductspage') }}">View Products</a>
                </li>
                <li class="{{ request()->is('admin.modproducts') ? 'active' : '' }}">
                    <a href="{{ route('admin.modproducts') }}">Modify Products</a>
                </li>
                <li class="{{ request()->is('admin.addproductspage') ? 'active' : '' }}">
                    <a href="{{ route('admin.addproductspage') }}">Add Products</a>
                </li>
            </ul>
        </li>

        </li>
        <li class="dropdown">
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">library_books</i><span>TRANSACTION</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                <li class="{{ request()->is('admin.transactionpage') ? 'active' : '' }}">
                    <a href="{{ route('admin.transactionpage') }}">Transactions</a>
                </li>
                <li class="{{ request()->is('admin.rentpage') ? 'active' : '' }}">
                    <a href="{{ route('admin.rentpage') }}">Rented Items</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">account_box</i><span>ACCOUNT</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                <li class="{{ request()->is('admin.accountpage') ? 'active' : '' }}">
                    <a href="{{ route('admin.accountpage') }}">Accounts</a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->is('admin.profilepage') ? 'active' : '' }}">
            <a href="{{ route('admin.profilepage') }}"><i class="material-icons">account_circle</i><span>Profile
                </span></a>
        </li>
        <li class="">
            <a href="#!" id="logout"><i class="material-icons">logout</i><span>Logout
                </span></a>
        </li>


    </ul>


</nav>