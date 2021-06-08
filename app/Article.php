<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //jika table bukan plural (Cont : s/es) maka gunakan
    //contoh
    //protected $table = 'article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_category', 'title', 'slug', 'description', 'title_picture', 'text', 'author', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
