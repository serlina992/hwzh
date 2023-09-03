@extends('Base.Navbar')

@section('title','Material Detail')

@section('body')
    <main class="form-signin d-flex align-items-center justify-content-center">
        <div class="w-75 d-flex justify-content-center border border-5 rounded p-3">
            <form action="/save-learning-material/{{$material_id}}" method="POST" class="w-100 d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <label class="mb-1 mt-1 text-center" style="font-size:30px">Learning Material</label>
                <div class="w-100 d-flex justify-content-center">
                    <div class="w-100 d-flex flex-column">
                        <div class="w-100 d-flex flex-row">
                            <div class="w-50 d-flex flex-column p-3">
                                <div class="form-group mb-2">
                                    <label>Module Code</label>
                                    <input type="text" class="form-control" id="moduleCode" name="moduleCode" placeholder="Module Code" @if($material != null) value="{{$material->module_code}}" @endif>
                                </div>

                                <div class="form-group mb-2">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4">@if($material != null) {{$material->description}} @endif</textarea>
                                </div>
                            </div>
                            <div class="w-50 d-flex flex-column p-3">
                                <div class="form-group mb-2">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title" @if($material != null) value="{{$material->title}}" @endif placeholder="Title">
                                </div>
                                <div class="form-group mb-2">
                                    <label>Video Link</label>
                                    <input type="text" class="form-control" id="videoLink" name="videoLink" @if($material != null) value="{{$material->video_link}}" @endif placeholder="Video Link">
                                </div>
                                <div class="form-group mb-2">
                                    <label>Learning Material</label>
                                    <input type="file" class="form-control" id="learningMaterial" name="learningMaterial">
                                </div>
                            </div>
                        </div>

                        <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection


