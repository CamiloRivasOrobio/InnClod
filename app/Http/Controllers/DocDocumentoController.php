<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocDocumentoRequest;
use App\Models\DocDocumento;
use App\Models\ProProceso;
use App\Models\Response;
use App\Models\TipTipoDoc;
use App\Services\DocDocumentoService;
use Illuminate\Http\Request;
use Validator;

class DocDocumentoController extends Controller
{
    public DocDocumentoService $documentoService;
    public function __construct(DocDocumentoService $documentoService)
    {
        $this->documentoService = $documentoService;
    }
    public function index()
    {
        return $this->documentoService->getAllDocuments();
    }
    public function create(DocDocumentoRequest $request)
    {
        return $this->documentoService->createDocument($request);
    }
    public function update($id, DocDocumentoRequest $request)
    {
        return $this->documentoService->updateDocument($id, $request);
    }
    public function delete($id)
    {
        $this->documentoService->deleteDocument($id);
    }
    public function show($id)
    {
        return $this->documentoService->GetByIdDocument($id);
    }
}