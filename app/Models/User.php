<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
//class User extends Model
class User extends Authenticatable
{
   
    use HasFactory;
    use Uuids;
    protected $fillable = ['username','password', 'user_type_id','status'];
    public function usertype(){
        return $this->belongsTo('App\Models\UserType', 'user_type_id');
    }

}
