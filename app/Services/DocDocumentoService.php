<?php
namespace App\Services;

use App\Http\Requests\DocDocumentoRequest;
use App\Interfaces\DocDocumentoInterface;
use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\TipTipoDoc;

class DocDocumentoService implements DocDocumentoInterface
{
    protected ResponseService $response;
    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    public function createDocument(DocDocumentoRequest $request)
    {
        $succeeded = false;
        $message = "";
        $erros = null;
        $data = [];
        $num = 0;
        do {
            $num++;
            $data1 = TipTipoDoc::where('tip_id', "=", $request->doc_id_tipo)->get()->firstOrFail();
            $data2 = ProProceso::where('pro_id', "=", $request->doc_id_proceso)->get()->firstOrFail();
            $codigo = $data1->tip_prefijo . "-" . $data2->pro_prefijo . "-" . $num;
            $data = DocDocumento::where('doc_codigo', '=', $codigo)->get();
        }
        while ($data->count() > 0);

        $data = DocDocumento::create([
            'doc_id' => 'integer',
            "doc_nombre" => $request->doc_nombre,
            "doc_codigo" => $codigo,
            "doc_contenido" => $request->doc_contenido,
            "doc_id_tipo" => $request->doc_id_tipo,
            "doc_id_proceso" => $request->doc_id_proceso,
        ]);
        $message = "Se ha realizado el registro exitosamente.";
        $succeeded = true;
        return response()
            ->json([
                'succeeded' => $succeeded,
                'message' => $message,
                'error' => $erros,
                'data' => $codigo,
            ]);
    }

    public function getAllDocuments()
    {
        $data = DocDocumento::paginate(request()->query('pageSize'));
        return $this->response->pagedResult(
            true,
            "Se ha realizado la actualización exitosamente.",
            null,
            $data->items(), $data->currentPage(), request()->query('pageSize'), $data->total()
        );
    }
    public function updateDocument($id, DocDocumentoRequest $request)
    {
        $data = DocDocumento::find($id);
        $data->doc_nombre = $request->doc_nombre;
        $data->doc_contenido = $request->doc_contenido;
        $data->save();
        return $this->response->result(true, "Se ha realizado la actualización exitosamente.", null, $data->doc_id, );
    }
    public function deleteDocument($id)
    {
        $response = $this->response->result();
        $data = DocDocumento::find($id);
        if ($data->count() == 0)
            $response = $this->response->result(false, "No se han encontrado un registro con el id; ", null, null);
        else {
            $data->delete();
            $response = $this->response->result(true, "Se ha realizado la eliminado exitosamente.", null, $data);
        }
        return $response;
    }
    public function GetByIdDocument($id)
    {
        $message = null;
        $data = DocDocumento::where("doc_id", "=", $id)->get();
        if ($data->count() == 0)
            $message = "No se han encontrado un registro con el id; " . $id;

        return $this->response->result(true, $message, null, $data->firstOrFail());
    }
}