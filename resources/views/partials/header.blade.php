<header class="bg-white border-bottom sticky-top">
    <div class="d-flex align-items-center justify-content-between p-3">
        <!-- Mobile Toggle Button -->
        <button id="sidebarToggle" class="btn d-lg-none">
            <i class="bi bi-list fs-4"></i>
        </button>


        <ul class="flex space-x-8">
            <li>
                     <a href="{{ route('home') }}" class="text-gray-600 hover:text-green-600">Home</a>
            </li>
    
            <li>
                     <a href="{{ route('tentang') }}" class="text-gray-600 hover:text-green-600">Tentang</a>
            </li>
    
            <li>
                      <a href="{{ route('kategori') }}" class="text-gray-600 hover:text-green-600">Kategori</a>
            </li>
            <li>
                    <a href="{{ route('produk') }}" class="text-gray-600 hover:text-green-600">Produk</a>
            </li>
        </ul>



        <!-- Header Title -->
        <h1 class="h5 mb-0">@yield('title', 'Dashboard')</h1>
        <li>
             <a href="{{ route('tentang') }}" class="text-gray-600 hover:text-green-600">Tentang</a>
        </li>
    </div>
</header>
