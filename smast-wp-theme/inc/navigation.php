<?php
/**
 * SMAST Navigation & Walker Implementation
 *
 * Mendukung manajemen menu dinamis langsung dari WP Admin:
 * Tampilan (Appearance) -> Menu (Menus).
 *
 * @package SMAST
 * @author  Mochamad Januar Sugiarto
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Custom Walker untuk Navbar Desktop SMAST
 */
class SMAST_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Membuka tag <ul> untuk submenu / dropdown
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent  = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"smast-dropdown-menu\" role=\"menu\" aria-label=\"Submenu\">\n";
    }

    /**
     * Menutup tag </ul> untuk submenu
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent  = str_repeat( "\t", $depth );
        $output .= "$indent</ul>\n";
    }

    /**
     * Membuka elemen <li> dan <a> untuk setiap item menu
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $has_children = ! empty( $args->walker->has_children );
        $classes      = empty( $item->classes ) ? array() : (array) $item->classes;

        // Cek status aktif
        $is_active = in_array( 'current-menu-item', $classes, true ) ||
                     in_array( 'current-menu-parent', $classes, true ) ||
                     in_array( 'current-menu-ancestor', $classes, true );

        // Cari class icon fontawesome (fa-*) jika user memasukkannya di kolom CSS Classes WP Admin
        $icon_html = '';
        foreach ( $classes as $c ) {
            if ( strpos( $c, 'fa-' ) === 0 || strpos( $c, 'fab-' ) === 0 || strpos( $c, 'far-' ) === 0 ) {
                $prefix = ( strpos( $c, 'fab-' ) === 0 ) ? 'fab' : ( ( strpos( $c, 'far-' ) === 0 ) ? 'far' : 'fas' );
                $icon_html = '<i class="' . esc_attr( $prefix . ' ' . $c ) . ' fa-fw" aria-hidden="true"></i> ';
                break;
            }
        }

        // Khusus icon Beranda jika judulnya Beranda/Home atau link ke beranda
        $is_home_link = ( untrailingslashit( $item->url ) === untrailingslashit( home_url() ) );
        if ( $depth === 0 && $is_home_link && empty( $icon_html ) && ( strtolower( $item->title ) === 'beranda' || strtolower( $item->title ) === 'home' || in_array( 'home', $classes, true ) ) ) {
            $item_title = '<i class="fas fa-home" aria-hidden="true"></i>';
            $extra_a_class = ' smast-nav-home';
        } else {
            $item_title = $icon_html . esc_html( $item->title );
            $extra_a_class = '';
        }

        if ( $depth === 0 ) {
            // Level 0: Menu Utama Navbar
            $li_classes = array();
            if ( $has_children ) {
                $li_classes[] = 'smast-dropdown';
            }
            if ( $is_active ) {
                $li_classes[] = 'active';
            }

            $li_class_str = ! empty( $li_classes ) ? ' class="' . esc_attr( implode( ' ', $li_classes ) ) . '"' : '';
            $output .= $indent . '<li' . $li_class_str . ' role="none">';

            $a_classes = 'smast-nav-link' . $extra_a_class . ( $is_active ? ' active' : '' );
            $aria_popup = $has_children ? ' aria-haspopup="true"' : '';
            $arrow_html = $has_children ? ' <i class="fas fa-chevron-down nav-arrow" aria-hidden="true"></i>' : '';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : ' href="#"';

            $output .= '<a class="' . esc_attr( $a_classes ) . '"' . $attributes . ' role="menuitem"' . $aria_popup . '>';
            $output .= $item_title . $arrow_html;
            $output .= '</a>';
        } else {
            // Level > 0: Submenu (Dropdown)
            $output .= $indent . '<li role="none">';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : ' href="#"';

            // Jika belum ada icon, beri default icon titik atau panah
            if ( empty( $icon_html ) ) {
                $icon_html = '<i class="fas fa-angle-right fa-fw" aria-hidden="true"></i> ';
                $item_title = $icon_html . esc_html( $item->title );
            }

            $output .= '<a' . $attributes . ' role="menuitem">';
            $output .= $item_title;
            $output .= '</a>';
        }
    }

    /**
     * Menutup elemen </li>
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

/**
 * Custom Walker untuk Drawer Navigasi Mobile (Dashboard) SMAST
 */
class SMAST_Mobile_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "<ul class=\"mobile-submenu\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "</ul>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $icon_html = '';
        foreach ( $classes as $c ) {
            if ( strpos( $c, 'fa-' ) === 0 || strpos( $c, 'fab-' ) === 0 || strpos( $c, 'far-' ) === 0 ) {
                $prefix = ( strpos( $c, 'fab-' ) === 0 ) ? 'fab' : ( ( strpos( $c, 'far-' ) === 0 ) ? 'far' : 'fas' );
                $icon_html = '<i class="' . esc_attr( $prefix . ' ' . $c ) . ' fa-fw" aria-hidden="true"></i> ';
                break;
            }
        }

        if ( empty( $icon_html ) ) {
            $icon_html = ( $depth === 0 )
                ? '<i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> '
                : '<i class="fas fa-minus fa-fw" style="font-size:0.6rem;" aria-hidden="true"></i> ';
        }

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : ' href="#"';

        $output .= '<li>';
        $output .= '<a' . $attributes . '>';
        $output .= $icon_html . esc_html( $item->title );
        $output .= '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

