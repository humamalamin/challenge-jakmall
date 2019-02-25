@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">

                <div class="panel-body">
                    <h1>Prepaid Balance</h1>
                    <form class="form-horizontal" method="POST" action="{{ route('topup.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Mobile Number" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <select id="value" class="form-control" name="value" placeholder="Value" required>
                                    <option value=10000>10.000</option>
                                    <option value=50000>50.000</option>
                                    <option value=100000>100.000</option>
                                </select>

                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
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
