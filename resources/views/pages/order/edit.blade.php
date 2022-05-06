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
                <form action="{{ route('order.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product</label>
                        <select class="form-select" name="id_product" aria-label="Default select example">
                            @foreach ($products as  $product)                                
                                <option value="{{ $product->id }}" @if ($order->id_product == $product->id) selected @endif >{{ $product->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name pembeli</label>
                        <input type="text" value="{{ $order->user }}" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Harga</label>
                      <input type="text" value="{{ $order->harga }}" class="form-control" id="exampleInputPassword1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <?php $status = ['success', 'pending', 'cancel'] ?>
                            @for ($index = 0; $index < 3; $index++)                                
                                <option value="{{ $status[$index] }}" @if ($status[$index] == $order->status) selected @endif >{{ $status[$index] }}</option>
                            @endfor
                          </select>
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