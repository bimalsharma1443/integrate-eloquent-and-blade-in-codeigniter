<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class City extends Eloquent{
	protected $table = "city";
	protected $fillable = ['city_name'];
}
