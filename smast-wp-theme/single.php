<?php
/**
 * Single Post Template — SMAN 1 Kediri
 *
 * @package SMAST
 * @version 2.0.0
 */

get_header();
?>

<!-- Page Hero -->
<section class="smast-page-hero smast-single-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>">Berita</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <span class="current">Detail Berita</span>
            </div>
            <h1 class="smast-single-title">
                <?php the_title(); ?>
            </h1>
            <div class="smast-single-meta">
                <span><i class="fas fa-user-edit" aria-hidden="true"></i> Oleh: <?php the_author(); ?></span>
                <span><i class="fas fa-calendar-alt" aria-hidden="true"></i> <?php echo get_the_date( 'd F Y' ); ?></span>
                <span><i class="fas fa-folder-open" aria-hidden="true"></i>
                    <?php
                    $cats = get_the_category();
                    echo ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Warta Sekolah';
                    ?>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Article Body -->
<section class="smast-single-section">
    <div class="smast-container">

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'smast-single-article' ); ?>>

                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="smast-single-featured-wrap">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'smast-single-featured-img', 'alt' => get_the_title() ) ); ?>
                    </div>
                <?php endif; ?>

                <!-- Content Body -->
                <div class="smast-article-content">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php
                $tags = get_the_tags();
                if ( ! empty( $tags ) ) :
                ?>
                    <div class="smast-single-tags">
                        <span class="smast-single-tags-label"><i class="fas fa-tags" aria-hidden="true"></i> Topik:</span>
                        <?php foreach ( $tags as $t ) : ?>
                            <span class="smast-single-tag-chip">
                                #<?php echo esc_html( $t->name ); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Social Share -->
                <div class="smast-single-share">
                    <span class="smast-single-share-label">
                        <i class="fas fa-share-nodes" aria-hidden="true"></i> Bagikan warta ini:
                    </span>
                    <?php
                    $post_url = rawurlencode( get_permalink() );
                    $post_title = rawurlencode( get_the_title() );
                    ?>
                    <div class="smast-single-share-buttons">
                        <a href="https://api.whatsapp.com/send?text=<?php echo $post_title; ?>%20<?php echo $post_url; ?>" target="_blank" rel="noopener noreferrer" class="smast-share-btn smast-share-btn-wa" title="Bagikan ke WhatsApp">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp
                        </a>
                        <button type="button" class="smast-share-btn smast-share-btn-copy" id="copy-article-link" data-url="<?php echo esc_url( get_permalink() ); ?>" title="Salin Tautan Berita">
                            <i class="fas fa-link" aria-hidden="true"></i> Salin Tautan
                        </button>
                    </div>
                </div>

            </article>
        <?php endwhile; ?>

    </div>
</section>

<?php
get_footer();
