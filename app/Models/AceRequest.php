<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class AceRequest extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([
        'ace_total_units_on_regi',
        'ace_academic_year_from',
        'ace_academic_year_to',
        'ace_type',
        'submitted_request_id',
        //
        'created_by', 
        'updated_by',
        'status',
    ]);

    public function tagged_subjects(){
        return $this->hasMany('App\Model\TaggedSubject');
    }

    public function submitted_requests()
    {
        return $this->belongsTo(SubmittedRequest::class,'submitted_request_id');
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
