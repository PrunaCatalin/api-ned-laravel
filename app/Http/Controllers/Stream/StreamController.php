<?php

namespace App\Http\Controllers\Stream;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StreamController extends Controller
{
    //
    public function streamData(Request $request): StreamedResponse
    {
        return response()->streamDownload(function () {
            echo "Titit";
        }, 'user.txt');
    }
}
