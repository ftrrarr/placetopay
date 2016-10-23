<?php

/**
 * @param mixed $args
 */
function dump($args)
{
    if (php_sapi_name() != 'cli') {
        $print = print_r($args, 1);
        $print = str_replace(['<', '>', '{{%', '}}'], ['&lt;', '&gt;', '', ''], $print);
        echo "<pre>$print</pre>";
    } else {
        print_r($args);
    }
}

/**
 * @param mixed $args
 */
function dumpx($args)
{
    dump($args);
    exit;
}
