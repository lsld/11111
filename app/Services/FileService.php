<?php
namespace Services;


use Exception;
use Illuminate\Http\UploadedFile;

class FileService
{

    public function upload(UploadedFile $file, $path)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            $size = $file->getSize();
            $newPath = sha1(rand(11111,999999).time()).'.'.$extension;
            $file->move($path, $newPath);
            return [$newPath, $originalName, $size];
        } catch (Exception $e) {    
            throw new Exception("Image upload fails!");
        }
    }

    public function delete($path)
    {
        try{
            unlink($path);
        } catch (Exception $e) {
           // throw new Exception("Image not available. ");
        }
    }

    public function rename($path, $name)
    {

    }
}