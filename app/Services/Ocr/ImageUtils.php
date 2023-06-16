<?php

/*
 * webdirect | ImageUtils.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 3/25/2023 2:09 PM
*/

namespace App\Services\Ocr;

use Imagick;

class ImageUtils
{
    public static function resize($image, $width, $height)
    {
        $destImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($destImage, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
        return $destImage;
    }

    public function fillMissingPixels($bmap)
    {
        $width = imagesx($bmap);
        $height = imagesy($bmap);

        for ($x = 10; $x < $width - 10; $x++) {
            for ($y = 10; $y < $height - 10; $y++) {
                $pixel = imagecolorsforindex($bmap, imagecolorat($bmap, $x, $y));

                if ($pixel['red'] != 0 && $pixel['green'] != 0 && $pixel['blue'] != 0) {
                    $neighbors = [
                        imagecolorsforindex($bmap, imagecolorat($bmap, $x + 1, $y)),
                        imagecolorsforindex($bmap, imagecolorat($bmap, $x - 1, $y)),
                        imagecolorsforindex($bmap, imagecolorat($bmap, $x, $y - 1)),
                        imagecolorsforindex($bmap, imagecolorat($bmap, $x, $y + 1)),
                    ];

                    foreach ($neighbors as $neighbor) {
                        if ($neighbor['red'] == 0 && $neighbor['green'] == 0 && $neighbor['blue'] == 0) {
                            imagesetpixel($bmap, $x, $y, imagecolorallocate($bmap, 255, 0, 0));
                            break;
                        }
                    }
                }
            }
        }

        for ($x = 10; $x < $width - 10; $x++) {
            for ($y = 10; $y < $height - 10; $y++) {
                $pixel = imagecolorsforindex($bmap, imagecolorat($bmap, $x, $y));
                if ($pixel['red'] == 255 && $pixel['green'] != 255 && $pixel['blue'] != 255) {
                    imagesetpixel($bmap, $x, $y, imagecolorallocate($bmap, 0, 0, 0));
                }
            }
        }

        return $bmap;
    }

    /**
     * @throws \ImagickException
     */
    public function fillHoles($bmap)
    {
        // Notă: Biblioteca GD nu oferă o funcție directă pentru a umple golurile.
        // Va trebui să implementați o soluție personalizată sau să utilizați o altă bibliotecă, cum ar fi Imagick, pentru a realiza acest lucru.

        // Aici este un exemplu de cum să umpleți golurile folosind biblioteca Imagick.
        // Aveți nevoie de extensia Imagick instalată și activată în PHP pentru a folosi această funcție.

        $imagick = new Imagick();
        $imagick->readImageBlob(imagejpeg($bmap, null, 100));

        $clone = clone $imagick;
        $clone->negateImage(false);
        $clone->morphologyImage(Imagick::MORPHOLOGY_CLOSE, 1, "3x3");
        $clone->blurImage(2, 2);
        $clone->thresholdImage(0.5 * Imagick::getQuantum());
        $clone->blurImage(2, 2);
        $clone->morphologyImage(Imagick::MORPHOLOGY_OPEN, 1, "3x3");

        $imagick->compositeImage($clone, Imagick::COMPOSITE_MULTIPLY, 0, 0);
        $imagick->setImageFormat('jpeg');

        $filledBmap = imagecreatefromstring($imagick->getImageBlob());
        return $filledBmap;
    }

    public static function removeNoise($bmap)
    {
        $width = imagesx($bmap);
        $height = imagesy($bmap);

        $output = imagecreatetruecolor($width, $height);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($bmap, $x, $y);
                $colors = imagecolorsforindex($bmap, $rgb);

                $r = $colors['red'];
                $g = $colors['green'];
                $b = $colors['blue'];

                if ($r < 162 && $g < 162 && $b < 162) {
                    $color = imagecolorallocate($output, 0, 0, 0);
                } else {
                    $color = imagecolorallocate($output, 255, 255, 255);
                }

                imagesetpixel($output, $x, $y, $color);
            }
        }

        return $output;
    }

    public static function setGrayscale($img)
    {
        $width = imagesx($img);
        $height = imagesy($img);
        $output = imagecreatetruecolor($width, $height);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($img, $x, $y);
                $colors = imagecolorsforindex($img, $rgb);

                $r = $colors['red'];
                $g = $colors['green'];
                $b = $colors['blue'];
                $gray = (int)(0.299 * $r + 0.587 * $g + 0.114 * $b);

                $color = imagecolorallocate($output, $gray, $gray, $gray);
                imagesetpixel($output, $x, $y, $color);
            }
        }

        return $output;
    }
    public static function toBlackAndWhiteOnly($bmp)
    {
        $width = imagesx($bmp);
        $height = imagesy($bmp);
        $output = imagecreatetruecolor($width, $height);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($bmp, $x, $y);
                $colors = imagecolorsforindex($bmp, $rgb);

                $r = $colors['red'];
                $g = $colors['green'];
                $b = $colors['blue'];
                $avg = ($r + $g + $b) / 3;
                $bw = $avg < 128 ? 0 : 255;

                $color = imagecolorallocate($output, $bw, $bw, $bw);
                imagesetpixel($output, $x, $y, $color);
            }
        }

        return $output;
    }
    public static function cropImage($img, $cropArea = null)
    {
        if ($cropArea === null) {
            $cropArea = ['x' => 400, 'y' => 10, 'width' => 700, 'height' => 300];
        }

        $output = imagecreatetruecolor($cropArea['width'], $cropArea['height']);
        imagecopy($output, $img, 0, 0, $cropArea['x'], $cropArea['y'], $cropArea['width'], $cropArea['height']);

        return $output;
    }
    public static function openImage($imagePath)
    {
        $imageInfo = getimagesize($imagePath);
        $imageType = $imageInfo[2];

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($imagePath);
            case IMAGETYPE_PNG:
                return imagecreatefrompng($imagePath);
            case IMAGETYPE_GIF:
                return imagecreatefromgif($imagePath);
            default:
                throw new InvalidArgumentException('Unsupported image type: ' . $imageType);
        }
    }
}
