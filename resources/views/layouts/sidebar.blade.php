<aside :class="{'translate-x-0': isSidebarOpen}" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0 bg-gradient-to-b from-secondary to-secondary" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            {{-- Common Menu --}}
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-background-alt group {{ request()->routeIs('dashboard') ? 'bg-background-alt' : '' }}">
                    <x-lucide-layout-dashboard class="w-5 h-5 text-black" />
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Role-based Menus --}}
            @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-background-alt group {{ request()->routeIs('admin.verifikasi.index') ? 'bg-background-alt' : '' }}">
                        <x-lucide-user-check class="w-5 h-5 text-black" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Verifikasi Akun</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-background-alt group {{ request()->routeIs('admin.users.index') ? 'bg-background-alt' : '' }}">
                        <x-lucide-users class="w-5 h-5 text-black" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Peserta</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->role === 'siswa')
                <li>
                    <a href="{{ route('peserta.form') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-background-alt group {{ request()->routeIs('peserta.form') ? 'bg-background-alt' : '' }}">
                        <x-lucide-file-text class="w-5 h-5 text-black" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Form Data Peserta</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('peserta.jadwal') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-background-alt group {{ request()->routeIs('peserta.jadwal') ? 'bg-background-alt' : '' }}">
                        <x-lucide-calendar-check class="w-5 h-5 text-black" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Jadwal & Data Lomba</span>
                    </a>
                </li>
            @endif
        </ul>

        {{-- Logout Button at the bottom --}}
        <div class="absolute bottom-0 left-0 w-full p-4">
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-lucide-log-out class="w-5 h-5 text-black" />
                    <span class="flex-1 ms-3 whitespace-nowrap">Keluar</span>
                </a>
            </form>

            <div class="mt-8 text-center">
                    <p class="text-xs text-gray-500">
                        © 2026 One Seulanga Nusantara. All rights reserved.
                    </p>
                </div>
                
        </div>
    </div>
</aside>
