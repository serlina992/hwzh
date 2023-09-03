@extends('Base.Navbar')

@section('title','Forum')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
<main class="form-signin d-flex align-items-center justify-content-center" style="height:100vh">
    <div class="w-75 d-flex justify-content-center border border-secondary border-5 rounded p-3">
        @if($forum != null)
            <form action="/edit-forum/{{$forum->forum_id}}" method="POST" class="w-100 d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <label class="mb-3 mt-1 text-center" style="font-size:40px">New Forum</label>
                <div class="w-100 d-flex justify-content-center">
                    <div class="w-100 d-flex flex-column">
                        <div class="w-100 d-flex flex-row">
                            <div class="w-50 d-flex flex-column p-3">
                                <div class="form-group mb-2">
                                    <label>Tile</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" @if($forum != null) value="{{$forum->title}}" @endif>
                                </div>
                                <div class="form-group mb-2">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description">@if($forum != null){{$forum->forum_description}}@endif</textarea>
                                </div>
                            </div>
                            <div class="w-50 d-flex flex-column p-3">
                                <div class="form-group mb-2">
                                    <label>Class Code</label>
                                    <input type="text" class="form-control" id="classCode" name="classCode" placeholder="Class Code" @if($forum != null) value="{{$forum->class_code}}" @endif>
                                </div>
                                <div class="form-group mb-2">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                        </div>

                        <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                    </div>
                </div>
            </form>
        @else
            <form action="/save-new-forum" method="POST" class="w-100 d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <label class="mb-3 mt-1 text-center" style="font-size:40px">New Forum</label>
                <div class="w-100 d-flex justify-content-center">
                    <div class="w-100 d-flex flex-column">
                        <div class="w-100 d-flex flex-row">
                            <div class="w-50 d-flex flex-column p-3">
                                <div class="form-group mb-2">
                                    <label>Tile</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" @if($forum != null) value="{{$forum->title}}" @endif>
                                </div>
                                <div class="form-group mb-2">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4">@if($forum != null){{$forum->forum_description}}@endif</textarea>
                                </div>
                            </div>
                            <div class="w-50 d-flex flex-column p-3">
                                <div class="form-group mb-2">
                                    <label>Class Code</label>
                                    <input type="text" class="form-control" id="classCode" name="classCode" placeholder="Class Code" @if($forum != null) value="{{$forum->class_code}}" @endif>
                                </div>
                                <div class="form-group mb-2">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
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


