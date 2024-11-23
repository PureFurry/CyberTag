<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Integration Selection</title>
    <style>
        .disabled-form input {
            background-color: #e9ecef !important;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <h4 class="mx-auto text-center">I will periodically send CSV files to an FTP server</h4>
        </div>
        <div class="row mt-5">
            <p class="mx-auto">To learn the required CSV file structure, download a sample file with the data structure in Excel to your local disk and export it as a CSV file to your local disk.</p>
        </div>
        <div class="row mt-5">
            <a href="{{ asset('example-csv.csv') }}" download="{{ asset('example-csv.csv') }}" class="btn btn-warning">Download File</a>
        </div>
        <div class="row mt-5">
            <p class="mx-auto">Fill in the file with data, export it as a CSV file, and place it in the selected folder on your local disk.
                <br>
                Provide the full path to the file, including its name:</p>
        </div>
        <div class="row mt-5">
            <form id="fileForm">
                <div class="row">
                    <!-- Cybertag FTP Server Form -->
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="cybertagCheckbox" onclick="toggleForms('cybertag')">
                                I will use an FTP server managed by Cybertag
                            </label>
                        </div>
                        <div id="cybertagForm" class="disabled-form">
                            <div class="form-group">
                                <label for="cybertag_server_ftp">Server FTP:</label>
                                <input type="text" id="cybertag_server_ftp" class="form-control" value="ftp://cyberlinker.cfcloks.pl/24038/data" readonly>
                            </div>
                            <div class="form-group">
                                <label for="cybertag_user">User:</label>
                                <input type="text" id="cybertag_user" class="form-control" value="24038@cybertag.pl" readonly>
                            </div>
                            <div class="form-group">
                                <label for="cybertag_password">Password:</label>
                                <input type="password" id="cybertag_password" class="form-control" value="87hb384i3498" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Custom FTP Server Form -->
                    <div class="col-6">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="customCheckbox" onclick="toggleForms('custom')">
                                Let Cybertag retrieve data from my FTP server
                            </label>
                        </div>
                        <div id="customForm" class="disabled-form">
                            <div class="form-group">
                                <label for="custom_server_ftp">Server FTP:</label>
                                <input type="text" name="custom_server_ftp" id="custom_server_ftp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="custom_user">User:</label>
                                <input type="text" name="custom_user" id="custom_user" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="custom_password">Password:</label>
                                <input type="password" name="custom_password" id="custom_password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <button type="submit" class="btn btn-warning">Verify File</button>
                </div>
                <div class="row mt-2">
                    <button type="submit" class="btn btn-warning">Create Integration</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleForms(selected) {
            const cybertagCheckbox = document.getElementById('cybertagCheckbox');
            const customCheckbox = document.getElementById('customCheckbox');
            const cybertagForm = document.getElementById('cybertagForm');
            const customForm = document.getElementById('customForm');

            if (selected === 'cybertag') {
                customCheckbox.checked = false;
                customForm.classList.add('disabled-form');
                cybertagForm.classList.remove('disabled-form');
            } else if (selected === 'custom') {
                cybertagCheckbox.checked = false;
                cybertagForm.classList.add('disabled-form');
                customForm.classList.remove('disabled-form');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
