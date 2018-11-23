<?php

namespace JackNersary;

use Illuminate\Database\Eloquent\Model;

class Notification_tb extends Model
{
    //
	protected $fillable = [
        'name', 'email_from', 'reason',
    ];
}
