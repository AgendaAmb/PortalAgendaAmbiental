<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Models\Correos;
use Illuminate\Http\Request;

class CorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(SendEmailRequest $request)
    {

    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function show(Correos $correos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function edit(Correos $correos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correos $correos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Correos  $correos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correos $correos)
    {
        //
    }
}
