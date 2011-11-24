<?php
/**
 * @abstract Compilador direto e focado somente nos arquivos Sass
 * @author Leandro S. Cunha <leandrosc999@yahoo.com.br>
 * @since 2011
 * @link https://github.com/leandrosc/Lazy-Sass-PHP
 */
$lib = "./phamlp";
include "$lib/SassParser.php";
$output = $output ? $output : true; //flag de avisos, se false não avisa nada do que está acontecendo
try {
    $sass = new SassParser(array(
                'style' => 'compressed',
                'cache' => false,
                'css_location' => './css'
            ));
    #pastas locais com arquivos scss, sass e sassc
    $folders = array('sass');
    foreach ($folders as $folder) {
        if ($handle = opendir($folder)):
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && strpos($file, '_') !== 0) {
                    if ($css = $sass->toCss("$folder/$file")) {
                        $file = str_replace(array(SassFile::SASS,SassFile::SASSC,SassFile::SCSS), '', $file);
                        $fp = fopen($sass->getCss_location()."/$file".'css', 'w');
                        fwrite($fp, $css);
                        fclose($fp);
                        echo $output ? "{$file}css criado.<br>" : '';
                    }
                }
            }
            closedir($handle);
        endif;
    }

    if ($output) {
        die('ok!');
    }
} catch (exception $ex) {
    exit($ex->getMessage());
}
