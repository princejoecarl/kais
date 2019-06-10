@extends('adminlte::page')

@section('content')
    <div class="row">
        <form method="POST" action="{{route('skill.procedure.submit', compact('skill'))}}">
            @csrf
            <div class="form-group">
                <label for="name">Procedure</label>
                <input type="text" id="name" name="name" placeholder="Procedure Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Short Description"></textarea>
            </div>
            <div class="form-group">
                <button>Submit</button>
            </div>
        </form>
    </div>
@endsection