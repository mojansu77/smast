<?php
/**
 * Blog / News Index Template — SMAN 1 Kediri
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
                <span>Berita &amp; Artikel</span>
            </div>
            <h1>Berita &amp; <span>Artikel Sekolah</span></h1>
            <p>Pusat warta, publikasi kegiatan kesiswaan, prestasi siswa, dan artikel edukatif dari keluarga besar SMAN 1 Kediri.</p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="smast-section" style="padding-top: 60px;">
    <div class="smast-container">

        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-newspaper" aria-hidden="true"></i> Publikasi Resmi</span>
            <h2 class="smast-section-title">Warta <span>SMA Negeri 1 Kediri</span></h2>
            <p class="smast-section-desc">Kumpulan informasi terkini seputar kegiatan akademik, kesiswaan, agenda sekolah, dan prestasi siswa.</p>
        </div>

        <div class="smast-berita-grid">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="smast-berita-card smast-reveal">
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
                                echo ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Berita';
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
                <?php endwhile; ?>
            <?php else : ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                    <i class="fas fa-newspaper fa-3x" style="color: var(--smast-border); margin-bottom: 16px;"></i>
                    <h3 style="color: var(--smast-text-muted);">Belum Ada Berita</h3>
                    <p style="color: var(--smast-text-muted); font-size: 0.95rem;">Artikel dan berita sekolah akan segera dipublikasikan di sini.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div style="margin-top: 50px; text-align: center;">
            <?php
            the_posts_pagination( array(
                'mid_size'           => 2,
                'prev_text'          => '<i class="fas fa-chevron-left"></i> Sebelumnya',
                'next_text'          => 'Berikutnya <i class="fas fa-chevron-right"></i>',
                'screen_reader_text' => 'Navigasi Berita',
            ) );
            ?>
        </div>

    </div>
</section>

<?php
get_footer();
