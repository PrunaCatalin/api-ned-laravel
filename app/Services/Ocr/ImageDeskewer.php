<?php
/*
 * webdirect | ImageDeskewer.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 3/25/2023 1:56 PM
*/

namespace App\Services\Ocr;

class ImageDeskewer
{
    public static function deskew($bmpIn)
    {
        $sk = new GmseDeskew($bmpIn);
        $skewangle = $sk->getSkewAngle();
        return self::rotateImage($bmpIn, -$skewangle);
    }

    private static function rotateImage($bmp, $angle)
    {
        $width = imagesx($bmp);
        $height = imagesy($bmp);

        $tmp = imagecreatetruecolor($width, $height);
        imagefill($tmp, 0, 0, imagecolorallocate($tmp, 255, 255, 255));
        $tmp = imagerotate($tmp, $angle, imagecolorallocate($tmp, 255, 255, 255));
        imagecopy($tmp, $bmp, 0, 0, 0, 0, $width, $height);

        return $tmp;
    }
}
