
    // Ambil elemen-elemen yang diperlukan
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("sidebar-toggle");
    const mainContent = document.querySelector(".main-content");

    // Fungsi untuk toggle sidebar dan konten utama
    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("active");
        sidebar.classList.toggle("collapsed");
        mainContent.classList.toggle("shifted");
    });

    // Validasi
    function confirmDelete(event) {
        const confirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (!confirmed) {
            event.preventDefault();
        }
        return confirmed;
    }
    