<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmittedRequest extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([
        'reference_number',
        'student_number',
        'request_id',
        'status',
    ]);

    public function requests(){
        return $this->belongsTo(Request::class, 'request_id');
    }
 
}
