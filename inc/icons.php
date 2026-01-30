<?php
function theme_icon($name, $class = '') {
    $path = get_template_directory() . '/icons/' . $name . '.svg';

    if (file_exists($path)) {
        $svg = file_get_contents($path);

        // adiciona classe no svg
        if ($class) {
            $svg = preg_replace(
                '/<svg\b([^>]*)>/',
                '<svg $1 class="' . esc_attr($class) . '">',
                $svg
            );
        }

        echo $svg;
    }
}
