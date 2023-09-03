@extends('Base.Navbar')

@section('title','User Profile')

@section('body')
    <main class="form-signin d-flex align-items-center justify-content-center">
        <div class="w-75 d-flex justify-content-center border border-5 rounded p-3">
            @if($user != null)
                <form action="/edit-user/{{$user->user_id}}" method="POST" class="w-100 d-flex flex-column">
                    @csrf
                    <div class="w-100 d-flex justify-content-center">
                        <div class="w-100 d-flex flex-column">
                            <div class="w-100 d-flex flex-row">
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>User ID</label>
                                        <input type="text" disabled="true" class="form-control" id="userId" name="userId" value="{{$user->user_id}}" placeholder="User ID">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" value="{{$user->full_name}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Class Code</label>
                                        <input type="text" class="form-control" id="classCode" name="classCode" placeholder="Class Code" value="{{$user->class_code}}">
                                    </div>
                                </div>
                            </div>

                            <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            @else
                <form action="/save-new-user" method="POST" class="w-100 d-flex flex-column">
                    @csrf
                    <div class="w-100 d-flex justify-content-center">
                        <div class="w-100 d-flex flex-column">
                            <div class="w-100 d-flex flex-row">
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>User ID</label>
                                        <input type="text" class="form-control" id="userId" name="userId" placeholder="User ID">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                                    </div>
                                </div>
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Class Code</label>
                                        <input type="text" class="form-control" id="classCode" name="classCode" placeholder="Class Code">
                                    </div>
                                </div>
                            </div>

                            <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </main>
@endsection


