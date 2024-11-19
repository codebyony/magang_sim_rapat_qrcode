<!DOCTYPE html>
<html>
<head>
    <title>Sistem Manajemen Rapat - Undangan Rapat</title>
    <style>
        /* Inline CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            background-color: #f8f8f8;
            text-align: center;
            padding: 10px;
            border-radius: 0 0 5px 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Undangan Rapat</h1>
        </div>
        <div class="content">
            <p>Halo {Nama}</p>
            <p>Anda diundang untuk menghadiri rapat penting mengenai sistem manajemen rapat kami. Berikut adalah detail rapat:</p>
            <ul>
                <li><strong>Tanggal:</strong> {Tanggal}</li>
                <li><strong>Waktu:</strong> {Waktu}</li>
                <li><strong>Tempat:</strong> {Tempat}</li>
                <li><strong>Agenda:</strong> {Agenda}</li>
            </ul><p>Terima kasih, dan kami harap Anda dapat bergabung dengan kami di rapat tersebut.</p>
            <p>Salam,</p>
            <p>Tim Manajemen Rapat</p>
        </div>
    </div>
</body>
</html>