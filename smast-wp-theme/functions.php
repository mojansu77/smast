<?php
/**
 * SMAST Theme — SMA Negeri 1 Kota Kediri (SMAST) Functions & Definitions
 *
 * @package SMAST
 * @author  Mochamad Januar Sugiarto
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * 1. THEME SETUP
 */
if ( ! function_exists( 'smast_setup' ) ) :
    function smast_setup() {
        // Feed links
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage document title
        add_theme_support( 'title-tag' );

        // Featured images
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 800, 500, true );
        add_image_size( 'smast-card', 600, 380, true );
        add_image_size( 'smast-thumb', 300, 200, true );

        // Custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 280,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        // Register navigation menus
        register_nav_menus( array(
            'primary-menu' => esc_html__( 'Navigasi Utama (SMAST)', 'smast' ),
            'footer-menu'  => esc_html__( 'Navigasi Footer', 'smast' ),
        ) );

        // HTML5 markup support
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Responsive embeds
        add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'smast_setup' );

/**
 * 2. ENQUEUE SCRIPTS & STYLES
 */
function smast_scripts() {
    // Google Fonts: Plus Jakarta Sans & Inter
    wp_enqueue_style(
        'smast-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap',
        array(),
        null
    );

    // FontAwesome 6
    wp_enqueue_style(
        'smast-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Theme Main Stylesheet
    wp_enqueue_style(
        'smast-style',
        get_stylesheet_uri(),
        array( 'smast-fonts', 'smast-fontawesome' ),
        file_exists( get_stylesheet_directory() . '/style.css' )
            ? filemtime( get_stylesheet_directory() . '/style.css' )
            : wp_get_theme()->get( 'Version' )
    );

    // Main JavaScript
    wp_enqueue_script(
        'smast-js',
        get_template_directory_uri() . '/assets/js/smast.js',
        array(),
        file_exists( get_stylesheet_directory() . '/assets/js/smast.js' )
            ? filemtime( get_stylesheet_directory() . '/assets/js/smast.js' )
            : wp_get_theme()->get( 'Version' ),
        true
    );

    // Localized data for JS
    wp_localize_script( 'smast-js', 'smastData', array(
        'homeUrl'      => esc_url( home_url( '/' ) ),
        'schoolName'   => 'SMA Negeri 1 Kota Kediri',
        'whatsappNum'  => get_theme_mod( 'smast_wa_number', '6281234567890' ),
        'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'smast_scripts' );

/**
 * 3. ALWAYS ADD 'smast-page' BODY CLASS
 */
function smast_body_classes( $classes ) {
    $classes[] = 'smast-page';
    return $classes;
}
add_filter( 'body_class', 'smast_body_classes' );

/**
 * 4. LOAD CUSTOM POST TYPES (Fasilitas, Galeri, Pengumuman) & NAVIGATION
 */
require_once get_template_directory() . '/inc/cpt.php';
require_once get_template_directory() . '/inc/navigation.php';

/**
 * 5. CUSTOMIZER CONTROLS FOR SCHOOL BRANDING
 */
function smast_customizer( $wp_customize ) {
    // Panel Utama
    $wp_customize->add_panel( 'smast_panel', array(
        'title'    => '🏫 SMA Negeri 1 Kota Kediri (SMAST) — Pengaturan Website',
        'priority' => 160,
    ) );

    // ─── Section: Identitas & Kepala Sekolah ───
    $wp_customize->add_section( 'smast_identity', array(
        'title'    => 'Identitas & Kepala Sekolah',
        'panel'    => 'smast_panel',
        'priority' => 10,
    ) );

    // Tagline Sekolah
    $wp_customize->add_setting( 'smast_tagline', array(
        'default'           => 'Unggul dalam Prestasi, Berakhlak Mulia',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'smast_tagline', array(
        'type'    => 'text',
        'label'   => 'Tagline Sekolah',
        'section' => 'smast_identity',
    ) );

    // Nama Kepala Sekolah
    $wp_customize->add_setting( 'smast_principal_name', array(
        'default'           => 'ARIF SYAH PUTRA, M.Pd.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'smast_principal_name', array(
        'type'    => 'text',
        'label'   => 'Nama Kepala Sekolah',
        'section' => 'smast_identity',
    ) );

    // NIP Kepala Sekolah
    $wp_customize->add_setting( 'smast_principal_nip', array(
        'default'           => 'Kepala SMA Negeri 1 Kota Kediri',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'smast_principal_nip', array(
        'type'    => 'text',
        'label'   => 'Jabatan / NIP Kepala Sekolah',
        'section' => 'smast_identity',
    ) );

    // Foto Kepala Sekolah
    $wp_customize->add_setting( 'smast_principal_photo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'smast_principal_photo', array(
            'label'       => 'Foto Kepala Sekolah',
            'description' => 'Kosongkan untuk menggunakan foto default Kepala Sekolah.png dari folder assets/images/.',
            'section'     => 'smast_identity',
        )
    ) );

    // ─── Section: Identitas & Data Pokok Sekolah (Editable via WP Admin) ───
    $wp_customize->add_section( 'smast_data_sekolah', array(
        'title'       => 'Identitas & Data Pokok Sekolah',
        'panel'       => 'smast_panel',
        'priority'    => 15,
        'description' => 'Kelola seluruh informasi identitas resmi, legalitas, akreditasi, dan sarana SMAN 1 Kediri.',
    ) );

    $school_data_fields = array(
        'smast_npsn'               => array( 'NPSN (Nomor Pokok Sekolah Nasional)', '20534394', 'text' ),
        'smast_status_sekolah'      => array( 'Status Sekolah', 'Negeri', 'text' ),
        'smast_bentuk_pendidikan'  => array( 'Bentuk Pendidikan', 'Sekolah Menengah Atas (SMA)', 'text' ),
        'smast_status_kepemilikan' => array( 'Status Kepemilikan', 'Pemerintah Provinsi Jawa Timur', 'text' ),
        'smast_sk_pendirian'       => array( 'SK Pendirian Sekolah', '1946 (17 September 1946)', 'text' ),
        'smast_akreditasi'         => array( 'Akreditasi Sekolah', 'A (Unggul) — Nilai 96', 'text' ),
        'smast_kurikulum'          => array( 'Kurikulum Operasional', 'Kurikulum Merdeka', 'text' ),
        'smast_luas_tanah'         => array( 'Luas Lahan / Tanah', '24.814 m²', 'text' ),
        'smast_daya_tampung'       => array( 'Rombel & Daya Tampung', '34 Rombongan Belajar (± 1.150 Siswa)', 'text' ),
        'smast_koordinat'          => array( 'Koordinat Astronomis', 'S 7° 48\' 40.73"  E 112° 0\' 10.33"', 'text' ),
        'smast_motto'              => array( 'Semboyan / Motto', 'Smast Mulia Jaya Jaya Jaya!!!', 'text' ),
    );

    foreach ( $school_data_fields as $key => $conf ) {
        $wp_customize->add_setting( $key, array(
            'default'           => $conf[1],
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $key, array(
            'type'    => $conf[2],
            'label'   => $conf[0],
            'section' => 'smast_data_sekolah',
        ) );
    }

    // ─── Section: Visi, Indikator & Misi Sekolah (MUSTIKA) ───
    $wp_customize->add_section( 'smast_visimisi', array(
        'title'       => 'Visi, Indikator & Misi Sekolah',
        'panel'       => 'smast_panel',
        'priority'    => 18,
        'description' => 'Kelola teks resmi Visi MUSTIKA, 8 Indikator Visi, dan 8 Misi Sekolah.',
    ) );

    $wp_customize->add_setting( 'smast_visi_text', array(
        'default'           => 'Mencetak Manusia Unggul Spiritual, Tinggi Intelektual, Kreatif berwawasan lingkungan dan Amanah (MUSTIKA).',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'smast_visi_text', array(
        'type'    => 'textarea',
        'label'   => 'Visi Sekolah (MUSTIKA)',
        'section' => 'smast_visimisi',
    ) );

    $default_indikator = "Menunjukkan perilaku taat beribadah sesuai dengan agama yang dianutnya\nMeraih prestasi dalam bidang akademik\nMemiliki banyak gagasan\nMemiliki kepedulian terhadap sesama\nMemiliki kepedulian terhadap kebersihan dan keindahan lingkungan\nMenghasilkan karya inovatif yang berwawasan lingkungan\nMenampilkan perilaku jujur dalam perkataan dan perbuatan\nMemiliki sikap tanggung jawab";
    $wp_customize->add_setting( 'smast_indikator_visi', array(
        'default'           => $default_indikator,
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'smast_indikator_visi', array(
        'type'        => 'textarea',
        'label'       => 'Indikator Visi Sekolah (Pisahkan dengan Baris Baru)',
        'description' => 'Tuliskan tiap poin indikator pada baris baru (Enter).',
        'section'     => 'smast_visimisi',
    ) );

    $default_misi = "Menyelenggarakan kegiatan ibadah sehari - hari di sekolah.\nMenyelenggrakan pembelajaran sesuai dengan bakat, minat dan kecepatan belajar peserta didik.\nMelibatkan siswa dalam mengambil keputusan kegiatan sekolah\nMenyelenggarakan kegiatan amal sosial\nMemberi tanggung jawab menjaga kebersihan dan keindahan lingkungan .\nMelaksanakan pembelajaran hasta karya\nMemberikan keteladanan perilaku jujur dalam perkataan dan perbuatan\nMenyelenggarakan berbagai kegiatan organisasi di sekolah";
    $wp_customize->add_setting( 'smast_misi_text', array(
        'default'           => $default_misi,
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'smast_misi_text', array(
        'type'        => 'textarea',
        'label'       => 'Misi Sekolah (Pisahkan dengan Baris Baru)',
        'description' => 'Tuliskan tiap poin misi pada baris baru (Enter).',
        'section'     => 'smast_visimisi',
    ) );

    // ─── Section: Kontak & Media Sosial ───
    $wp_customize->add_section( 'smast_contact', array(
        'title'    => 'Kontak & Media Sosial',
        'panel'    => 'smast_panel',
        'priority' => 20,
    ) );

    $contact_fields = array(
        'smast_address'       => array( 'Alamat Sekolah', 'Jalan Veteran No. 1, Kelurahan Bandar Lor, Kecamatan Mojoroto, Kota Kediri, Jawa Timur 64114', 'textarea' ),
        'smast_phone'         => array( 'Nomor Telepon / HP', '+62 354 771829', 'text' ),
        'smast_wa_number'     => array( 'WhatsApp (Format: 628xxx)', '6281234567890', 'text' ),
        'smast_email'         => array( 'Email Resmi', 'redaksi@smastkediri.sch.id', 'email' ),
        'smast_instagram_url' => array( 'URL Instagram', 'https://www.instagram.com/smast_kediri_official/', 'url' ),
        'smast_facebook_url'  => array( 'URL Facebook', 'https://www.facebook.com/smastkediriofficial/', 'url' ),
        'smast_youtube_url'   => array( 'URL YouTube', 'https://www.youtube.com/@smast_kediri_official', 'url' ),
        'smast_twitter_url'   => array( 'URL Twitter / X', 'https://www.facebook.com/smastkediriofficial/', 'url' ),
    );

    foreach ( $contact_fields as $key => $conf ) {
        $wp_customize->add_setting( $key, array(
            'default'           => $conf[1],
            'sanitize_callback' => $conf[2] === 'textarea' ? 'sanitize_textarea_field' : ( $conf[2] === 'email' ? 'sanitize_email' : 'sanitize_text_field' ),
        ) );
        $wp_customize->add_control( $key, array(
            'type'    => $conf[2],
            'label'   => $conf[0],
            'section' => 'smast_contact',
        ) );
    }

    // ─── Section: Ticker Pengumuman & Kutipan ───
    $wp_customize->add_section( 'smast_ticker', array(
        'title'    => 'Kutipan & Ticker Berjalan',
        'panel'    => 'smast_panel',
        'priority' => 30,
    ) );

    // Teks Kutipan
    $wp_customize->add_setting( 'smast_kutipan_text', array(
        'default'           => 'Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'smast_kutipan_text', array(
        'type'        => 'textarea',
        'label'       => 'Teks Kutipan (Bar Kutipan)',
        'section'     => 'smast_ticker',
        'description' => 'Kutipan inspiratif yang tampil pada bar oranye/biru di bawah banner utama.',
    ) );

    // Tokoh / Penulis Kutipan
    $wp_customize->add_setting( 'smast_kutipan_author', array(
        'default'           => 'Anonim',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'smast_kutipan_author', array(
        'type'        => 'text',
        'label'       => 'Penulis / Tokoh Kutipan',
        'section'     => 'smast_ticker',
    ) );

    $wp_customize->add_setting( 'smast_ticker_text', array(
        'default'           => 'Tim Olimpiade Sains SMAN 1 Kediri Raih Juara 1 Tingkat Provinsi | Penilaian Tengah Semester (PTS) Ganjil Dimulai 10 November 2025 | Selamat kepada Siswa-Siswi yang Lolos Seleksi SNBP 2025 | Dies Natalis SMA Negeri 1 Kota Kediri',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'smast_ticker_text', array(
        'type'        => 'textarea',
        'label'       => 'Teks Pengumuman Tambahan (Pisahkan dengan tanda |)',
        'section'     => 'smast_ticker',
        'description' => 'Gunakan tanda pipa (|) sebagai pemisah antar poin pengumuman.',
    ) );

    // ─── Section: Pengaturan Beranda (Homepage Sections) ───
    $wp_customize->add_section( 'smast_homepage_sections', array(
        'title'       => 'Pengaturan Beranda (Sections)',
        'panel'       => 'smast_panel',
        'priority'    => 40,
        'description' => 'Kelola teks dan konfigurasi elemen yang tampil pada Halaman Utama (Beranda).',
    ) );

    // Sambutan Kepala Sekolah Text
    $wp_customize->add_setting( 'smast_sambutan_text', array(
        'default'           => 'Website ini kami hadirkan sebagai wujud komitmen sekolah dalam mewujudkan keterbukaan informasi, pelayanan publik yang prima, serta ruang interaksi edukatif bagi seluruh warga sekolah, alumni, dan masyarakat luas.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'smast_sambutan_text', array(
        'type'    => 'textarea',
        'label'   => 'Paragraf Sambutan Kepala Sekolah',
        'section' => 'smast_homepage_sections',
    ) );

    // Ekskul Section Title
    $wp_customize->add_setting( 'smast_ekskul_title', array(
        'default'           => 'Ekstrakurikuler Pilihan',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'smast_ekskul_title', array(
        'type'    => 'text',
        'label'   => 'Judul Seksi Ekstrakurikuler',
        'section' => 'smast_homepage_sections',
    ) );

    // Ekskul Section Desc
    $wp_customize->add_setting( 'smast_ekskul_desc', array(
        'default'           => 'Kembangkan potensi non-akademik, kepemimpinan, dan bakat kreatif bersama berbagai klub dan organisasi kesiswaan aktif di SMA Negeri 1 Kota Kediri.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'smast_ekskul_desc', array(
        'type'    => 'textarea',
        'label'   => 'Deskripsi Seksi Ekstrakurikuler',
        'section' => 'smast_homepage_sections',
    ) );

    // Jumlah Ekskul di Beranda
    $wp_customize->add_setting( 'smast_ekskul_count', array(
        'default'           => 8,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'smast_ekskul_count', array(
        'type'        => 'number',
        'label'       => 'Jumlah Ekskul Ditampilkan di Beranda',
        'description' => 'Maksimal ekskul yang muncul di beranda agar tampilan rapi dan tidak terlalu ramai (default: 8). Sisanya diakses via tombol Lihat Semua.',
        'section'     => 'smast_homepage_sections',
    ) );

    // Jumlah Berita di Beranda
    $wp_customize->add_setting( 'smast_berita_count', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'smast_berita_count', array(
        'type'        => 'number',
        'label'       => 'Jumlah Berita Ditampilkan di Beranda',
        'section'     => 'smast_homepage_sections',
    ) );

    // Jumlah Galeri di Beranda
    $wp_customize->add_setting( 'smast_galeri_count', array(
        'default'           => 6,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'smast_galeri_count', array(
        'type'        => 'number',
        'label'       => 'Jumlah Galeri Ditampilkan di Beranda',
        'section'     => 'smast_homepage_sections',
    ) );
}
add_action( 'customize_register', 'smast_customizer' );

/**
 * 6. AUTO-CREATE SMAST ESSENTIAL PAGES (FOOLPROOF GUARANTEE)
 */
function smast_create_essential_pages() {
    $pages = array(
        array(
            'title'    => 'Beranda',
            'slug'     => 'beranda',
            'template' => 'front-page.php',
            'is_front' => true,
        ),
        array(
            'title'    => 'Profil Sekolah',
            'slug'     => 'profil',
            'template' => 'page-smast-profil.php',
        ),
        array(
            'title'    => 'Sejarah Sekolah',
            'slug'     => 'sejarah',
            'template' => 'page-sejarah.php',
        ),
        array(
            'title'    => 'Kurikulum & Akademik',
            'slug'     => 'kurikulum',
            'template' => 'page-kurikulum.php',
        ),
        array(
            'title'    => 'Fasilitas Sekolah',
            'slug'     => 'fasilitas',
            'template' => 'page-fasilitas.php',
        ),
        array(
            'title'    => 'Ekstrakurikuler',
            'slug'     => 'ekskul',
            'template' => 'page-ekskul.php',
        ),
        array(
            'title'    => 'Galeri Foto & Video',
            'slug'     => 'galeri',
            'template' => 'page-galeri.php',
        ),
        array(
            'title'    => 'Hubungi Kami',
            'slug'     => 'kontak',
            'template' => 'page-kontak.php',
        ),
        array(
            'title'    => 'Kabar & Berita',
            'slug'     => 'berita',
            'template' => '', // Posts page
            'is_posts' => true,
        ),
        array(
            'title'    => 'Pengumuman Resmi',
            'slug'     => 'pengumuman',
            'template' => 'page-pengumuman.php',
        ),
    );

    $needs_flush = false;
    foreach ( $pages as $p ) {
        $existing = get_page_by_path( $p['slug'] );
        $page_id  = 0;

        if ( ! isset( $existing->ID ) ) {
            $page_id = wp_insert_post( array(
                'post_type'    => 'page',
                'post_title'   => $p['title'],
                'post_name'    => $p['slug'],
                'post_status'  => 'publish',
                'post_author'  => 1,
            ) );
            $needs_flush = true;
        } else {
            $page_id = $existing->ID;
            if ( $existing->post_status !== 'publish' ) {
                wp_update_post( array(
                    'ID'          => $page_id,
                    'post_status' => 'publish',
                ) );
                $needs_flush = true;
            }
        }

        if ( $page_id && ! empty( $p['template'] ) ) {
            $current_tpl = get_post_meta( $page_id, '_wp_page_template', true );
            if ( $current_tpl !== $p['template'] ) {
                update_post_meta( $page_id, '_wp_page_template', $p['template'] );
            }
        }

        if ( ! empty( $p['is_front'] ) && $page_id ) {
            if ( get_option( 'page_on_front' ) != $page_id ) {
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $page_id );
            }
        }

        if ( ! empty( $p['is_posts'] ) && $page_id ) {
            if ( get_option( 'page_for_posts' ) != $page_id ) {
                update_option( 'page_for_posts', $page_id );
            }
        }
    }

    if ( $needs_flush ) {
        flush_rewrite_rules( false );
    }
}
add_action( 'after_switch_theme', 'smast_create_essential_pages' );
add_action( 'init', 'smast_create_essential_pages' );

/**
 * 7. YOUTUBE HELPER FUNCTIONS (SMART EMBED & THUMBNAIL)
 */
if ( ! function_exists( 'smast_get_yt_id' ) ) {
    function smast_get_yt_id( $url ) {
        if ( empty( $url ) ) {
            return false;
        }
        if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=|shorts/)|youtu\.be/)([^"&?/\s]{11})%i', $url, $m ) ) {
            return $m[1];
        }
        return false;
    }
}
