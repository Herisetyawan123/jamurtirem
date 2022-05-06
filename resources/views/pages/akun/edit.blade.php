@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if (session()->has('success'))                    
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div class="card-body">
                <form action="{{ route('akun.update') }}" method="post">

                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Role</label>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option selected>Open this select role</option>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                          </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        autoFill: true
    } );
} );
</script>
@endsection