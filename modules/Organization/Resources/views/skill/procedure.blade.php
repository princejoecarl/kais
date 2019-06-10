@extends('adminlte::page')
@section('content_header')
    <h1>
        {{$skill->name}}
        <small>
            {{$skill->description}}
            <a href="{{route('skill.edit', compact('skill'))}}" class="btn btn-info"><i class="fa fa-wrench"></i></a>
        </small>

    </h1>

    <br>
    <br>
    <form method="GET" action="{{route('skill.procedure.create', compact('skill'))}}">
        <button class="btn btn-primary">Add Procedure</button>
    </form>
@stop

@section('content')
    <div class="row">
        @foreach($procedures as $procedure)
            <div class="col-md-4">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-thumbnail center-block" src="{{"/" . $procedure->poster_url}}" alt="procedure poster">

                    <h3 class="profile-username text-center">
                        <a class="text-bold" href="{{route('skill.procedure.detail', compact('procedure', 'skill'))}}">
                            {{$procedure->name}}
                        </a>
                    </h3>

                    <p class="text-muted text-center">{{Str::limit($procedure->description, 100)}}</p>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
@endsection