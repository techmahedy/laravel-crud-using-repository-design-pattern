@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($user) ? "Edit User" : "Create User" }}</div>

                <div class="card-body">
                <form id="itemFrom" role="form" method="POST"
                    action="{{ isset($user) ? route('user.update',$user->id) : route('user.create') }}">
                  @csrf
                  @isset($user)
                      @method('PUT')
                  @endisset
  
                  <div class="card-body">

                    <div class="form-group">
                        <label for="type">Name</label>
                        <input type="text" name="name" value="{{ $user->name ?? '' }}">
                    </div>
                       
                    <div class="form-group">
                        <label for="type">Email</label>
                        <input type="text" name="email" value="{{ $user->email ?? '' }}">
                    </div>
  
                      <button type="submit" class="btn btn-primary">
                          @isset($user)
                              <i class="fas fa-arrow-circle-up"></i>
                              <span>Update</span>
                          @else
                              <i class="fas fa-plus-circle"></i>
                              <span>Create</span>
                          @endisset
                      </button>
  
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
