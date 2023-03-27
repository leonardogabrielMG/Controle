<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sipag;

class SipagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sipag = new Sipag();
        $sipags = Sipag::All();
        return view("sipag.index", [
            "sipag" => $sipag,
            "sipags" => $sipags
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
        if ($request->get("id") != ""){
            $sipag = Sipag::Find($request->get("id"));
        }else{
            $sipag = new Sipag();
        }
        $sipag->nome = $request->get("nome");
        $sipag->state = $request->get("state");
        $sipag->pa = $request->get("pa");

        $sipag->Save();
        $request->Session()->Flash("status", "salvo");

        return redirect("/sipag");


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sipag = Sipag::Find($id);
        $sipags = Sipag::All();
        return view("sipag.index", [
            "sipag" => $sipag,
            "sipags" => $sipags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        Sipag::Destroy($id);
        $request->Session()->Flash("status", "excluido");

        return redirect("/sipag");
    }
}
