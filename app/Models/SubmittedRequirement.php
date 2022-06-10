<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmittedRequirement extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([

        'requirement_id'  ,
        'requirement_status',
        'signed_status',
        'rejection_reason',
        'submitted_by' ,
       'approved_by',
       'submitted_request_id',
        //
        'created_by'   ,
        'updated_by',
        //file
        'file_name',
        'file_path',
        'file'
    ]);
    public function submitted_requests()
    {
        return $this->belongsTo(SubmittedRequest::class,'submitted_request_id');
    }
    public function requirements()
    {
        return $this->belongsTo(Requirement::class,'requirement_id');
    }
    public function approved_by_user()
    {
        return $this->belongsTo(User::class,'approved_by');
    }
    public function submitted_by_user()
    {
        return $this->belongsTo(User::class,'submitted_by');
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
