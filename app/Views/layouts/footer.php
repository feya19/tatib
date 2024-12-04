
        </div>
        </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // Ambil semua link di sidebar
          const sidebarLinks = document.querySelectorAll("#sidebar .nav-link");
      
          // Dapatkan URL path saat ini
          const currentPath = window.location.pathname;
      
          // Loop melalui setiap link di sidebar
          sidebarLinks.forEach(link => {
              // Jika href link sama dengan path URL saat ini, tambahkan class 'active'
              if (link.getAttribute("href") === currentPath) {
                  link.classList.add("active");
              } else {
                  link.classList.remove("active");
              }
          });
      });
    </script>
</body>
</html>