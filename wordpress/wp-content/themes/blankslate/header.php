<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
    <link rel="icon" type="image/x-icon" href="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/08/smkn-1-kota-bekasi.png">
</head>
<style src="<?php echo get_theme_file_uri('style.css'); ?>"></style>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- <nav>
        <div class="hamburger-menu-container">
            <div class="hamburger-menu">
                <div>=</div>
            </div>
        </div>

        <a href="#" class="title-logo">
            <img src="image/smkn-logo.png" alt=""> 
            <h1>smkn negeri 1<br>kota bekasi</h1>
        </a>
        <div class="nav-bar">
            <div class="nav-link">
                <a href="#">beranda</a>
            </div>
            <div class="nav-link">
                <a href="#">profile <i class="fas fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">sekolah<i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown">
                            <li class="drop-link">
                                <a href="#">sekolah</a>
                            </li>
                            <li class="drop-link">
                                <a href="#">sekolah</a>
                            </li>
                        </ul>
                    </li>
                    <li class="drop-link">
                        <a href="#">sekolah</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">program sekolah</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">manajement sekolah</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">akademik</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">galery</a>
            </div>
            <div class="nav-link">
                <a href="#">ppdb 2024</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">blud</a>
            </div>
        </div>

    </nav> -->

    <nav>
        <div class="hamburger-menu-container">
            <div class="hamburger-menu">
                <div>=</div>
            </div>
        </div>

        <a href="beranda.html" class="title-logo">
            <img src="image/smkn-logo.png" alt=""> smkn negeri 1<br>kota bekasi
        </a>
        <div class="nav-bar">
            <div class="nav-link">
                <a href="#">beranda</a>
            </div>
            <div class="nav-link">
                <a href="#">profile <i class="fas fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">sekolah<i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown">
                            <li class="drop-link">
                                <a href="#">sekolah</a>
                            </li>
                            <li class="drop-link">
                                <a href="#">sekolah</a>
                            </li>
                        </ul>
                    </li>
                    <li class="drop-link">
                        <a href="#">sekolah</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="program-sekolah.html">program sekolah</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">manajement sekolah</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">akademik</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">galery</a>
            </div>
            <div class="nav-link">
                <a href="#">ppdb 2024</a>
                <ul class="dropdown">
                    <li class="drop-link">
                        <a href="#">beranda</a>
                    </li>
                </ul>
            </div>
            <div class="nav-link">
                <a href="#">blud</a>
            </div>
        </div>
    </nav>

    <div class="container beranda">
        <header>
            <div class="hero">
                <div class="text">
                    <h2 class="title">SMK Negeri 1 Kota Bekasi <span>Cerdas</span> Mengembangkan Teknologi!</h2>
                    <p>SMK Negeri 1 Kota Bekasi merupakan sekolah yang ditunjuk oleh Direktorat Pembinaan SMK (PSMK)
                        sebagai Rintisan Sekolah Bertaraf Internasional untuk seluruh kompetensi keahlian sejak tahun
                        2008.</p>
                    <div class="info">
                        <div>
                            <div class="number">8</div>
                            <div class="detail">Competition Programs</div>
                        </div>
                        <div>
                            <div class="number">10+</div>
                            <div class="detail">Extraculicular Programs</div>
                        </div>
                        <div>
                            <div class="number">20+</div>
                            <div class="detail">Industry Colaborations</div>
                        </div>
                    </div>
                </div>
                <div class="company-provile">
                    <img class="background" src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/08/Hero-Ilustration-1.png" alt="">
                </div>
            </div>
            <div class="logo-company">
                <img src="../img requirtment/acer logo.png" alt="logo acer" />
                <img src="../img requirtment/bank btn logo.png" alt="logo bank btn" />
                <img src="../img requirtment/logo bank dki.png" alt="bank dki" />
                <img src="../img requirtment/logo toyota.jpg" alt="toyota" />
                <img src="../img requirtment/logo-astra-internasional.jpg" alt="astra Internasional" />
                <img src="../img requirtment/bmkg.png" alt="astra Internasional" />
                <img src="../img requirtment/bpn.png" alt="astra Internasional" />
            </div>
        </header>


        

        <main>
            <div class="artikel category">
                <div class="title">
                    <div class="text">
                        Jelajahi semua <br>Artikel sekolah kami
                        <img class="partikel atas" src="image/logo.png" alt="">
                        <img class="partikel garis-bawah" src="image/logo.png" alt="">
                    </div>
                    <a href="#" class="view">view more</a>
                </div>
                <div class="contents">
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <p class="text-category">School News</p>
                            <p class="desc">Kompetisi Rekayasa Perangkat Lunak adakan pelatihan Mobile Developer yang di
                                selenggarakann Goggle</p>
                            <p class="date">Yesterday, 2 agustus 2023</p>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <p class="text-category">School News</p>
                            <p class="desc">Kompetisi Rekayasa Perangkat Lunak adakan pelatihan Mobile Developer yang di
                                selenggarakann Goggle</p>
                            <p class="date">Yesterday, 2 agustus 2023</p>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <p class="text-category">School News</p>
                            <p class="desc">Kompetisi Rekayasa Perangkat Lunak adakan pelatihan Mobile Developer yang di
                                selenggarakann Goggle</p>
                            <p class="date">Yesterday, 2 agustus 2023</p>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <p class="text-category">School News</p>
                            <p class="desc">Kompetisi Rekayasa Perangkat Lunak adakan pelatihan Mobile Developer yang di
                                selenggarakann Goggle</p>
                            <p class="date">Yesterday, 2 agustus 2023</p>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <p class="text-category">School News</p>
                            <p class="desc">Kompetisi Rekayasa Perangkat Lunak adakan pelatihan Mobile Developer yang di
                                selenggarakann Goggle</p>
                            <p class="date">Yesterday, 2 agustus 2023</p>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <p class="text-category">School News</p>
                            <p class="desc">Kompetisi Rekayasa Perangkat Lunak adakan pelatihan Mobile Developer yang di
                                selenggarakann Goggle</p>
                            <p class="date">Yesterday, 2 agustus 2023</p>
                        </div>
                    </a>
                </div>
            </div>
        </main>

        <main class="hijau-daun">
            <div class="sambutan category">
                <div class="title">
                    <div class="text">sambutan <br>kepala sekolah</div>
                    <a href="#" class="view">view more</a>
                </div>
                <div class="content">
                    <img src="image/bpk-boan.png" alt="">
                    <div class="text">
                        <p>assalamualaikum wr. wb.</p>
                        <p>Kita panjatkan puji syukur ke hadirat Allah SWT beserta Nabi Muhammad SAW beserta
                            sahabat-sahabatnya yang telah memberikan karunia dan kenikmatan yang tak terhitung
                            banyaknya.Bersamaan dengan datangnya tahun ajaran 2022/2023, Website SMK Negeri 1 Kota
                            Bekasi hadir dengan wajah yang baru.</p>
                        <p>Pergantian web ini dirasa sangat penting artinya bagi SMK Negeri 1 Kota Bekasi, karena
                            website adalah halaman muka dan sumber informasi dari sebuah institusi. Seiring perkembangan
                            jaman dan kemajuan teknologi IT yang berkembang dengan cepat maka SMK Negeri 1 Kota Bekasi
                            harus selalu mampu mengikutinya.</p>
                        <p>Akhir kata tak lupa saya ucapkan terima kasih kepada pengelola web yang telah bekerja keras
                            memperbaiki web sekolah, serta seluruh guru, karyawan dan siswa SMK Negeri 1 Kota Bekasi
                            sehingga website sekolah menjadi lebih berguna dan bermanfaat.</p>
                    </div>
                </div>
            </div>
        </main>

        <main>
            <div class="jurusan category">
                <div class="title tengah">
                    <div class="text">temukan perjalananmu <br>dengan program kompetensi kami.</div>
                </div>
                <div class="contents">
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="title">akuntansi dan keuangan lembaga</div>
                        </div>
                    </a>
                </div>
            </div>
        </main>

        <main class="yellow">
            <div class="prestasi category">
                <div class="title">
                    <div class="text">Prestasi</div>
                    <a href="#" class="view">view more</a>
                </div>
                <div class="contents">
                    <a href="#" class="content">
                        <div class="text">
                            <div class="juara">juara <b>1</b></div>
                            <div class="tahun-lomba">lomba kompetensi siswa <b>2023</b></div>
                            <div class="nama-lomba"><b>web Technology ai engineering robotic</b></div>
                            <div class="penyelenggara">by kemendikbud jabar</div>
                        </div>
                        <div class="img">
                            <img src="image/Subtract.png" alt="">
                            <div class="peserta-lomba">asep subardjo supriatman</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="text">
                            <div class="juara">juara <b>1</b></div>
                            <div class="tahun-lomba">lomba kompetensi siswa <b>2023</b></div>
                            <div class="nama-lomba"><b>web Technology ai engineering</b></div>
                            <div class="penyelenggara">by kemendikbud jabar</div>
                        </div>
                        <div class="img">
                            <img src="image/Subtract.png" alt="">
                            <div class="peserta-lomba">asep subardjo supriatman</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="text">
                            <div class="juara">juara <b>1</b></div>
                            <div class="tahun-lomba">lomba kompetensi siswa <b>2023</b></div>
                            <div class="nama-lomba"><b>web Technology ai engineering</b></div>
                            <div class="penyelenggara">by kemendikbud jabar</div>
                        </div>
                        <div class="img">
                            <img src="image/Subtract.png" alt="">
                            <div class="peserta-lomba">asep subardjo supriatman</div>
                        </div>
                    </a>
                </div>
            </div>
        </main>

        <main>
            <div class="tenaga-kependidikan category">
                <div class="title">
                    <div class="text">Tenaga Kependidikan</div>
                    <a href="#" class="view">view more</a>
                </div>
                <div class="contents">
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                </div>

                <div class="title">
                    <div class="text">Tenaga Kependidikan</div>
                    <a href="#" class="view">view more</a>
                </div>
                <div class="contents">
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                    <a href="#" class="content">
                        <div class="img"></div>
                        <div class="text">
                            <div class="nama">pak agus wibowo</div>
                            <div class="profesi">RPL Teacher.</div>
                        </div>
                    </a>
                </div>
            </div>
        </main>

    </div>