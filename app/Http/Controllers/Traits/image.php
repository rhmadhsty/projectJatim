<?php

use App\Http\Controllers\Traits;
use Illuminate\Http\Request;

trait ImageUplouding {
    public function storeImage(Request $request)
    {
        $path = storage_path('tmp\uplouds');

        if (!file_exists($path)) {
            mkdir($path, 0075,true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'=>$name,
            'original_name'=>$file->getClientOriginalName(),
        ]);
    }
}