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
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name</label>
                      <input type="text" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Photo</label>
                      <input type="text" name="photo" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" rows="30" name="description" placeholder="Deskripsi product" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">description</label>
                        </div>
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