@extends('Base.Navbar')

@section('title','Material Detail')

@section('body')
    <main class="form-signin d-flex align-items-center justify-content-center">
        <div class="w-75 d-flex justify-content-center border border-5 rounded p-3">
            <form action="/save-class-assignment/{{$class_code}}/{{$assignment_id}}" method="POST" class="w-100 d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <label class="mb-1 mt-1 text-center" style="font-size:30px">Class Assignment</label>
                <div class="w-100 d-flex justify-content-center">
                    <div class="w-100 d-flex flex-column">
                        <div class="w-100 d-flex flex-column p-3">
                            <div class="w-100 d-flex flex-row">
                                <div class="w-50 form-group me-2">
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" @if($assignment != null) value="{{$assignment->title}}" @endif>
                                </div>
                                <div class="w-50 form-group mb-2">
                                    <label>Assignment Attachment</label>
                                    <input type="file" class="form-control" id="assignmentAttachment" name="assignmentAttachment">
                                </div>
                            </div>
                            @if($assignment_id == 0)
                            <div class="form-group mb-2">
                                <label>Type</label>
                                <select name="assignmentType" id="assignmentType" class="form-control">
                                    <option value="ASSIGNMENT">ASSIGNMENT</option>
                                    <option value="EXERCISE">EXERCISE</option>
                                </select>
                            </div>
                            @endif

                            <div class="form-group mb-2">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4">@if($assignment != null){{$assignment->description}}@endif</textarea>
                            </div>
                        </div>

                        <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
