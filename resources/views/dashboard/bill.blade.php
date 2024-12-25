<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        .bill-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .patient-info, .bill-details {
            margin-bottom: 20px;
        }
        .patient-info h2, .bill-details h2 {
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .info-item {
            margin: 5px 0;
        }
        .info-item span {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .avatar {
            text-align: center;
            margin-bottom: 20px;
        }
        .avatar img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="bill-container">
        <div class="header">
            <h1>Medi Care</h1>
            <h2> Bill</h2>
            <p>Thank you for choosing our services!</p>
        </div>

        {{-- <div class="avatar">
            <img src="{{ asset('uploads/avatars/' . $patient['avatar']) }}" alt="Patient Avatar">
        </div> --}}

        <div class="patient-info">
            <h2>Patient Information</h2>
            <p class="info-item"><span>Full Name:</span> {{ $patient['first_name'] }} {{ $patient['last_name'] }}</p>
            <p class="info-item"><span>Gender:</span> {{ $patient['gender'] }}</p>
            <p class="info-item"><span>Mobile:</span> {{ $patient['mobile'] }}</p>
            <p class="info-item"><span>Email:</span> {{ $patient['email'] }}</p>
            <p class="info-item"><span>Address:</span> {{ $patient['address'] }}</p>
            <p class="info-item"><span>Patient Type:</span> {{ $patient['patient_type'] }}</p>
            <p class="info-item"><span>Discharged At:</span> {{ \Carbon\Carbon::parse($patient['discharged_at'])->format('Y-m-d') }}</p>
        </div>

        <div class="bill-details">
            <h2>Billing Details</h2>
            <p class="info-item"><span>Status:</span> {{ ucfirst($patient['bill']) }}</p>
            <p class="info-item"><span>Amount:</span> {{ $patient['bill_amount'] ? '$' . number_format($patient['bill_amount'], 2) : 'N/A' }}</p>
            <p class="info-item"><span>Note:</span> {{ $patient['note'] }}</p>
        </div>

        <div class="footer">
            <p>&copy; {{ now()->year }} Medicare. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
