@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection()
@section('main')

    <div>
        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 80%; padding: 30px">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Shortlink</th>
                        <th scope="col">Long URL</th>
                    </tr>
                    </thead>
                    @php
                        $serial = 1;
                    @endphp
                    <tbody>
                    @foreach($data_list as $data)
                        <tr>
                            <td scope="row" style="width: 6%">{{$serial++}}</td>
                            <td><a href="{{env('APP_URL').'/'.$data->short_id}}" target="_blank">{{env('APP_URL').'/'.$data->short_id}}</a></td>
                            <td><a href="{{$data->long_url}}" target="_blank">{{$data->long_url}}</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
