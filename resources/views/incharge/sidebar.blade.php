<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="{{ asset('/images/justine.png') }}" class="img-fluid" /><span>JC Music</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="{{ request()->is('incharge.home') ? 'active' : '' }}">
            <a href="{{ route('incharge.home') }}"><i class="material-icons">home</i><span>HOME
                </span></a>
        </li>
        <li class="{{ request()->is('incharge.about') ? 'active' : '' }}">
            <a href="{{ route('incharge.aboutpage') }}"><i class="material-icons">info</i><span>About
                </span></a>
        </li>

        </li>
        <li class="dropdown">
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">library_books</i><span>TRANSACTION</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                <li class="{{ request()->is('incharge.transactionpage') ? 'active' : '' }}">
                    <a href="{{ route('incharge.transactionpage') }}">Transactions</a>
                </li>
                <li class="{{ request()->is('incharge.rentpage') ? 'active' : '' }}">
                    <a href="{{ route('incharge.rentpage') }}">Rented Items</a>
                </li>
            </ul>
        </li>

        <li class="{{ request()->is('incharge.profilepage') ? 'active' : '' }}">
            <a href="{{ route('incharge.profilepage') }}"><i class="material-icons">account_circle</i><span>Profile
                </span></a>
        </li>
        <li class="">
            <a href="#!" id="logout"><i class="material-icons">logout</i><span>Logout
                </span></a>
        </li>


    </ul>


</nav>