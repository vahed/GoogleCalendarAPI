<?php

namespace JackNersary;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['title','event_type','start','end'];
}