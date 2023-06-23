<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTipoDoc extends Model
{
    use HasFactory;
    public $table = "tip_tipo_docs";
    public $primaryKey = 'tip_id';
    protected $fillable = ["tip_prefijo", "tip_nombre"];
    public $timestamps = true;
}