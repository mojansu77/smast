<?php
/**
 * Main Fallback Template — SMAN 1 Kediri
 *
 * @package SMAST
 * @version 2.0.0
 */

get_header();
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <span><?php wp_title( '' ); ?></span>
            </div>
            <h1>
                <?php
                if ( is_search() ) {
                    /* translators: %s: search query */
                    printf( esc_html__( 'Hasil Pencarian: %s', 'smast' ), '<span>' . get_search_query() . '</span>' );
                } elseif ( is_archive() ) {
                    the_archive_title();
                } else {
                    single_post_title();
                }
                ?>
            </h1>
            <p>Pusat warta dan publikasi resmi SMA Negeri 1 Kediri.</p>
        </div>
    </div>
</section>

<!-- Main Content Area -->
<section class="smast-section" style="padding-top: 60px; min-height: 60vh;">
    <div class="smast-container">

        <div class="smast-berita-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'smast-berita-card smast-reveal' ); ?>>
                        <div class="smast-berita-thumb">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'smast-card', array( 'alt' => get_the_title() ) ); ?>
                            <?php else : ?>
                                <div class="smast-berita-thumb-placeholder">
                                    <i class="fas fa-newspaper" aria-hidden="true"></i>
                                    <span>SMA Negeri 1 Kota Kediri</span>
                                </div>
                            <?php endif; ?>
                            <span class="smast-berita-badge">
                                <?php
                                $cats = get_the_category();
                                echo ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Warta';
                                ?>
                            </span>
                        </div>
                        <div class="smast-berita-content">
                            <div class="smast-berita-meta">
                                <span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date( 'd M Y' ); ?></span>
                                <span><i class="fas fa-user"></i> <?php the_author(); ?></span>
                            </div>
                            <h3 class="smast-berita-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="smast-berita-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="smast-berita-readmore">
                                Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
            <?php
                endwhile;

                the_posts_navigation( array(
                    'prev_text' => '<i class="fas fa-chevron-left"></i> Warta Sebelumnya',
                    'next_text' => 'Warta Selanjutnya <i class="fas fa-chevron-right"></i>',
                ) );
            else :
            ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                    <i class="fas fa-newspaper fa-3x" style="color: var(--smast-border); margin-bottom: 16px;"></i>
                    <h3 style="color: var(--smast-text-muted);">Tidak ada artikel yang ditemukan.</h3>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php
get_footer();
