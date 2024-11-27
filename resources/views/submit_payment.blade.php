<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to eSewa</title>
</head>
<body>
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa-form">
        @foreach ($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>

    <script type="text/javascript">
        document.getElementById('esewa-form').submit();
    </script>
</body>
</html>
