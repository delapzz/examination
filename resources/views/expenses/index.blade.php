@extends('layouts.app')

@section('content')
<div class = "container">
<div class = "row justify-content-center">
<div class = "col-md-8">
<div class = "card">
<div class = "card-header">Expenses <a href="{{ route('expenses.create') }}" class="btn btn-success col-md-2">Add</a> </div>

  
                    <div class = "card-body">

                        <table class = "table">
                            <thead>
                              <tr>
                                <th scope = "col">category</th>
                                <th scope = "col">description</th>
                                <th scope = "col">action</th>

                              </tr>
                            </thead>
                            
                                    @foreach ( $expenses  as $e)
                              <tr>

                                    <td scope = "row">{{ $e->category }}</td>
                                    <td>{{ $e->total }}</td>
                                    <td><a href="{{ route('expenses.edit',$e->id) }}" class="btn btn-primary float-left">Edit</a>
                                    <form action="{{ route('expenses.destroy', $e->id)}}" method="post">
                                     {{ csrf_field() }}
                                     @method('DELETE')
                                     <button class="btn btn-danger float-left" type="submit">Delete</button>
                                   </form>
                                   </td>
                              </tr>
                              @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection