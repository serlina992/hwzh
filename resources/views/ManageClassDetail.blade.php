@extends('Base.Navbar')

@section('title','User Profile')

@section('body')
    <main class="form-signin d-flex align-items-center justify-content-center">
        <div class="w-75 d-flex justify-content-center border border-5 rounded p-3">
            @if($class != null)
                <form action="/save-edit-class/{{$class->class_code}}" method="POST" class="w-100 d-flex flex-column">
                    @csrf
                    <div class="w-100 d-flex justify-content-center">
                        <div class="w-100 d-flex flex-column">
                            <div class="w-100 d-flex flex-row">
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>Class Code</label>
                                        <input type="text" disabled="true" class="form-control" id="classCode" name="classCode" placeholder="Class Code" value="{{$class->class_code}}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description">{{$class->description}}</textarea>
                                    </div>
                                </div>
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>Module Code</label>
                                        <select id="moduleCode" name="moduleCode" class="form-control">
                                            <option value="1A" @if($class->module_code == '1A') selected @endif>1A</option>
                                            <option value="1B" @if($class->module_code == '1B') selected @endif>1B</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button class="w-50 btn btn-primary mt-2 mb-1 align-self-center" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            @else
                <form action="/save-new-class" method="POST" class="w-100 d-flex flex-column">
                    @csrf
                    <div class="w-100 d-flex justify-content-center">
                        <div class="w-100 d-flex flex-column">
                            <div class="w-100 d-flex flex-row">
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>Class Code</label>
                                        <input type="text" class="form-control" id="classCode" name="classCode"  placeholder="Class Code">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="w-50 d-flex flex-column p-3">
                                    <div class="form-group mb-2">
                                        <label>Module Code</label>
                                        <select id="moduleCode" name="moduleCode" class="form-control">
                                            <option value="1A">1A</option>
                                            <option value="1B">1B</option>
                                        </select>
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
