<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Step extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    
    protected $fillable = ['step_number','step_name','completed_status','request_id'];

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
