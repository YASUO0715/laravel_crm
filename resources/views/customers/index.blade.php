
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>顧客一覧</h1>
    @if (!empty($customers))
        <ul>
            @foreach ($customers as $customer)
                <li>
                    {{ $customer->zipcode }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
