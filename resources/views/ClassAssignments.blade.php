@extends('base.navbar')

@section('title','Assignments')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="d-flex justify-content-center mt-3 p-1">
        <div class="w-50">
            @foreach ($results as $assignment)
                @if($type != '')
                    <a class="text-decoration-none text-dark" href="/class-assignments-result/{{$class_code}}/{{$assignment->id}}">
                        <div class="border border-2 rounded mb-2 bg-light">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column p-2">
                                    <h5 for="Class Code">{{$assignment->title}}</h5>
                                    <label for="Description">{{$assignment->description}}</label>
                                </div>
                                <div class="d-flex align-self-center">
                                    <img src="{{asset('images/assets/next_icon.png')}}" class="img-responsive" style="height:40px" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif(Auth::user()->role_code == 'STD')
                    <a class="text-decoration-none text-dark" href="/upload-class-assignments/{{$class_code}}/{{$assignment->id}}">
                        <div class="border border-2 rounded mb-2 bg-light">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column p-2">
                                    <h5 for="Class Code">{{$assignment->title}}</h5>
                                    <label for="Description">{{$assignment->description}}</label>
                                </div>
                                <div class="d-flex align-self-center">
                                    <img src="{{asset('images/assets/next_icon.png')}}" class="img-responsive" style="height:40px" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                @elseif(Auth::user()->role_code == 'LEC')
                    <div class="text-decoration-none text-dark" href="/class-assignments-detail/{{$class_code}}/{{$assignment->id}}">
                        <div class="border border-2 rounded mb-2 bg-light">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column p-2">
                                    <h5 for="Class Code">{{$assignment->title}}</h5>
                                    <label for="Description">{{$assignment->description}}</label>
                                </div>
                                <div class="d-flex align-self-center flex-column p-2">
                                    <div class="d-flex flex-column">
                                        <a href="/class-assignments-detail/{{$class_code}}/{{$assignment->id}}">
                                            <button class="btn btn-warning" style="width:80px">Edit</button>
                                        </a>
                                    </div>
                                    <form action="/delete-class-assignment/{{$class_code}}/{{$assignment->id}}" method="POST" class="mt-3">
                                        @csrf
                                        <button class="btn btn-danger" type="submit" style="width:80px">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
            @if(Auth::user()->role_code == 'LEC' && $type == '')
                <div class="w-100 mt-3">
                    <a href="/class-assignments-detail/{{$class_code}}/0">
                        <button class="btn btn-primary w-100">New</button>
                    </a>
                </div>
            @endif
        </div>
    </main>
@endsection


