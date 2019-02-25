@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h1>Order History</h1>

                    <form action="" class="form-horizontal" method="get">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <button type="submit" class="btn btn-default">Search</button>
                    </form><br><br>
                    
                    @foreach($data as $key)
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <table style="border:none">
                                        <tr>
                                            <td>
                                                <table style="border:none">
                                                    <tr>
                                                        <td>
                                                            <small>{{ $key->order_no }}  Rp {{ number_format($key->total,0,".",".")}} </small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{$key->topup->value}} for {{ $key->topup->phone}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                @if($key->status == 0)
                                                <a href="/pay/{{$key->order_no}}" class="btn btn-primary float-right">Pay now</a>
                                                @elseif($key->status == 1)
                                                <p class="text-success float-right">Success</p>
                                                @elseif($key->status == 2)
                                                <p class="text-warning float-right">Failed</p>
                                                @elseif($key->status == 3)
                                                <p class="text-danger float-right">Canceled</p>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    {{-- <p></p> --}}
                                    {{-- <p>{{$key->topup->value}} for {{ $key->topup->phone}}</p> --}}
                                </li>
                            </ul>

                        </div>
                    </div>
                    @endforeach

                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection