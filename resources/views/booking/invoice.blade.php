<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking Invoice</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        /* h1 {
        font-size: 24px;
        margin-top: 0;
    } */
        .centered {
            text-align: center;
        }

        .font-black {
            font-weight: 900;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-bold {
            font-weight: bold;
        }

        @media print {
            .container {
                border: none;
            }

            * {
                font-size: 12px;
                line-height: 20px;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="no-print">
            <table>
                <tr>
                    <td><a href="{{route('home')}}" class="btn btn-info"><i class="bi bi-arrow-left"></i> Back</a> </td>
                    <td><button onclick="window.print();" class="btn btn-primary"><i class="bi bi-print"></i>
                            Print</button></td>
                </tr>
            </table>
            <br>
        </div>
        <div class="row items-center justify-center">
            <div class="col">
                <h2>Private Hostels Booking</h2>

                <p>Address: Lamashegu - Opp. Justice FM, Tamale.
                    <br>Phone Number: 0207728823 / 0543214796
                </p>
            </div>
            <div class="col float-right">
                <img src="{{asset('images/android-chrome-512x512.png')}}" height="70" width="70" style="margin:10px 0;">
            </div>
        </div>
        <h1 class="centered font-black text-3xl">Invoice: {{$invoiceNumber}}</h1>
        <?php
        $date = date('Y-m-d H:i:s');
        $name = $user->fname . " " . $user->lname;
        ?>
        <p>Date: {{$date}}<br>
            Reference: {{$payment->transaction_id}}<br>
            Name: {{$name}}<br>
        </p>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>Hostel</th>
                    <th>Room Number</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Room Type</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $booking->room->hostel->name }}</td>
                    <td>{{ $booking->room->room_no }}</td>
                    <td>{{ $booking->check_in_date }}</td>
                    <td>{{ $booking->check_out_date }}</td>
                    <td>{{ $booking->room->room_type }}</td>
                    <td class="text-right">{{ $payment->amount }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th class="centered" colspan="12">In Words: <span>GH&#8373;</span>
                        <span>{{str_replace("-"," ",$amountInWords)}}</span>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>


    <script type="text/javascript">
        localStorage.clear();

        function auto_print() {
            window.print()
        }
        setTimeout(auto_print, 1000);
    </script>
</body>

</html>