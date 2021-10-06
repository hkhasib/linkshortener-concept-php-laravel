@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection()
@section('main')

    <div>
        <div class="col d-flex justify-content-center">
            <div class="card" style="width: 50%; padding: 30px">
                <form method="post" action="{{route('store.shortlink')}}">
                    @csrf
                    <div class="form-group">
                        <label>Long URL</label>
                        <input name="url" type="url" class="form-control" placeholder="Enter Link">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create ShortLink</button>
                </form>
            </div>
        </div>
    </div>
@endsection
