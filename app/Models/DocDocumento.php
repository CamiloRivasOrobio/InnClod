<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model
{
    use HasFactory;
    public $table = "doc_documentos";
    public $primaryKey = 'doc_id';
    protected $fillable = ["doc_nombre", "doc_codigo", "doc_contenido", "doc_id_tipo", "doc_id_proceso", "doc_id_tipo"];
    public $timestamps = true;
    public function tipodoc()
    {
        return $this->belongsTo(TipTipoDoc::class, 'doc_id_tipo', 'tip_id');
    }
    public function proproceso()
    {
        return $this->belongsTo(ProProceso::class, "doc_id_proceso", "pro_id");
    }
}