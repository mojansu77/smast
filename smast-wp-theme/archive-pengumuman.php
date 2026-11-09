<?php
/**
 * Archive Template — Pengumuman Resmi SMAN 1 Kediri
 *
 * Papan Pengumuman Digital Resmi SMAN 1 Kota Kediri.
 * Menampilkan seluruh surat edaran, agenda, dan pengumuman kesiswaan / kedinasan.
 *
 * @package SMAST
 * @version 2.2.0
 */

get_header();

// Ambil parameter filter & pencarian
$search_query = isset( $_GET['q'] ) ? sanitize_text_field( wp_unslash( $_GET['q'] ) ) : '';
$filter_type  = isset( $_GET['tipe'] ) ? sanitize_key( $_GET['tipe'] ) : 'semua';
$paged        = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'pengumuman',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

if ( ! empty( $search_query ) ) {
    $args['s'] = $search_query;
}

if ( $filter_type === 'penting' ) {
    $args['meta_query'] = array(
        array(
            'key'     => '_pengumuman_is_urgent',
            'value'   => '1',
            'compare' => '=',
        ),
    );
}

$pengumuman_query = new WP_Query( $args );
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>">Kabar</a>
                <i class="fas fa-chevron-right"></i>
                <span class="current">Pengumuman Resmi</span>
            </div>
            <h1>Papan Pengumuman <span>Resmi SMAST</span></h1>
            <p>Pusat informasi surat edaran kedinasan, agenda kegiatan belajar mengajar, pengumuman akademik, dan pemberitahuan penting SMA Negeri 1 Kota Kediri.</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="smast-section" style="padding-top: 50px; min-height: 520px;">
    <div class="smast-container">

        <!-- Toolbar Pencarian & Filter -->
        <div class="smast-pengumuman-toolbar">
            <form method="get" action="<?php echo esc_url( home_url( '/pengumuman/' ) ); ?>" class="smast-pengumuman-search-form" role="search">
                <input type="text" name="q" value="<?php echo esc_attr( $search_query ); ?>" placeholder="Cari surat edaran / pengumuman..." class="smast-pengumuman-search-input" aria-label="Cari pengumuman">
                <?php if ( $filter_type !== 'semua' ) : ?>
                    <input type="hidden" name="tipe" value="<?php echo esc_attr( $filter_type ); ?>">
                <?php endif; ?>
                <button type="submit" class="smast-btn-pengumuman smast-btn-pengumuman-primary" style="height: 42px; border: none; cursor: pointer;">
                    <i class="fas fa-search"></i> <span>Cari</span>
                </button>
            </form>

            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="<?php echo esc_url( home_url( '/pengumuman/' ) ); ?>" class="smast-btn-pengumuman <?php echo ( $filter_type === 'semua' ) ? 'smast-btn-pengumuman-primary' : ''; ?>" style="<?php echo ( $filter_type !== 'semua' ) ? 'background: #F1F5F9; color: #475569;' : ''; ?>">
                    <i class="fas fa-list"></i> Semua
                </a>
                <a href="<?php echo esc_url( add_query_arg( 'tipe', 'penting', home_url( '/pengumuman/' ) ) ); ?>" class="smast-btn-pengumuman <?php echo ( $filter_type === 'penting' ) ? 'smast-btn-pengumuman-primary' : ''; ?>" style="<?php echo ( $filter_type !== 'penting' ) ? 'background: #F1F5F9; color: #DC2626;' : 'background: #DC2626; color: #FFF;'; ?>">
                    <i class="fas fa-exclamation-circle"></i> Hanya Penting
                </a>
            </div>
        </div>

        <!-- Daftar Pengumuman -->
        <?php if ( $pengumuman_query->have_posts() ) : ?>
            <div class="smast-pengumuman-grid">
                <?php
                while ( $pengumuman_query->have_posts() ) :
                    $pengumuman_query->the_post();
                    $no_surat    = get_post_meta( get_the_ID(), '_pengumuman_no_surat', true );
                    $tgl_berlaku = get_post_meta( get_the_ID(), '_pengumuman_tgl_berlaku', true );
                    $file_url    = get_post_meta( get_the_ID(), '_pengumuman_file_url', true );
                    $is_urgent   = get_post_meta( get_the_ID(), '_pengumuman_is_urgent', true );
                ?>
                    <article class="smast-pengumuman-card <?php echo ( '1' === $is_urgent ) ? 'is-urgent' : ''; ?>">
                        <div class="smast-pengumuman-top">
                            <div class="smast-pengumuman-badge-wrap">
                                <?php if ( '1' === $is_urgent ) : ?>
                                    <span class="smast-pengumuman-badge badge-urgent">
                                        <i class="fas fa-exclamation-triangle"></i> Penting / Mendesak
                                    </span>
                                <?php else : ?>
                                    <span class="smast-pengumuman-badge badge-normal">
                                        <i class="fas fa-bullhorn"></i> Pengumuman Resmi
                                    </span>
                                <?php endif; ?>

                                <?php if ( ! empty( $no_surat ) ) : ?>
                                    <span style="font-size: 0.82rem; color: #64748B; font-weight: 600;">
                                        <i class="fas fa-hashtag"></i> No: <?php echo esc_html( $no_surat ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="smast-pengumuman-date">
                                <i class="fas fa-calendar-alt"></i> <?php echo get_the_date( 'd F Y' ); ?>
                            </div>
                        </div>

                        <h2 class="smast-pengumuman-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <?php if ( ! empty( $tgl_berlaku ) ) : ?>
                            <div class="smast-pengumuman-meta-details">
                                <span><i class="fas fa-clock"></i> Masa Berlaku: <strong><?php echo esc_html( $tgl_berlaku ); ?></strong></span>
                                <span><i class="fas fa-university"></i> SMA Negeri 1 Kota Kediri</span>
                            </div>
                        <?php endif; ?>

                        <div class="smast-pengumuman-excerpt">
                            <?php
                            if ( has_excerpt() ) {
                                echo esc_html( get_the_excerpt() );
                            } else {
                                echo esc_html( wp_trim_words( get_the_content(), 28, '...' ) );
                            }
                            ?>
                        </div>

                        <div class="smast-pengumuman-footer">
                            <a href="<?php the_permalink(); ?>" class="smast-btn-pengumuman smast-btn-pengumuman-primary">
                                <span>Baca Rincian Surat</span> <i class="fas fa-arrow-right"></i>
                            </a>

                            <?php if ( ! empty( $file_url ) ) : ?>
                                <a href="<?php echo esc_url( $file_url ); ?>" target="_blank" rel="noopener noreferrer" class="smast-btn-pengumuman smast-btn-pengumuman-pdf">
                                    <i class="fas fa-file-pdf"></i> <span>Unduh Dokumen Asli (PDF)</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div style="margin: 30px 0; text-align: center;">
                <?php
                echo paginate_links( array(
                    'total'     => $pengumuman_query->max_num_pages,
                    'current'   => $paged,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Sebelumnya',
                    'next_text' => 'Selanjutnya <i class="fas fa-chevron-right"></i>',
                ) );
                ?>
            </div>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- Fallback Empty State -->
            <div style="text-align: center; padding: 60px 20px; background: var(--smast-white); border-radius: 16px; border: 1px dashed var(--smast-border); margin: 30px 0;">
                <div style="width: 72px; height: 72px; background: rgba(0, 72, 132, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; color: #004884; font-size: 2rem;">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Belum Ada Pengumuman Terbit</h3>
                <p style="color: #64748B; max-width: 540px; margin: 0 auto 20px; font-size: 0.95rem;">
                    Saat ini belum ada pengumuman atau surat edaran resmi terbaru yang dipublikasikan.
                </p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="smast-btn smast-btn-primary" style="display: inline-flex;">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();

