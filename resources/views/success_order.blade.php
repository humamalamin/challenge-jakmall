@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h1>Success!</h1>
                    <div class="form-group">
                        <label for="" class="col-md-6">Order No.</label>
                        <label for="" class="col-md-6">{{$create->order_no}}</label>
                        <label for="" class="col-md-6">Total</label>
                        <label for="" class="col-md-6">Rp {{ number_format($create->total,0,".",".")}}</label>
                    </div>
                    <div class="form-group">
                        <p>{{$message}}</p>
                    </div>
                    <div class="form-group">
                        <a href="/pay/{{$create->order_no}}" class="btn btn-primary col-md-12">Pay now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection