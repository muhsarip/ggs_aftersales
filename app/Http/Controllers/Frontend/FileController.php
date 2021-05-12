<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    public function _upload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $fileName = $request->file('file')->store('public/files');

        return response()->json(['fileName' => $fileName], 200);
    }

    public function upload(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
        ]);

        $fileName = "";

        // skip compress pdf
        if ($request->file('file')->getMimeType() == 'application/pdf') {
            $fileName = $request->file('file')->store('public/files');
        } else {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('/storage/files');

            $img = Image::make($file->getRealPath());
            $img->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);
            $fileName = "public/files/" . $fileName;
        }

        return response()->json(['fileName' =>  $fileName], 200);
    }
}
