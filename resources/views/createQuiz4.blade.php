@extends('layouts.navbarTwoForTeacher')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/css/createQuiz4Style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@section('container')
    <div class="content-middle">    
        <form action="{{ route('saveQuiz') }}" method="POST" onsubmit="return confirm('Are you want to create this quiz?');">
            <div class="content">
                <div class="content-wrap">
                    <div class="dropdown-row">
                        <div class="dropdown-class">
                            <button class="dropdown-button-class">Select</button>
                            <div class="dropdown-content-class">
                                @foreach ($classes as $class)
                                    <a href="#" class="class-name" name="dropdown">{{ $class->className }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h1 class="title-margin"> Add quiz detail </h1>
                    <div class="spaceInput">
                        <div class="label">
                            <div class="horizontal">
                                <p> Quiz Name </p>
                                <p class="warna-pas">*</p>
                            </div>
    
                        </div>
                        <input type="text" id="QuizName" name ="QuizName" class = "lengthBox" autocomplete="off" required>
                    </div>
                    <div class="spaceInput">
                        <div class="label">
                            <div class="horizontal">
                                <p> Informations </p>
                            </div>
    
                        </div>
                        <textarea id="QuizInformations" name="QuizInformations" rows="6" class="lengthBox2"></textarea>
                    </div>
                    <div class="spaceInput2">
                        <div class = "horizontal-col">
                            <div>
                                <div class="label">
                                    <div class="horizontal">
                                        <p> Date </p>
                                    </div>
    
                                </div>
                                <input type="date" id="QuizDate" name="QuizDate" class="lengthBox3">
                            </div>
                            <div>
                                <div class="label">
                                    <div class="horizontal">
                                        <p> Start Time </p>
                                    </div>
    
                                </div>
                                <input type="time" id="QuizStart" name="QuizStart" class="lengthBox3">
                            </div>
                            <div>
                                <div class="label">
                                    <div class="horizontal">
                                        <p> End Time </p>
                                    </div>
                                </div>
                                <input type="time"id="QuizEnd" name="QuizEnd" class="lengthBox3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-wrap">
                    <div class = "end-to-end">
                        <h1> Questions </h1>
                    </div>
                    <div class="spaceInput">
                        <div class="label">
                            <div class="horizontal">
                                <p> Article </p>
                                <p class="warna-pas">*</p>
                            </div>
                        </div>
                        <textarea id="QuizArticle" name="QuizArticle" rows="6" class="lengthBox2"></textarea>
    
                    </div>
                    <div class="spaceInput">
                        <div class="label">
                            <div class="horizontal">
                                <p> Question 1 </p>
                                <p class="warna-pas">*</p>
                            </div>
                        </div>
                        <input type="text" id="QuizQuestion1" name ="QuizName" class = "lengthBox" autocomplete="off" required>
                    </div>
                    <div class="spaceInput">
                        <div class="label">
                            <div class="horizontal">
                                <p> Question 2 </p>
                                <p class="warna-pas">*</p>
                            </div>
                        </div>
                        <input type="text" id="QuizQuestion2" name ="QuizName" class = "lengthBox" autocomplete="off" required>
                    </div>
                    <div class="spaceInput">
                        <div class="label">
                            <div class="horizontal">
                                <p> Question 3 </p>
                                <p class="warna-pas">*</p>
                            </div>
                        </div>
                        <input type="text" id="QuizQuestion3" name ="QuizName" class = "lengthBox" autocomplete="off" required>
                    </div>
                </div>
                </div>
            </div>
            <div class="action-button">
                <button class="savecontinue" type="submit"><a href="/createQuiz1">Save & Continue</a></button>
            </div>
        </form>
    </div>

</body>
</html>
@endsection
