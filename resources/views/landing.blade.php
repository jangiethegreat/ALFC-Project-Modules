<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alfc Insurance Agency Corporation</title>

    <link href="{{ asset('bootstrap-css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('/images/landing-page-image.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
        /* Create an overlay with a semi-transparent dark color */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(36, 36, 36, 0.55); /* Adjust opacity (last value) as desired */
            z-index: -1; /* Place the overlay behind the content */

        }

        .logo{
            margin-left: 40px;
            margin-top: 20px;
        }

        .landing-title {
            color: white;
            font-size: 150px;
            font-family: Times New Roman;
            font-weight: 700;
            margin-bottom: -30px; /* Adjust the margin-bottom to reduce the gap */
        }

        .landing-desc {
            color: white;
            font-size: 70px;
            font-family: Montserrat-bold;
            font-weight: 700;
            margin-top: -20px; /* Adjust the margin-top to reduce the gap */
        }

        .btn-get-started {
            border-radius: 10px;
            color: white;
            font-size: 20px;
            font-family: Montserrat-bold;
            background-color: #DA2520;
            width: 174px;
            height: 48px;
        }

        .btn-get-started:hover {
            background-color: #f3403a;
            color: rgb(184, 184, 184);
        }

    </style>

</head>
<body>
    <img class="logo" src="images/alfc-logo.png" alt="Example Image">

    {{-- <div class="landing-title text-center mt-5">ALFC</div>
    <div class="landing-desc text-center">Insurance Agency Corporation</div> --}}

    <div class="container" >
        <div class="row justify-content-center">
            <div class="landing-title text-center mt-5">ALFC</div>
            <div class="landing-desc text-center">Insurance Agency Corporation</div>
            <button class="btn btn-get-started">Get Started</button>
        </div>
    </div>


    <script src="{{ asset('bootstrap-js/bootstrap.min.js') }}"></script>

</body>
</html>
