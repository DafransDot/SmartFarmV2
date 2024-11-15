<!-- Sidebar -->
<div class="w-64 h-screen bg-gray-800 text-white" id="sidebar">
    <div class="p-4">
        <h2 class="text-2xl font-bold">Logo</h2>
    </div>

    <ul>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('dashboard') }}" class="block">
                <i class="bi bi-house-door"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('profile') }}" class="block">
                <i class="bi bi-person"></i>
                <span class="sidebar-text">Profile</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('settings') }}" class="block">
                <i class="bi bi-gear"></i>
                <span class="sidebar-text">Settings</span>
            </a>
        </li>
        <li class="hover:bg-gray-700 p-4">
            <a href="{{ route('logout') }}" class="block">
                <i class="bi bi-box-arrow-right"></i>
                <span class="sidebar-text">Logout</span>
            </a>
        </li>
    </ul>
</div>

<!-- Sidebar Toggle Button -->
<button class="text-white bg-gray-800 p-2" id="sidebar-toggle">
    <i class="bi bi-list"></i>
</button>
