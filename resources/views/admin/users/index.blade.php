@extends('layouts.app')

@section('content')
<div class = "container">
<div class = "row justify-content-center">
<div class = "col-md-8">
<div class = "card">
<div class = "card-header">Users</div>

                    <div class = "card-body">

                        <table class = "table">
                            <thead>
                              <tr>
                                <th scope = "col">name</th>
                                <th scope = "col">email</th>
                                <th scope = "col">roles</th>
                                <th scope = "col">action</th>

                              </tr>
                            </thead>
                            <tbody>
                                    @foreach ($users as $item)
                              <tr>
                                    <td scope = "row">{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ implode(' , ',$item->roles()->get()->pluck('name')->toArray() )}}</td>
                                    <td>
                                            <a href = "{{ route('admin.users.edit',$item->id) }}"><button type = "button" class = "btn btn-primary float-left">Edit</button></a>
                                         
                                    <form action="{{ route ('admin.users.destroy',$item->id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                                <button type = "submit" class = "btn btn-warning float-left">Delete</button></a>
                                            </form>
                                    </td>
                              </tr>
                              @endforeach
                         <table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
