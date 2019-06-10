@extends('adminlte::page')
@section('title', $procedure->name)
@section('content_header')
    <h1>{{$procedure->name}}
        <small><a href="{{route('skill.detail', compact('skill'))}}">{{$skill->name}}</a> </small>
        <a href="{{route('skill.procedure.edit', compact('skill', 'procedure'))}}" class="btn btn-primary"><i class="fa fa-wrench"></i></a>
    </h1>
@stop
@section('content')
    <div class="row-fluid">
        <video id="player" playsinline controls autoplay>
            <source src="{{"/" . $procedure->video_url}}" type="video/mp4" />
        </video>
    </div>
    <div class="row">
        <p>{{$procedure->description}}</p>
    </div>
@endsection

@section('js')
    <script src="https://cdn.plyr.io/3.5.3/plyr.js"></script>
    <script src="https://cdn.plyr.io/3.5.3/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player', {
            sources: [
                {
                    src: '{{"/" . $procedure->video_url}}',
                    type: 'video/mp4',
                },
            ],
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.3/plyr.css" />
@stop