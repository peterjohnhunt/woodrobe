<?php

function woodrobe_get_template_part($slug, $name = null) {

    do_action("woodrobe_get_template_part_{$slug}", $slug, $name);

    $templates = array();
    if (isset($name))
        $templates[] = "{$slug}-{$name}.php";

    $templates[] = "{$slug}.php";

    woodrobe_locate_get_template_part($templates, true, false);
}

function woodrobe_locate_get_template_part($template_names, $load = false, $require_once = true ) {
    $located = '';
    foreach ( (array) $template_names as $template_name ) {
        if ( !$template_name ) continue;

        if ( file_exists(plugin_dir_path( dirname(__FILE__) ) . '/' . $template_name)) {
            $located = plugin_dir_path( dirname(__FILE__) ) . '/' . $template_name;
            break;
        }
    }

    if ( $load && '' != $located )
        load_template( $located, $require_once );

    return $located;
}
