<?php
/*
 * webdirect | ToolsServices.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 5/12/2023 6:20 PM
*/

namespace Modules\FresciaStore\Services;

use Illuminate\Support\Carbon;

class ToolsServices
{
    /**
     * @param $numDays
     * @return string
     */
    public function calculateWeekdayRange($numDays): string
    {
        $weekdays = ['luni', 'marți', 'miercuri', 'joi', 'vineri', 'sâmbătă', 'duminică'];
        $startDay = Carbon::now()->startOfWeek(); // Începe cu ziua de luni

        // Ajustează numărul de zile dacă depășește numărul total de zile într-o săptămână
        $numDays = min($numDays, count($weekdays));

        $endDayIndex = $numDays - 1; // Scade 1 pentru a obține indexul corect în array

        return "de " . $weekdays[0] . " pana " . $weekdays[$endDayIndex];
    }
}
