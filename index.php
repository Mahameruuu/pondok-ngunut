<?php
include 'config/conn.php'; 

$query_santri = "SELECT COUNT(*) AS total_santri FROM pendaftaran_santri";
$result_santri = mysqli_query($conn, $query_santri);
$row_santri = mysqli_fetch_assoc($result_santri);
$total_santri = $row_santri['total_santri'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Pondok Ngunut</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.jpg" alt="">
          <h1 class="sitename">Pondok Ngunut</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Profil</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#ustadz">Ustadz</a></li>
            <li><a href="#kegiatan">Kegiatan</a></li>
            <li><a href="#biaya">Biaya Pendidikan</a></li>
            <li class="dropdown"><a href="#sekolah"><span>Sekolah</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">SD</a></li>
                <li><a href="#">SMP</a></li>
                <li><a href="#">SMA</a></li>
              </ul>
            </li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Selamat Datang <span>Pondok Ngunut</span></h1>
            <p>Pondok Ngunut adalah tempat untuk belajar dan mengembangkan diri dengan nilai-nilai keislaman.</p>
            <div class="d-flex">
              <a href="login.php" climgss="btn-get-started">Daftar Sekarang</a>
              <a href="https://youtu.be/CGaHoNbSi6Q" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Lihat Video</span></a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">
    
        <div class="row gy-4">
    
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-book icon"></i></div>
              <h4><a href="" class="stretched-link">Pendidikan</a></h4>
              <p>Pendidikan berbasis keislaman dengan kurikulum yang terintegrasi.</p>
            </div>
          </div><!-- End Layanan Item -->
    
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-book-half icon"></i></div>
              <h4><a href="" class="stretched-link">Kajian Islam</a></h4>
              <p>Majelis ilmu dan kajian rutin untuk meningkatkan pemahaman agama.</p>
            </div>
          </div><!-- End Layanan Item -->
    
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-people icon"></i></div>
              <h4><a href="" class="stretched-link">Kegiatan Santri</a></h4>
              <p>Berbagai kegiatan keagamaan dan keterampilan untuk pengembangan santri.</p>
            </div>
          </div><!-- End Layanan Item -->
    
          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-house-door icon"></i></div>
              <h4><a href="" class="stretched-link">Fasilitas Pondok</a></h4>
              <p>Asrama, masjid, dan fasilitas pendukung lainnya untuk kenyamanan santri.</p>
            </div>
          </div><!-- End Layanan Item -->
        </div>
      </div>
    </section><!-- /Featured Services Section -->
    

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
        <p><span>Kenali Lebih Dekat</span> <span class="description-title">Pondok Ngunut</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-3">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" alt="Tentang Pondok Ngunut" class="img-fluid">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
              <h3>Pondok Pesantren yang Mengajarkan Ilmu dan Akhlak Mulia</h3>
              <p class="fst-italic">
                Pondok Ngunut adalah lembaga pendidikan Islam yang berkomitmen mencetak generasi berakhlak mulia, berilmu, dan bermanfaat bagi umat.
              </p>
              <ul>
                <li>
                  <i class="bi bi-diagram-3"></i>
                  <div>
                    <h4>Pendidikan Berbasis Islam</h4>
                    <p>Kurikulum terpadu antara pendidikan formal dan ilmu keislaman, membentuk santri yang cerdas dan berakhlak.</p>
                  </div>
                </li>
                <li>
                  <i class="bi bi-book"></i>
                  <div>
                    <h4>Kajian dan Tahfidz Al-Qur'an</h4>
                    <p>Membimbing santri dalam menghafal, memahami, dan mengamalkan Al-Qur'an dalam kehidupan sehari-hari.</p>
                  </div>
                </li>
              </ul>
              <p>
                Dengan lingkungan yang nyaman dan penuh kebersamaan, Pondok Ngunut menjadi tempat terbaik bagi santri untuk tumbuh dan berkembang dalam ilmu agama dan kehidupan sosial.
              </p>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-mortarboard"></i>
                <div class="stats-item">
                    <span><?= $total_santri; ?></span>
                    <p>Santri Aktif</p>
                </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-book"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
              <p>Kitab yang Dipelajari</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-people"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="2000" data-purecounter-duration="1" class="purecounter"></span>
              <p>Alumni Berprestasi</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <i class="bi bi-calendar-event"></i>
            <div class="stats-item">
              <span data-purecounter-start="0" data-purecounter-end="365" data-purecounter-duration="1" class="purecounter"></span>
              <p>Kegiatan Tahunan</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Partners Section -->
    <section id="partners" class="clients section light-background">

      <div class="container">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/partners/partner-1.png" class="img-fluid" alt="Mitra 1"></div>
            <div class="swiper-slide"><img src="assets/img/partners/partner-2.png" class="img-fluid" alt="Mitra 2"></div>
            <div class="swiper-slide"><img src="assets/img/partners/partner-3.png" class="img-fluid" alt="Mitra 3"></div>
            <div class="swiper-slide"><img src="assets/img/partners/partner-4.png" class="img-fluid" alt="Mitra 4"></div>
          </div>
        </div>

      </div>

    </section><!-- /Partners Section -->

    <!-- Layanan Pondok -->
    <section id="layanan" class="services section">

      <!-- Judul Section -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Layanan</h2>
        <p><span>Pelayanan</span> <span class="description-title">di Pondok Ngunut</span></p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-book"></i>
              </div>
              <h3>Pendidikan</h3>
              <p>Pendidikan formal (MI, MTs, MA), madrasah diniyah, serta tahfidzul Qur'an bagi santri.</p>
            </div>
          </div><!-- End Layanan Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-mosque"></i>
              </div>
              <h3>Pengajian & Kajian</h3>
              <p>Majelis taklim, pengajian rutin, serta kajian kitab kuning bersama kyai dan ustadz.</p>
            </div>
          </div><!-- End Layanan Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-people"></i>
              </div>
              <h3>Layanan Sosial</h3>
              <p>Pondok pesantren gratis bagi yatim & dhuafa, serta layanan konsultasi keagamaan.</p>
            </div>
          </div><!-- End Layanan Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-shop"></i>
              </div>
              <h3>Usaha Pesantren</h3>
              <p>Toko pesantren, percetakan, dan usaha lain untuk mendukung ekonomi santri.</p>
            </div>
          </div><!-- End Layanan Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-award"></i>
              </div>
              <h3>Ekstrakurikuler</h3>
              <p>Kegiatan santri seperti pramuka, kesenian Islam, serta pelatihan keterampilan.</p>
            </div>
          </div><!-- End Layanan Item -->

        </div>
      </div>

    </section><!-- /Layanan Pondok -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">
      <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">
            
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonial-ustadz.jpg" class="testimonial-img" alt="">
                <h3>Ustadz Ahmad</h3>
                <h4>Pengajar di Pondok</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Belajar dan mengajar di pondok ini memberikan pengalaman luar biasa. Santri sangat bersemangat dalam menuntut ilmu dan lingkungan sangat kondusif.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonial-santri.jpg" class="testimonial-img" alt="">
                <h3>Ali Rahman</h3>
                <h4>Santri</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Di pondok ini saya belajar banyak hal, mulai dari ilmu agama hingga keterampilan hidup. Saya merasa lebih dekat dengan Allah dan lebih siap menghadapi masa depan.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonial-orangtua.jpg" class="testimonial-img" alt="">
                <h3>Bapak Hadi</h3>
                <h4>Orang Tua Santri</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Saya sangat bersyukur anak saya belajar di pondok ini. Selain mendalami ilmu agama, ia juga menjadi lebih disiplin dan mandiri.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- Team Section -->
    <section id="ustadz" class="team section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pengurus Pondok</h2>
        <p><span>Para Pengurus</span> <span class="description-title">Pondok</span></p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">

          <!-- Kepala Pondok -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="Kepala Pondok">
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ustadz Ahmad</h4>
                <span>Kepala Pondok</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <!-- Ustadz Pengajar -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="Ustadz Pengajar">
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ustadz Fadli</h4>
                <span>Pengajar Tafsir</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <!-- Pengurus Santri -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="Pengurus Santri">
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Abdullah</h4>
                <span>Pengurus Santri</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <!-- Bendahara Pondok -->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="Bendahara">
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Fatimah</h4>
                <span>Bendahara</span>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>
      </div>
    </section><!-- /Team Section -->

    <!-- Galeri Kegiatan Pondok -->
    <section id="kegiatan" class="portfolio section">
      <!-- Judul Section -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Galeri Kegiatan</h2>
        <p><span>Dokumentasi&nbsp;</span> <span class="description-title">Kegiatan Pondok</span></p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".filter-kegiatan">Kegiatan Santri</li>
            <li data-filter=".filter-fasilitas">Fasilitas</li>
            <li data-filter=".filter-prestasi">Prestasi</li>
          </ul><!-- End Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-kegiatan">
              <img src="assets/img/galeri/kegiatan-1.jpg" class="img-fluid" alt="Kegiatan Mengaji">
              <div class="portfolio-info">
                <h4>Mengaji</h4>
                <p>Santri sedang mengaji bersama</p>
                <a href="assets/img/galeri/kegiatan-1.jpg" data-gallery="portfolio-gallery-kegiatan" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-fasilitas">
              <img src="assets/img/galeri/fasilitas-1.jpg" class="img-fluid" alt="Ruang Belajar">
              <div class="portfolio-info">
                <h4>Ruang Belajar</h4>
                <p>Fasilitas ruang belajar santri</p>
                <a href="assets/img/galeri/fasilitas-1.jpg" data-gallery="portfolio-gallery-fasilitas" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-prestasi">
              <img src="assets/img/galeri/prestasi-1.jpg" class="img-fluid" alt="Juara Lomba Tahfidz">
              <div class="portfolio-info">
                <h4>Juara Lomba Tahfidz</h4>
                <p>Santri meraih juara dalam lomba Tahfidz</p>
                <a href="assets/img/galeri/prestasi-1.jpg" data-gallery="portfolio-gallery-prestasi" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div><!-- End Item -->
          </div><!-- End Container -->
        </div>
      </div>
    </section><!-- /Galeri Kegiatan Pondok -->

    <!-- Biaya Pendidikan Pondok -->
    <section id="biaya" class="pricing section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Biaya Pendidikan</h2>
        <p><span>Pilihan</span> <span class="description-title">Program & Donasi</span></p>
      </div>

      <div class="container">
        <div class="row gy-3">
          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Santri Reguler</h3>
              <h4><sup>Rp</sup>500.000<span> / bulan</span></h4>
              <ul>
                <li>Pendidikan Tahfidz</li>
                <li>Asrama & Makan</li>
                <li>Kegiatan Keagamaan</li>
                <li class="na">Beasiswa</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Daftar</a>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item featured">
              <h3>Santri Beasiswa</h3>
              <h4><sup>Rp</sup>0<span> / bulan</span></h4>
              <ul>
                <li>Pendidikan Tahfidz</li>
                <li>Asrama & Makan</li>
                <li>Kegiatan Keagamaan</li>
                <li>Beasiswa Penuh</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Daftar</a>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="pricing-item">
              <h3>Donasi</h3>
              <h4><sup>Rp</sup>100.000<span> / bulan</span></h4>
              <ul>
                <li>Bantu Pendidikan Santri</li>
                <li>Dukung Kegiatan Pondok</li>
                <li>Program Sedekah</li>
                <li>Terima Laporan Donasi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Donasi Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Biaya Pendidikan Pondok -->

    <!-- Contact Section -->
    <section id="kontak" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p><span>Butuh Bantuan?</span> <span class="description-title">Kontak Kami</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>Lingkungan 9, Ngunut, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>No Telp</h3>
                  <p>0813-3495-8267</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31599.74561916058!2d111.99527527431641!3d-8.104720000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e5ee503f4fd3%3A0xb8bc13f79ddabcf8!2sPPHM%20Asrama%20Sunan%20Kalijaga!5e0!3m2!1sid!2sid!4v1742701555442!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Nama</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subjek</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Pesan</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Kirim Pesan</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Pondok Ngunut</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Lingkungan 9, Ngunut, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292</p>
            <p class="mt-3"><strong>Phone:</strong> <span>0813-3495-8267</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
          <div class="social-links d-flex">
            <a href="https://www.youtube.com/@PondokNgunut"><i class="bi bi-youtube"></i></a>
            <a href="https://web.facebook.com/SMKIsunankalijaga/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/pphmsuka/"><i class="bi bi-instagram"></i></a>
            <!-- <a href=""><i class="bi bi-linkedin"></i></a> -->
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Pondok Ngunut</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>