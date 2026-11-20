<?php
/**
 * Single Post Template — SMAN 1 Kediri
 *
 * @package SMAST
 * @version 2.0.0
 */

get_header();

$curr_ptype = get_post_type();
if ( $curr_ptype === 'galeri' ) {
    $parent_label  = 'Galeri';
    $parent_url    = home_url( '/galeri' );
    $current_label = 'Detail Dokumentasi';
    $terms         = get_the_terms( get_the_ID(), 'kategori_galeri' );
    $cat_name      = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Dokumentasi Sekolah';
} elseif ( $curr_ptype === 'fasilitas' ) {
    $parent_label  = 'Fasilitas';
    $parent_url    = home_url( '/fasilitas' );
    $current_label = 'Detail Fasilitas';
    $cat_name      = 'Sarana Prasarana';
} elseif ( $curr_ptype === 'ekskul' ) {
    $parent_label  = 'Ekstrakurikuler';
    $parent_url    = home_url( '/ekskul' );
    $current_label = 'Detail Ekskul';
    $terms         = get_the_terms( get_the_ID(), 'kategori_ekskul' );
    $cat_name      = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Kesiswaan';
} else {
    $parent_label  = 'Berita';
    $parent_url    = home_url( '/berita' );
    $current_label = 'Detail Berita';
    $cats          = get_the_category();
    $cat_name      = ! empty( $cats ) ? $cats[0]->name : 'Warta Sekolah';
}
?>

<!-- Page Hero -->
<section class="smast-page-hero smast-single-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <a href="<?php echo esc_url( $parent_url ); ?>"><?php echo esc_html( $parent_label ); ?></a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <span class="current"><?php echo esc_html( $current_label ); ?></span>
            </div>
            <h1 class="smast-single-title">
                <?php the_title(); ?>
            </h1>
            <div class="smast-single-meta">
                <span><i class="fas fa-user-edit" aria-hidden="true"></i> Oleh: <?php the_author(); ?></span>
                <span><i class="fas fa-calendar-alt" aria-hidden="true"></i> <?php echo get_the_date( 'd F Y' ); ?></span>
                <span><i class="fas fa-folder-open" aria-hidden="true"></i> <?php echo esc_html( $cat_name ); ?></span>
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
