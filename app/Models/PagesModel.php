<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $guarded = ['id','created_at','updated_at'];
    public function parentPage()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    // Relationship: a page can have many child pages
    public function childPages()
    {
        return $this->hasMany(Page::class, 'page_id');
    }
}
