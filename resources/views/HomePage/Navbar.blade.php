 <!-- Navbar fixed transparan -->
 <header>
     <nav class="navbar navbar-expand-md navbar-light container">
         <a class="navbar-brand d-flex align-items-center mx-auto mx-md-0" href="/">
             <img src="/img/cherry-blossom.png" alt="Cherry Blossom" width="30" class="me-2" />
             <span class="fw-bold fs-4">.Floris</span>
         </a>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav mx-auto mb-2 mb-md-0 text-center">
                 <li class="nav-item"><a class="nav-link" href="/beranda">Beranda</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('Produk.show') }}">Produk</a></li>
                 <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('User.Pesanan') }}">Pesanan</a></li>
             </ul>
             <div class="d-flex align-items-center gap-3">
                 @guest
                     <!-- User belum login -->
                     <a href="{{ route('login') }}" class="btn text-dark px-4 py-2 rounded-pill"
                         style="background-color:#ffc7bd" title="Login ke akun Anda"><i
                             data-lucide="circle-user-round"></i></a>
                 @else
                     <!-- User sudah login -->
                     <a href="/keranjang" class="position-relative text-dark" title="Keranjang Anda">
                         <i data-lucide="shopping-cart" class="shake-on-hover"></i>
                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             {{ $count }}
                         </span>
                     </a>

                     <a href="{{ route('logout') }}" class="btn text-dark px-4 py-2 rounded-pill"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                         style="background-color:#ffc7bd" title="Keluar Dari Akun"><i data-lucide="log-out"></i></a>

                     <!-- Form logout tersembunyi -->
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 @endguest
             </div>

         </div>
     </nav>
 </header>
