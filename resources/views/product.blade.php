@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">

                <div class="panel-body">
                    <h1>Product Page</h1>
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <textarea id="product" class="form-control" name="product" placeholder="Product" required autofocus>
                                    {{ old('product') }}
                                </textarea>

                                @if ($errors->has('product'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shipping_address') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <textarea class="form-control" name="shipping_address" placeholder="Shipping Address" required>
                                        {{ old('shipping_address') }}
                                </textarea>

                                @if ($errors->has('shipping_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" placeholder="Price" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
