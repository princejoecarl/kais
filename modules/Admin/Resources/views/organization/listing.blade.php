@extends('adminlte::page')

@section('content')
    <div class="row">
        @foreach($organizations as $organization)
            <div class="col-md-4">
                <p>
                    <a class="text-bold" href="{{route('admin.organization.detail', compact('organization'))}}">{{$organization->name}}</a>
                </p>
                <span>{{Str::limit($organization->about, 100)}}</span>
                <br>
                <br>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
@stop
