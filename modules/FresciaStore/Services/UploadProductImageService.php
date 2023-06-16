<?php

namespace Modules\FresciaStore\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadProductImageService
{
    public function downloadAndSaveImage(
        $imageUrl,
        $destinationPath,
        $fileName,
        $width = 900,
        $height = 900,
        $padding = 20
    ): ?string {
        $client = new Client();

        try {
            $response = $client->request('GET', $imageUrl, ['stream' => true]);
        } catch (\Exception $e) {
            return null;
        }

        $contentType = $response->getHeaderLine('content-type');

        $extensions = [
            'image/jpeg' => '.jpg',
            'image/png' => '.png',
        ];

        $extension = $extensions[$contentType] ?? null;

        if ($extension) {
            $fullFileName = $fileName . $extension;

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, false, true);
            }
            try {
                $imageContent = $response->getBody()->getContents();
                // Redimensionare imagine
                $image = Image::make($imageContent)->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                if (file_put_contents($destinationPath . '/' . $fullFileName, (string) $image->encode())) {
                    return $fullFileName;
                }
                return null;
            } catch (\Exception $e) {
                Log::stack(['slack'])->error("Write image temporary failed", [
                    "file" => __FILE__  ,
                    "line" => __LINE__,
                    "error_return" => $e
                ]);
                return null;
            }
        }
        return null;
    }
}
