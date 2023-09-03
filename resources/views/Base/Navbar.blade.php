@extends('Base.Master')

@section('navbar')
<div class="w-100 d-flex flex-column p-1">
    <div class="d-flex flex-row">
        <img src="{{asset('images/assets/logo.png')}}" class="img-responsive" style="height:10vh; width:7vw;" alt="">
        <h1 class="ms-3">华文贞好</h1>
        <div class="ms-auto d-flex flex-row">
            <h1>{{Auth::user()->Role->description}}</h1>
        </div>
    </div>
    <div style="height: 2px" class="bg-secondary mt-1"></div>
    <nav class="container-fluid navbar navbar-expand-lg">
        <div class="w-100 d-flex justify-content-around">
            <div class="btn-group dropdown">
                <div type="button" data-bs-toggle="dropdown">
                    <h1 class="btn btn-lg dropdown-toggle" role="button" id="dropdownSosializationMenu">Sosialization</h1>
                </div>
                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownSosializationMenu">
                  <a class="dropdown-item" href="/">Forum</a>
                </div>
            </div>
            <div class="btn-group dropdown">
                <div type="button" data-bs-toggle="dropdown">
                    <h1 class="btn btn-lg dropdown-toggle" role="button" id="dropdownExternalizationMenu">Externalization</h1>
                </div>
                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownSosializationMenu">
                    <a class="dropdown-item" href="/learning-classes/externalization-assignments">Assignment</a>
                    <a class="dropdown-item" href="/learning-classes/externalization-result">Result</a>
                </div>
            </div>
            <div class="btn-group dropdown">
                <div type="button" data-bs-toggle="dropdown">
                    <h1 class="btn btn-lg dropdown-toggle" role="button" id="dropdownSosializationMenu">Combination</h1>
                </div>
                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownSosializationMenu">
                  <a class="dropdown-item" href="/learning-classes/combination">Learning</a>
                </div>
            </div>
            <div class="btn-group dropdown">
                <div type="button" data-bs-toggle="dropdown">
                    <h1 class="btn btn-lg dropdown-toggle" role="button" id="dropdownInternationalizationMenu">Internationalization</h1>
                </div>
                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownSosializationMenu">
                    <a class="dropdown-item" href="/learning-classes/internalization-exercises">Exercise</a>
                    <a class="dropdown-item" href="/learning-classes/internalization-result">Result</a>
                </div>
            </div>
            <div class="btn-group dropdown">
                <div type="button" data-bs-toggle="dropdown">
                    <h1 class="btn btn-lg dropdown-toggle" role="button" id="dropdownOtherMenu">Other</h1>
                </div>
                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownOtherMenu">
                  @if(Auth::user()->role_code == 'LEC')
                    <a class="dropdown-item" href="/new-forum">New Forum</a>
                    <a class="dropdown-item" href="/manage-users">Manage User</a>
                    <a class="dropdown-item" href="/manage-classes">Manage Class</a>
                  @endif
                  <a class="dropdown-item" href="/logout">logout</a>
                </div>
            </div>
        </div>
    </nav>
</div>
@endsection


