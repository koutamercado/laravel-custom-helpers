<?php

use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('ddd')) {
    /**
     * Dump the passed variables.
     *
     * @param  mixed  $args
     * @return void
     */
    function ddd(...$args)
    {
        foreach ($args as $x) {
            VarDumper::dump($x);
        }
    }
}

if (! function_exists('ipInRange')) {
    /**
     * Verifico si una IP esta dentro de una rango de ip
     *
     * @param  string  $ip
     * @param  string  $range
     * @return boolean
     */
    function ipInRange($ip, $range)
    {
        if (strpos($range, '/') == false) {
            $range .= '/32';
        }
        list( $range, $netmask ) = explode('/', $range, 2);
        $range_decimal = ip2long($range);
        $ip_decimal = ip2long($ip);
        $wildcard_decimal = pow(2, ( 32 - $netmask )) - 1;
        $netmask_decimal = ~ $wildcard_decimal;
        return ( ( $ip_decimal & $netmask_decimal ) == ( $range_decimal & $netmask_decimal ) );
    }
}

if (!function_exists('checkUuid')) {
    /**
     * Verifico el formato de un String para ver si es un UUID
     *
     * @param  string $uuid
     * @return bool
     */
    function checkUuid($uuid)
    {
        $reg = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
        if (!is_string($uuid) || (preg_match($reg, $uuid) !== 1)) {
            return false;
        }
        return true;
    }
}

if (!function_exists('nlToBr')) {
    /**
     * Convierto los saltos de linea a la etiqueta br
     *
     * @param  string $string
     * @return string
     */
    function nlToBr($string)
    {
        if (strstr($string, "\r\n")) {
            $string = str_replace("\r\n", "<br>", $string);
        }

        if (strstr($string, "\n")) {
            $string = str_replace("\n", "<br>", $string);
        }

        if (strstr($string, "\r")) {
            $string = str_replace("\r", "<br>", $string);
        }

        return $string;
    }
}

if (!function_exists('dosToUnix')) {
    /**
     * Limpio los saltos de linea distintos a \n
     *
     * @param  string $string
     * @return string
     */
    function dosToUnix($string)
    {
        if (strstr($string, "\r\n")) {
            $string = str_replace("\r\n", "\n", $string);
        }
        if (strstr($string, "\r")) {
            $string = str_replace("\r", "\n", $string);
        }
        if (strstr($string, "^M")) {
            $string = str_replace("^M", "\n", $string);
        }
        return $string;
    }
}
