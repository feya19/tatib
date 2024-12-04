
        </div>
        </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua link di sidebar
        const sidebarLinks = document.querySelectorAll("#sidebar .nav-link");

        // Dapatkan URL path saat ini
        let currentPath = window.location.pathname;

        // Fungsi untuk mencoba mencocokkan path
        function findActiveLink(path) {
            for (const link of sidebarLinks) {
                if (link.getAttribute("href") === path) {
                    link.classList.add("active");
                    return true; // Link ditemukan
                }
            }
            return false; // Link tidak ditemukan
        }

        // Mulai dari path lengkap, dan coba dengan mengurangi segment jika tidak ditemukan
        while (currentPath !== "") {
            if (findActiveLink(currentPath)) {
                break; // Jika path ditemukan, hentikan loop
            }
            // Hapus segmen terakhir dari path
            currentPath = currentPath.substring(0, currentPath.lastIndexOf("/"));
        }
    });
    </script>
</body>
</html>