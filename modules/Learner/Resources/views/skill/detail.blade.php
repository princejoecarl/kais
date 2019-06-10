@extends('adminlte::page')
@section('content_header')
    <h1>
        {{$skill->name}}
        <small>{{$skill->description}}</small>
    </h1>
@stop

@section('content')
    <div class="row">
        @foreach($procedures as $procedure)
            <div class="col-md-4">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-thumbnail center-block" src="{{"/" . $procedure->poster_url}}" alt="procedure poster">

                    <h3 class="profile-username text-center">
                        <a class="text-bold" href="{{route('learner.skill.procedure.detail', compact('procedure', 'skill'))}}">
                            {{$procedure->name}}
                        </a>
                    </h3>
                    <p class="text-muted text-center">{{Str::limit($procedure->description, 100)}}</p>
                </div>
            </div>
        @endforeach
    <div class="clearfix"></div>
    </div>
@endsection