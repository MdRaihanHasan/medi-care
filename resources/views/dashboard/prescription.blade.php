<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .prescription {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            color: #555;
        }

        .details {
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
        }

        .details table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .details table th {
            background-color: #f9f9f9;
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .prescription-details {
            margin-top: 20px;
        }

        .prescription-details h3 {
            margin-bottom: 10px;
        }

        .prescription-details p {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="prescription">
        <div class="header">
            <h1>Medicare</h1>
            <p>Address: Jiangsu, China</p>
            <p>Phone: (123) 456-7890</p>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Patient Name</th>
                    <td>{{ $admission->patient->first_name }} {{ $admission->patient->last_name }}</td>
                </tr>
                <tr>
                    <th>Doctor Name</th>
                    <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                </tr>
                <tr>
                    <th>Visit Date</th>
                    <td>{{ $visit_date }}</td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{ $type }}</td>
                </tr>
            </table>
        </div>

        <div class="prescription-details">
            <h3>Prescription Details</h3>
            <p>{{ $prescription_details }}</p>
        </div>

        <div class="footer">
            <p>This prescription was generated electronically and is valid without a signature.</p>
        </div>
    </div>
</body>
</html>
