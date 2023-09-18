</main>
<?php get_sidebar(); ?>
</div>
    <footer class="hitam">
        <div class="location">
            <div class="title"><img src="image/smkn-logo.png" alt=""> SMK NEGERI 1 KOTA BEKASI</div>
            <div class="desc">
                <p class="text">Jl. Bintara VIII No.2, RT.005/RW.003, Bintara, Kec. Bekasi Barat, Kota Bks, Jawa Barat
                    17134.</p>
                <iframe class="maps" title="maps"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.055237962928!2d106.9568943!3d-6.2289093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c89a57526f1%3A0xa850dc0a366b403c!2sSMK%20NEGERI%201%20KOTA%20BEKASI!5e0!3m2!1sid!2sid!4v1692714733591!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="contact">
            <div class="content">
                <div class="title">Pages</div>
                <div class="text">
                    <a href="#">Beranda</a>
                    <a href="#">Profil</a>
                    <a href="#">Program Sekolah</a>
                    <a href="#">Manajemen Sekolah</a>
                    <a href="#">Akademik</a>
                    <a href="#">PPDB 2024</a>
                    <a href="#">BLUD</a>
                </div>
            </div>
            <div class="content">
                <div class="title">Social Media</div>
                <div class="text">
                    <a href="#">SMKN 1 KOTA BEKASI</a>
                    <a href="#">@smkn1bks</a>
                    <a href="#">SMKN 1 KOTA BEKASI</a>
                    <a href="#">SMKN 1 BEKASI</a>
                </div>
            </div>
            <div class="content">
                <div class="title">Contact</div>
                <div class="text">
                    <a href="#">(021) 88951151</a>
                    <a href="#">info@smkn1kotabekasi.sch.id</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let hideScroll = window.pageYOffset;
        let currentScrollPos = window.pageYOffset
        let nav = document.querySelector("nav")
        addEventListener('scroll', () => {
            if (hideScroll < window.pageYOffset && !nav.classList.contains('sembunyi')) {
                nav.classList.add('sembunyi')
            }
            else if (hideScroll > window.pageYOffset && nav.classList.contains('sembunyi')) {
                nav.classList.remove('sembunyi')
            }
            currentScrollPos = window.pageYOffset
            hideScroll = currentScrollPos;
        })
    </script>

</div>
<?php wp_footer(); ?>
</body>
</html>