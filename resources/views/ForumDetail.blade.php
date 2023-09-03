@extends('Base.Navbar')

@section('title','Forum Detail')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('body')
    <main class="text-center d-flex justify-content-center mt-3">
        <div class="w-50">
            <div class="border border-2 rounded mb-2 bg-light">
                <div class="post-content border-1 border-bottom d-flex justify-content-center" style="height:45vh">
                    <img src="{{asset('storage/files/forums/'.$forum->forum_image)}}" class="img-responsive" alt="">
                </div>
                <div class="post-footer d-flex justify-content-start text-start p-2">
                    <p for="Post Description">{{$forum->forum_description}}</p>
                </div>
                <div class="p-2">
                    @foreach ($results as $comment)
                        <div class="border border-2 mb-2 d-flex flex-column p-2">
                            <div class="d-flex justify-content-between">
                                <h5>{{$comment->user_id}}</h5>
                                <h6>{{$comment->created_at}}</h6>
                            </div>
                            <label class="text-start">{{$comment->comment}}</label>
                        </div>
                    @endforeach
                </div>
                <form action="/save-forum-detail/{{$forum->forum_id}}" method="POST" class="w-100 d-flex flex-row p-2 mb-2">
                    @csrf
                    <div class="w-75 form-group me-2">
                        <textarea class="form-control" id="comment" placeholder="Comment" name="comment" rows="1"></textarea>
                    </div>
                    <div class="w-25 form-group me-2">
                        <button class="w-100 btn btn-primary align-self-center" type="submit">Comment</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
@endsection


