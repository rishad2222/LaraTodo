@extends('layouts.app')

@section('style')

<style>
        #outer
    {
        width:auto;
        text-align: center;
    }
    .inner
    {
        display: inline-block;
    }
</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo List</div>



                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route ('todo.create') }}" class="inner btn btn-sm btn-primary"> Create Todo</a>
                    </div>
                    @if (Session::has('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (count($todos)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Complete</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td>{{ $todo->title }}</td>
                                        <td>{{ Illuminate\Support\Str::limit(strip_tags($todo->description) , 35) }}</td>
                                        <td>
                                            @if ($todo->is_completed ==1)
                                                <a class="btn btn-sm btn-success" href="">Completed</a>
                                            @else
                                                <a class="btn btn-sm btn-danger" href="">Not Completed</a>
                                            @endif
                                        </td>
                                        <td id="outer">
                                            <a class="inner btn btn-sm btn-success" href="{{ route('todo.edit' , $todo->id) }}">Edit</a>
                                            <a class="inner btn btn-sm btn-info" href="{{ route('todo.show' , $todo->id) }}">View</a>
                                            <form method="post" class="inner" action="{{ route('todo.destroy') }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                    @else
                        <h4>No Todos Created</h4>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
