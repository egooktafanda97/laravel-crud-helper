<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleDriveCloud extends Controller
{
    public function putImage(Request $request)
    {
        $response = $this->UploadCloudDrive($request, "photo");
        return response()->json($response);
    }
    public function UploadCloudDrive($request, $nameFile)
    {
        if ($request->hasFile($nameFile)) {
            $validator = \Validator::make($request->all(), [
                $nameFile         => "mimes:jpg,png,jpeg,JPG,PNG,JPEG",
            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "msg" => $validator->messages()], 402);
            }
            $image = $request->file($nameFile);
            $image_name = \Str::random() . time() . '.' . $image->getClientOriginalExtension();
            $imgFile = \Image::make($image->getRealPath());
            $imgFile->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            \Storage::cloud()->put($image_name, $imgFile);
            return ["status" => true, "msg" => "berhasil upload gambar", "fileName" => $image_name];
        } else {
            return ["status" => false, "msg" => "tidak ada gambar"];
        }
    }
    public function getFileCloud($filenames)
    {
        $fileName = $filenames;
        // Get file listing...
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(\Storage::cloud()->listContents($dir, $recursive));

        // Get file details...
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($fileName, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($fileName, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!


        // $readStream = \Storage::cloud()->getDriver()->readStream($file['path']);
        // $targetFile = storage_path("downloaded-{$fileName}");
        // file_put_contents($targetFile, stream_get_contents($readStream), FILE_APPEND);
        $readStream = \Storage::cloud()->getDriver()->readStream($file['path']);

        return response()->stream(function () use ($readStream) {
            fpassthru($readStream);
        }, 200, [
            'Content-Type' => $file['mimetype'],
            //'Content-disposition' => 'attachment; filename="'.$filename.'"', // force download?
        ]);
    }
}
