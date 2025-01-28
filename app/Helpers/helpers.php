<?php

use Carbon\Carbon;

function getSmallDateWithHour($date)
{
    $created_at = Carbon::parse($date);

    $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
    $fecha = $created_at->day . ' ' . $meses[($created_at->month) - 1] . ". " . $created_at->year . ". " . $created_at->format('g:i A');

    return $fecha;
}