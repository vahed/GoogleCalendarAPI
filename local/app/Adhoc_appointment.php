<?php

namespace JackNersary;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Adhoc_appointment extends Model
{
    //
	protected $fillable = [
        'name', 'date', 'reason',
    ];
}
