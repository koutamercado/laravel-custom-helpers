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
