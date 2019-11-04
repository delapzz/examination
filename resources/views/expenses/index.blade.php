@extends('layouts.app')

@section('content')
<div class = "container">
<div class = "row justify-content-center">
<div class = "col-md-8">
<div class = "card">
<div class = "card-header">Expenses</div>
<a href="{{ route('expenses.create') }}" class="btn btn-success mb-2">Add</a> 
  
                    <div class = "card-body">

                        <table class = "table">
                            <thead>
                              <tr>
                                <th scope = "col">category</th>
                                <th scope = "col">total</th>
                                <th scope = "col">action</th>

                              </tr>
                            </thead>
                            
                                    @foreach ( $expenses  as $e)
                              <tr>

                                    <td scope = "row">{{ $e->category }}</td>
                                    <td>{{ $e->total }}</td>
                                    <td><a href="{{ route('expenses.edit',$e->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                    <form action="{{ route('expenses.destroy', $e->id)}}" method="post">
                                     {{ csrf_field() }}
                                     @method('DELETE')
                                     <button class="btn btn-danger" type="submit">Delete</button>
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
@endsection
