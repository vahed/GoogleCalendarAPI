<?php
	
namespace JackNersary;

use Illuminate\Database\Eloquent\Model;

class Child_review_booking extends Model
{
    protected $fillable = ['title','teacher_name','start','end','detail'];
}