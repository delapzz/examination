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
    
        return Redirect::to('expenses.index')->with('success','Greate! Product created successfully.');
    }

    public function show(Expenses $expenses)
    {
        //
    }

    public function edit(Expenses $expenses)
    {
        $where = array('id' => $expenses);
        $data['category'] = expenses::where($where)->first();
 
        return view('expenses.edit', $expenses);
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
   
        return Redirect::to('expenses.index')
       ->with('success','Great! Product updated successfully');
    }

    public function destroy(Expenses $expenses)
    {
        expenses::where('id',$id)->delete();
   
        return Redirect::to('expenses.index')->with('success','Product deleted successfully');
    }
     
}