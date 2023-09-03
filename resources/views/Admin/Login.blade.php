@extends('base.Master')

@section('title','Login')

@section('body')
    <main class="form-signin d-flex align-items-center justify-content-center" style="height:100vh">
        <div class="w-50 d-flex justify-content-center border border-5 rounded p-3 text-center">
            <form action="/admin/login" method="POST" class="d-flex flex-column">
                @csrf
                <img src="{{asset('images/assets/logo.png')}}" class="img-responsive mb-3" style="width:20vw; height:25vh" alt="">
                <div class="form-floating mb-3">
                    <input name="userId" type="text" class="form-control" id="floatingUserId" placeholder="Username">
                    <label for="floatingUserId">User ID</label>
                </div>
                <div class="form-floating mb-5">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-secondary" type="submit">Login</button>
            </form>
        </div>
    </main>
@endsection


