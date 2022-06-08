<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use Uuids, HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];

    protected $fillable = (['requirement_name','request_id','status','created_by','updated_by',]);

    public function requests(){
        return $this->belongsTo(Request::class, 'request_id');
    }
    //
    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
