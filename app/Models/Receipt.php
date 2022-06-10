<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Receipt extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([
        'submitted_request_id',
        'receipt_no',
        'fee',
        'paid_status',
        'item',
        'details',
        'certified_by',
        'signed_status',
        'status',
        'created_by',
        'updated_by',
    ]);

    //
    public function submitted_requests()
    {
        return $this->belongsTo(SubmittedRequest::class,'submitted_request_id');
    }
    public function certified_by_user()
    {
        return $this->belongsTo(User::class,'certified_by');
    }
    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}
