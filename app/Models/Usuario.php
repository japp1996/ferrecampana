<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use App\Models\Auditoria;

	class Usuario extends Model	{
		public $timestamps = false;
	    protected $table = "users";

	    public function auditoria() {
	    	$this->belongsToMany(Auditoria::class, 'CI_RIF');
	    }
	}
