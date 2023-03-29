<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insurance Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ public_path() . '/bootstrap.min.css' }}">
    <script src="{{ public_path() . 'jquery.min.js' }}"></script>
    <script src="{{ public_path() . 'bootstrap.min.js' }}"></script>
</head>

<body>
    {{-- <div class="container"> --}}
    {{-- <div style="margin:auto"> --}}
    <style>
        @media print{@page {size: landscape}}
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
        <h3>Package Datail </h3>


        <table>
            <thead>
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">Package name</th>
                  <th scope="col">Detail</th>
                  <th scope="col">Premium</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Create at</th>
                  <th scope="col">Lasted update</th>
                  <th scope="col">Buy Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $data as $item )

                <tr>
                    <th scope="row">{{$item["id"]}}</th>
                    <td> {{$item["title"]}}</td>
                    <td>{{$item["insurance_detail"]}}</td>
                    <td> {{$item["premium"]}}</td>
                    <td> {{$item["name"]}}</td>
                    <td> {{$item["lastname"]}}</td>
                    <td> {{$item["created_at"]->format('Y-m-d')}}</td>
                    <td> {{$item["updated_at"]->format('Y-m-d')}}</td>
                    @if ($item->order_status == 1)
                        <td>
                            Purchase
                        </td>
                    @else
                        <td>Draft</td>
                    @endif

                  </tr>
                @endforeach

              </tbody>
        </table>
    </div>
    </div>

</body>

</html>
