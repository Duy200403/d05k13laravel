<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        @foreach($brand as $item)
            <tr>
                <td>
                    {{ $item->brand_code }}
                </td>
                <td>
                    {{ $item->brand_name }}

                </td>

            </tr>
        @endforeach
    </table>
</body>
</html>
