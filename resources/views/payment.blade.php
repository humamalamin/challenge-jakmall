@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h1>Pay our order</h1>
                    <form action="{{ route('pay.create') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" class="form-control" name="order_no" placeholder="Nomor Order" value="{{ $order_no}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary col-md-12" type="submit">Pay now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection