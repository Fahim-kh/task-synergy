<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =['id','created_at','updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function managedEmployees() {
        return $this->belongsToMany(User::class, 'branch_manager_employee', 'branch_manager_id', 'employee_id');
    }
    public function manager() {
        return $this->belongsToMany(User::class, 'branch_manager_employee', 'employee_id', 'branch_manager_id');
    }
    function branch_manager(){
        return $this->hasOne(BranchManagerModel::class);
    }
    public function location(){
        return $this->belongsTo(LocationModel::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permission()
    {
        return $this->hasMany(RolePermission::class, 'role_id','role_id');
    }

    public function getmodules()
    {
        $perms = $this->permission()->select(DB::raw("GROUP_CONCAT(module_id SEPARATOR ',') as `modules`"))->where('pview', '=', '1')->first();
        $modules = Module::with(['childs' => function($query) use($perms){
                $query->whereIn('id', explode(',', $perms->modules));
            }
        ])->whereIn('id', explode(',', $perms->modules))->where('parent_id', 0)->orderBy('sorting')->get();
        return $modules;
    }
    public function hasPer($perm = null)
    {
        if(is_null($perm)) return false;
        $module = Module::where('name',$perm)->first();
        $perms = $this->permission()->select('pview','pedit','pcreate','pdelete')->where('module_id', '=', $module->id)->first();
        return ($perms) ? $perms->toArray() : [];

    }

}
