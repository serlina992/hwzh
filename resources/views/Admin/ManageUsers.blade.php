@extends('Base.Navbar')

@section('title','Manage Users')

@section('body')
    <main class="d-flex justify-content-center mt-3 p-1">
        <div class="w-50">
            @foreach ($results as $user)
                <div class="border border-2 rounded mb-2 bg-light">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column p-2">
                            <h2 for="Class Code">{{$user->user_id}}</h2>
                            <b >{{$user->class_code}}</b>
                            <label for="" class="mt-2">{{$user->full_name}}</label>
                        </div>
                        {{-- <div class="d-flex align-self-center">
                            <img src="{{asset('images/assets/next_icon.png')}}" class="img-responsive" style="height:40px" alt="">
                        </div> --}}
                        <div class="d-flex align-self-center flex-column p-2">
                            <div class="d-flex flex-column">
                                <a href="/user-profile/{{$user->user_id}}">
                                    <button class="btn btn-warning" style="width:80px">Edit</button>
                                </a>
                            </div>
                            <form action="/delete-user/{{$user->user_id}}" method="POST" class="mt-3">
                                @csrf
                                <button class="btn btn-danger" type="submit" style="width:80px">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <a class="text-decoration-none text-dark" href="/new-user">
                <button class="btn btn-primary w-100 mt-3 mb-1">New User</button>
            </a>
        </div>
    </main>
@endsection
