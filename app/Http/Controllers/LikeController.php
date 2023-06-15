<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $number = Like::find(4);

        if ($number) {
            // Increment the count
            $number->likes++;
            $number->save();
        }

        return response()->json(['blogs' => $number ? $number->count : null]);
    }
}
