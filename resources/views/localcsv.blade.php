<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Integration Selection</title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <h4 class="mx-auto text-center">Send CSV files from a local disk</h4>
        </div>
        <div class="row mt-5">
            <p class="mx-auto">Download a sample file with a data structure in Excel to your local disk.</p>
        </div>
        <div class="row mt-5">
            <a href="{{asset('example-csv.csv')}}" download="{{asset('example-csv.csv')}}" class="btn btn-warning">Download File</a>
        </div>
        <div class="row mt-5">
            <p class="mx-auto">Fill in the file with data, export it as a CSV file, and place it in the selected folder on your local disk.
                <br>
                Provide the full path to the file, including its name:</p>
        </div>
        <form id="fileForm">
            <div class="row">
                <input type="text" name="file_path" id="filePath">
            </div>
            <div class="row mt-2 justify-content-md-center">
                <div class="col">
                    <button type="button" onclick="verifyFile()" class="btn btn-warning btn-sm">Verify File</button>
                </div>
            </div>
            <div class="row mt-2">
                <div>
                    <button type="button" onclick="createIntegration()" class="btn btn-warning btn-sm">Creat Integration</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        async function verifyFile() {
            const filePath = document.getElementById('filePath').value;

            const response = await fetch('/verify-file', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ file_path: filePath }),
            });

            const result = await response.json();
            alert(result.message);
        }

        async function createIntegration() {
            const filePath = document.getElementById('filePath').value;

            const response = await fetch('/create-integration', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ file_path: filePath }),
            });

            const result = await response.json();
            alert(result.message);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
