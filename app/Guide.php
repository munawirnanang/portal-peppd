<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_category', 'name', 'description', 'title_picture', 'file'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
