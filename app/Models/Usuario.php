<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use App\Models\Auditoria;
	use App\Models\Pedido;

	class Usuario extends Model	{
		public $timestamps = false;
	    protected $table = "users";
	    protected $primaryKey = "number";

	    public function pedidos() {
	 		return $this->hasMany(Pedido::class, 'number');
	    }
	}
