<?php
get_header();
// if (have_posts()) : while (have_posts()) : the_post();
//         get_template_part('entry');
//         comments_template();
//     endwhile;
// endif;
// get_template_part('nav', 'below');
// get_footer();
?>



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
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/acer-logo-300x150-1.png" alt="logo acer" />
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/bank-btn-logo-1024x237-1.png" alt="logo bank btn" />
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/logo-bank-dki-1024x576-1.webp" alt="bank dki" />
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/logo-toyota-150x150-1.jpg" alt="toyota" />
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/logo-astra-internasional.jpg" alt="astra Internasional" />
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/bmkg-150x150-1.png" alt="astra Internasional" />
                <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/bpn.png" alt="astra Internasional" />
            </div>
        </header>


<?php
// Definisikan argumen query
$agenda = new wp_Query(array(
    'post_type' => 'post',          // Jenis posting
    'post_status' => 'publish',    // Status posting
    'category_name' => 'agenda',  // Ganti 'nama-kategori' dengan nama kategori yang sesuai
    'posts_per_page' => 6,        // Jumlah posting yang ingin ditampilkan (-1 untuk menampilkan semua)
));
?>

<?php
// Definisikan argumen query
$pengumuman = new wp_Query(array(
    'post_type' => 'post',          // Jenis posting
    'post_status' => 'publish',    // Status posting
    'category_name' => 'pengumuman',  // Ganti 'nama-kategori' dengan nama kategori yang sesuai
    'posts_per_page' => 3,        // Jumlah posting yang ingin ditampilkan (-1 untuk menampilkan semua)
));     
?>

<?php
// Definisikan argumen query
$artikel = new wp_Query(array(
    'post_type' => 'post',          // Jenis posting
    'post_status' => 'publish',    // Status posting
    'category_name' => 'artikel',  // Ganti 'nama-kategori' dengan nama kategori yang sesuai
    'posts_per_page' => 8,        // Jumlah posting yang ingin ditampilkan (-1 untuk menampilkan semua)
));
?>

<?php
// Definisikan argumen query
$sambutan = new wp_Query(array(
    'post_type' => 'post',          // Jenis posting
    'post_status' => 'publish',    // Status posting
    'category_name' => 'sambutan',  // Ganti 'nama-kategori' dengan nama kategori yang sesuai
    'posts_per_page' => 1,        // Jumlah posting yang ingin ditampilkan (-1 untuk menampilkan semua)
));
?>


<?php
// Definisikan argumen query
$prestasi = new wp_Query(array(
    'post_type' => 'post',          // Jenis posting
    'post_status' => 'publish',    // Status posting
    'category_name' => 'prestasi',  // Ganti 'nama-kategori' dengan nama kategori yang sesuai
    'posts_per_page' => 3,        // Jumlah posting yang ingin ditampilkan (-1 untuk menampilkan semua)
));
?>

<?php
// Definisikan argumen query
$jurusan = new wp_Query(array(
    'post_type' => 'post',          // Jenis posting
    'post_status' => 'publish',    // Status posting
    'category_name' => 'jurusan',  // Ganti 'nama-kategori' dengan nama kategori yang sesuai
    'posts_per_page' => 8,        // Jumlah posting yang ingin ditampilkan (-1 untuk menampilkan semua)
));
?>


<!-- agenda -->

        <main class="biru">
            <div class="agenda category">
                <div class="title">
                    <div class="text">Agenda</div>
                    <a href="#" class="view">View More</a>
                </div>
                <div class="contents">
<?php

// Loop melalui hasil query
if ($agenda->have_posts()) :
    while ($agenda->have_posts()) :
        $agenda->the_post();
?>
		<a href="<?php the_permalink(); ?>" class="content">
		    <div class="title"><?php the_title(); the_post(); ?></div>
		    <div class="date"><?php the_time("l, j F Y"); ?></div>
		</a>
<?php
                
    endwhile;
    wp_reset_postdata(); // Mengatur ulang data posting
else :
    // Tidak ada posting yang sesuai dengan kategori yang ditemukan
    echo 'Tidak ada posting yang tersedia.';
endif;
?>
                </div>
            </div>


<!-- pengumuman -->

            <div class="pengumuman category">
                <div class="title">
                    <div class="text">Pengumuman</div>
                    <a href="#" class="view">View More</a>
                </div>
                <div class="contents">
                    <?php

// Loop melalui hasil query
if ($pengumuman->have_posts()) :
    while ($pengumuman->have_posts()) :
        $pengumuman->the_post();
?>

	<a href="<?php the_permalink(); ?>" class="content">
            <div class="image"><?php the_post_thumbnail(); ?></div>
		    <div class="title"><?php the_title(); ?></div>
            <!-- // <p class="text"><?php the_post(); ?></p> -->
	    	<div class="date"><?php the_time("l, j F Y"); ?></div>
	    	<!-- <div class="date">kamis, 21 september 2023</div> -->

	</a>

<?php
                
    endwhile;
    wp_reset_postdata(); // Mengatur ulang data posting
else :
    // Tidak ada posting yang sesuai dengan kategori yang ditemukan
    echo 'Tidak ada posting yang tersedia.';
endif;
?>

                </div>
            </div>
        </main>


<!-- artikel -->


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
<?php

// Loop melalui hasil query
if ($artikel->have_posts()) :
    while ($artikel->have_posts()) :
        $artikel->the_post();
?>
		 <a href="#" class="content">
		        <div class="img"><?php the_post_thumbnail(); ?></div>
		        <div class="text">
		            <p class="text-category"><?php the_category(); ?></p>
		            <p class="desc"><?php the_title(); ?></p>
		            <p class="date"><?php the_time(' l, j F Y'); ?></p>
		        </div>
		    </a>
<?php
                
    endwhile;
    wp_reset_postdata(); // Mengatur ulang data posting
else :
    // Tidak ada posting yang sesuai dengan kategori yang ditemukan
    echo 'Tidak ada posting yang tersedia.';
endif;
?>
                   
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
                    <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/bpk-boan-277x300-1.png" alt="Drs. Boan Mp.d">
                    <div class="text">
                        <p>Assalamualaikum wr. wb.</p>
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
                            <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/Subtract.png" alt="">
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
                            <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/Subtract.png" alt="">
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
                            <img src="http://localhost/wp-smkn1-web/wordpress/wp-content/uploads/2023/09/Subtract.png" alt="">
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


<?php get_footer() ?>