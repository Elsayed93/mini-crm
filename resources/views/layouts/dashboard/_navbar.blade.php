<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{-- <i class="far fa-comments"></i> --}}
                <i class="fas fa-sign-out-alt fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media" style="text-align: center">

                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ auth()->user()->name }}
                            </h3>
                            <p class="text-sm">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <a href="#" id="log-out-link" class="dropdown-item dropdown-footer">Logout</a>

                <form action="{{ route('logout') }}" method="post" id="log-out-form">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
