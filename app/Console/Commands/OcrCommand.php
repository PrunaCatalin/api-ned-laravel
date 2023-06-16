<?php

namespace App\Console\Commands;

use App\Services\Ocr\ImageDeskewer;
use App\Services\Ocr\ImageUtils;
use App\Services\Ocr\TextExtractor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class OcrCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ocr:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orginalImage = storage_path("app/alexandru.jpeg");
        $newImage = storage_path("app/buletin_new.jpeg");

        $bmp = ImageUtils::openImage($orginalImage);
        $bmp = ImageDeskewer::deskew($bmp);
        $imageUtils = ImageUtils::setGrayscale($bmp);
        // Salvați imaginea într-un fișier (opțional)
        imagejpeg($imageUtils, $newImage, 100); // 100 = calitate maximă
        imagedestroy($imageUtils);
        ImageUtils::toBlackAndWhiteOnly($imageUtils);

        $text = TextExtractor::extractText($newImage);

       dd($text);
        return Command::SUCCESS;
    }
}
