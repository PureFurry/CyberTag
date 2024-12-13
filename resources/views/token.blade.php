<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Token</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <form id="tokenForm" action="{{ route('token.authenticate') }}" method="POST">
        @csrf

        <!-- Error message -->
        @if ($errors->has('user_token'))
          <div class="alert alert-danger">
            {{ $errors->first('user_token') }}
          </div>
        @endif

        <!-- Token input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form2Example1">Enter Token</label>
          <input type="text" id="form2Example1" name="user_token" class="form-control" />
        </div>

        <!-- Submit button -->
        <button id="submitButton" type="button" class="btn btn-primary btn-block mb-4">Submit</button>
      </form>

      @if ($errors->any())
        <div>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

</div>

<script>
    document.getElementById('submitButton').addEventListener('click', function () {
      const userConfirmed = confirm('Are you sure?');
      if (userConfirmed) {
        document.getElementById('tokenForm').submit();
      }
    });
</script>
</body>
</html>
