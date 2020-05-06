<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromDate($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromDate($value)->diffForHumans();
    }
}
