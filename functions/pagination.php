<?php
    function pagination($range = 6, $show_one_pager = true, $show_page_hint = false) {
        global $wp_query;
        $num_of_pages = (int)$wp_query->max_num_pages;

        if(!is_single() && $num_of_pages > 1) {
            $current_page = get_query_var('paged') === 0 ? 1 : get_query_var('paged');
            $num_of_display_pages = ($range * 2) + 1;
            $output = '<div id="pagination" class="cf">';
            if($show_page_hint) {
                $output .= '<span class="pagination-overview">Seite ' . $current_page . ' von ' . $num_of_pages . '</span>';
            }
            if($current_page > 2 && $current_page > $range + 1 && $num_of_display_pages < $num_of_pages) {
                $output .= '<a href="' . get_pagenum_link(1) . '" class="pagination_arrow" title="Seite 1 - Neueste Artikel">&laquo;</a>';
            }
            if($show_one_pager && $current_page > 1) {
                $output .= '<a href="' . get_pagenum_link($current_page - 1) . '" class="pagination_arrow" title="Seite ' . ($current_page - 1) . ' - Neuere Artikel"> ' . '<' . '</a>';
            }
            for($i = 1; $i <= $num_of_pages; $i++) {
                if($i < $current_page + $range + 1 && $i > $current_page - $range - 1) {
                    if($current_page === $i) {
                        $output .= '<span class="current">' . $i . '</span><span class="bslash"></span>';
                    } else {
                        $output .= '<a href="' . get_pagenum_link($i) . '" title="Seite ' . $i . '" >' . $i . '</a><span class="bslash"></span>';
                    }
                }
            }
            if($show_one_pager && $current_page < $num_of_pages) {
                $output .= '<a href="' . get_pagenum_link($current_page + 1) . '" class="pagination_arrow" title="Seite ' . ($current_page + 1) . ' - &Auml;ltere Artikel">' . '>' . '</a>';
            }
            if($current_page < $num_of_pages - 1 && $current_page + $range < $num_of_pages && $num_of_display_pages < $num_of_pages) {
                $output .= '<a href="' . get_pagenum_link($num_of_pages) . '" class="pagination_arrow" title="Seite ' . $num_of_pages . ' - &Auml;lteste Artikel">&raquo;</a>';
            }
            $output .= '</div>';
            return $output;
        }
    }
?>