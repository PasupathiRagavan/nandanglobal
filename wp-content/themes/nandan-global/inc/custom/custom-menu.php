<?php 

// custom menu example @ https://digwp.com/2011/11/html-formatting-custom-menus/
function clean_custom_menus($menu_name, $type) {

    $menu_list = '';
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        if($type == "mobile") {
            $ul_class = "";
            $li_class = "mb-1";
            $link_class = "block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded";
        } else {
            $ul_class = "hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6";
            $li_class = "";
            $link_class = "text-sm text-gray-400 hover:text-gray-500";
        }
       
        $menu_list .= "\t\t\t\t". '<ul class="'.$ul_class.'">' ."\n";
        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $menu_list .= "\t\t\t\t\t". '<li class="'.$li_class.'"><a class="'.$link_class.'" href="'. $url .'">'. $title .'</a></li>' ."\n";
        }
        $menu_list .= "\t\t\t\t". '</ul>' ."\n";
    } else {
        // $menu_list = '<!-- no list defined -->';
    }
    echo $menu_list;
}