<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_article', 'name', 'email', 'comment'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
}
