<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'title',
        'description',
        'published_date',
        'author_id',
        'genre_id',
        'user_id',
    ];
    
    public function author()
    {
        return $this->belongsTo(\App\Models\Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(\App\Models\Genre::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
