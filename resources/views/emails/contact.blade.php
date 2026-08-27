<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $data['subject'] }}</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f5f5f5; padding: 30px;">

    <div style="
        max-width: 600px;
        margin: auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
    ">

        <h2 style="margin-bottom: 25px;">
            New Contact Message
        </h2>

        <p>
            <strong>From:</strong>
            {{ $data['email'] }}
        </p>

        <p>
            <strong>Subject:</strong>
            {{ $data['subject'] }}
        </p>

        <hr>

        <p>
            <strong>Message:</strong>
        </p>

        <p style="line-height: 1.7;">
            {{ $data['message'] }}
        </p>

    </div>

</body>
</html>
