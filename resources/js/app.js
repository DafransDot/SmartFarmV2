import './bootstrap';
document.getElementById('sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('hidden');
    document.querySelector('.main-content').classList.toggle('sidebar-hidden');
});

