@extends('Base.Navbar')

@section('title','Home')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="text-center d-flex justify-content-center mt-3">
        <div class="w-50">
            @foreach ($results as $forum)
                <div class="border border-2 rounded mb-2 bg-light p-1">
                    <div class="w-100 d-flex flex-row align-items-start p-1">
                        <div class="d-flex justify-content-start w-75">
                            <h3>{{$forum->title}}</h3>
                        </div>
                        @if(Auth::user()->role_code == 'LEC')
                            <div class="d-flex justify-content-end w-25 me-3">
                                <div class="btn-group dropdown">
                                    <div type="button" data-bs-toggle="dropdown">
                                        <img src="{{asset('images/assets/more_icon.svg')}}" style="height:5vh" class="img-responsive" alt="">
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownForums">
                                    <a class="dropdown-item" href="/edit-forum/{{$forum->forum_id}}">Edit</a>
                                    <form action="/delete-forum/{{$forum->forum_id}}" method="post">@csrf<button class="dropdown-item" type="submit">Delete</button></form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="post-content border-1 border-bottom d-flex justify-content-center" style="height:45vh">
                        <img src="{{asset('storage/files/forums/'.$forum->forum_image)}}" class="img-responsive" alt="">
                    </div>
                    <div class="d-flex justify-content-start text-start p-2">
                        <p for="Post Description">{{$forum->forum_description}}</p>
                    </div>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <b >{{$forum->created_at}}</b>
                        <a href="/forum-detail/{{$forum->forum_id}}"><button class="btn btn-primary">Comment</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection


