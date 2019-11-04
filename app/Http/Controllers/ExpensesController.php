<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index()
    {
        $expenses = expenses::all();
        return view('expenses.index')->with('expenses',$expenses);
        
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'total' => 'required',
        ]);
   
        expenses::create($request->all());
    
        return  redirect(route('expenses.index'));
    }

    public function show(Expenses $expenses)
    {
        //
    }

    public function edit($id)
    {
        $expenses = expenses::find($id);
        return view('expenses.edit',compact('expenses','id'));
       
    }

    public function update(Request $request, Expenses $expenses)
    {
        $request->validate([
            'title' => 'required',
            'product_code' => 'required',
            'description' => 'required',
        ]);
         
        $update = [
            'title' => $request->title, 
            'description' => $request->description];

        expenses::where('id',$expenses)->update($update);
   
        return  redirect(route('expenses.index'));
    }

    public function destroy($id)
    {
        expenses::where('id',$id)->delete();
   
        // return Redirect::to('expenses.index')->with('success','Product deleted successfully');
        return  redirect(route('expenses.index'));
    }
     
}