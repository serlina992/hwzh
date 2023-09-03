@extends('base.navbar')

@section('title','Classes')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="d-flex justify-content-center mt-3 p-1">
        <div class="w-50">
            @foreach ($results as $class)
                <a class="text-decoration-none text-dark"
                    @if($source == 'combination') href="/learning-materials/{{$class->module_code}}" @endif
                    @if($source == 'externalization-assignments') href="/class-assignments/{{$class->class_code}}" @endif
                    @if($source == 'internalization-exercises') href="/class-exercises/{{$class->class_code}}" @endif
                    @if($source == 'externalization-result') href="/class-assignments/{{$class->class_code}}/result" @endif
                    @if($source == 'internalization-result') href="/class-exercises/{{$class->class_code}}/result" @endif>
                    <div class="border border-2 rounded mb-2 bg-light">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column p-2">
                                <h5 for="Class Code">{{$class->class_code}}</h5>
                                <label for="Description">{{$class->description}}</label>
                            </div>
                            <div class="d-flex align-self-center">
                                <img src="{{asset('images/assets/next_icon.png')}}" class="img-responsive" style="height:40px" alt="">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection


