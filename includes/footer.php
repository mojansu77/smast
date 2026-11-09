<?php
// includes/footer.php — Footer SMAST (SMA Negeri 1 Kota Kediri)
?>

<!-- ══ SMAST FOOTER ══════════════════════════════════════════════════════════ -->
<footer class="smast-footer" role="contentinfo" aria-label="Footer SMA Negeri 1 Kota Kediri">
    <div class="smast-container">
        <div class="smast-footer-grid">

            <!-- Col 1: Tentang Kami -->
            <div>
                <h4>Tentang Kami</h4>
                <div class="smast-footer-brand">
                    <?php if (file_exists('assets/images/Logo SMAST.png')): ?>
                        <img src="assets/images/Logo SMAST.png" alt="Logo SMA Negeri 1 Kota Kediri" style="height:46px; width:auto; border-radius:8px;">
                    <?php else: ?>
                        <div class="brand-logo">S1</div>
                    <?php endif; ?>
                    <div>
                        <div class="brand-name">SMA Negeri 1 Kota Kediri</div>
                        <div class="brand-sub">Unggul dalam Prestasi, Berakhlak Mulia</div>
                    </div>
                </div>
                <p class="smast-footer-desc">
                    SMA Negeri 1 Kota Kediri (SMAST) adalah sekolah menengah atas negeri unggulan terakreditasi <strong style="color:var(--smast-gold);">A</strong> yang berkomitmen
                    mencetak generasi intelektual, berkarakter unggul, dan berdaya saing global.
                </p>
                <div class="smast-footer-social" aria-label="Media Sosial SMA Negeri 1 Kota Kediri">
                    <a href="https://www.instagram.com/smast_kediri_official/" aria-label="Instagram SMA Negeri 1 Kota Kediri" target="_blank" rel="noopener noreferrer" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/smastkediriofficial/" aria-label="Facebook SMA Negeri 1 Kota Kediri" target="_blank" rel="noopener noreferrer" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.facebook.com/smastkediriofficial/" aria-label="Twitter / X SMA Negeri 1 Kota Kediri" target="_blank" rel="noopener noreferrer" title="Twitter / X">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="https://www.youtube.com/@smast_kediri_official" aria-label="YouTube SMA Negeri 1 Kota Kediri" target="_blank" rel="noopener noreferrer" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://wa.me/6281234567890" aria-label="WhatsApp SMA Negeri 1 Kota Kediri" target="_blank" rel="noopener noreferrer" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Navigasi -->
            <div>
                <h4>Navigasi</h4>
                <ul class="smast-footer-links">
                    <li><a href="index.php?page=beranda"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                    <li><a href="index.php?page=profil"><i class="fas fa-chevron-right"></i> Profil Sekolah</a></li>
                    <li><a href="index.php?page=fasilitas"><i class="fas fa-chevron-right"></i> Fasilitas</a></li>
                    <li><a href="index.php?page=artikel"><i class="fas fa-chevron-right"></i> Berita &amp; Artikel</a></li>
                    <li><a href="index.php?page=galeri"><i class="fas fa-chevron-right"></i> Galeri Foto</a></li>
                    <li><a href="index.php?page=kontak"><i class="fas fa-chevron-right"></i> Kontak Kami</a></li>
                </ul>
            </div>

            <!-- Col 3: Layanan & Info -->
            <div>
                <h4>Layanan &amp; Info</h4>
                <ul class="smast-footer-links">
                    <li><a href="index.php?page=profil"><i class="fas fa-chevron-right"></i> Profil Sekolah</a></li>
                    <li><a href="index.php?page=profil#visi-misi"><i class="fas fa-chevron-right"></i> Visi &amp; Misi (MUSTIKA)</a></li>
                    <li><a href="index.php?page=profil#data-sekolah"><i class="fas fa-chevron-right"></i> Data Pokok Sekolah</a></li>
                    <li><a href="index.php?page=profil#struktur"><i class="fas fa-chevron-right"></i> Struktur Organisasi</a></li>
                    <li><a href="index.php?page=sejarah"><i class="fas fa-chevron-right"></i> Sejarah Sekolah</a></li>
                    <li><a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"><i class="fas fa-chevron-right"></i> Konsultasi WhatsApp</a></li>
                </ul>
            </div>

            <!-- Col 4: Hubungi Kami -->
            <div class="smast-footer-contact">
                <h4>Hubungi Kami</h4>
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    Jalan Veteran No. 1, Kelurahan Bandar Lor, Kecamatan Mojoroto, Kota Kediri, Jawa Timur 64114
                </p>
                <p>
                    <i class="fas fa-phone"></i>
                    <a href="tel:+62354771829">+62 354 771829</a>
                </p>
                <p>
                    <i class="fab fa-whatsapp"></i>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer">+62 812-3456-7890</a>
                </p>
                <p>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:redaksi@smastkediri.sch.id">redaksi@smastkediri.sch.id</a>
                </p>

                <!-- Embedded Google Maps Akurat SMAN 1 Kediri (Jl. Veteran No. 1) -->
                <div class="smast-footer-map">
                    <iframe
                        src="https://maps.google.com/maps?q=SMA+Negeri+1+Kediri,+Jl.+Veteran+No.1,+Bandar+Lor,+Kec.+Mojoroto,+Kota+Kediri,+Jawa+Timur+64114&t=&z=17&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="150" style="border:0; border-radius: 8px;"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi Resmi SMA Negeri 1 Kota Kediri">
                    </iframe>
                </div>
            </div>

        </div><!-- /.smast-footer-grid -->

        <!-- Bottom Bar -->
        <div class="smast-footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <strong>SMA Negeri 1 Kota Kediri</strong>. Hak Cipta Dilindungi Undang-Undang.</p>
            <span>Dibuat dengan <span style="color:#e74c3c;">&#10084;</span> untuk SMA Negeri 1 Kota Kediri</span>
        </div>

    </div>
</footer>
<!-- / SMAST FOOTER -->

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Tampilan gambar besar">
    <button id="lightbox-close" class="lightbox-close" aria-label="Tutup">
        <i class="fas fa-times"></i>
    </button>
    <img id="lightbox-img" class="lightbox-content" src="" alt="Zoom Image">
    <div id="lightbox-caption" class="lightbox-caption"></div>
</div>

<!-- Main JS -->
<script src="assets/js/main.js?v=<?php echo file_exists('assets/js/main.js') ? filemtime('assets/js/main.js') : '1'; ?>"></script>
</body>
</html>
