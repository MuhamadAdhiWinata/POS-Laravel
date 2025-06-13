<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
            <div class="shrink-0">
                <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <x-navbar.nav-link href="/">Dashboard</x-navbar.nav-link>
                    <x-navbar.nav-link href="/barang">Barang</x-navbar.nav-link>
                    <x-navbar.nav-link href="/kategori">Kategori</x-navbar.nav-link>
                    <x-navbar.nav-link href="/operator">Operator</x-navbar.nav-link>

                    <!-- Transaksi Dropdown -->
                    <div class="relative inline-block text-left group">
                        <button type="button" class="inline-flex items-center justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Transaksi
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.72-3.7a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                        </button>
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none hidden group-hover:block" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1 text-sm text-gray-700" role="none">
                                <a href="/transaksi/form_transaksi" class="block px-4 py-2 hover:bg-gray-100" role="menuitem">Form Transaksi</a>
                                <a href="/transaksi/laporan_transaksi" class="block px-4 py-2 hover:bg-gray-100" role="menuitem">Laporan Transaksi</a>
                                <a href="/transaksi/laporan_excel" class="block px-4 py-2 hover:bg-gray-100" role="menuitem">Laporan Excel</a>
                                <a href="/transaksi/laporan_pdf" class="block px-4 py-2 hover:bg-gray-100" role="menuitem">Laporan PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:underline">
                    Logout
                </button>
            </form>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-navbar.dropdown-link href="/">Dashboard</x-navbar.dropdown-link>
        <x-navbar.dropdown-link href="/barang">Barang</x-navbar.dropdown-link>
        <x-navbar.dropdown-link href="/kategori">Kategori</x-navbar.dropdown-link>
        <x-navbar.dropdown-link href="/operator">Operator</x-navbar.dropdown-link>
        <x-navbar.dropdown-link href="/#">Transaksi</x-navbar.dropdown-link>
      </div>
    </div>
  </nav>
