<?php

class Asset extends Eloquent {
	
	protected $table = 'assets';
	protected $fillable = [];
	protected $hidden = array('id', 'created_at', 'updated_at');
	
	public function metadata() {
		return $this->hasMany('MetadataItem');
	}
		
}
