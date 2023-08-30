<?php

/**
 * Template part for displaying page content in pagebuilder.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<div class="entry-content">
    <?php if (have_rows('page_builder')) {
        while (have_rows('page_builder')) {
            the_row();

            $row_layout = get_row_layout();
            $directory = get_template_directory();

            // Create the elements , pagebuilder and scss folder if not found.
            $scss_dir = $directory . '/scss';
            $scss_pageb_dir = $scss_dir . '/pagebuilder';
            $scss_main_file = $scss_pageb_dir . '/_pagebuilder.scss';
            $scss_elements_pageb_dir = $scss_pageb_dir . '/elements';

            if (!file_exists($scss_dir)) {
                mkdir($scss_dir);
                chmod($scss_dir, 0777);
            }
            if (!file_exists($scss_pageb_dir)) {
                mkdir($scss_pageb_dir);
                chmod($scss_pageb_dir, 0777);
            }

            if (!file_exists($scss_elements_pageb_dir)) {
                mkdir($scss_elements_pageb_dir);
                chmod($scss_elements_pageb_dir, 0777);
            }

            if (!file_exists($scss_main_file)) {
                file_put_contents($scss_main_file, '');
                chmod($scss_main_file, 0664);
                $import_pg = "\n//* PAGEBUILDER\n@import 'pagebuilder/pagebuilder';";
                file_put_contents('' . $directory . '/scss/main.scss', $import_pg, FILE_APPEND);
            }

            //Create pagebuilder folder inside elements if not found.
            $elements_pageb_dir = $directory . '/elements/pagebuilder';

            if (!file_exists($elements_pageb_dir)) {
                mkdir($elements_pageb_dir);
                chmod($elements_pageb_dir, 0777);
            }

            // Prepare the scss file
            $scss_filename = str_replace("_", "-", $row_layout);
            $scss_content = '.' . $scss_filename . ' {}';
            $import = "\n@import 'pagebuilder/elements/" . $scss_filename . "';";

            // Specify file and directory path
            $file_directory = '' . $directory . '/elements/pagebuilder/' . $row_layout . '';
            $file = '' . $directory . '/elements/pagebuilder/' . $row_layout . '/' . $row_layout . '.php';
            $scssfile = '' . $directory . '/scss/pagebuilder/elements/_' . $scss_filename . '.scss';

            // Import all the variables on that file END
            if (get_row_layout() == $row_layout) {
                if (!file_exists($file_directory)) {
                    mkdir($file_directory);
                    chmod($file_directory, 0777);
                    file_put_contents($file, $php_file_rendered);
                    chmod($file, 0664);

                    if (!file_exists($scssfile)) {
                        file_put_contents($scssfile, $scss_content);
                        chmod($scssfile, 0664);
                        file_put_contents($scss_main_file, $import, FILE_APPEND);
                    }
                } else {
                    get_template_part('elements/pagebuilder/' . $row_layout . '/' . $row_layout . '');
                }
            }
        }
    } ?>
</div>
