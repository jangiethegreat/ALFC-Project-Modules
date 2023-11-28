<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insurance Form</title>
    <link href="{{ asset('bootstrap-css/bootstrap.min.css') }}" rel="stylesheet">

    <style>

        .form-row {
            display: flex;
            align-items: center; /* Aligns items vertically */
            margin-bottom: 10px;
        }

        /* Additional styling (adjust as needed) */
        label {
            min-width: 160px;
            text-align: right;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <form action="#" method="post" class="mt-5">

        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Limit</th>
                        <th>Rate</th>
                        <th>Premium Due</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($qoutation_computations as $qoutation_computation)
                        <tr>
                            <td>{{ $qoutation_computation->coverage_name }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </form>

    <script src="{{ asset('bootstrap-js/bootstrap.min.js') }}"></script>

</body>
</html>
