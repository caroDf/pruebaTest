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
        return $this->belongsto(\App\Models\Author::class);
    }

    public function genre()
    {
        return $this->belongsto(\App\Models\Genre::class);
    }

    public function user()
    {
        return $this->belongsto(\App\Models\User::class);
    }
}
