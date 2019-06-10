@extends('adminlte::page')
@section('content_header')

    <br>
    <form method="GET" action="{{route('organization.trainer.create')}}">
        <button class="btn btn-primary">Add Trainer</button>
    </form>
@stop
@section('content')
    <div class="row">
    @foreach($trainers as $trainer)
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ '/' . $trainer->image_url}}" alt="Trainer photo">

                    <h3 class="profile-username text-center"><a class="text-bold" href="{{route('organization.trainer.detail', compact('trainer'))}}">{{$trainer->name}}</a></h3>

                    {{--<p class="text-muted text-center">{{Str::limit($trainer->description, 100)}}</p>--}}
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="clearfix"></div>
@endsection