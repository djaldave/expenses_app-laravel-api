<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json(['data' => $transactions]);
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
        $transaction = new Transaction();
        $transaction->id = $request->id;
        $transaction->title = $request->title;
        $transaction->amount = $request->amount;
        $transaction->date = $request->date;
        $transaction->save();

        return response()->json(['status' => 'Success', 'message' => 'Transaction Saved',"data sent" => $transaction]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Transaction::find($id)==null){
            $transaction = Transaction::find($id);
            return response()->json(['status' => 'Success', 'data' => $transaction]);
        }else{
            return response()->json(["error"=>"no transaction found"]);
        }
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
        if(!Transaction::find($id)==null){
            Transaction::find($id);
            Transaction::find($id);
            $transaction = Transaction::find($id);
            $transaction->title = $request->title;
            $transaction->amount = $request->amount;
            $transaction->date = $request->date;
            $transaction->save();
            return response()->json(['status' => 'Success', 'message' => 'Transaction Updated']);
        }else{
            return response()->json(["error"=>"no transaction found"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Transaction::find($id)==null){
            $transaction = Transaction::find($id);
            $transaction->delete();
            return response()->json(['status' => 'Success', 'Message' => 'Transaction Deleted']);
        }else{
            return response()->json(["error"=>"no transaction found"]);
        }
        
    }
}
