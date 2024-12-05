<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/home.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <div class="text-center">
                    <img src="/assets/img/logo-tatib.png" alt="Logo" class="img-fluid" style="max-width: 160px;">
                </div>
            </a>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#about">About Si Tatib</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#tatib">Tata Tertib</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item mx-3">
                        <button type="button" class="btn btn-primary" onclick="location.href='login'">Login</button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="background-container">
        <div class="background-overlay"></div>
        <div class="text-content" style="padding-left: 129px;">
            <h1><b>Selamat Datang di SiTatib Polinema!</b></h1>
            <br>
            <h2>Menjaga Sikap, Integritas, dan Tanggung Jawab di Kampus</h2>
            <br>
            <h5>Temukan panduan untuk memahami aturan kampus dan berperan dalam membangun kampus yang tertib dan beretika.</h5>
            <br>
            <button type="button" class="btn btn-primary" onclick="location.href='login'">Login</button>
        </div>
    </div>
    </div>

    <!-- SiTatib -->
    <div class="container-fluid" id="about">
        <div class="card" style="margin: 20px 150px 20px 150px; padding: 50px;">
            <div class="card-body">
                <div class="row">
                    <h5 class="mb-4 d-flex justify-content-center">SiTatib Polinema</h5>
                </div>
                <div class="row" style="text-align: justify;">
                    <p class="fs-6">SiTatib Polinema adalah Sistem Informasi Tata Tertib yang dirancang untuk mendukung penerapan peraturan dan menjaga disiplin di lingkungan Politeknik Negeri Malang. Sistem ini bertujuan menciptakan suasana yang aman, tertib, dan kondusif bagi seluruh civitas akademika, termasuk mahasiswa, dosen, dan staf kampus. Melalui SiTatib Polinema, pengguna dapat dengan mudah memahami, mengelola, dan memantau tata tertib kampus secara efisien.
                        <br>
                        <br>
                        Sistem ini menyediakan akses mudah ke informasi tata tertib kampus, memungkinkan pemantauan riwayat pelanggaran mahasiswa secara transparan, serta memfasilitasi dosen dalam melaporkan dan memantau pelanggaran secara efisien. Dengan fitur-fitur ini, Politeknik Negeri Malang berkomitmen untuk menciptakan lingkungan akademik yang mendukung pembelajaran dan pengembangan karakter disiplin.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- TATA TERTIB -->
    <div class="container mb-5" id="tatib">
        <div class="row justify-content-center">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card shadow-sm p-4" style="border-radius: 15px; height: auto; width: 285px;">
                    <div class="text-center">
                        <img src="/assets/img/logo-TataTertib.png" 
                            alt="Tata Tertib Logo" 
                            class="img-fluid mb-3" 
                            style="width: 90px; height: 90px;">
                        <h3>Tata Tertib</h3>
                        <hr style="width: 50%; border: 3px solid #F6921E; border-radius: 10px; background-color: #F6921E;">
                        <p class="text-justify">
                            Pelajari aturan yang harus dipatuhi di kampus untuk menciptakan lingkungan yang tertib dan harmonis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card shadow-sm p-4" style="border-radius: 15px; height: auto; width: 285px;">
                    <div class="text-center">
                        <img src="/assets/img/logo-Pelanggaran.png" 
                            alt="Pelanggaran Logo" 
                            class="img-fluid mb-3" 
                            style="width: 90px; height: 90px;">
                        <h3>Pelanggaran</h3>
                        <hr style="width: 50%; border: 3px solid #F6921E; border-radius: 10px; background-color: #F6921E;">
                        <p class="text-justify">
                            Lihat riwayat pelanggaran dan pantau status kedisiplinan. Pastikan untuk selalu mematuhi tata tertib kampus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="card" style="margin: 20px 450px 20px 450px; padding: 50px;" id="faq">
        <div class="row align-items-center">
            <div class="col-auto">
                <img src="/assets/img/info-circle.png" alt="Logo FAQ" style="width: 32px; height: 32px;">
            </div>
            <div class="col">
                <h3>FAQ</h3>
            </div>
        </div>
        
        <div class="row mt-3">
            <button class="faq-button rounded" style="background-color: #F6921E; padding: 20px;">
                <b>Bagaimana cara mengatahui peraturan kampus yang berlaku?</b>
                <img class="toggle-icon img-fluid d-flex float-end justify-content-center align-items-center mt-1" src="/assets/img/panah.png" alt="" style="height: 15px">
            </button>
            <div class="faq-content mt-2" style="display: none; padding-left: 20px;">
                Peraturan kampus dapat dilihat pada menu "Tata Tertib".
            </div>
        </div>
        <div class="row mt-3">
            <button class="faq-button rounded" style="background-color: #F6921E; padding: 20px">
                <b>Bagaimana cara mengatahui peraturan kampus yang berlaku?</b>
                <img class="toggle-icon img-fluid d-flex float-end justify-content-center align-items-center mt-1" src="/assets/img/panah.png" alt="" style="height: 15px">
            </button>
            <div class="faq-content mt-2" style="display: none; padding-left: 20px;">
                Peraturan kampus dapat dilihat pada menu "Tata Tertib".
            </div>
        </div>
        <div class="row mt-3">
            <button class="faq-button rounded" style="background-color: #F6921E; padding: 20px">
                <b>Bagaimana cara mengatahui peraturan kampus yang berlaku?</b>
                <img class="toggle-icon img-fluid d-flex float-end justify-content-center align-items-center mt-1" src="/assets/img/panah.png" alt="" style="height: 15px">
            </button>
            <div class="faq-content mt-2" style="display: none; padding-left: 20px;">
                Peraturan kampus dapat dilihat pada menu "Tata Tertib".
            </div>
        </div>
        <div class="row mt-3">
            <button class="faq-button rounded" style="background-color: #F6921E; padding: 20px">
                <b>Bagaimana cara mengatahui peraturan kampus yang berlaku?</b>
                <img class="toggle-icon img-fluid d-flex float-end justify-content-center align-items-center mt-1" src="/assets/img/panah.png" alt="" style="height: 15px">
            </button>
            <div class="faq-content mt-2" style="display: none; padding-left: 20px;">
                Peraturan kampus dapat dilihat pada menu "Tata Tertib".
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <section>
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3" style="padding: 20px;">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Politeknik Negeri Malang
                        </h6>
                        <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contacts
                        </h6>
                        <p>Telepon: (0341) 404424</p>
                        <p style="white-space: nowrap;">Email: humas@polinema.ac.id</p>
                        <p style="white-space: nowrap;">Instagram: @polinema_campus</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright: Kelompok 1 TI-2A
        </div>
    </footer>

</body>

<script>
    // Ambil semua tombol FAQ
    const faqButtons = document.querySelectorAll('.faq-button');

    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling; // Ambil elemen konten di bawah tombol
            const icon = button.querySelector('.toggle-icon'); // Ambil ikon panah

            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block"; 
                icon.style.transform = "rotate(90deg)";
            } else {
                content.style.display = "none"; 
                icon.style.transform = "rotate(0deg)";
            }
        });
    });
</script>

</html>