<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Petition | {{substr($petition->title, 0, 50)}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Petitions</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div> -->
    </nav>



    <div class="flex-center position-ref full-height">

        <div class="content container">
            <div class="title m-b-md">
                {{$petition->title}}
            </div>
            <div class="m-b-md">
                <p>{!!$petition->body!!}</p>
            </div>

            <p>{{Carbo::}}</p>
            <p>{{$hasVoted ? "Thanks for signing this petition!" : ""}}</p>
                <div class="links">
                    <button {{$petition->enable_yes && !$hasVoted ? "" : "disabled"}}
                        onclick=upvote({{$petition->id}})>Yes</button>
                    <button {{$petition->enable_no && !$hasVoted ? "" : "disabled"}}
                        onclick=downvote({{$petition->id}})>No</button>
                </div>
                <p>{{$message ?? ""}}</p>

                <div class="petition-results">

                    <div class="progress m-b-md" style="height: 30px;">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{($petition->upvotes / ($petition->upvotes + $petition->downvotes + 1)) * 100}}"
                            aria-valuemin="0" aria-valuemax="100" style="width:{{($petition->upvotes / ($petition->upvotes + $petition->downvotes + 1)) * 100}}%">
                            {{$petition->upvotes}} {{$petition->upvotes == 1? "person" : "people"}} voted yes
                        </div>
                    </div>

                    <div class="progress m-b-md" style="height: 30px;">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{($petition->downvotes / ($petition->upvotes + $petition->downvotes + 1)) * 100}}"
                            aria-valuemin="0" aria-valuemax="100" style="width:{{($petition->downvotes / ($petition->upvotes + $petition->downvotes + 1)) * 100}}%">
                            {{$petition->downvotes}} {{$petition->downvotes == 1? "person" : "people"}} voted no
                        </div>
                    </div>

                </div>

        </div>
    </div>

    <script>
        var upvote = function (id) {
            document.location = "petition/upvote/" + id
        }

        var downvote = function (id) {
            document.location = "petition/downvote/" + id
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
