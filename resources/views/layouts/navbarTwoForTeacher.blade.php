<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReadRacoon</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/racoon.svg') }}">
    <link href="{{ asset('/css/navbarTwo.css') }}" rel="stylesheet">
</head>
<body>

    <div class="nav-row">
        <div class="left-bar">
            <div class="logo">
                <img src="{{ asset('img/logoReadRacoon.png') }}" alt="description of myimage">
            </div>
            <div class="pages-bar">
                <div class="section-1">
                    <a href="{{url('/createQuiz1')}}" class="button-link">
                        <div class="quiz">
                            <img src="{{ asset('img/quiz.png') }}" alt="description of myimage">
                            <p>Quiz</p>
                        </div>
                    </a>
                    <a href="{{url('/inputGrade')}}" class="button-link">
                        <div class="grade">
                            <img src="{{ asset('img/grade.png') }}" alt="description of myimage">
                            <p>Grade</p>
                        </div>
                    </a>
                </div>
                <a href="/editProfile" class="button-link">
                    <div class="setting">
                        <img src="{{ asset('img/setting.png') }}" alt="description of myimage">
                        <p>Settings</p>
                    </div>
                </a>
                @auth
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger mt-2" style="width:120px">
                        Logout
                    </button>
                </form>
            @endauth
            </div>
        </div>
        <div class="right-side">
        <div class="right-bar">
            <div class="title">
                <h3><b>@yield('title')</b></h3>
            </div>
            <div class="detail-row">
                <a href=""><img src="{{ asset('img/notification.png') }}" alt="description of myimage" class="noti"></a>
                <a href=""><img src="{{ asset('img/saved.png') }}" alt="description of myimage" class="save"></a>
                <a href=""><img src="{{ asset('img/profile.svg') }}" alt="description of myimage" class="pp" style="width:50px;height:50px"></a>
            </div>

        </div>
        <div class="container">
            @yield('container')
        </div>


    </div>
    </div>


    </div>

</body>
</html>
<script src="{{ asset('js/bootstrap.js') }}"></script>
