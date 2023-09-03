@extends('Base.Navbar')

@section('title','Result')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="text-center d-flex justify-content-center mt-3">
        <div class="w-75">
            @foreach ($results as $result)
                <div class="border border-2 rounded mb-2 bg-light">
                    <div class="d-flex justify-content-start p-2">
                        <div class="d-flex flex-column text-start w-75">
                            <h3>{{$result->user_id}}</h3>
                            <label>Answer:</label>
                            <a href="{{asset('storage/files/assignments/answers/'.$result->answer)}}">{{$result->answer}}</a>
                        </div>
                        @if(Auth::user()->role_code == 'LEC')
                            <form action="/save-class-assignment-result/{{$class_code}}/{{$assignment_id}}/{{$result->id}}" method="POST" class="d-flex flex-row w-25 align-items-center">
                                @csrf
                                <div class="d-flex flex-column text-start">
                                    <h3 class="d-flex align-self-start">Score</h3>
                                    <input type="text" class="form-control" id="score" name="score" value="{{$result->score}}">
                                </div>
                                <button class="w-50 btn btn-primary mx-3 align-self-center" type="submit">Save</button>
                            </form>
                        @else
                            <div class="d-flex flex-row w-25 align-items-center">
                                @csrf
                                <div class="d-flex flex-column text-start">
                                    <h3 class="d-flex align-self-start">Score</h3>
                                    <input type="text" class="form-control" id="score" name="score" readonly="true" value="{{$result->score}}">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            @if(Auth::user()->role_code == 'LEC')
                <a href="/export-assignment-result/{{$assignment_id}}" class="d-flex justify-content-end"><button class="w-25 btn btn-primary" type="submit">Export</button></a>
            @endif
        </div>
    </main>
@endsection