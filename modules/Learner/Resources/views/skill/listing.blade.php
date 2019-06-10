@extends('adminlte::page')
@section('content_header')

@stop
@section('content')
    <div class="row">
    @foreach($skills as $skill)
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ '/' . $skill->image_url}}" alt="skill poster">

                    <h3 class="profile-username text-center"><a class="text-bold" href="{{route('learner.skill.detail', compact('skill'))}}">{{$skill->name}}</a></h3>

                    <p class="text-muted text-center">{{Str::limit($skill->description, 100)}}</p>
                    @if(strtolower($skill->knowledge_level) == "beginner")
                        <p class="text-success text-bold text-center">{{ucwords($skill->knowledge_level)}} Level</p>
                    @elseif(strtolower($skill->knowledge_level) == "intermediate")
                        <p class="text-green text-bold text-center">{{ucwords($skill->knowledge_level)}} Level</p>
                    @else(strtolower($skill->knowledge_level) == "advance")
                        <p class="text-danger text-bold text-center">{{ucwords($skill->knowledge_level)}} Level</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="clearfix"></div>
@endsection