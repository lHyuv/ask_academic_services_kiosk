<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
//class User_Type extends Model
class UserType extends Authenticatable
{

    use HasFactory;
    use Uuids;
    public function user(){
        return $this->hasOne('App\Models\User');
    }
    protected $fillable = ['user_type_name', 'status'];
}
