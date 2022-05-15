<?php

namespace App\Http\Controllers;

use App\Models\LigneCommande;
use App\Http\Requests\StoreLigneCommandeRequest;
use App\Http\Requests\UpdateLigneCommandeRequest;

class LigneCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLigneCommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLigneCommandeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function show(LigneCommande $ligneCommande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function edit(LigneCommande $ligneCommande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLigneCommandeRequest  $request
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLigneCommandeRequest $request, LigneCommande $ligneCommande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LigneCommande  $ligneCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneCommande $ligneCommande)
    {
        //
    }
}
