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
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name Product</th>
                            <th>Name Customer</th>
                            <th>Harga</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            
                            <tr>
                                <td>{{ $order->product }}</td>
                                <td>{{ $order->user }}</td>
                                <td>{{ $order->harga }}</td>
                                <td>
                                    @if ($order->status == "pending") 
                                        <span class="badge bg-warning">{{ $order->status }}</span>
                                    @elseif ($order->status == "success")
                                        <span class="badge bg-success">{{ $order->status }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('order.edit', $order->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('order.delete', $order->id) }}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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