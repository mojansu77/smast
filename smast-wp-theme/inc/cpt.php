<?php
/**
 * Register Custom Post Types and Taxonomies for SMA Negeri 1 Kota Kediri (SMAST)
 *
 * @package SMAST
 * @version 2.4.0
 */

// ─── 0. RENAME DEFAULT "POSTS" TO "KABAR & BERITA" DALAM WP ADMIN ─────────────
function smast_rename_posts_to_kabar_berita() {
    global $wp_post_types, $wp_taxonomies;

    // Ubah Post Labels (Hanya teks bersih tanpa emoji agar rapi berdampingan dengan Dashicon)
    if ( isset( $wp_post_types['post'] ) ) {
        $labels = &$wp_post_types['post']->labels;
        $labels->name               = __( 'Kabar & Berita', 'smast' );
        $labels->singular_name      = __( 'Berita', 'smast' );
        $labels->add_new            = __( 'Tambah Berita Baru', 'smast' );
        $labels->add_new_item       = __( 'Tambah Kabar / Berita Baru', 'smast' );
        $labels->edit_item          = __( 'Edit Berita', 'smast' );
        $labels->new_item           = __( 'Berita Baru', 'smast' );
        $labels->view_item          = __( 'Lihat Berita', 'smast' );
        $labels->search_items       = __( 'Cari Berita', 'smast' );
        $labels->not_found          = __( 'Tidak ada berita ditemukan', 'smast' );
        $labels->not_found_in_trash = __( 'Tidak ada berita di kotak sampah', 'smast' );
        $labels->all_items          = __( 'Semua Kabar & Berita', 'smast' );
        $labels->menu_name          = __( 'Kabar & Berita', 'smast' );
        $labels->name_admin_bar     = __( 'Kabar & Berita', 'smast' );
    }

    // Ubah Category Labels
    if ( isset( $wp_taxonomies['category'] ) ) {
        $cat_labels = &$wp_taxonomies['category']->labels;
        $cat_labels->name          = __( 'Kategori Berita', 'smast' );
        $cat_labels->singular_name = __( 'Kategori Berita', 'smast' );
        $cat_labels->menu_name     = __( 'Kategori Berita', 'smast' );
    }
}
add_action( 'init', 'smast_rename_posts_to_kabar_berita' );

function smast_change_post_menu_label() {
    global $menu, $submenu;
    foreach ( $menu as $key => $item ) {
        if ( isset( $item[2] ) && $item[2] === 'edit.php' ) {
            $menu[$key][0] = 'Kabar & Berita';
            break;
        }
    }
    if ( isset( $submenu['edit.php'] ) ) {
        $submenu['edit.php'][5][0]  = 'Semua Berita';
        $submenu['edit.php'][10][0] = 'Tambah Berita Baru';
        $submenu['edit.php'][15][0] = 'Kategori Berita';
    }
}
add_action( 'admin_menu', 'smast_change_post_menu_label' );


// ─── REGISTER CUSTOM POST TYPES (HANYA TEKS TANPA EMOJI) ─────────────────────
function smast_register_cpts() {

    // ─── 1. HERO SLIDER (Dynamic Banner Carousel dari WP Admin) ───────────────
    register_post_type('hero_slide', array(
        'labels' => array(
            'name'               => __('Hero Slider', 'smast'),
            'singular_name'      => __('Slide Banner', 'smast'),
            'add_new'            => __('Tambah Slide Baru', 'smast'),
            'add_new_item'       => __('Tambah Slide Banner Baru', 'smast'),
            'edit_item'          => __('Edit Slide Banner', 'smast'),
            'new_item'           => __('Slide Baru', 'smast'),
            'all_items'          => __('Semua Slide Banner', 'smast'),
            'view_item'          => __('Lihat Slide', 'smast'),
            'search_items'       => __('Cari Slide', 'smast'),
            'not_found'          => __('Tidak ada slide ditemukan', 'smast'),
            'not_found_in_trash' => __('Tidak ada slide di tempat sampah', 'smast'),
            'menu_name'          => __('Hero Slider', 'smast'),
        ),
        'public'          => false,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'menu_position'   => 20,
        'menu_icon'       => 'dashicons-images-alt2',
        'supports'        => array('title', 'editor', 'thumbnail', 'page-attributes'),
    ));

    // ─── 2. FASILITAS SEKOLAH ────────────────────────────────────────────────
    register_post_type('fasilitas', array(
        'labels' => array(
            'name'          => __('Fasilitas Sekolah', 'smast'),
            'singular_name' => __('Fasilitas', 'smast'),
            'add_new'       => __('Tambah Fasilitas', 'smast'),
            'add_new_item'  => __('Tambah Fasilitas Baru', 'smast'),
            'edit_item'     => __('Edit Fasilitas', 'smast'),
            'all_items'     => __('Semua Fasilitas', 'smast'),
            'menu_name'     => __('Fasilitas Sekolah', 'smast'),
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'   => 'dashicons-building',
        'rewrite'     => array('slug' => 'fasilitas'),
    ));

    // ─── 3. GALERI FOTO & VIDEO SEKOLAH ──────────────────────────────────────
    register_post_type('galeri', array(
        'labels' => array(
            'name'               => __('Galeri Foto & Video', 'smast'),
            'singular_name'      => __('Item Galeri', 'smast'),
            'add_new'            => __('Tambah Foto / Video', 'smast'),
            'add_new_item'       => __('Upload Foto / Tambah Video Baru', 'smast'),
            'edit_item'          => __('Edit Galeri', 'smast'),
            'new_item'           => __('Galeri Baru', 'smast'),
            'all_items'          => __('Semua Galeri (Foto & Video)', 'smast'),
            'view_item'          => __('Lihat Galeri', 'smast'),
            'search_items'       => __('Cari Item Galeri', 'smast'),
            'not_found'          => __('Tidak ada galeri ditemukan', 'smast'),
            'not_found_in_trash' => __('Tidak ada galeri di kotak sampah', 'smast'),
            'menu_name'          => __('Galeri Foto & Video', 'smast'),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_ui'     => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'   => 'dashicons-format-gallery',
        'menu_position' => 21,
        'rewrite'     => array('slug' => 'galeri'),
    ));

    // Taksonomi Kategori Galeri
    register_taxonomy('kategori_galeri', 'galeri', array(
        'labels' => array(
            'name'          => __('Kategori Galeri', 'smast'),
            'singular_name' => __('Kategori Galeri', 'smast'),
            'add_new_item'  => __('Tambah Kategori Galeri Baru', 'smast'),
            'all_items'     => __('Semua Kategori Galeri', 'smast'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'kategori-galeri'),
    ));

    // ─── 4. PENGUMUMAN SEKOLAH ──────────────────────────────────────────────
    register_post_type('pengumuman', array(
        'labels' => array(
            'name'               => __('Pengumuman', 'smast'),
            'singular_name'      => __('Pengumuman', 'smast'),
            'add_new'            => __('Tambah Pengumuman', 'smast'),
            'add_new_item'       => __('Buat Pengumuman Baru', 'smast'),
            'edit_item'          => __('Edit Pengumuman', 'smast'),
            'new_item'           => __('Pengumuman Baru', 'smast'),
            'all_items'          => __('Semua Pengumuman', 'smast'),
            'view_item'          => __('Lihat Pengumuman', 'smast'),
            'search_items'       => __('Cari Pengumuman', 'smast'),
            'not_found'          => __('Tidak ada pengumuman ditemukan', 'smast'),
            'not_found_in_trash' => __('Tidak ada pengumuman di tempat sampah', 'smast'),
            'menu_name'          => __('Pengumuman', 'smast'),
        ),
        'public'          => true,
        'has_archive'     => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'menu_position'   => 23,
        'supports'        => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon'       => 'dashicons-megaphone',
        'rewrite'         => array('slug' => 'pengumuman'),
    ));

    // ─── 5. EKSTRAKURIKULER (Klub & Kesiswaan) ──────────────────────────────
    register_post_type('ekskul', array(
        'labels' => array(
            'name'               => __('Ekstrakurikuler', 'smast'),
            'singular_name'      => __('Ekstrakurikuler', 'smast'),
            'add_new'            => __('Tambah Ekskul Baru', 'smast'),
            'add_new_item'       => __('Tambah Ekstrakurikuler Baru', 'smast'),
            'edit_item'          => __('Edit Ekstrakurikuler', 'smast'),
            'new_item'           => __('Ekskul Baru', 'smast'),
            'all_items'          => __('Semua Ekstrakurikuler', 'smast'),
            'view_item'          => __('Lihat Ekskul', 'smast'),
            'search_items'       => __('Cari Ekskul', 'smast'),
            'not_found'          => __('Tidak ada ekstrakurikuler ditemukan', 'smast'),
            'not_found_in_trash' => __('Tidak ada ekstrakurikuler di tempat sampah', 'smast'),
            'menu_name'          => __('Ekstrakurikuler', 'smast'),
        ),
        'public'          => true,
        'has_archive'     => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'menu_position'   => 22,
        'menu_icon'       => 'dashicons-groups',
        'supports'        => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'rewrite'         => array('slug' => 'ekskul'),
    ));

    // Taksonomi Kategori Ekskul
    register_taxonomy('kategori_ekskul', 'ekskul', array(
        'labels' => array(
            'name'          => __('Kategori Ekskul', 'smast'),
            'singular_name' => __('Kategori Ekskul', 'smast'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'kategori-ekskul'),
    ));

    // Auto-seed Kategori Galeri jika belum ada
    smast_seed_default_galeri_terms();
}
add_action('init', 'smast_register_cpts');

/**
 * Auto-Seed Default Terms untuk Galeri (Foto & Video)
 */
function smast_seed_default_galeri_terms() {
    if ( ! taxonomy_exists('kategori_galeri') ) {
        return;
    }

    $terms = array(
        'foto'       => array( 'name' => 'Foto Dokumentasi',   'slug' => 'foto' ),
        'video'      => array( 'name' => 'Video Kegiatan',     'slug' => 'video' ),
        'akademik'   => array( 'name' => 'Akademik & Prestasi','slug' => 'akademik' ),
        'kesiswaan'  => array( 'name' => 'Kesiswaan & Ekskul', 'slug' => 'kesiswaan' ),
        'fasilitas'  => array( 'name' => 'Sarana & Lingkungan','slug' => 'fasilitas' ),
    );

    foreach ( $terms as $t ) {
        if ( ! term_exists( $t['slug'], 'kategori_galeri' ) ) {
            wp_insert_term( $t['name'], 'kategori_galeri', array( 'slug' => $t['slug'] ) );
        }
    }
}

/**
 * Helper Universal untuk Mengambil Gambar Galeri / Berita (Featured / Editor / YouTube / Default)
 */
function smast_get_galeri_image( $post_id, $size = 'large' ) {
    // 1. Gambar andalan (Featured Image)
    $thumb = get_the_post_thumbnail_url( $post_id, $size );
    if ( ! empty( $thumb ) ) {
        return $thumb;
    }

    // 2. YouTube Thumbnail jika tipe Video
    $video_url = get_post_meta( $post_id, '_galeri_video_url', true );
    if ( ! empty( $video_url ) && function_exists( 'smast_get_yt_id' ) ) {
        $yt_id = smast_get_yt_id( $video_url );
        if ( ! empty( $yt_id ) ) {
            return "https://img.youtube.com/vi/{$yt_id}/hqdefault.jpg";
        }
    }

    // 3. Cari dari konten editor (tag <img>)
    $content = get_post_field( 'post_content', $post_id );
    if ( ! empty( $content ) && preg_match( '/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $content, $m ) ) {
        return $m[1];
    }

    // 4. Default fallback jika belum ada gambar
    return get_template_directory_uri() . '/assets/images/Sekolah.jpg';
}


// ─── SUBMENU PENGATURAN KUTIPAN & TICKER DI WP ADMIN ─────────────────────────
function smast_add_ticker_settings_submenu() {
    add_submenu_page(
        'edit.php?post_type=hero_slide',
        __( 'Pengaturan Kutipan & Ticker Berjalan', 'smast' ),
        __( 'Kutipan & Ticker Berjalan', 'smast' ),
        'manage_options',
        'smast-ticker-settings',
        'smast_render_ticker_settings_page'
    );
}
add_action( 'admin_menu', 'smast_add_ticker_settings_submenu' );

function smast_render_ticker_settings_page() {
    // Simpan Pengaturan
    if ( isset( $_POST['smast_ticker_save'] ) && check_admin_referer( 'smast_ticker_verify' ) ) {
        $clean_kutipan = sanitize_textarea_field( $_POST['smast_kutipan_text'] );
        $clean_author  = sanitize_text_field( $_POST['smast_kutipan_author'] );
        $raw_ticker    = wp_kses_post( $_POST['smast_ticker_text'] );

        // Bersihkan PPDB jika ada
        $clean_ticker = str_ireplace(
            array( 'PPDB 2025/2026 Telah Dibuka |', 'PPDB 2025/2026 Telah Dibuka', 'PPDB 2025', 'Penerimaan Peserta Didik Baru' ),
            '',
            $raw_ticker
        );
        $clean_ticker = trim( $clean_ticker, " |" );

        set_theme_mod( 'smast_kutipan_text', $clean_kutipan );
        set_theme_mod( 'smast_kutipan_author', $clean_author );
        set_theme_mod( 'smast_ticker_text', $clean_ticker );

        echo '<div class="notice notice-success is-dismissible" style="margin-top:15px;"><p><strong>Berhasil!</strong> Pengaturan Kutipan & Ticker Berjalan telah diperbarui.</p></div>';
    }

    $current_kutipan = get_theme_mod( 'smast_kutipan_text', 'Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh.' );
    $current_author  = get_theme_mod( 'smast_kutipan_author', 'Anonim' );
    $current_ticker  = get_theme_mod( 'smast_ticker_text', 'Tim Olimpiade Sains SMAN 1 Kediri Raih Juara 1 Tingkat Provinsi | Penilaian Tengah Semester (PTS) Ganjil Dimulai 10 November 2025 | Selamat kepada Siswa-Siswi yang Lolos Seleksi SNBP 2025 | Dies Natalis SMA Negeri 1 Kota Kediri' );

    // Hapus PPDB jika masih tersisa di database
    $current_ticker = trim( str_ireplace( array( 'PPDB 2025/2026 Telah Dibuka |', 'PPDB 2025/2026 Telah Dibuka' ), '', $current_ticker ), " |" );
    ?>
    <div class="wrap" style="max-width: 850px;">
        <h1 style="font-weight: 800; color: #003366; margin-bottom: 8px;">Pengaturan Kutipan &amp; Ticker Berjalan (Beranda)</h1>
        <p style="color: #64748b; font-size: 14px; margin-bottom: 24px;">Kelola kalimat kutipan inspiratif dan informasi berjalan yang tampil tepat di bawah banner utama (Hero Slider) SMA Negeri 1 Kota Kediri.</p>

        <form method="post" action="" style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <?php wp_nonce_field( 'smast_ticker_verify' ); ?>

            <div style="margin-bottom: 22px;">
                <label for="smast_kutipan_text" style="display:block; font-weight: 700; color: #0f172a; margin-bottom: 6px; font-size: 14px;">
                    Teks Kutipan Inspiratif (Bar Oranye/Kuning):
                </label>
                <textarea name="smast_kutipan_text" id="smast_kutipan_text" rows="3" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px;"><?php echo esc_textarea( $current_kutipan ); ?></textarea>
                <small style="color: #64748b; display: block; margin-top: 4px;">Tampil di bilah informasi utama beranda sekolah.</small>
            </div>

            <div style="margin-bottom: 22px;">
                <label for="smast_kutipan_author" style="display:block; font-weight: 700; color: #0f172a; margin-bottom: 6px; font-size: 14px;">
                    Penulis / Tokoh Kutipan:
                </label>
                <input type="text" name="smast_kutipan_author" id="smast_kutipan_author" value="<?php echo esc_attr( $current_author ); ?>" style="width: 100%; max-width: 400px; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 12px;">
                <small style="color: #64748b; display: block; margin-top: 4px;">Contoh: Anonim, Albert Einstein, Ki Hajar Dewantara, dll.</small>
            </div>

            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 24px 0;">

            <div style="margin-bottom: 24px;">
                <label for="smast_ticker_text" style="display:block; font-weight: 700; color: #0f172a; margin-bottom: 6px; font-size: 14px;">
                    Teks Pengumuman Ticker Berjalan (Pisahkan dengan tanda pipa <code>|</code>):
                </label>
                <textarea name="smast_ticker_text" id="smast_ticker_text" rows="4" style="width: 100%; border: 1px solid #cbd5e1; border-radius: 6px; padding: 10px;"><?php echo esc_textarea( $current_ticker ); ?></textarea>
                <small style="color: #64748b; display: block; margin-top: 4px;">Setiap poin pengumuman dipisahkan dengan tanda pipa <code>|</code>.</small>
            </div>

            <p style="margin: 0;">
                <input type="submit" name="smast_ticker_save" class="button button-primary" value="Simpan Perubahan Kutipan &amp; Ticker" style="padding: 6px 20px; font-weight: 700;">
            </p>
        </form>
    </div>
    <?php
}


/**
 * ─── META BOX UNTUK HERO SLIDER ───────────────────────────────────────────────
 */
function smast_hero_slide_meta_box() {
    add_meta_box(
        'smast_hero_slide_details',
        __('Pengaturan Konten Slide Hero', 'smast'),
        'smast_hero_slide_meta_box_html',
        'hero_slide',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'smast_hero_slide_meta_box');

function smast_hero_slide_meta_box_html($post) {
    wp_nonce_field('smast_hero_slide_save', 'smast_hero_slide_nonce');

    $badge      = get_post_meta($post->ID, '_hero_badge', true);
    $tagline    = get_post_meta($post->ID, '_hero_tagline', true);
    $btn1_text  = get_post_meta($post->ID, '_hero_btn1_text', true);
    $btn1_url   = get_post_meta($post->ID, '_hero_btn1_url', true);
    $btn2_text  = get_post_meta($post->ID, '_hero_btn2_text', true);
    $btn2_url   = get_post_meta($post->ID, '_hero_btn2_url', true);
    ?>
    <style>
        .smast-meta-field { margin-bottom: 16px; }
        .smast-meta-field label { font-weight: 600; display: block; margin-bottom: 6px; font-size: 13px; color: #1e293b; }
        .smast-meta-field input[type="text"], .smast-meta-field input[type="url"], .smast-meta-field select { width: 100%; max-width: 650px; padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; }
        .smast-meta-row { display: flex; gap: 20px; flex-wrap: wrap; }
        .smast-meta-col { flex: 1; min-width: 280px; }
        .smast-meta-hint { font-size: 12px; color: #64748b; margin-top: 4px; }
    </style>

    <div class="smast-meta-field">
        <label for="hero_badge"><?php _e('Teks Badge Atas', 'smast'); ?></label>
        <input type="text" id="hero_badge" name="hero_badge" value="<?php echo esc_attr($badge); ?>" placeholder="Contoh: Terakreditasi A — Sekolah Unggulan Kota Kediri">
        <div class="smast-meta-hint"><?php _e('Label kapsul kecil di atas judul utama (opsional).', 'smast'); ?></div>
    </div>

    <div class="smast-meta-field">
        <label for="hero_tagline"><?php _e('Teks Tagline / Slogan', 'smast'); ?></label>
        <input type="text" id="hero_tagline" name="hero_tagline" value="<?php echo esc_attr($tagline); ?>" placeholder="Contoh: &quot;Unggul dalam Prestasi, Berakhlak Mulia&quot;">
        <div class="smast-meta-hint"><?php _e('Teks miring yang muncul di bawah judul utama.', 'smast'); ?></div>
    </div>

    <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">

    <div class="smast-meta-row">
        <div class="smast-meta-col">
            <h4 style="margin: 0 0 12px; font-size: 14px; color: #003366;"><?php _e('Tombol Utama (Gold)', 'smast'); ?></h4>
            <div class="smast-meta-field">
                <label for="hero_btn1_text"><?php _e('Teks Tombol 1', 'smast'); ?></label>
                <input type="text" id="hero_btn1_text" name="hero_btn1_text" value="<?php echo esc_attr($btn1_text); ?>" placeholder="Contoh: Profil Sekolah">
            </div>
            <div class="smast-meta-field">
                <label for="hero_btn1_url"><?php _e('Tautan Tombol 1 (URL)', 'smast'); ?></label>
                <input type="text" id="hero_btn1_url" name="hero_btn1_url" value="<?php echo esc_attr($btn1_url); ?>" placeholder="Contoh: /profil atau https://...">
            </div>
        </div>

        <div class="smast-meta-col">
            <h4 style="margin: 0 0 12px; font-size: 14px; color: #003366;"><?php _e('Tombol Kedua (Outline Putih)', 'smast'); ?></h4>
            <div class="smast-meta-field">
                <label for="hero_btn2_text"><?php _e('Teks Tombol 2', 'smast'); ?></label>
                <input type="text" id="hero_btn2_text" name="hero_btn2_text" value="<?php echo esc_attr($btn2_text); ?>" placeholder="Contoh: Fasilitas Sekolah">
            </div>
            <div class="smast-meta-field">
                <label for="hero_btn2_url"><?php _e('Tautan Tombol 2 (URL)', 'smast'); ?></label>
                <input type="text" id="hero_btn2_url" name="hero_btn2_url" value="<?php echo esc_attr($btn2_url); ?>" placeholder="Contoh: /fasilitas atau /galeri">
            </div>
        </div>
    </div>
    <?php
}

function smast_hero_slide_save_meta($post_id) {
    if (!isset($_POST['smast_hero_slide_nonce']) || !wp_verify_nonce($_POST['smast_hero_slide_nonce'], 'smast_hero_slide_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array(
        'hero_badge'     => '_hero_badge',
        'hero_tagline'   => '_hero_tagline',
        'hero_btn1_text' => '_hero_btn1_text',
        'hero_btn1_url'  => '_hero_btn1_url',
        'hero_btn2_text' => '_hero_btn2_text',
        'hero_btn2_url'  => '_hero_btn2_url',
    );

    foreach ($fields as $input_name => $meta_key) {
        if (isset($_POST[$input_name])) {
            $val = sanitize_text_field($_POST[$input_name]);
            update_post_meta($post_id, $meta_key, $val);
        }
    }
}
add_action('save_post_hero_slide', 'smast_hero_slide_save_meta');


/**
 * ─── META BOX UNTUK GALERI (FOTO & VIDEO) ─────────────────────────────────────
 */
function smast_galeri_meta_box() {
    add_meta_box(
        'smast_galeri_details',
        __('Pengaturan Media Galeri (Foto / Video YouTube)', 'smast'),
        'smast_galeri_meta_box_html',
        'galeri',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'smast_galeri_meta_box');

function smast_galeri_meta_box_html($post) {
    wp_nonce_field('smast_galeri_save', 'smast_galeri_nonce');

    $media_type = get_post_meta($post->ID, '_galeri_media_type', true) ?: 'foto';
    $video_url  = get_post_meta($post->ID, '_galeri_video_url', true);
    $caption    = get_post_meta($post->ID, '_galeri_caption', true);
    $featured   = get_post_meta($post->ID, '_galeri_featured', true);
    $yt_id      = function_exists('smast_get_yt_id') ? smast_get_yt_id($video_url) : '';
    ?>
    <div style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; padding: 18px; margin-top: 10px;">
        <div style="margin-bottom: 18px;">
            <label style="font-weight: 700; display: block; margin-bottom: 8px; font-size: 14px; color: #0f172a;">
                <?php _e('Format / Tipe Media Galeri:', 'smast'); ?>
            </label>
            <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
                <label style="font-weight: 600; cursor: pointer; padding: 10px 18px; background: #fff; border: 1.5px solid #cbd5e1; border-radius: 6px; display: inline-flex; align-items: center; gap: 8px;">
                    <input type="radio" name="galeri_media_type" value="foto" <?php checked($media_type, 'foto'); ?> onchange="document.getElementById('smast_galeri_video_box').style.display = this.checked ? 'none' : 'block';">
                    <span>📷 Foto Dokumentasi Kegiatan</span>
                </label>
                <label style="font-weight: 600; cursor: pointer; padding: 10px 18px; background: #fff; border: 1.5px solid #cbd5e1; border-radius: 6px; display: inline-flex; align-items: center; gap: 8px;">
                    <input type="radio" name="galeri_media_type" value="video" <?php checked($media_type, 'video'); ?> onchange="document.getElementById('smast_galeri_video_box').style.display = this.checked ? 'block' : 'none';">
                    <span>🎥 Video Kegiatan (Tautan YouTube)</span>
                </label>
            </div>
        </div>

        <div id="smast_galeri_video_box" style="margin-bottom: 18px; <?php echo ($media_type === 'video') ? '' : 'display:none;'; ?> background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 8px; padding: 16px;">
            <label style="font-weight: 700; display: block; margin-bottom: 6px; font-size: 13px; color: #1e3a8a;" for="galeri_video_url">
                <?php _e('Tautan Video YouTube (Wajib jika tipe Video):', 'smast'); ?>
            </label>
            <input type="url" style="width: 100%; padding: 10px 14px; border: 1.5px solid #3b82f6; border-radius: 6px; font-size: 14px;" id="galeri_video_url" name="galeri_video_url" value="<?php echo esc_url($video_url); ?>" placeholder="Contoh: https://www.youtube.com/watch?v=XXXXXX atau https://youtu.be/XXXXXX">
            <small style="color: #475569; display: block; margin-top: 6px; line-height: 1.5;">
                ℹ️ Masukkan tautan video YouTube resmi dari kanal <strong>@smast_kediri_official</strong>. Pemutar video interaktif dan sampul thumbnail otomatis dipasang di beranda dan galeri website.
            </small>

            <?php if ( ! empty($yt_id) ) : ?>
                <div style="margin-top: 14px;">
                    <strong style="font-size: 12px; color: #1e3a8a; display: block; margin-bottom: 6px;">Pratinjau Video YouTube Terhubung:</strong>
                    <div style="max-width: 400px; aspect-ratio: 16/9; border-radius: 8px; overflow: hidden; background: #000;">
                        <iframe style="width: 100%; height: 100%; border: 0;" src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr($yt_id); ?>" title="Pratinjau Video" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div style="margin-bottom: 16px;">
            <label style="font-weight: 600; display: block; margin-bottom: 6px; font-size: 13px; color: #1e293b;" for="galeri_caption">
                <?php _e('Keterangan Singkat / Subtitle (Opsional):', 'smast'); ?>
            </label>
            <input type="text" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px;" id="galeri_caption" name="galeri_caption" value="<?php echo esc_attr($caption); ?>" placeholder="Contoh: Dokumentasi Upacara Hari Pahlawan di Lapangan SMAN 1 Kediri">
        </div>

        <div style="padding-top: 12px; border-top: 1px solid #e2e8f0;">
            <label style="font-weight: 600; cursor: pointer; color: #003366;">
                <input type="checkbox" name="galeri_featured" value="1" <?php checked($featured, '1'); ?>>
                Tampilkan di Showcase Galeri Beranda (Halaman Utama)
            </label>
        </div>

        <div style="margin-top: 14px; background: #e0f2fe; border: 1px solid #7dd3fc; border-radius: 6px; padding: 10px 14px; font-size: 13px; color: #0369a1; line-height: 1.5;">
            <strong style="color: #0284c7;">💡 Tips Praktis:</strong> Foto otomatis ditampilkan di halaman Galeri &amp; Slider jika Anda memasangnya melalui kotak <strong>Gambar andalan</strong> di kanan bawah atau menyisipkannya langsung ke dalam editor teks di atas.
        </div>
    </div>
    <?php
}

function smast_galeri_save_meta($post_id) {
    if (!isset($_POST['smast_galeri_nonce']) || !wp_verify_nonce($_POST['smast_galeri_nonce'], 'smast_galeri_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $media_type = isset($_POST['galeri_media_type']) ? sanitize_text_field($_POST['galeri_media_type']) : 'foto';
    $video_url  = isset($_POST['galeri_video_url']) ? esc_url_raw($_POST['galeri_video_url']) : '';
    $caption    = isset($_POST['galeri_caption']) ? sanitize_text_field($_POST['galeri_caption']) : '';
    $featured   = isset($_POST['galeri_featured']) ? '1' : '0';

    update_post_meta($post_id, '_galeri_media_type', $media_type);
    update_post_meta($post_id, '_galeri_video_url', $video_url);
    update_post_meta($post_id, '_galeri_caption', $caption);
    update_post_meta($post_id, '_galeri_featured', $featured);

    if ($media_type === 'video' && !empty($video_url)) {
        wp_set_object_terms($post_id, 'video', 'kategori_galeri', true);
    }

    // Otomatis pasang Gambar Andalan jika pengguna menyisipkan foto di editor tetapi belum pasang di kotak Gambar Andalan
    if ( ! has_post_thumbnail( $post_id ) ) {
        $post_obj = get_post( $post_id );
        if ( $post_obj && ! empty( $post_obj->post_content ) ) {
            if ( preg_match( '/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $post_obj->post_content, $m ) ) {
                $img_src = $m[1];
                $att_id  = attachment_url_to_postid( $img_src );
                if ( $att_id ) {
                    set_post_thumbnail( $post_id, $att_id );
                }
            }
        }
    }
}
add_action('save_post_galeri', 'smast_galeri_save_meta');


/**
 * ─── META BOX UNTUK PENGUMUMAN SEKOLAH ────────────────────────────────────────
 */
function smast_pengumuman_meta_box() {
    add_meta_box(
        'smast_pengumuman_details',
        __('Informasi Surat / Dokumen Pengumuman', 'smast'),
        'smast_pengumuman_meta_box_html',
        'pengumuman',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'smast_pengumuman_meta_box');

function smast_pengumuman_meta_box_html($post) {
    wp_nonce_field('smast_pengumuman_save', 'smast_pengumuman_nonce');

    $no_surat    = get_post_meta($post->ID, '_pengumuman_no_surat', true);
    $tgl_berlaku = get_post_meta($post->ID, '_pengumuman_tgl_berlaku', true);
    $file_url    = get_post_meta($post->ID, '_pengumuman_file_url', true);
    $is_urgent   = get_post_meta($post->ID, '_pengumuman_is_urgent', true);
    ?>
    <div style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; padding: 18px; margin-top: 10px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 14px;">
            <div>
                <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="pengumuman_no_surat">
                    <?php _e('Nomor Surat / Edaran Resmi (Opsional):', 'smast'); ?>
                </label>
                <input type="text" style="width: 100%;" id="pengumuman_no_surat" name="pengumuman_no_surat" value="<?php echo esc_attr($no_surat); ?>" placeholder="Contoh: 421.3/120/101.6.24/2025">
            </div>
            <div>
                <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="pengumuman_tgl_berlaku">
                    <?php _e('Tanggal / Periode Berlaku:', 'smast'); ?>
                </label>
                <input type="text" style="width: 100%;" id="pengumuman_tgl_berlaku" name="pengumuman_tgl_berlaku" value="<?php echo esc_attr($tgl_berlaku); ?>" placeholder="Contoh: 10 - 25 November 2025">
            </div>
        </div>

        <div style="margin-bottom: 14px;">
            <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="pengumuman_file_url">
                <?php _e('Tautan File Lampiran / Unduhan PDF (Opsional):', 'smast'); ?>
            </label>
            <input type="url" style="width: 100%;" id="pengumuman_file_url" name="pengumuman_file_url" value="<?php echo esc_url($file_url); ?>" placeholder="Contoh: https://... atau unggah di Media lalu tempel URL PDF disini">
            <small style="color: #64748b;"><?php _e('Bila ada surat edaran resmi PDF yang dapat diunduh oleh wali murid atau siswa.', 'smast'); ?></small>
        </div>

        <div style="padding-top: 6px;">
            <label style="font-weight: 600; cursor: pointer; color: #b91c1c;">
                <input type="checkbox" name="pengumuman_is_urgent" value="1" <?php checked($is_urgent, '1'); ?>>
                Tandai sebagai Pengumuman Penting / Prioritas Utama
            </label>
        </div>
    </div>
    <?php
}

function smast_pengumuman_save_meta($post_id) {
    if (!isset($_POST['smast_pengumuman_nonce']) || !wp_verify_nonce($_POST['smast_pengumuman_nonce'], 'smast_pengumuman_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['pengumuman_no_surat'])) {
        update_post_meta($post_id, '_pengumuman_no_surat', sanitize_text_field($_POST['pengumuman_no_surat']));
    }
    if (isset($_POST['pengumuman_tgl_berlaku'])) {
        update_post_meta($post_id, '_pengumuman_tgl_berlaku', sanitize_text_field($_POST['pengumuman_tgl_berlaku']));
    }
    if (isset($_POST['pengumuman_file_url'])) {
        update_post_meta($post_id, '_pengumuman_file_url', esc_url_raw($_POST['pengumuman_file_url']));
    }
    $is_urgent = isset($_POST['pengumuman_is_urgent']) ? '1' : '0';
    update_post_meta($post_id, '_pengumuman_is_urgent', $is_urgent);
}
add_action('save_post_pengumuman', 'smast_pengumuman_save_meta');


/**
 * ─── META BOX UNTUK EKSTRAKURIKULER ───────────────────────────────────────────
 */
function smast_ekskul_meta_box() {
    add_meta_box(
        'smast_ekskul_details',
        __('Detail & Pengaturan Ekstrakurikuler', 'smast'),
        'smast_ekskul_meta_box_html',
        'ekskul',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'smast_ekskul_meta_box');

function smast_ekskul_meta_box_html($post) {
    wp_nonce_field('smast_ekskul_save', 'smast_ekskul_nonce');

    $category_label = get_post_meta($post->ID, '_ekskul_category_label', true);
    $icon           = get_post_meta($post->ID, '_ekskul_icon', true) ?: 'fa-crown';
    $badge_color    = get_post_meta($post->ID, '_ekskul_color', true) ?: 'tag-gold';
    $featured       = get_post_meta($post->ID, '_ekskul_featured', true);
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 10px;">
        <div>
            <label style="display:block; font-weight: 600; margin-bottom: 6px;" for="ekskul_category_label"><?php _e('Subjudul / Kategori Singkat', 'smast'); ?></label>
            <input type="text" style="width: 100%;" id="ekskul_category_label" name="ekskul_category_label" value="<?php echo esc_attr($category_label); ?>" placeholder="Contoh: Kepemimpinan & Organisasi">
        </div>
        <div>
            <label style="display:block; font-weight: 600; margin-bottom: 6px;" for="ekskul_icon"><?php _e('Ikon FontAwesome (Class)', 'smast'); ?></label>
            <input type="text" style="width: 100%;" id="ekskul_icon" name="ekskul_icon" value="<?php echo esc_attr($icon); ?>" placeholder="Contoh: fa-flag, fa-basketball, fa-music">
            <small style="color: #64748b;"><?php _e('Lihat ikon di fontawesome.com/icons', 'smast'); ?></small>
        </div>
        <div>
            <label style="display:block; font-weight: 600; margin-bottom: 6px;" for="ekskul_color"><?php _e('Tema Warna Ikon / Tag', 'smast'); ?></label>
            <select style="width: 100%;" id="ekskul_color" name="ekskul_color">
                <option value="tag-gold" <?php selected($badge_color, 'tag-gold'); ?>>Emas / Gold</option>
                <option value="tag-navy" <?php selected($badge_color, 'tag-navy'); ?>>Navy / Biru Tua</option>
                <option value="tag-blue" <?php selected($badge_color, 'tag-blue'); ?>>Sky Blue / Biru Muda</option>
                <option value="tag-green" <?php selected($badge_color, 'tag-green'); ?>>Hijau / Green</option>
                <option value="tag-red" <?php selected($badge_color, 'tag-red'); ?>>Merah / Red</option>
                <option value="tag-purple" <?php selected($badge_color, 'tag-purple'); ?>>Ungu / Purple</option>
            </select>
        </div>
        <div style="display: flex; align-items: center; padding-top: 24px;">
            <label style="font-weight: 600; cursor: pointer;">
                <input type="checkbox" name="ekskul_featured" value="1" <?php checked($featured, '1'); ?>>
                <?php _e('Tampilkan sebagai Unggulan di Halaman Utama (Beranda)', 'smast'); ?>
            </label>
        </div>
    </div>
    <?php
}

function smast_ekskul_save_meta($post_id) {
    if (!isset($_POST['smast_ekskul_nonce']) || !wp_verify_nonce($_POST['smast_ekskul_nonce'], 'smast_ekskul_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['ekskul_category_label'])) {
        update_post_meta($post_id, '_ekskul_category_label', sanitize_text_field($_POST['ekskul_category_label']));
    }
    if (isset($_POST['ekskul_icon'])) {
        update_post_meta($post_id, '_ekskul_icon', sanitize_text_field($_POST['ekskul_icon']));
    }
    if (isset($_POST['ekskul_color'])) {
        update_post_meta($post_id, '_ekskul_color', sanitize_text_field($_POST['ekskul_color']));
    }
    $featured = isset($_POST['ekskul_featured']) ? '1' : '0';
    update_post_meta($post_id, '_ekskul_featured', $featured);
}
add_action('save_post_ekskul', 'smast_ekskul_save_meta');


/**
 * ─── META BOX PILIHAN HERO SLIDER UNTUK BERITA & GALERI ───────────────────────────
 */
function smast_hero_slider_option_meta_box() {
    $post_types = array( 'post', 'galeri' );
    foreach ( $post_types as $pt ) {
        add_meta_box(
            'smast_hero_slider_option',
            __( '⭐ Pilihan Tampil di Hero Slider Utama (Beranda)', 'smast' ),
            'smast_hero_slider_option_meta_box_html',
            $pt,
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'smast_hero_slider_option_meta_box' );

function smast_hero_slider_option_meta_box_html( $post ) {
    wp_nonce_field( 'smast_hero_slider_option_save', 'smast_hero_slider_option_nonce' );

    $show_in_hero = get_post_meta( $post->ID, '_show_in_hero', true );
    $custom_title = get_post_meta( $post->ID, '_hero_custom_title', true );
    $badge        = get_post_meta( $post->ID, '_hero_badge', true );
    $tagline      = get_post_meta( $post->ID, '_hero_tagline', true );
    $btn1_text    = get_post_meta( $post->ID, '_hero_btn1_text', true );
    $btn1_url     = get_post_meta( $post->ID, '_hero_btn1_url', true );
    $btn2_text    = get_post_meta( $post->ID, '_hero_btn2_text', true );
    $btn2_url     = get_post_meta( $post->ID, '_hero_btn2_url', true );

    $is_post   = ( $post->post_type === 'post' );
    $type_name = $is_post ? 'Berita' : 'Galeri';
    ?>
    <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 18px; margin-top: 8px;">
        <div style="background: #ffffff; border: 2px solid <?php echo $show_in_hero === '1' ? '#003366' : '#e2e8f0'; ?>; border-radius: 8px; padding: 14px 18px;">
            <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; font-size: 14px; font-weight: 700; color: #003366;">
                <input type="checkbox" name="smast_show_in_hero" id="smast_show_in_hero" value="1" <?php checked( $show_in_hero, '1' ); ?> style="width: 20px; height: 20px; accent-color: #003366;" onchange="document.getElementById('smast_hero_extra_fields').style.display = this.checked ? 'block' : 'none';">
                <span>Tampilkan <?php echo esc_html( $type_name ); ?> ini di Hero Slider Utama (Beranda)</span>
            </label>
            <p style="margin: 6px 0 0 32px; font-size: 12px; color: #64748b; line-height: 1.5;">
                Centang opsi ini agar <?php echo esc_html( strtolower( $type_name ) ); ?> ini otomatis tampil sebagai slide banner besar di halaman depan website. Pastikan telah memasang <strong>Gambar Unggulan (Featured Image)</strong> sebagai foto latar belakang slide.
            </p>
        </div>

        <div id="smast_hero_extra_fields" style="<?php echo $show_in_hero === '1' ? 'display:block;' : 'display:none;'; ?> border-top: 1px dashed #cbd5e1; padding-top: 16px; margin-top: 14px;">
            <p style="margin: 0 0 14px; font-size: 12px; color: #0284c7; font-weight: 600;">
                ℹ️ Kolom di bawah ini bersifat <strong>opsional</strong>. Jika dibiarkan kosong, sistem otomatis menggunakan judul asli, ringkasan, dan tautan langsung ke <?php echo esc_html( strtolower( $type_name ) ); ?> ini.
            </p>

            <div style="margin-bottom: 16px; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 12px 14px;">
                <label style="display:block; font-weight: 700; margin-bottom: 6px; font-size: 13px; color: #003366;" for="smast_hero_custom_title">
                    Judul Kustom untuk Slider (Opsional &mdash; Mengatur Menjadi 2 Baris):
                </label>
                <input type="text" style="width: 100%; padding: 8px 12px; border: 1.5px solid #003366; border-radius: 6px; font-size: 13.5px;" id="smast_hero_custom_title" name="smast_hero_custom_title" value="<?php echo esc_attr( $custom_title ); ?>" placeholder="Contoh: Mengenal Lebih Dekat SMAN 1 Kediri <br> Ikon Prestasi Pendidikan di Kota Tahu">
                <small style="color: #64748b; font-size: 11.5px; display: block; margin-top: 5px; line-height: 1.4;">
                    💡 <strong>Tips Membagi 2 Baris:</strong> Sisipkan kode <code>&lt;br&gt;</code> di tengah kalimat untuk memotong teks persis menjadi 2 baris sesuai selera. Anda juga bisa menyisipkan <code>&lt;span class=&quot;gold-text&quot;&gt;Kata Emas&lt;/span&gt;</code> untuk memberi warna emas. Jika dikosongkan, judul asli postingan yang akan dipakai.
                </small>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 14px;">
                <div>
                    <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="smast_hero_badge">
                        Teks Badge Atas (Kapsul Kecil):
                    </label>
                    <input type="text" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px;" id="smast_hero_badge" name="smast_hero_badge" value="<?php echo esc_attr( $badge ); ?>" placeholder="<?php echo $is_post ? 'Default: Warta SMAN 1 Kediri' : 'Default: Dokumentasi & Galeri SMAST'; ?>">
                </div>
                <div>
                    <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="smast_hero_tagline">
                        Teks Tagline / Slogan (Miring):
                    </label>
                    <input type="text" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px;" id="smast_hero_tagline" name="smast_hero_tagline" value="<?php echo esc_attr( $tagline ); ?>" placeholder="Contoh: &quot;Unggul dalam Prestasi, Berakhlak Mulia&quot;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="smast_hero_btn1_text">
                        Teks Tombol Utama (Gold):
                    </label>
                    <input type="text" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px;" id="smast_hero_btn1_text" name="smast_hero_btn1_text" value="<?php echo esc_attr( $btn1_text ); ?>" placeholder="<?php echo $is_post ? 'Default: Baca Berita Lengkap' : 'Default: Buka Galeri Foto'; ?>">
                    <small style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">Tautan tombol ini otomatis mengarah ke artikel/galeri ini.</small>
                </div>
                <div>
                    <label style="display:block; font-weight: 600; margin-bottom: 6px; font-size: 13px;" for="smast_hero_btn2_text">
                        Teks Tombol Kedua (Outline Putih - Opsional):
                    </label>
                    <input type="text" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px;" id="smast_hero_btn2_text" name="smast_hero_btn2_text" value="<?php echo esc_attr( $btn2_text ); ?>" placeholder="<?php echo $is_post ? 'Contoh: Kabar & Berita' : 'Contoh: Lihat Prestasi'; ?>">
                    <input type="text" style="width: 100%; padding: 6px 12px; border: 1px solid #cbd5e1; border-radius: 6px; margin-top: 6px; font-size: 12px;" id="smast_hero_btn2_url" name="smast_hero_btn2_url" value="<?php echo esc_attr( $btn2_url ); ?>" placeholder="<?php echo $is_post ? 'URL Tombol 2 (Default: /berita)' : 'URL Tombol 2 (Default: /galeri)'; ?>">
                </div>
            </div>
        </div>
    </div>
    <?php
}

function smast_hero_slider_option_save_meta( $post_id ) {
    if ( ! isset( $_POST['smast_hero_slider_option_nonce'] ) || ! wp_verify_nonce( $_POST['smast_hero_slider_option_nonce'], 'smast_hero_slider_option_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['smast_show_in_hero'] ) && $_POST['smast_show_in_hero'] === '1' ) {
        update_post_meta( $post_id, '_show_in_hero', '1' );
    } else {
        delete_post_meta( $post_id, '_show_in_hero' );
    }

    if ( isset( $_POST['smast_hero_custom_title'] ) ) {
        update_post_meta( $post_id, '_hero_custom_title', wp_kses_post( $_POST['smast_hero_custom_title'] ) );
    }

    $text_fields = array(
        'smast_hero_badge'     => '_hero_badge',
        'smast_hero_tagline'   => '_hero_tagline',
        'smast_hero_btn1_text' => '_hero_btn1_text',
        'smast_hero_btn1_url'  => '_hero_btn1_url',
        'smast_hero_btn2_text' => '_hero_btn2_text',
        'smast_hero_btn2_url'  => '_hero_btn2_url',
    );

    foreach ( $text_fields as $post_key => $meta_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
        }
    }
}
add_action( 'save_post_post', 'smast_hero_slider_option_save_meta' );
add_action( 'save_post_galeri', 'smast_hero_slider_option_save_meta' );

/**
 * Kolom Admin untuk melihat Thumbnail & status Hero Slider pada Berita & Galeri
 */
function smast_add_hero_slider_admin_column( $columns ) {
    $new_columns = array();
    foreach ( $columns as $key => $title ) {
        if ( $key === 'title' ) {
            $new_columns['smast_media_thumb'] = __( 'Foto / Media', 'smast' );
        }
        $new_columns[$key] = $title;
        if ( $key === 'title' ) {
            $new_columns['hero_slider'] = __( 'Hero Slider', 'smast' );
        }
    }
    return $new_columns;
}
add_filter( 'manage_post_posts_columns', 'smast_add_hero_slider_admin_column' );
add_filter( 'manage_galeri_posts_columns', 'smast_add_hero_slider_admin_column' );

function smast_render_hero_slider_admin_column( $column, $post_id ) {
    if ( $column === 'smast_media_thumb' ) {
        $img = smast_get_galeri_image( $post_id, 'thumbnail' );
        $mtype = get_post_meta( $post_id, '_galeri_media_type', true ) ?: 'foto';
        echo '<div style="width:58px; height:42px; border-radius:6px; overflow:hidden; background:#0b192c; position:relative; box-shadow:0 2px 6px rgba(0,0,0,0.15); display:inline-flex; align-items:center; justify-content:center;">';
        echo '<img src="' . esc_url( $img ) . '" alt="" style="width:100%; height:100%; object-fit:cover;">';
        if ( $mtype === 'video' ) {
            echo '<span style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(0,0,0,0.45); color:#ef4444; font-size:14px;"><i class="dashicons dashicons-video-alt3"></i></span>';
        }
        echo '</div>';
    }
    if ( $column === 'hero_slider' ) {
        $in_hero = get_post_meta( $post_id, '_show_in_hero', true );
        if ( $in_hero === '1' ) {
            echo '<span style="display:inline-flex; align-items:center; gap:4px; background:#eff6ff; color:#003366; font-weight:700; padding:3px 8px; border-radius:4px; font-size:11px; border:1px solid #bfdbfe;">⭐ Tampil di Slider</span>';
        } else {
            echo '<span style="color:#94a3b8; font-size:12px;">—</span>';
        }
    }
}
add_action( 'manage_post_posts_custom_column', 'smast_render_hero_slider_admin_column', 10, 2 );
add_action( 'manage_galeri_posts_custom_column', 'smast_render_hero_slider_admin_column', 10, 2 );
