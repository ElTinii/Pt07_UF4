<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    //He afegit el camp title i el content per poder afegir un article
    protected $fillable = [
        'title', 
        'content'
    ];

    protected $primaryKey = 'article_id';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
