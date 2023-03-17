{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>

    {{$data["userId"]}}
<br />
    {{$data["prefix"]}}
<br />
    {{$data["name"]}}
<br />
    {{$data["lastname"]}}
<br />
    {{$data["govermentId"]}}
<br />
    {{$data["sub_district"]}}
<br />
    {{$data["district"]}}
<br />
    {{$data["provience"]}}
<br />
    {{$data["email"]}}
    <br />
    {{$package["title"]}}
    <br />
    {{$package["insuranceDetail"]}}
    <br />
    {{$package["premium"]}}

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insurance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ public_path() . '/bootstrap.min.css' }}">
    <script src="{{ public_path() . 'jquery.min.js' }}"></script>
    <script src="{{ public_path() . 'bootstrap.min.js' }}"></script>
</head>

<body>
    {{-- <div class="container"> --}}
    {{-- <div style="margin:auto"> --}}
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

    <h1>Insurance</h1>
    </div>
    <div>
        <h3>Customer Details</h3>
        <table>
            <tbody>
                <tr>
                    <th>Title</th>
                    <td>{{$data["prefix"]}}</td>
                </tr>
                <tr>
                    <th>Firstname</th>
                    <td> {{$data["name"]}}</td>
                </tr>
                <tr>
                    <th>Lastname</th>
                    <td>{{$data["lastname"]}}</td>
                </tr>
                <tr>
                    <th>Citizen ID</th>
                    <td> {{$data["govermentId"]}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td> {{$data["email"]}}</td>
                </tr>
                <br />
            </tbody>

            @if ($data['beneficial'])
                <h3>Beneficiary Details</h3>
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$data["beneficial"]}}</td>
                    </tr>
                    <br />
                </tbody>
            @endif

            <h3>Address</h3>
            <tbody>
                <tr>
                    <th>Address</th>
                    <td>{{$data["address"]}}</td>
                </tr>
                <tr>
                    <th>Amphur</th>
                    <td>{{$data["sub_district"]}}</td>
                </tr>
                <tr>
                    <th>Tumbon</th>
                    <td>{{$data["district"]}}</td>
                </tr>
                <tr>
                    <th>Province</th>
                    <td>{{$data["provience"]}}</td>
                </tr>
                <tr>
                    <th>Zipcode</th>
                    <td>{{$data["postcode"]}}</td>
                </tr>
                <br />
            </tbody>
            <h3>Plan</h3>
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$package["title"]}}</td>
                </tr>
                <tr>
                    <th>Desc</th>
                    <td>{{$package["insuranceDetail"]}}</td>
                </tr>
                <tr>
                    <th>Coverage</th>
                    <td>{{$package["premium"]," THB"}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

</body>

</html>

