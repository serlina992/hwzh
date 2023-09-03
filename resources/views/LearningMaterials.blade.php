@extends('Base.Navbar')

@section('title','Learning Materials')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="text-center d-flex justify-content-center mt-3">
        <div class="w-50">
            @foreach ($results as $material)
                <div class="border border-2 rounded mb-2 bg-light">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column text-start p-2 w-100">
                            <h6 for="Class Code">{{$material->title}}</h6>
                            <label for="Description">{{$material->description}}</label>
                            <div class="d-flex justify-content-around mt-5">
                                <a href="{{asset('storage/files/'.$material->material_link)}}"><button class="btn btn-primary" style="width:100px">Material</button></a>
                                <a href="{{$material->video_link}}"><button class="btn btn-primary" style="width:100px">Video</button></a>
                            </div>
                        </div>
                        <div class="d-flex align-self-center flex-column pe-2">
                            @if(Auth::user()->role_code == 'LEC')
                                <div class="d-flex flex-column">
                                    <a href="/learning-materials-detail/{{$material->id}}">
                                        <button class="btn btn-warning" style="width:80px">Edit</button>
                                    </a>
                                </div>
                                <form action="/delete-learning-material/{{$material->id}}" method="POST" class="mt-3">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" style="width:80px">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @if(Auth::user()->role_code == 'LEC')
            <a href="/learning-materials-detail/0" >
                <button class="w-100 btn btn-success mb-3 mt-1">New Material</button>
            </a>
            @endif
        </div>
    </main>
@endsection
