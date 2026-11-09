</main><!-- #main-content -->

<!-- ══════════════════════════════════════════════════════════════════════════
     SMAST FOOTER (High Contrast & Accessible)
     ══════════════════════════════════════════════════════════════════════════ -->
<footer class="smast-footer" role="contentinfo">
    <div class="smast-container">
        <div class="smast-footer-grid">

            <!-- Col 1: Tentang Kami -->
            <div class="smast-footer-col smast-footer-brand">
                <h4 class="footer-col-title">Tentang Kami</h4>
                <div class="footer-brand-header">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo SMAST.png" alt="Logo SMA Negeri 1 Kota Kediri" class="footer-brand-logo-img">
                    <div>
                        <div class="footer-brand-title">SMA Negeri 1 Kota Kediri</div>
                        <div class="footer-brand-sub">Unggul dalam Prestasi, Berakhlak Mulia</div>
                    </div>
                </div>
                <p class="footer-desc">
                    SMA Negeri 1 Kota Kediri (SMAST) adalah lembaga pendidikan menengah atas negeri terkemuka di Kota Kediri,
                    berkomitmen membentuk insan beriman, berkarakter unggul, berprestasi akademik dan non-akademik, serta siap bersaing di kancah global.
                </p>
                <div class="smast-social-links" aria-label="Media Sosial SMA Negeri 1 Kota Kediri">
                    <a href="<?php echo esc_url( get_theme_mod( 'smast_instagram_url', 'https://www.instagram.com/smast_kediri_official/' ) ); ?>" target="_blank" rel="noopener noreferrer" class="smast-social-btn" aria-label="Instagram SMAST"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'smast_youtube_url', 'https://www.youtube.com/@smast_kediri_official' ) ); ?>" target="_blank" rel="noopener noreferrer" class="smast-social-btn" aria-label="YouTube SMAST"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Col 2: Navigasi -->
            <div class="smast-footer-col">
                <h4 class="footer-col-title">Navigasi</h4>
                <ul class="smast-footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/profil' ) ); ?>"><i class="fas fa-chevron-right"></i> Profil Sekolah</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/kurikulum' ) ); ?>"><i class="fas fa-chevron-right"></i> Kurikulum &amp; Akademik</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/sejarah' ) ); ?>"><i class="fas fa-chevron-right"></i> Sejarah Sekolah</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/fasilitas' ) ); ?>"><i class="fas fa-chevron-right"></i> Fasilitas</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#ekskul' ) ); ?>"><i class="fas fa-chevron-right"></i> Ekstrakurikuler</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/berita' ) ); ?>"><i class="fas fa-chevron-right"></i> Berita &amp; Artikel</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/pengumuman' ) ); ?>"><i class="fas fa-chevron-right"></i> Pengumuman Resmi</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/galeri' ) ); ?>"><i class="fas fa-chevron-right"></i> Galeri Foto</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/kontak' ) ); ?>"><i class="fas fa-chevron-right"></i> Kontak Kami</a></li>
                </ul>
            </div>

            <!-- Col 3: Layanan & Info -->
            <div class="smast-footer-col">
                <h4 class="footer-col-title">Layanan &amp; Info</h4>
                <ul class="smast-footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/profil' ) ); ?>"><i class="fas fa-chevron-right"></i> Profil Sekolah</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/profil#visi-misi' ) ); ?>"><i class="fas fa-chevron-right"></i> Visi &amp; Misi (MUSTIKA)</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/profil#data-sekolah' ) ); ?>"><i class="fas fa-chevron-right"></i> Data Pokok Sekolah</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/sejarah' ) ); ?>"><i class="fas fa-chevron-right"></i> Sejarah Sekolah</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/profil#struktur' ) ); ?>"><i class="fas fa-chevron-right"></i> Struktur Organisasi</a></li>
                    <li><a href="https://wa.me/<?php echo esc_attr( get_theme_mod( 'smast_wa_number', '6281234567890' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right"></i> Layanan Informasi WA</a></li>
                </ul>
            </div>

            <!-- Col 4: Hubungi Kami -->
            <div class="smast-footer-col">
                <h4 class="footer-col-title">Hubungi Kami</h4>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <div>
                        <strong>Alamat Sekolah:</strong>
                        <p><?php echo esc_html( get_theme_mod( 'smast_address', 'Jalan Veteran No. 1, Kelurahan Bandar Lor, Kecamatan Mojoroto, Kota Kediri, Jawa Timur 64114' ) ); ?></p>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone-alt" aria-hidden="true"></i>
                    <div>
                        <strong>Telepon / HP:</strong>
                        <p><?php echo esc_html( get_theme_mod( 'smast_phone', '+62 354 771829' ) ); ?></p>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    <div>
                        <strong>Email Resmi:</strong>
                        <p><?php echo esc_html( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?></p>
                    </div>
                </div>

                <!-- Google Maps Embed Akurat SMAN 1 Kediri (Jl. Veteran No. 1) -->
                <div class="smast-footer-map-wrap">
                    <iframe
                        src="https://maps.google.com/maps?q=SMA+Negeri+1+Kediri,+Jl.+Veteran+No.1,+Bandar+Lor,+Kec.+Mojoroto,+Kota+Kediri,+Jawa+Timur+64114&t=&z=17&ie=UTF8&iwloc=&output=embed"
                        width="100%"
                        height="130"
                        style="border:0; display:block; border-radius: 8px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi Resmi SMAN 1 Kota Kediri">
                    </iframe>
                </div>
            </div>

        </div>

        <div class="smast-footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <strong>SMA Negeri 1 Kota Kediri (SMAST)</strong>. Hak Cipta Dilindungi Undang-Undang.</p>
            <p class="footer-credit">Unggul dalam Prestasi, Berakhlak Mulia</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
