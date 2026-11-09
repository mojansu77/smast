<?php
/**
 * Template Name: Kontak Sekolah — SMAN 1 Kediri
 *
 * @package SMAST
 * @version 2.0.0
 */

get_header();

$message_sent  = false;
$message_error = false;

// Handle Contact Form Submission if submitted
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['submit_kontak'] ) ) {
    $nama    = isset( $_POST['nama'] ) ? sanitize_text_field( $_POST['nama'] ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $subjek  = isset( $_POST['subjek'] ) ? sanitize_text_field( $_POST['subjek'] ) : '';
    $pesan   = isset( $_POST['pesan'] ) ? sanitize_textarea_field( $_POST['pesan'] ) : '';

    if ( ! empty( $nama ) && ! empty( $email ) && ! empty( $subjek ) && ! empty( $pesan ) && is_email( $email ) ) {
        // Send email to admin or log
        $to      = get_option( 'admin_email' );
        $headers = array( 'Content-Type: text/html; charset=UTF-8', 'From: ' . $nama . ' <' . $email . '>' );
        $body    = "<h3>Pesan Baru dari Website SMAN 1 Kediri</h3>";
        $body   .= "<p><strong>Nama:</strong> {$nama}</p>";
        $body   .= "<p><strong>Email:</strong> {$email}</p>";
        $body   .= "<p><strong>Subjek:</strong> {$subjek}</p>";
        $body   .= "<p><strong>Pesan:</strong><br>" . nl2br( $pesan ) . "</p>";

        wp_mail( $to, "[Website SMAST] " . $subjek, $body, $headers );
        $message_sent = true;
    } else {
        $message_error = true;
    }
}

$address = get_theme_mod( 'smast_address', 'Jalan Veteran No. 1, Kelurahan Bandar Lor, Kecamatan Mojoroto, Kota Kediri, Jawa Timur 64114' );
$phone   = get_theme_mod( 'smast_phone', '+62 354 771829' );
$wa      = get_theme_mod( 'smast_wa_number', '6281234567890' );
$email   = get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' );
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <span>Hubungi Kami</span>
            </div>
            <h1>Hubungi <span>Kami</span></h1>
            <p>Punya pertanyaan seputar layanan kesiswaan, akademik, administrasi sekolah, atau informasi alumni? Tim SMA Negeri 1 Kota Kediri siap melayani Anda.</p>
        </div>
    </div>
</section>

<!-- Info Kontak Cards -->
<section class="smast-section" style="padding-top: 60px; padding-bottom: 40px;">
    <div class="smast-container">

        <div class="smast-info-grid">

            <!-- Alamat -->
            <div class="smast-info-card">
                <div style="width: 56px; height: 56px; background: var(--smast-navy); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <i class="fas fa-map-marker-alt" style="color: var(--smast-gold); font-size: 1.3rem;"></i>
                </div>
                <h4 style="font-size: 1rem; margin-bottom: 8px; color: var(--smast-navy);">Alamat Sekolah</h4>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.6; margin: 0;">
                    <?php echo esc_html( $address ); ?>
                </p>
            </div>

            <!-- Telepon & WA -->
            <div class="smast-info-card">
                <div style="width: 56px; height: 56px; background: var(--smast-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <i class="fas fa-phone-alt" style="color: var(--smast-navy); font-size: 1.3rem;"></i>
                </div>
                <h4 style="font-size: 1rem; margin-bottom: 8px; color: var(--smast-navy);">Telepon Resmi</h4>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.6; margin: 0;">
                    <?php echo esc_html( $phone ); ?>
                </p>
                <a href="https://wa.me/<?php echo esc_attr( $wa ); ?>" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 6px; margin-top: 10px; padding: 7px 16px; background: #25D366; color: #fff; border-radius: 20px; font-size: 0.82rem; text-decoration: none; font-weight: 600;">
                    <i class="fab fa-whatsapp"></i> Chat WhatsApp
                </a>
            </div>

            <!-- Email -->
            <div class="smast-info-card">
                <div style="width: 56px; height: 56px; background: #2563eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <i class="fas fa-envelope" style="color: #fff; font-size: 1.3rem;"></i>
                </div>
                <h4 style="font-size: 1rem; margin-bottom: 8px; color: var(--smast-navy);">Email Resmi</h4>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.6; margin: 0;">
                    <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: #2563eb; text-decoration: none;"><?php echo esc_html( $email ); ?></a>
                </p>
            </div>

            <!-- Jam Layanan -->
            <div class="smast-info-card">
                <div style="width: 56px; height: 56px; background: #6366f1; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    <i class="fas fa-clock" style="color: #fff; font-size: 1.3rem;"></i>
                </div>
                <h4 style="font-size: 1rem; margin-bottom: 8px; color: var(--smast-navy);">Jam Layanan TU</h4>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.6; margin: 0;">
                    Senin &ndash; Jumat<br>07.00 &ndash; 15.30 WIB
                </p>
            </div>

        </div>

        <!-- Form + Info Wrapper -->
        <div class="kontak-wrapper">

            <!-- Formulir Kirim Pesan -->
            <div class="kontak-form-wrapper">
                <h3 style="margin-bottom: 8px; font-weight: 700; color: var(--smast-navy);">Kirim Pesan ke Sekolah</h3>
                <p style="margin-bottom: 24px; font-size: 0.85rem; color: var(--smast-text-muted);">
                    Silakan isi formulir di bawah ini. Kami akan membalas pesan Anda melalui email atau WhatsApp.
                </p>

                <?php if ( $message_sent ) : ?>
                    <div style="padding: 14px 18px; border-radius: 8px; background: #d1fae5; color: #065f46; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-check-circle"></i>
                        <span>Pesan Anda berhasil dikirim! Terima kasih telah menghubungi SMAN 1 Kediri.</span>
                    </div>
                <?php elseif ( $message_error ) : ?>
                    <div style="padding: 14px 18px; border-radius: 8px; background: #fee2e2; color: #991b1b; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Terjadi kesalahan. Pastikan seluruh kolom telah diisi dengan format email yang valid.</span>
                    </div>
                <?php endif; ?>

                <form action="<?php echo esc_url( get_permalink() ); ?>" method="POST" id="contact-form">
                    <div style="margin-bottom: 18px;">
                        <label for="nama" style="display: block; font-size: 0.88rem; font-weight: 600; margin-bottom: 6px;">Nama Lengkap <span style="color: red;">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control" style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--smast-border); border-radius: 8px; font-size: 0.9rem;" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label for="email" style="display: block; font-size: 0.88rem; font-weight: 600; margin-bottom: 6px;">Alamat Email <span style="color: red;">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--smast-border); border-radius: 8px; font-size: 0.9rem;" placeholder="nama@email.com" required>
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label for="subjek" style="display: block; font-size: 0.88rem; font-weight: 600; margin-bottom: 6px;">Subjek Pesan <span style="color: red;">*</span></label>
                        <input type="text" name="subjek" id="subjek" class="form-control" style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--smast-border); border-radius: 8px; font-size: 0.9rem;" placeholder="Contoh: Informasi Akademik / Layanan Sekolah" required>
                    </div>

                    <div style="margin-bottom: 22px;">
                        <label for="pesan" style="display: block; font-size: 0.88rem; font-weight: 600; margin-bottom: 6px;">Isi Pesan <span style="color: red;">*</span></label>
                        <textarea name="pesan" id="pesan" rows="5" class="form-control" style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--smast-border); border-radius: 8px; font-size: 0.9rem;" placeholder="Tuliskan pertanyaan atau pesan Anda secara detail..." required></textarea>
                    </div>

                    <button type="submit" name="submit_kontak" class="smast-btn smast-btn-gold" style="width: 100%; justify-content: center; border-radius: 8px; font-size: 1rem;">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

            <!-- Panel Lokasi & Informasi -->
            <div class="kontak-info">
                <h3 style="margin-bottom: 12px; font-weight: 700; color: var(--smast-navy);">Lokasi SMA Negeri 1 Kota Kediri</h3>
                <p style="margin-bottom: 24px; font-size: 0.9rem; color: var(--smast-text-muted); line-height: 1.7;">
                    SMA Negeri 1 Kota Kediri berlokasi strategis di pusat kawasan pendidikan Mojoroto Kota Kediri, mudah diakses menggunakan transportasi umum maupun kendaraan pribadi.
                </p>

                <div style="display: flex; gap: 14px; margin-bottom: 20px;">
                    <div style="width: 44px; height: 44px; background: rgba(0,51,102,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-map-pin" style="color: var(--smast-navy);"></i>
                    </div>
                    <div>
                        <strong style="color: var(--smast-navy); font-size: 0.95rem;">Alamat Sekolah:</strong>
                        <p style="margin: 2px 0 0; font-size: 0.88rem; color: var(--smast-text-muted);"><?php echo esc_html( $address ); ?></p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; margin-bottom: 20px;">
                    <div style="width: 44px; height: 44px; background: rgba(255,184,0,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-phone" style="color: var(--smast-navy);"></i>
                    </div>
                    <div>
                        <strong style="color: var(--smast-navy); font-size: 0.95rem;">Telepon &amp; Fax:</strong>
                        <p style="margin: 2px 0 0; font-size: 0.88rem; color: var(--smast-text-muted);"><?php echo esc_html( $phone ); ?></p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; margin-bottom: 20px;">
                    <div style="width: 44px; height: 44px; background: rgba(37,211,102,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                    </div>
                    <div>
                        <strong style="color: var(--smast-navy); font-size: 0.95rem;">Hotline WhatsApp:</strong>
                        <p style="margin: 2px 0 0; font-size: 0.88rem; color: #25D366; font-weight: 600;">+<?php echo esc_html( $wa ); ?></p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; margin-bottom: 28px;">
                    <div style="width: 44px; height: 44px; background: rgba(37,99,235,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-envelope-open" style="color: #2563eb;"></i>
                    </div>
                    <div>
                        <strong style="color: var(--smast-navy); font-size: 0.95rem;">Surel Resmi:</strong>
                        <p style="margin: 2px 0 0; font-size: 0.88rem; color: var(--smast-text-muted);"><?php echo esc_html( $email ); ?></p>
                    </div>
                </div>

                <h4 style="font-size: 0.95rem; margin-bottom: 12px; color: var(--smast-navy);">Media Sosial Resmi</h4>
                <div style="display: flex; gap: 10px;">
                    <a href="<?php echo esc_url( get_theme_mod( 'smast_instagram_url', 'https://www.instagram.com/smast_kediri_official/' ) ); ?>" target="_blank" rel="noopener noreferrer" class="smast-social-btn" style="background:radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); color:#fff;" aria-label="Instagram Resmi" title="Instagram Resmi"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'smast_youtube_url', 'https://www.youtube.com/@smast_kediri_official' ) ); ?>" target="_blank" rel="noopener noreferrer" class="smast-social-btn" style="background:#ff0000; color:#fff;" aria-label="YouTube Resmi" title="YouTube Resmi"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

        </div>

        <!-- Google Maps Resmi SMAN 1 Kediri -->
        <div style="margin-top: 50px; background: #fff; border-radius: var(--smast-radius-lg); overflow: hidden; box-shadow: var(--smast-shadow-md); border: 1px solid var(--smast-border);">
            <div style="padding: 20px 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px; background: var(--smast-off-white); border-bottom: 1px solid var(--smast-border);">
                <div>
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin: 0 0 4px;">Peta Lokasi SMA Negeri 1 Kota Kediri</h3>
                    <p style="font-size: 0.88rem; color: var(--smast-text-muted); margin: 0;"><i class="fas fa-map-marker-alt" style="color: #EF4444;"></i> Jalan Veteran No. 1, Kelurahan Bandar Lor, Kec. Mojoroto, Kota Kediri (64114)</p>
                </div>
                <a href="https://maps.app.goo.gl/TK6gSQM4mW8XQf8E6" target="_blank" rel="noopener noreferrer" class="smast-btn smast-btn-gold">
                    <i class="fas fa-location-arrow"></i> Buka di Google Maps <i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i>
                </a>
            </div>
            <iframe
                src="https://maps.google.com/maps?q=SMA+Negeri+1+Kediri,+Jl.+Veteran+No.1,+Bandar+Lor,+Kec.+Mojoroto,+Kota+Kediri,+Jawa+Timur+64114&t=&z=17&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="450"
                style="border:0; display:block;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Peta Lokasi Resmi SMA Negeri 1 Kota Kediri">
            </iframe>
        </div>

    </div>
</section>

<?php
get_footer();
