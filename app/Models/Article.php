<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $table= 'articles';
    protected $fillable = ['title', 'content_art','photo','category_id','created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
}
