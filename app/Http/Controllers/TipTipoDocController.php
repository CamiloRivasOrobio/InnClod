<?php

namespace App\Http\Controllers;

use App\Models\TipTipoDoc;
use Illuminate\Http\Request;

class TipTipoDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TipTipoDoc::get();
        return response()
            ->json([
                'succeeded' => true,
                'message' => null,
                'error' => null,
                'data' => $data,
                'pageNumber' => 1,
                'pageSize' => 10,
                'totalItems' => 100
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipTipoDoc $tipTipoDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipTipoDoc $tipTipoDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipTipoDoc $tipTipoDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipTipoDoc $tipTipoDoc)
    {
        //
    }
}