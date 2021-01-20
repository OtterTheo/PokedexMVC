<?php


class Helper
{
    function dd($data) {
        echo '<PRE>';
        print_r($data);
        echo '</PRE>';
        die();
    }
}
