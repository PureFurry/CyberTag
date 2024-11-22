<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Integration Selection</title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <p>Select Your Integration Method:</p>
            </div>
            <div class="col-6">
                <div class="row">
                    <a type="button" href="{{ route('localcsv') }}" class="btn btn-warning">Send CSV files from a local disk</a>
                </div>
                <div class="row mt-3">
                    <a type="button" class="btn btn-warning">Periodivally send CSV files to an FTP server</a>
                </div>
                <div class="row mt-3">
                    <a type="button" class="btn btn-warning">Call the Cybertag API from my system</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">PC Market</a>
            </div>
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">Hipermarket</a>
            </div>
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">KC Firma</a>
            </div>
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">Simple Business</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">Novicloud</a>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-warning btn-lg btn-block">Novitus</a>
            </div>
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">Tema</a>
            </div>
            <div class="col-3">
                <a type="button" class="btn btn-warning btn-lg btn-block">Enova</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
