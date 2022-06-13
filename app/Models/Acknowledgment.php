<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Acknowledgment extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function receipts(){
        return $this->belongsTo(User::class,'receipt_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
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
