<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;

    public $table = 'orders_detail';

    public function desc_articulo()
     {
         return $this->belongsTo(Articulo::class, 'id_articulo');
     }
}
