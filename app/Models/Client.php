<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([
        'last_name',
        'first_name',
        'middle_name',
        'extension_name',
        'student_number',
        'user_id',
        'year',
        'section',
        'status',
        //
        'semester_id',
        'program_id',
        //
        'created_by',
        'updated_by',
    ]);
    public function request(){
        return $this->hasOne('App\Models\Request');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
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
