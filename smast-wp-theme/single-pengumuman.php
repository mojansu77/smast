<?php
/**
 * Single Template — Detail Pengumuman Resmi SMAN 1 Kediri
 *
 * Menampilkan dokumen edaran resmi dengan format kop surat kedinasan,
 * detail masa berlaku, tombol unduh berkas lampiran PDF, dan navigasi.
 *
 * @package SMAST
 * @version 2.2.0
 */

get_header();

$no_surat    = get_post_meta( get_the_ID(), '_pengumuman_no_surat', true );
$tgl_berlaku = get_post_meta( get_the_ID(), '_pengumuman_tgl_berlaku', true );
$file_url    = get_post_meta( get_the_ID(), '_pengumuman_file_url', true );
$is_urgent   = get_post_meta( get_the_ID(), '_pengumuman_is_urgent', true );

$current_url = get_permalink();
$wa_share_text = rawurlencode( 'Pengumuman Resmi SMAN 1 Kediri: ' . get_the_title() . ' - ' . $current_url );
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <a href="<?php echo esc_url( home_url( '/pengumuman' ) ); ?>">Pengumuman</a>
                <i class="fas fa-chevron-right"></i>
                <span class="current">Surat Edaran</span>
            </div>
            <h1>Surat Pengumuman <span>Resmi</span></h1>
            <p>Dokumen rincian pengumuman dan surat edaran kedinasan SMA Negeri 1 Kota Kediri.</p>
        </div>
    </div>
</section>

<!-- Official Document Section -->
<section class="smast-section" style="padding-top: 40px; padding-bottom: 70px;">
    <div class="smast-container">

        <article class="smast-official-doc-card">

            <!-- Kop Surat Resmi SMA Negeri 1 Kota Kediri -->
            <header class="smast-doc-kop">
                <div class="smast-doc-kop-logo">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-smast.png' ); ?>" alt="Logo SMAN 1 Kediri">
                </div>
                <div class="smast-doc-kop-text">
                    <h4>Pemerintah Provinsi Jawa Timur &bull; Dinas Pendidikan</h4>
                    <h2>SMA NEGERI 1 KOTA KEDIRI</h2>
                    <p>Jl. Veteran No. 1 Kelurahan Bandar Lor, Kec. Mojoroto, Kota Kediri, Jawa Timur 64114</p>
                    <p>Telepon: +62 354 771829 &bull; Email: redaksi@smastkediri.sch.id &bull; Laman: smastkediri.sch.id</p>
                </div>
            </header>

            <!-- Metadata Dokumen Pengumuman -->
            <table class="smast-doc-meta-table">
                <tbody>
                    <tr>
                        <td class="doc-label"><i class="fas fa-hashtag"></i> Nomor Surat / Dokumen</td>
                        <td>: <strong><?php echo ! empty( $no_surat ) ? esc_html( $no_surat ) : '421.3 / SMAST / ' . get_the_date( 'Y' ); ?></strong></td>
                    </tr>
                    <tr>
                        <td class="doc-label"><i class="fas fa-calendar-check"></i> Tanggal Diterbitkan</td>
                        <td>: <?php echo get_the_date( 'd F Y' ); ?></td>
                    </tr>
                    <?php if ( ! empty( $tgl_berlaku ) ) : ?>
                    <tr>
                        <td class="doc-label"><i class="fas fa-clock"></i> Masa Berlaku</td>
                        <td>: <strong style="color: #004884;"><?php echo esc_html( $tgl_berlaku ); ?></strong></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="doc-label"><i class="fas fa-tags"></i> Sifat / Prioritas</td>
                        <td>: 
                            <?php if ( '1' === $is_urgent ) : ?>
                                <span class="smast-pengumuman-badge badge-urgent"><i class="fas fa-exclamation-triangle"></i> Penting / Segera Dilaksanakan</span>
                            <?php else : ?>
                                <span class="smast-pengumuman-badge badge-normal"><i class="fas fa-info-circle"></i> Pemberitahuan / Edaran Umum</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="doc-label"><i class="fas fa-heading"></i> Perihal</td>
                        <td>: <strong style="font-size: 1.05rem;"><?php the_title(); ?></strong></td>
                    </tr>
                </tbody>
            </table>

            <!-- Isi Dokumen Surat Pengumuman -->
            <div class="smast-doc-body">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>

            <!-- Banner Unduhan Berkas PDF Resmi (Jika Tersedia) -->
            <?php if ( ! empty( $file_url ) ) : ?>
                <div class="smast-doc-download-banner">
                    <div class="smast-doc-download-info">
                        <div class="smast-doc-download-icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="smast-doc-download-text">
                            <h4>Berkas Lampiran Resmi Surat Edaran</h4>
                            <p>Unduh salinan asli bertanda tangan dan berkop resmi format .PDF</p>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( $file_url ); ?>" target="_blank" rel="noopener noreferrer" class="smast-btn-pengumuman smast-btn-pengumuman-pdf" style="padding: 12px 24px; font-size: 0.95rem;">
                        <i class="fas fa-download"></i> <span>Unduh Surat Resmi (PDF)</span>
                    </a>
                </div>
            <?php endif; ?>

            <!-- Footer & Bagikan Surat -->
            <footer style="display: flex; justify-content: space-between; align-items: center; gap: 16px; padding-top: 24px; border-top: 1px solid var(--smast-border); flex-wrap: wrap;">
                <a href="<?php echo esc_url( home_url( '/pengumuman/' ) ); ?>" class="smast-btn-pengumuman smast-btn-pengumuman-primary">
                    <i class="fas fa-arrow-left"></i> <span>Kembali ke Papan Pengumuman</span>
                </a>

                <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                    <span style="font-size: 0.88rem; font-weight: 600; color: #64748B;">Bagikan:</span>
                    <a href="https://api.whatsapp.com/send?text=<?php echo $wa_share_text; ?>" target="_blank" rel="noopener noreferrer" class="smast-btn-pengumuman" style="background: #25D366; color: #FFF !important;">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan pengumuman berhasil disalin!');" class="smast-btn-pengumuman" style="background: #F1F5F9; color: #334155; border: 1px solid #CBD5E1; cursor: pointer;">
                        <i class="fas fa-link"></i> Salin Tautan
                    </button>
                </div>
            </footer>

        </article>

    </div>
</section>

<?php
get_footer();

