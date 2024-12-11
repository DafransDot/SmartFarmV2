<!-- Sidebar -->
<div class="w-64 h-screen bg-gray-800 text-white" id="sidebar">
    <div class="containerLogo">
        <div class="logo">
            <img src="{{ asset('img/icon.jpeg')}}" alt="SmartFarm Icon" id="logosmartfarm">
        </div>
    </div>

    <div class="user-greeting text-white">
            <p class="text-lg font-semibold">Hai, {{ Auth::user()->name ?? 'User' }}</p>
    </div>

    <ul>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('dashboard') }}" class="block">
                <i class="bi bi-house-door"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('hewan_ternak.halamanPenandaanHewanTernak') }}" class="block">
                <i class="bi bi-clipboard2-plus"></i>
                <span class="sidebar-text">Penandaan</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('kelompok_ternak.index') }}" class="block">
                <i class="bi bi-sticky"></i>
                <span class="sidebar-text">Mendata Ternak</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('kesehatan_hewan.index') }}" class="block">
                <i class="bi bi-heart-pulse"></i>
                <span class="sidebar-text">Kesehatan Ternak</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('laporan.index') }}" class="block">
                <i class="bi bi-journal-text"></i>
                <span class="sidebar-text">Laporan</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <form action="{{ route('logout') }}" method="POST" class="block">
             @csrf
                <button type="submit" class="logout-button">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="sidebar-text ml-2">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</div>


<!-- Sidebar Toggle Button -->
<button class="text-white bg-gray-800 p-2" id="sidebar-toggle">
    <i class="bi bi-list"></i>
</button>
