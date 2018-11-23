<?php

namespace JackNersary;

use Illuminate\Database\Eloquent\Model;

class School_club_booking extends Model
{
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'session_name','session1','session2','child_name', 'd_o_b', 'parent_name','phone','email','payment',
    ];
}
