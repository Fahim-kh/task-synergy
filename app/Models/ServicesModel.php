<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AditionalServicesModel;

class ServicesModel extends Model
{
    use HasFactory;
    protected $table ='services';
    protected $guarded =['id','created_at','updated_at'];

    public function subservices(){
        return $this->hasMany(SubServicesModel::class,'service_id');
    }
}
