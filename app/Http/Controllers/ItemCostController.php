<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;
use App\Models\item_cost;
use App\Models\total_item_cost;

class ItemCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('itemcosts.index');
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
        Log::debug(__CLASS__."::".__FUNCTION__." Called");
       
        $validator = \Validator::make($request->all(), [
        'cost'=>'required|Integer|min:0',
        'fname'=>'required|regex:/^(?![\s.]+$)[a-zA-Z\s.]*$/',
        ]);

        if ($validator->fails()) {
            Log::error(__CLASS__."::".__FUNCTION__." Validation Failed");
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try{
            DB::transaction(function () use ($request){
                        $item_cost = new item_cost([
                            'name' => $request->get('fname'),
                            'cost' => $request->get('cost'),
                        ]);
                        $item_cost->save();

                        $total_item_cost = total_item_cost::find(1);
                        $total_item_cost->total = $total_item_cost->total + $request->get('cost');
                        $total_item_cost->save();
            });
            Log::info(__CLASS__."::".__FUNCTION__." Saved");
            return redirect()->back()->with('message', 'New Entry Added!');
        }catch(\Exception $e){
            return redirect()
                    ->back()
                    ->withErrors($e->getMessage());
        }



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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
