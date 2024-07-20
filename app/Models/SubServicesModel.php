<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServicesModel extends Model
{
    use HasFactory;
    protected $table = 'sub_services';
    protected $guarded = ['id','created_at','updated_at'];

    public function services(){
        return $this->belongsTo(ServicesModel::class,'service_id','id');
    }
}
