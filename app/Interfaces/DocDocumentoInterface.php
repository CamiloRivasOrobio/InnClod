<?php

namespace App\Interfaces;

use App\Http\Requests\DocDocumentoRequest;

interface DocDocumentoInterface
{

    public function createDocument(DocDocumentoRequest $request);
    public function getAllDocuments();
    public function updateDocument($id, DocDocumentoRequest $request);
    public function deleteDocument($id);
    public function getByIdDocument($id);
}