        <div class="az-header">
        <div class="container">
            <div class="az-header-left">
            <a href="index.html" class="az-logo"><span>SI BEBAS PUSTAKA</span></a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="index.html" class="az-logo"><span></span> SI BEBAS PUSTAKA</a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
                </li>
                    <li class="nav-item {{ request()->is('Bebas-Perpus') || request()->is('Bebas-Perpus/create') || $title == 'Tambah Data Skripsi' ? 'active' : '' }}">
                        <a href="{{ route('Data-Bebas-Perpus') }}" class="nav-link"><i class="typcn typcn-book"></i>Bebas Pustaka</a>
                    </li>
            </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">
            
            </div><!-- az-header-notification -->
            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user"><img src="Azia/img/faces/face1.jpg" alt=""></a>
                <div class="dropdown-menu">
                <div class="az-dropdown-header d-sm-none">
                    <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>
                <div class="az-header-profile">
                    <div class="az-img-user">
                    <img src="Azia/img/faces/face1.jpg" alt="">
                    </div><!-- az-img-user -->
                    <h6></h6>
                    <span></span>
                </div><!-- az-header-profile -->

                <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                <form method="POST" class="logout-form" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</button>
                </form>
                </div><!-- dropdown-menu -->
            </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
        </div><!-- az-header -->