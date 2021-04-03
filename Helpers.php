<?php
class Helpers
{
    /** @param string $location */
    public static function redirect(string $location)
    {
        header("Location: $location");
    }

    /** @param mixed $var */
    public static function dnd(mixed $var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';

        die();
    }

    /** @param string $string */
    public static function sanitize(string $string)
    {
        return trim(htmlspecialchars($string));
    }

    /** 
     * @param int $timestamp
     * @return string
     */
    public static function getTime(int $timestamp): string
    {
        return  date('m-d-Y H:i:s',  $timestamp);
    }
}
