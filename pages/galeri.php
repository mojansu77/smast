<?php
/**
 * Template Name: Galeri Sekolah — SMAN 1 Kediri
 * Description: Galeri Foto dan Video Dokumentasi SMA Negeri 1 Kota Kediri
 *
 * @package SMAST
 * @version 2.3.0
 */

get_header();

// Helper ekstrak YouTube ID
if ( ! function_exists( 'smast_get_yt_id' ) ) {
    function smast_get_yt_id( $url ) {
        if ( preg_match( '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $m ) ) {
            return $m[1];
        }
        return false;
    }
}

$kategori_map = array(
    'akademik'   => array( 'icon' => 'fa-graduation-cap', 'label' => 'Akademik' ),
    'kesiswaan'  => array( 'icon' => 'fa-users',          'label' => 'Kesiswaan' ),
    'prestasi'   => array( 'icon' => 'fa-trophy',         'label' => 'Prestasi' ),
    'fasilitas'  => array( 'icon' => 'fa-building',       'label' => 'Fasilitas' ),
    'kegiatan'   => array( 'icon' => 'fa-calendar-check', 'label' => 'Kegiatan' ),
);

$current_cat = isset( $_GET['kategori'] ) ? sanitize_key( $_GET['kategori'] ) : '';
$current_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'foto';
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <span>Galeri Sekolah</span>
            </div>
            <h1>Galeri Foto &amp; <span>Video Dokumentasi</span></h1>
            <p>Arsip dokumentasi visual dan rekaman video kegiatan akademik, kesiswaan, ekstrakurikuler, dan momentum prestasi SMA Negeri 1 Kota Kediri.</p>
        </div>
    </div>
</section>

<!-- Tab Navigasi Foto & Video -->
<section class="smast-galeri-tabs-bar">
    <div class="smast-container">
        <div class="smast-galeri-tabs-wrap">
            <a href="?tab=foto#galeri-content" class="smast-btn <?php echo $current_tab === 'foto' ? 'smast-btn-navy' : 'smast-btn-outline-navy'; ?>">
                <i class="fas fa-camera"></i> <span>Galeri Foto</span>
            </a>
            <a href="?tab=video#galeri-content" class="smast-btn <?php echo $current_tab === 'video' ? 'smast-btn-gold' : 'smast-btn-outline-navy'; ?>">
                <i class="fab fa-youtube"></i> <span>Galeri Video</span>
            </a>
        </div>
    </div>
</section>

<!-- Konten Galeri -->
<section class="smast-section" id="galeri-content" style="padding-top: 48px;">
    <div class="smast-container">

        <?php if ( $current_tab === 'video' ) : ?>
            <!-- ─── TAB VIDEO DOKUMENTASI ─── -->
            <div class="smast-section-header smast-reveal" style="text-align: center; margin-bottom: 40px;">
                <span class="smast-section-eyebrow"><i class="fab fa-youtube" style="color: #FF0000;"></i> Kanal Multimedia</span>
                <h2 class="smast-section-title">Dokumentasi <span>Video Sekolah</span></h2>
                <p class="smast-section-desc">Tayangan video profil, peringatan hari besar, gelar karya kesiswaan, dan liputan kejuaraan resmi dari YouTube Resmi SMAST.</p>
            </div>

<!-- Video Grid -->
            <?php
            // Query video CPT galeri dari WP Admin
            $cpt_video_args = array(
                'post_type'      => 'galeri',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
                'meta_query'     => array(
                    'relation' => 'OR',
                    array(
                        'key'     => '_galeri_media_type',
                        'value'   => 'video',
                        'compare' => '=',
                    ),
                    array(
                        'key'     => '_galeri_video_url',
                        'value'   => '',
                        'compare' => '!=',
                    ),
                ),
            );

            $video_query = new WP_Query( $cpt_video_args );
            $has_custom_videos = $video_query->have_posts();

            if ( $has_custom_videos ) :
            ?>
                <div class="smast-video-grid">
                    <?php
                    while ( $video_query->have_posts() ) :
                        $video_query->the_post();
                        $video_url = get_post_meta( get_the_ID(), '_galeri_video_url', true );
                        $yt_id     = smast_get_yt_id( $video_url );
                        $caption   = get_post_meta( get_the_ID(), '_galeri_caption', true ) ?: 'Dokumentasi Video SMAST';
                    ?>
                        <div class="smast-card smast-reveal" style="border-radius: var(--smast-radius-lg); overflow: hidden; box-shadow: var(--smast-shadow-sm); border: 1px solid var(--smast-border);">
                            <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000;">
                                <?php if ( $yt_id ) : ?>
                                    <iframe style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border:0;"
                                        src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr( $yt_id ); ?>"
                                        title="<?php the_title_attribute(); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                                <?php else : ?>
                                    <div style="position: absolute; inset:0; display:flex; align-items:center; justify-content:center; background:#0B1A30; color:#fff;">
                                        <i class="fab fa-youtube" style="font-size:3rem; color:#ff0000;"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div style="padding: 20px;">
                                <span style="font-size: 0.75rem; font-weight: 700; color: #DC2626; background: rgba(220, 38, 38, 0.12); padding: 3px 10px; border-radius: 20px; text-transform: uppercase;">Video Kegiatan</span>
                                <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--smast-navy); margin: 8px 0 6px;"><?php the_title(); ?></h3>
                                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.6; margin: 0;"><?php echo esc_html( $caption ); ?></p>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php else : ?>
                <!-- Clean empty state - No dummy cards -->
                <div class="smast-reveal smast-empty-galeri-box" style="margin-bottom: 40px;">
                    <div class="empty-icon-circle" style="color: #DC2626; background: rgba(220, 38, 38, 0.1);">
                        <i class="fab fa-youtube"></i>
                    </div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Dokumentasi Video Segera Hadir</h3>
                    <p style="font-size: 0.95rem; color: var(--smast-text-muted); line-height: 1.65; margin-bottom: 24px;">
                        Dokumentasi video kegiatan sekolah sedang dalam proses kurasi. Anda dapat menjelajahi video kegiatan langsung melalui kanal YouTube resmi SMA Negeri 1 Kota Kediri.
                    </p>
                    <a href="https://www.youtube.com/@smast_kediri_official" target="_blank" rel="noopener noreferrer" class="smast-btn smast-btn-gold">
                        <i class="fab fa-youtube"></i> Kunjungi YouTube @smast_kediri_official
                    </a>
                </div>
            <?php endif; ?>



            <!-- YouTube Channel Banner -->
            <div class="smast-reveal smast-youtube-promo-card">
                <i class="fab fa-youtube" style="font-size: 2.5rem; color: #FF0000; margin-bottom: 10px; display: inline-block;"></i>
                <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Kanal YouTube Resmi SMA Negeri 1 Kota Kediri</h3>
                <p style="font-size: 0.92rem; color: var(--smast-text-muted); margin-bottom: 20px;">Dapatkan video dokumentasi terbaru, siaran langsung upacara, dan seminar edukatif secara berkala.</p>
                <a href="https://www.youtube.com/@smast_kediri_official" target="_blank" rel="noopener noreferrer" class="smast-btn smast-btn-gold smast-btn-lg">
                    <i class="fab fa-youtube"></i> <span>Kanal YouTube @smast_kediri_official</span> <i class="fas fa-external-link-alt" style="font-size: 0.75rem;"></i>
                </a>
            </div>

        <?php else : ?>
            <!-- ─── TAB FOTO DOKUMENTASI ─── -->

            <!-- Kategori Filters -->
            <div class="gallery-filters">
                <a href="<?php echo esc_url( remove_query_arg( 'kategori' ) ); ?>#galeri-content" class="filter-btn <?php echo empty( $current_cat ) ? 'active' : ''; ?>">
                    <i class="fas fa-th"></i> Semua Kategori
                </a>
                <?php foreach ( $kategori_map as $slug => $kat ) : ?>
                    <a href="<?php echo esc_url( add_query_arg( 'kategori', $slug ) ); ?>#galeri-content" class="filter-btn <?php echo $current_cat === $slug ? 'active' : ''; ?>">
                        <i class="fas <?php echo esc_attr( $kat['icon'] ); ?>"></i> <?php echo esc_html( $kat['label'] ); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid" id="gallery-grid">
                <?php
                $has_custom_galeri = false;

                $galeri_args = array(
                    'post_type'      => 'galeri',
                    'posts_per_page' => 24,
                    'post_status'    => 'publish',
                    'meta_query'     => array(
                        'relation' => 'OR',
                        array(
                            'key'     => '_galeri_media_type',
                            'value'   => 'foto',
                            'compare' => '=',
                        ),
                        array(
                            'key'     => '_galeri_media_type',
                            'compare' => 'NOT EXISTS',
                        ),
                    ),
                );

                if ( ! empty( $current_cat ) ) {
                    $galeri_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'kategori_galeri',
                            'field'    => 'slug',
                            'terms'    => $current_cat,
                        ),
                    );
                }

                $galeri_query = new WP_Query( $galeri_args );

                if ( $galeri_query->have_posts() ) :
                    while ( $galeri_query->have_posts() ) :
                        $galeri_query->the_post();
                        $img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        if ( empty( $img_url ) ) {
                            continue;
                        }
                        $has_custom_galeri = true;
                        $terms = get_the_terms( get_the_ID(), 'kategori_galeri' );
                        $cat_label = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Kegiatan';
                ?>
                        <div class="gallery-item smast-reveal">
                            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            <div class="gallery-overlay">
                                <span class="gallery-category"><i class="fas fa-tag"></i> <?php echo esc_html( $cat_label ); ?></span>
                                <h4 class="gallery-title"><?php the_title(); ?></h4>
                                <button class="gallery-zoom" onclick="openLightbox('<?php echo esc_url( $img_url ); ?>', '<?php echo esc_attr( get_the_title() ); ?>')" title="Lihat Foto">
                                    <i class="fas fa-expand-alt"></i>
                                </button>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <?php if ( ! $has_custom_galeri ) : ?>
                <!-- Clean, aesthetic empty state without upload instructions -->
                <div class="smast-reveal smast-empty-galeri-box">
                    <div class="empty-icon-circle">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Galeri Foto Segera Diperbarui</h3>
                    <p style="font-size: 0.95rem; color: var(--smast-text-muted); line-height: 1.65; margin-bottom: 24px;">
                        Dokumentasi foto resmi kegiatan kesiswaan, upacara, praktikum laboratorium, dan prestasi SMAN 1 Kediri sedang dalam proses kurasi dan akan segera ditampilkan pada portal ini.
                    </p>
                    <a href="?tab=video#galeri-content" class="smast-btn smast-btn-gold">
                        <i class="fab fa-youtube"></i> Tonton Dokumentasi Video Sekolah
                    </a>
                </div>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox-modal" onclick="if(event.target===this)closeLightbox()" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.94); z-index:99999; align-items:center; justify-content:center; flex-direction:column; padding:20px;">
    <button onclick="closeLightbox()" style="position:absolute; top:20px; right:28px; background:none; border:none; color:#fff; font-size:2rem; cursor:pointer; line-height:1;" title="Tutup">
        <i class="fas fa-times"></i>
    </button>
    <img id="lightbox-img" src="" alt="" style="max-width:90vw; max-height:80vh; border-radius:8px; object-fit:contain; box-shadow:0 20px 60px rgba(0,0,0,0.8);">
    <p id="lightbox-title" style="color:#fff; margin-top:16px; font-size:1.05rem; font-weight:600; text-align:center; max-width:650px;"></p>
</div>

<script>
function openLightbox(src, title) {
    var modal = document.getElementById('lightbox-modal');
    if (!modal) return;
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-title').textContent = title;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    var modal = document.getElementById('lightbox-modal');
    if (!modal) return;
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}
</script>

<?php get_footer(); ?>
