
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
    

    // Ambil semua elemen dengan class 'card-hewan'
    document.querySelectorAll('.card-hewan').forEach((card) => {
    // Ambil status dari atribut data-status
        const status = card.getAttribute('data-status');

        // Atur warna latar belakang berdasarkan status
        if (status === "Sembuh") {
            card.style.backgroundColor = '#77DD77';
        } else if (status === "Dalam Perawatan") {
            card.style.backgroundColor = 'yellow';
        } else if (status === "Belum Ditangani") {
            card.style.backgroundColor = '#FF4D4D';
        }
    });

    