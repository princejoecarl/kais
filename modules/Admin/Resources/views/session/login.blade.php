@extends('layout.blank')
@section('content')
    <div id="app" class="card white" style="width: 20rem;">
        <div class="container-fluid" style="height: inherit;">
            <img class="img-fluid" src="{{\asset('images/logo.jpg')}}" style="padding-top: 15px;" alt="">
            <h2 class="text-center">
                KAIS
            </h2>
            <h5 class="text-center"><small>Knowledge Archiving Information System</small></h5>
        </div>
        <div class="card-body container-fluid white">
            <form method="POST" action="{{ \route('admin.login.attempt') }}">
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
                <div class="md-form">
                    <i class="fa fa-user-circle-o prefix"></i>
                    <label for="defaultForm-username" class="">Username:</label>
                    <input type="text" id="defaultForm-username" class="form-control" name="username" required minlength=1 value="{{\old('username')}}">
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <label for="defaultForm-pass">Password:</label>
                    <input type="password" id="defaultForm-pass" class="form-control" required minlength=1 name="password">
                </div>
                <div class="text-center">
                    <button dusk="login-button" class="btn btn-block btn-primary waves-effect waves-light">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ \asset('js/app.js') }}" type="text/javascript"></script>
@endpush