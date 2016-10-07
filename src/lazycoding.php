<?php

/**
 * @param mixed $args
 */
function dump($args)
{
    $print = print_r($args, 1);
    $print = str_replace(['<', '>', '{{%', '}}'], ['&lt;', '&gt;', '', ''], $print);
    echo "<pre>$print</pre>";
}

/**
 * @param mixed $args
 */
function dumpx($args)
{
    dump($args);
    exit;
}
