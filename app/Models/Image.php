<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'file', 'dimention', 'user_id', 'slug'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function uploadDate(){
        return $this->created_at->diffForHumans();
    }

    public static function makeDirectory() {
        $subFolder = 'images/' . date('y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

    public static function getDimention($image) {
        [$width, $height] = getimagesize(Storage::path($image));
        return $width . "*" . $height;
    }

    public static function scopePublished($query) {
        return $query->where('is_published', true);
    }

    public function fileUrl() {
        return Storage::url($this->file);
    }

    public function permalink(){
        return $this->slug ? route("images.show", $this->slug) : '#';
    }

    public function route($method, $key = 'id'){
        return route("images.{$method}", $this->$key);
    }

    public function getSlug()
    {
        $slug = str($this->title)->slug();
        $numSlugFound = static::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();
        if ($numSlugFound > 0) {
            return $slug . "-" . $numSlugFound + 1;
        }
        return $slug;
    }

    protected static function booted(){
        static::creating( function($image){
            if ($image->title) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::creating( function($image){
            if ($image->title && !$image->slug) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::deleted( function($image){
            Storage::delete($image->file);
        });
    }
}
