<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Draft extends Model
{
    /** @use HasFactory<\Database\Factories\DraftFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function image() {
        return $this->image != null ? url($this->image) :
        (($this->id <= config("app.placeholder_limit")) ?
            'https://unsplash.it/1280/720?image='.$this->id :
            "https://placehold.co/1280x720");
    }

    public static function upload_file_to_public(string $privateDirectory, string $publicDirectory)
    {
        $sourceDisk = Storage::disk('local');
        $destinationDisk = Storage::disk('public');

        if($sourceDisk->exists($privateDirectory))
        {
            throw new \Exception("File not found in private storage");
        }

        $explodedDirectory = explode("/", $privateDirectory);
        // Get rid of base domain of the url
        $privatePath = "";
        for($i = 3; $i < count($explodedDirectory); $i++)
        {
            $privatePath .= $explodedDirectory[$i]."/";
        }

        $filename = Str::uuid().'.'.pathinfo($privateDirectory)["extension"];
        $length = strlen($publicDirectory);
        // in the case when a '/' was not specified add it, otherwise just append filename
        $publicPath = $publicDirectory.(($publicDirectory[$length-1] == "/") ? $filename : "/".$filename);

        try {
            $stream = $sourceDisk->readStream($privatePath);
            $destinationDisk->writeStream($publicPath, $stream);

            $sourceDisk->delete($privateDirectory);
        }
        catch(\Exception $e)
        {
            throw new \Exception("Could not move draft image to blog directory: ".$e->getMessage());
        }

        return [
            "directory" => $publicDirectory,
            "filename" => $filename
        ];
    }
}
