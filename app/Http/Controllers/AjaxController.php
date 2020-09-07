<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Ajax;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ajax.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ajax = Ajax::create([
            'name' => $request->product,
            'user_id' => Auth::user()->id
        ]);
        $msg = "Data Successfully Added";
        return response()->json(array('msg'=> $msg), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Ajax::findOrFail($id);
        return view('ajax.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ajax = Ajax::whereId($id)->update([
            'name' => $request->product,
            'user_id' => Auth::user()->id
        ]);
        $msg = "Data Successfully Updates";
        return response()->json(array('msg'=> $msg), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Ajax::whereId($id)->delete();
        $msg = "Data Deleted Successfully";
        return response()->json(array('msg'=> $msg), 200);
    }
}
