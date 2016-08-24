@extends('auth.layout')

@section('content')
    <form class="login-form" method="post" action="{!! url('/register') !!}">

        {!! csrf_field() !!}
        <div class="form-title">
            <span class="form-title">Sign Up</span>
        </div>
        <p class="hint"> Enter your personal details below: </p>

        <div class="form-group ">
            <input type="text" class="form-control" name="name" value="{!! old('name') !!}" placeholder="Full Name">
        </div>

        <div class="form-group ">
            <input type="email" class="form-control" name="email" value="{!! old('email') !!}" placeholder="Email">
        </div>

        <div class="form-group ">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="form-group ">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
        </div>

        <div class="form-group margin-top-20 margin-bottom-20">
            <label class="check">
                <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
        </div>

        <!-- /.col -->
        <div class="form-group ">
            <button type="submit" class="btn btn red btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
    </form>

    @endsection