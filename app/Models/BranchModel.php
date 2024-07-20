<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    use HasFactory;
    protected $table ='branches';
    protected $guarded = ['id','created_at','updated_at'];

    public function location(){
        return $this->belongsTo(LocationModel::class,'location_id');
    }
}
