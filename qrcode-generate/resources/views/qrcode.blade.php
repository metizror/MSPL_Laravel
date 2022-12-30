<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>How to Generate QR Code in Laravel 9</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(150)->generate('https://www.metizsoft.com/') !!}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(150)->backgroundColor(255,90,0)->generate('https://www.metizsoft.com/') !!}
                <br> <br><br> <br>
                {!! QrCode::email('hello@metizsoft.com', 'Hello', 'Mobile Apps and Web App development Company | Metizsoft') !!}
                <br> <br><br> <br>
                {!! QrCode::SMS('+1 (845) 418-5206', 'Mobile Apps and Web App development Company | Metizsoft');
                !!}
            </div>
        </div>

    </div>
</body>
</html>


