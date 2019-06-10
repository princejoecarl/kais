@extends('adminlte::page')
@section('content_header')
    <h1>Forum</h1>
@stop
@section('content')
    <div class="row">
        <table class="table table-responsive table-bordered">
            <thead>
                <th>Topic</th>
                <th>Author</th>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>
                            <a href="{{route('learner.forum.topic.discussion', compact('topic'))}}">{{$topic->title}}</a>
                        </td>
                        <td>""</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection