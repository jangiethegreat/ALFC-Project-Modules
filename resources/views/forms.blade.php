<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('bootstrap-css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>

        .container{
            margin-top: 50px;
        }

        .form{
            background: white;
            width: 90%;
            height: 70%;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            padding: 31px;
        }

        .agent-title-form{
            color: #AB3333;
            font-size: 40px;
            font-family: Montserrat-bold;
            font-weight: 700;
            word-wrap: break-word;
            margin-top: 50px;
        }

        .profile-title-header{
            margin-top:56px;
            width: 100%;
            margin-bottom: 10px;
        }

        .agent-profile-title{
            color: #414141;
            font-size: 20px;
            font-weight: 500;
            font-family: Montserrat-medium
        }

        .agent-profile-desc{
            color: #414141;
            font-size: 10px;
            font-family: Montserrat-medium;
            border-bottom: 1px solid #E2E2E2;
            margin-bottom: 10px;
            padding-bottom: 10px;

        }


        @media screen and (min-width: 320px) and (max-width: 480px) {


            .form{
                transform: scale(.9);
                padding: 20px;

            }

            .agent-title-form{
                font-size: 30px;
            }

            .agent-profile-title{
                font-size: 15px;
            }

            .profile-title-header{
                margin-top:1.5rem;
            }

            .agent-profile-desc{
                font-size: 9px;
            }



        }


    </style>


</head>

<body>

    <div class="container" >
        <div class="row justify-content-center">

            <form class="form col-md-8">
                @csrf
                <h1 class="agent-title-form text-center mt-4" >Agent’s Application Form</h1>
                <div class="profile-title-header col-lg-3">
                    <p class="agent-profile-title mb-1 mt-5">Agent Profile</p>
                    <p class="agent-profile-desc mt-1">Please input the personal information of the agent in the designated fields below.</p>
                </div>
            </form>

        </div>
    </div>


    {{-- //Bootstrap Javascript --}}
    <script src="{{ asset('bootstrap-js/bootstrap.min.js') }}"></script>
</body>
</html>
