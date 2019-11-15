<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Petition | {{substr($petition->title, 0, 50)}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 34px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                {{$petition->title}}
            </div>
            <div class = "m-b-md">
                <p>{!!$petition->body!!}</p>
            </div>

            <div class="links">
                <button {{$petition->enable_yes && !$hasVoted ? "" : "disabled"}} onclick = upvote({{$petition->id}})>Yes</button>
                <button {{$petition->enable_no && !$hasVoted ? "" : "disabled"}}  onclick = downvote({{$petition->id}})>No</button>
            </div>
            <p>{{$message ?? ""}}</p>

            <!-- TODO Add progress bar if it has a goal-->
        </div>
    </div>

    <script>
    var upvote = function(id) {
        document.location = "petition/upvote/" + id
    }

    var downvote = function(id) {
        document.location = "petition/downvote/" + id
    }
    </script>
</body>

</html>
