<?php
class Bootstrap_5_WP_Nav_Menu_Walker extends Walker_Nav_Menu {

    // Start Level
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = ['dropdown-menu'];

        // Ajouter des classes spécifiques au niveau
        if ($depth === 1) {
            $classes[] = 'dropdown-depth-1';
        } elseif ($depth === 2) {
            $classes[] = 'dropdown-depth-2';
        }

        // Ajout de la classe 'row' pour la grid
        $classes[] = 'row gap-3';

        $class_names = implode(' ', $classes);
        $output .= "\n{$indent}<ul class=\"$class_names\">\n";
    }

    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? [] : (array) $item->classes;

        // Ajouter des classes personnalisées
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;

        // Ajout de la classe 'col' pour la grid au niveau des sous-menus
        if ($depth > 0) {
            $classes[] = 'col-12 col-md-3'; // Exemple de largeur de colonne
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $link_classes = ($depth > 0) ? 'dropdown-item ' : 'nav-link ';
        $link_classes .= ($args->walker->has_children) ? 'dropdown-toggle' : '';
        $attributes .= ' class="' . esc_attr($link_classes) . '"';

        // Ajouter des attributs pour les sous-menus
        if ($args->walker->has_children) {
            $attributes .= ' data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
           // Récupérer l'image associée uniquement pour les sous-menus
           if ($depth >= 1) {
            $image_url = get_post_meta($item->ID, '_menu_item_image', true);
            if (!empty($image_url)) {
                $item_output .= '<img class="dropdown-img" src="' . esc_url($image_url) . '" alt="' . esc_attr($item->title) . '">';
            }
        }
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }

    // End Level
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "{$indent}</ul>\n";
    }
}
?>
