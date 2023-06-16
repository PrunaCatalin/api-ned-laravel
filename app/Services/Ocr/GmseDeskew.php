<?php

/*
 * webdirect | GmseDeskew.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 3/25/2023 1:58 PM
*/

namespace App\Services\Ocr;

class GmseDeskew
{
// Representation of a line in the image.

// The image resource
    private $cBmp;
    // The range of angles to search for lines
    private $cAlphaStart = -20;
    private $cAlphaStep = 0.2;
    private $cSteps = 40 * 5;
    // Precalculation of sin and cos.
    private $cSinA;
    private $cCosA;
    // Range of d
    private $cDMin;
    private $cDStep = 1;
    private $cDCount;
    // Count of points that fit in a line.
    private $cHMatrix;

    public function __construct($bmp)
    {
        $this->cBmp = $bmp;
        $this->init();
    }

// Calculate the skew angle of the image cBmp.
    public function getSkewAngle()
    {
        $this->calc();
        $hl = $this->getTop(20);

        $sum = 0;
        $count = 0;

        for ($i = 0; $i < count($hl); $i++) {
            $sum += $hl[$i]->alpha;
            $count += 1;
        }

        return $sum / $count;
    }

// Hough Transformation

    public function getAlpha($index)
    {
        return $this->cAlphaStart + $index * $this->cAlphaStep;
    }

// Calculate all lines through the point (x,y).

    private function calc()
    {
        $hMin = (int)((imagesy($this->cBmp) / 4));
        $hMax = (int)((imagesy($this->cBmp) * 3 / 4));

        for ($y = $hMin; $y <= $hMax; $y++) {
            for ($x = 1; $x <= imagesx($this->cBmp) - 2; $x++) {
                if ($this->isBlack($x, $y)) {
                    if (!$this->isBlack($x, $y + 1)) {
                        $this->calcLines($x, $y);
                    }
                }
            }
        }
    }

// Calculate the Count lines in the image with most points.
    public function calcDIndex($d)
    {
        return (int)($d - $this->cDMin) / $this->cDStep;
    }
    private function calcLines($x, $y)
    {
        for ($alpha = 0; $alpha < $this->cSteps; $alpha++) {
            $d = $y * $this->cCosA[$alpha] - $x * $this->cSinA[$alpha];
            $dIndex = $this->calcDIndex($d);
            $index = $dIndex * $this->cSteps + $alpha;

            $this->cHMatrix[$index] += 1;
        }
    }

    private function getTop($count)
    {
        $hl = array();

        for ($i = 0; $i < $count; $i++) {
            $hl[$i] = new HougLine();
        }

        for ($i = 0; $i < count($this->cHMatrix); $i++) {
            if ($this->cHMatrix[$i] > $hl[$count - 1]->count) {
                $hl[$count - 1]->count = $this->cHMatrix[$i];
                $hl[$count - 1]->index = $i;
                $j = $count - 1;
                while ($j > 0 && $hl[$j]->count > $hl[$j - 1]->count) {
                    $tmp = $hl[$j];
                    $hl[$j] = $hl[$j - 1];
                    $hl[$j - 1] = $tmp;
                    $j -= 1;
                }
            }
        }

        for ($i = 0; $i < $count; $i++) {
            $dIndex = (int)($hl[$i]->index / $this->cSteps);
            $alphaIndex = $hl[$i]->index - $dIndex * $this->cSteps;
            $hl[$i]->alpha = $this->getAlpha($alphaIndex);
            $hl[$i]->d = $dIndex + $this->cDMin;
        }

        return $hl;
    }

    private function init()
    {
        $angle = 0;

        $this->cSinA = array();
        $this->cCosA = array();

        for ($i = 0; $i < $this->cSteps; $i++) {
            $angle = $this->getAlpha($i) * pi() / 180.0;
            $this->cSinA[$i] = sin($angle);
            $this->cCosA[$i] = cos($angle);
        }

        $this->cDMin = -imagesx($this->cBmp);
        $this->cDCount = (int)(2 * (imagesx($this->cBmp) + imagesy($this->cBmp) / $this->cDStep));
        $this->cHMatrix = array_fill(0, $this->cDCount * $this->cSteps, 0);
    }

    private function isBlack($x, $y)
    {
        $index = imagecolorat($this->cBmp, $x, $y);
        $c = imagecolorsforindex($this->cBmp, $index);
        $luminance = (0.299 * $c['red']) + (0.587 * $c['green']) + (0.114 * $c['blue']);
        return $luminance < 140;
    }
}
