<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
            <h2 class="text-white bg-danger p-2 rounded">Dashboard</h2>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('index') }}" target="_blank" class="dropdown-toggle no-arrow active">
                        <span class="micon dw dw-calendar1"></span><span class="mtext"> Frontend</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-calendar1"></span>
                        <span class="mtext">Tree</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="" class="dropdown-toggle no-arrow">
                                <span class="mtext">All Tree</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-toggle no-arrow">
                                <span class="mtext">Unapproved Tree</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-toggle no-arrow">
                                <span class="mtext">Approved Tree</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('tree.index') }}" class="dropdown-toggle no-arrow @yield('tree')">
                        <span class="micon dw dw-calendar1"></span><span class="mtext"> Tree</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="dropdown-toggle no-arrow @yield('category')">
                        <span class="micon dw dw-calendar1"></span><span class="mtext"> Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('banner.index') }}" class="dropdown-toggle no-arrow @yield('banner')">
                        <span class="micon dw dw-calendar1"></span><span class="mtext"> Banner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact.index') }}" class="dropdown-toggle no-arrow @yield('contact')">
                        <span class="micon dw dw-calendar1"></span><span class="mtext"> Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
