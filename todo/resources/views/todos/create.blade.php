@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Todo</div>

                <div class="card-body">
                    <form>
                        @csrf
                        <div class="form-group mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" class="form-control" cols="5" rows="5">

                          </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
