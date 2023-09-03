@extends('base.navbar')

@section('title','Classes')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="d-flex justify-content-center mt-3 p-1">
        <div class="w-50">
            @foreach ($results as $class)
                <div class="border border-2 rounded mb-2 bg-light">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column p-2">
                            <h5 for="Class Code">{{$class->class_code}}</h5>
                            <label for="Description">{{$class->description}}</label>
                            <b  class="mt-2">{{$class->module_code}}</b>
                        </div>
                        <div class="d-flex align-self-center flex-column p-2">
                            <div class="d-flex flex-column">
                                <a href="/edit-class/{{$class->class_code}}">
                                    <button class="btn btn-warning" style="width:80px">Edit</button>
                                </a>
                            </div>
                            <form action="/delete-class/{{$class->class_code}}" method="POST" class="mt-3">
                                @csrf
                                <button class="btn btn-danger" type="submit" style="width:80px">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <a class="text-decoration-none text-dark" href="/new-class">
                <button class="btn btn-primary w-100 mt-3 mb-1">New Class</button>
            </a>
        </div>
    </main>
@endsection


