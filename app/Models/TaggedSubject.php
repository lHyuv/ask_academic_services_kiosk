<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaggedSubject extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([
        'ace_request_id',
        'subject_id',
        'day',
        'time_from',
        'time_to',
        'room_id',
        'no_of_units',
        'acad_head',
        'tagged_by',
        'acknowledged_id',
        'status',
        'created_by',
        'updated_by',
    ]);

    public function tagged_by_user()
    {
        return $this->belongsTo(User::class,'tagged_by');
    }

    public function acad_heads()
    {
        return $this->belongsTo(User::class,'acad_head');
    }

    public function acknowledgments()
    {
        return $this->belongsTo(User::class,'acknowledged_id');
    }

    public function ace_requests()
    {
        return $this->belongsTo(AceRequest::class, 'ace_request_id');
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
