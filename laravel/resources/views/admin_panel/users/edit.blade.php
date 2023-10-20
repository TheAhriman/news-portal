@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{$user->name}}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email"
                   value="{{$user->email}}">

            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="password"
                   value="{{$user->password}}">

            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role_id"
                    id="role_id">
                @foreach($roles as $role)
                    <option
                        {{$user->role->id == $role->id ? ' selected' : ''}}
                        value={{$role->id}}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.users.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection