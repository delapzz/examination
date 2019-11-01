@extends('layouts.app')

@section('content')
<div class = "container">
<div class = "row justify-content-center">
<div class = "col-md-8">
<div class = "card">
<div class = "card-header">Expenses</div>

                    <div class = "card-body">

                        <table class = "table">
                            <thead>
                              <tr>
                                <th scope = "col">category</th>
                                <th scope = "col">total</th>
                                <th scope = "col">action</th>

                              </tr>
                            </thead>
                            
                                    @foreach ($expenses as $e)
                              <tr>

                                    <td scope = "row">{{ $e->category }}</td>
                                    <td>{{ $e->total }}</td>
                                
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
