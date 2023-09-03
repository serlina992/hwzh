@extends('Base.Navbar')

@section('title','Assignment Detail')

@section('body')
    <main class="form-signin d-flex align-items-center justify-content-center">
        <div class="w-75 d-flex justify-content-center border border-5 rounded p-3">
            <form action="/upload-class-assignments/{{$class_code}}/{{$assignment_id}}" method="POST" class="w-100 d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <label class="mb-1 mt-1 text-center" style="font-size:30px">{{$assignment->title}}</label>
                <div class="w-100 d-flex justify-content-center">
                    <div class="w-100 d-flex flex-column">
                        <div class="w-100 d-flex flex-column p-3">
                            <div class="form-group mb-2">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4">@if($assignment != null){{$assignment->description}}@endif</textarea>
                            </div>
                            <div class="w-100 d-flex flex-row">
                                <div class="form-group mt-1">
                                    @if ($assignment->attachment != null && $assignment->attachment != '')
                                        <label>Attachment: </label>
                                        <a href="{{asset('storage/files/assignments/questions/'.$assignment->attachment)}}">{{$assignment->attachment}}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-2 mt-4">
                                <label>Answer</label>
                                <input type="file" class="form-control" id="answer" name="answer">
                            </div>
                        </div>

                        <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
