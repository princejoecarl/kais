@extends('adminlte::page')

@section('content')
    <div class="row">
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger text-xs">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Skill Name</label>
                <input type="text" id="name" name="name" placeholder="Skill Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Short Description"></textarea>
            </div>
            <div class="form-group">
                <label>Select image to upload:</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label>Knowledge Level:</label>
                <select name="knowledge_level">
                    @foreach($knowledgeLevels as $level)
                        <option value="{{$level}}"> {{$level}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button>Submit</button>
            </div>
        </form>
    </div>
@endsection