<?php
/*
 * webdirect | TextExtractor.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 3/25/2023 1:48 PM
*/

namespace App\Services\Ocr;

use thiagoalessio\TesseractOCR\TesseractOCR;

class TextExtractor
{
    protected static $tesseract;

    public static function getTesseract()
    {
        if (static::$tesseract === null) {
            static::$tesseract = new TesseractOCR();
            $publicStoragePath = storage_path('app/public/tesseract');
            static::$tesseract->lang('eng');
        }
        return static::$tesseract;
    }

    public static function extractText($bitmapFilePath)
    {
        $tesseract = static::getTesseract();
        $textInImage = $tesseract->image($bitmapFilePath)->run();
        return $textInImage;
    }
}
