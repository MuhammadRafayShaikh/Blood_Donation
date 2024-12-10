<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Group Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .photo img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Donors Report</h1>
            <p>Generated on: {{ date('d-m-Y') }}</p>
        </div>

        <!-- Data Table -->
        <table>
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Photo</th>
                    <th>Donor Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Group</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donors as $key => $donor)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="photo">
                            @if ($donor->image)
                                <img src="{{ asset('uploads/' . $donor->image) }}" alt="Donor Photo">
                            @else
                                <img src="{{ asset('adminimages/images/donor/user.jpg') }}" alt="Default Photo">
                            @endif
                        </td>
                        <td>{{ $donor->name }}</td>
                        <td>{{ $donor->email }}</td>
                        <td>{{ $donor->phone }}</td>
                        <td>{{ $donor->group->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Blood Donation Management System</p>
        </div>
    </div>
</body>

</html>