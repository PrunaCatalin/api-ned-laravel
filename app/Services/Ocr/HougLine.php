<?php
/*
 * webdirect | HougLine.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 3/25/2023 2:02 PM
*/

namespace App\Services\Ocr;

class HougLine
{
    // Count of points in the line.
    public $count;
    // Index in Matrix.
    public $index;
    // The line is represented as all x,y that solve y*cos(alpha)-x*sin(alpha)=d
    public $alpha;
    public $d;
}
