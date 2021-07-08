<ul class="list-group">
    <li class="list-group-item @yield('dashboard')">
        <a href="{{ route('user.dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item @yield('myTrees')">
        <a href="{{ route('user.dashboard.myTree') }}">My Tree</a>
    </li>
    <li class="list-group-item @yield('myOrders')">
        <a href="{{ route('user.dashboard.myOrder') }}">My Orders</a>
    </li>
</ul>
