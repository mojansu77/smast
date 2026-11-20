<?php
/**
 * Single Template — Detail Galeri Foto & Video Dokumentasi SMA Negeri 1 Kota Kediri (SMAST)
 *
 * Menampilkan dokumentasi foto/video dengan tampilan resolusi tinggi,
 * modal lightbox interaktif, informasi kategori, takarir (caption), dan arsip terkait.
 *
 * @package SMAST
 * @version 2.5.0
 */

get_header();

$post_id    = get_the_ID();
$media_type = get_post_meta( $post_id, '_galeri_media_type', true ) ?: 'foto';
$video_url  = get_post_meta( $post_id, '_galeri_video_url', true );
$caption    = get_post_meta( $post_id, '_galeri_caption', true );
$yt_id      = function_exists( 'smast_get_yt_id' ) ? smast_get_yt_id( $video_url ) : '';
$is_video   = ( 'video' === $media_type || ! empty( $yt_id ) );

// Ambil URL gambar menggunakan helper universal
$img_url    = function_exists( 'smast_get_galeri_image' )
    ? smast_get_galeri_image( $post_id, 'full' )
    : ( get_the_post_thumbnail_url( $post_id, 'full' ) ?: get_template_directory_uri() . '/assets/images/Sekolah.jpg' );

// Taksonomi Kategori Galeri
$terms     = get_the_terms( $post_id, 'kategori_galeri' );
$cat_name  = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Dokumentasi Sekolah';
$cat_slug  = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->slug : '';

$current_url   = get_permalink();
$wa_share_text = rawurlencode( get_the_title() . ' - Galeri SMAN 1 Kota Kediri: ' . $current_url );
?>

<!-- ══════════════════════════════════════════════════════════════════════════
     HERO BANNER: DETAIL GALERI FOTO & VIDEO
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-page-hero smast-single-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">

            <!-- Breadcrumb Spesifik Galeri -->
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home" style="margin-right: 4px;"></i> Beranda</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <a href="<?php echo esc_url( home_url( '/galeri' ) ); ?>">Galeri</a>
                <?php if ( ! empty( $cat_slug ) ) : ?>
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    <a href="<?php echo esc_url( home_url( '/galeri?kategori=' . $cat_slug . '#galeri-content' ) ); ?>"><?php echo esc_html( $cat_name ); ?></a>
                <?php endif; ?>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <span class="current">Detail Dokumentasi</span>
            </div>

            <!-- Eyebrow Badge -->
            <div style="margin-bottom: 14px;">
                <span class="smast-section-eyebrow" style="background: rgba(217, 119, 6, 0.22); color: #F59E0B; border: 1px solid rgba(245, 158, 11, 0.4); display: inline-flex; align-items: center; gap: 8px;">
                    <i class="<?php echo $is_video ? 'fab fa-youtube' : 'fas fa-camera-retro'; ?>" style="font-size: 0.95rem; <?php echo $is_video ? 'color: #EF4444;' : ''; ?>"></i>
                    <span><?php echo $is_video ? 'DOKUMENTASI VIDEO RESMI' : 'DOKUMENTASI FOTO RESMI'; ?></span>
                </span>
            </div>

            <!-- Judul Galeri -->
            <h1 class="smast-single-title" style="color: #FFFFFF; font-size: clamp(1.6rem, 3.2vw, 2.4rem); font-weight: 800; line-height: 1.35; margin-bottom: 18px;">
                <?php the_title(); ?>
            </h1>

            <!-- Meta Strip -->
            <div class="smast-single-meta" style="color: rgba(255, 255, 255, 0.88);">
                <span><i class="fas fa-calendar-alt" style="color: var(--smast-gold);"></i> <?php echo get_the_date( 'd F Y' ); ?></span>
                <span><i class="fas fa-tag" style="color: var(--smast-gold);"></i> <?php echo esc_html( $cat_name ); ?></span>
                <span><i class="fas fa-shield-alt" style="color: var(--smast-gold);"></i> Arsip Resmi SMAN 1 Kediri</span>
            </div>

        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION MEDIA DISPLAY & DETAIL KETERANGAN
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section" style="padding-top: 48px; padding-bottom: 72px;">
    <div class="smast-container">

        <article class="smast-galeri-single-card" style="background: #FFFFFF; border-radius: 16px; border: 1px solid #E2E8F0; box-shadow: 0 10px 32px rgba(0, 40, 85, 0.08); overflow: hidden;">

            <!-- MEDIA CONTAINER -->
            <?php if ( $is_video && ! empty( $yt_id ) ) : ?>
                <!-- Embed YouTube Video -->
                <div class="smast-galeri-video-embed" style="position: relative; width: 100%; aspect-ratio: 16/9; background: #000000;">
                    <iframe
                        src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr( $yt_id ); ?>?autoplay=0&rel=0&modestbranding=1"
                        style="position: absolute; inset: 0; width: 100%; height: 100%; border: 0;"
                        title="<?php echo esc_attr( get_the_title() ); ?>"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
            <?php else : ?>
                <!-- Foto HD Container -->
                <div class="smast-galeri-photo-stage" style="background: #0B192C; padding: 20px; text-align: center; position: relative;">
                    <div style="max-width: 1000px; margin: 0 auto; position: relative;">
                        <img
                            src="<?php echo esc_url( $img_url ); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            id="single-galeri-image"
                            style="max-width: 100%; max-height: 78vh; height: auto; border-radius: 12px; display: inline-block; vertical-align: middle; box-shadow: 0 12px 36px rgba(0, 0, 0, 0.5); object-fit: contain;">
                    </div>

                    <!-- Toolbar Tombol Aksi di Bawah Foto -->
                    <div style="display: flex; justify-content: center; gap: 12px; margin-top: 16px; flex-wrap: wrap;">
                        <button
                            type="button"
                            class="smast-btn smast-btn-gold smast-btn-sm"
                            onclick="openLightbox('<?php echo esc_url( $img_url ); ?>', '<?php echo esc_attr( get_the_title() ); ?>')"
                            title="Buka Pratinjau Layar Penuh">
                            <i class="fas fa-expand-alt" aria-hidden="true"></i> <span>Perbesar Foto (HD)</span>
                        </button>
                        <a
                            href="<?php echo esc_url( $img_url ); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            download
                            class="smast-btn smast-btn-outline smast-btn-sm"
                            style="color: #FFFFFF; border-color: rgba(255, 255, 255, 0.45);"
                            title="Unduh Berkas Foto Asli">
                            <i class="fas fa-download" aria-hidden="true"></i> <span>Unduh Foto</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>


            <!-- INFORMASI & ARTIKEL KONTEN -->
            <div style="padding: 34px 38px;">

                <!-- Keterangan / Caption Highlight (Jika Ada) -->
                <?php if ( ! empty( $caption ) ) : ?>
                    <div class="smast-galeri-caption-highlight" style="background: #F8FAFC; border-left: 4px solid var(--smast-gold); padding: 16px 20px; border-radius: 8px; margin-bottom: 24px;">
                        <p style="margin: 0; font-size: 1.05rem; font-weight: 600; color: #0F172A; line-height: 1.6;">
                            <i class="fas fa-quote-left" style="color: var(--smast-gold); margin-right: 8px;"></i>
                            <?php echo esc_html( $caption ); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- Teks Tambahan dari Editor (Menyaring tag img duplikat jika foto utama sudah tampil) -->
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    $raw_content = get_the_content();
                    // Bersihkan tag <img> dari teks agar tidak terjadi pengulangan foto yang sama
                    $text_only_content = preg_replace( '/<p>\s*<img[^>]+>\s*<\/p>/i', '', $raw_content );
                    $text_only_content = preg_replace( '/<img[^>]+>/i', '', $text_only_content );
                    $clean_text_check  = trim( strip_tags( $text_only_content ) );

                    if ( ! empty( $clean_text_check ) ) :
                    ?>
                        <div class="smast-article-content" style="font-size: 1.02rem; line-height: 1.85; color: #334155; margin-bottom: 28px;">
                            <?php echo wp_kses_post( wpautop( $text_only_content ) ); ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>

                <hr style="border: 0; border-top: 1px solid #E2E8F0; margin: 30px 0;">

                <!-- BOTTOM BAR: KEMBALI KE GALERI & BAGIKAN -->
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                    <a href="<?php echo esc_url( home_url( '/galeri' ) ); ?>" class="smast-btn smast-btn-navy">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i> <span>Kembali ke Semua Galeri</span>
                    </a>

                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 0.92rem; font-weight: 700; color: #64748B;">
                            <i class="fas fa-share-nodes" aria-hidden="true"></i> Bagikan:
                        </span>
                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text=<?php echo $wa_share_text; ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; border-radius: 50%; background: #25D366; color: #FFFFFF; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; font-size: 1.1rem;" title="Bagikan ke WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( $current_url ); ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; border-radius: 50%; background: #1877F2; color: #FFFFFF; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; font-size: 1rem;" title="Bagikan ke Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!-- Salin Tautan -->
                        <button type="button" onclick="navigator.clipboard.writeText('<?php echo esc_url( $current_url ); ?>'); alert('Tautan dokumentasi berhasil disalin ke papan klip!');" style="width: 38px; height: 38px; border-radius: 50%; background: #003366; color: #FFFFFF; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; font-size: 0.95rem;" title="Salin Tautan">
                            <i class="fas fa-link"></i>
                        </button>
                    </div>
                </div>

            </div>

        </article>

    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION DOKUMENTASI TERKAIT LAINNYA
     ══════════════════════════════════════════════════════════════════════════ -->
<?php
$related_args = array(
    'post_type'      => 'galeri',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'post__not_in'   => array( $post_id ),
    'orderby'        => 'date',
    'order'          => 'DESC',
);

if ( ! empty( $cat_slug ) ) {
    $related_args['tax_query'] = array(
        array(
            'taxonomy' => 'kategori_galeri',
            'field'    => 'slug',
            'terms'    => $cat_slug,
        ),
    );
}

$related_query = new WP_Query( $related_args );

if ( $related_query->have_posts() ) :
?>
<section class="smast-section" style="padding-top: 0; padding-bottom: 80px;">
    <div class="smast-container">

        <div class="smast-section-header" style="margin-bottom: 28px;">
            <span class="smast-section-eyebrow"><i class="fas fa-images"></i> Arsip Dokumentasi</span>
            <h3 class="smast-section-title" style="font-size: 1.6rem;">Dokumentasi <span>Lainnya</span></h3>
            <p class="smast-section-desc">Telusuri rekaman visual kegiatan dan prestasi SMA Negeri 1 Kota Kediri lainnya.</p>
        </div>

        <div class="gallery-grid">
            <?php
            while ( $related_query->have_posts() ) :
                $related_query->the_post();
                $rel_id    = get_the_ID();
                $rel_img   = function_exists( 'smast_get_galeri_image' )
                    ? smast_get_galeri_image( $rel_id, 'large' )
                    : ( get_the_post_thumbnail_url( $rel_id, 'large' ) ?: get_template_directory_uri() . '/assets/images/Sekolah.jpg' );
                $rel_terms = get_the_terms( $rel_id, 'kategori_galeri' );
                $rel_cat   = ( ! empty( $rel_terms ) && ! is_wp_error( $rel_terms ) ) ? $rel_terms[0]->name : 'Dokumentasi';
            ?>
                <a href="<?php the_permalink(); ?>" class="smast-galeri-item smast-reveal" aria-label="<?php the_title_attribute(); ?>">
                    <img src="<?php echo esc_url( $rel_img ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    <div class="smast-galeri-overlay">
                        <span class="badge"><i class="fas fa-camera"></i> <?php echo esc_html( $rel_cat ); ?></span>
                        <h4><?php the_title(); ?></h4>
                        <span class="galeri-meta-sub">Dokumentasi SMA Negeri 1 Kota Kediri</span>
                    </div>
                </a>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

    </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════════════════════
     MODAL LIGHTBOX UNTUK PRATINJAU FULL-SCREEN
     ══════════════════════════════════════════════════════════════════════════ -->
<div id="lightbox-modal" onclick="if(event.target===this)closeLightbox()" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.94); z-index:99999; align-items:center; justify-content:center; flex-direction:column; padding:20px;">
    <button onclick="closeLightbox()" style="position:absolute; top:20px; right:28px; background:none; border:none; color:#fff; font-size:2rem; cursor:pointer; line-height:1;" title="Tutup">
        <i class="fas fa-times"></i>
    </button>
    <img id="lightbox-img" src="" alt="" style="max-width:92vw; max-height:82vh; border-radius:8px; object-fit:contain; box-shadow:0 20px 60px rgba(0,0,0,0.85);">
    <p id="lightbox-title" style="color:#fff; margin-top:16px; font-size:1.05rem; font-weight:600; text-align:center; max-width:700px; line-height:1.5;"></p>
</div>

<script>
function openLightbox(src, title) {
    var modal = document.getElementById('lightbox-modal');
    if (!modal) return;
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-title').textContent = title || '';
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    var modal = document.getElementById('lightbox-modal');
    if (!modal) return;
    modal.style.display = 'none';
    document.getElementById('lightbox-img').src = '';
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});
</script>

<?php get_footer(); ?>

