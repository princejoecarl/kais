@extends('adminlte::page')
@section('title', $procedure->name)
@section('content_header')
    <h1>Edit {{$procedure->name}}
        <small><a href="{{route('skill.detail', compact('skill'))}}">{{$skill->name}}</a> </small>
    </h1>
@stop
@section('content')
   <div class="row-fluid">
       <div class="col-md-6">
           <div class="row">
               <form method="POST" action="{{ route('skill.procedure.update', compact('skill', 'procedure')) }}">
                   @csrf
                   <div class="form-group">
                       <label for="#name">Name:</label>
                       <input type="text" name="name" id="name" value="{{$procedure->name}}">
                   </div>
                   <div class="form-group">
                       <label for="#description">Description:</label>
                       <textarea rows="4" cols="50" name="description" id="description">{{$procedure->description}}</textarea>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary">Update</button>
                   </div>
               </form>
           </div>
       </div>
       <div class="col-md-6">
           <div class="row-fluid">
               <video id="player" playsinline controls autoplay>
                   <source src="{{"/" . $procedure->video_url}}" type="video/mp4" />
               </video>
           </div>
           <div class="row">
               <p>{{$procedure->description}}</p>
           </div>
       </div>
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