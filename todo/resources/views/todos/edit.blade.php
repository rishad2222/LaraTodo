@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Todo') }}</div>

                <div class="card-body">
                    <form method="post" action = "{{ route('todo.update') }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="form-group mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $todo->title }}">

                        </div>
                        <div class="form-group mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control" cols="5" rows="5">
                            {{ $todo->description }}
                          </textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
