<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEOModel extends Model
{
    use HasFactory;
    protected $table = 'web_seo';
    protected $guarded = ['id','created_at','updated_at'];
}
