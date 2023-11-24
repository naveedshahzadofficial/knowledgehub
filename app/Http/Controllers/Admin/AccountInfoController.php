<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountInfo;
use App\Models\Rlco;
use Illuminate\Http\Request;

class AccountInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @return \Illuminate\Http\Response
     */
    public function index(Rlco $rlco)
    {
        return view('admin.account-info.index', compact('rlco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @return \Illuminate\Http\Response
     */
    public function create(Rlco $rlco)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rlco  $rlco
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Rlco $rlco)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\AccountInfo  $accountInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Rlco $rlco, AccountInfo $accountInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\AccountInfo  $accountInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Rlco $rlco, AccountInfo $accountInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\AccountInfo  $accountInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rlco $rlco, AccountInfo $accountInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rlco  $rlco
     * @param  \App\Models\AccountInfo  $accountInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rlco $rlco, AccountInfo $accountInfo)
    {
        //
    }
}
