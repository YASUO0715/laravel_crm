<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer index</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>顧客一覧</h1>
    <ul>

        <table border="1">
            <tr>
                <th>顧客ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>電話番号</th>
            </tr>
            @foreach ($customers as $customer)


                <tr>

                    <td><a href="/customers/{{ $customer->id }}">{{ $customer->id }}</a></td>
                    <td class="cell2">{{ $customer->name }}</td>
                    <td class="cell3">{{ $customer->email }}</td>
                    <td class="cell4">{{ $customer->zipcode }}</td>
                    <td class="cell5">{{ $customer->address }}</td>
                    <td class="cell6">{{ $customer->phone_number }}</td>
                </tr>
            @endforeach
        </table>



    </ul>
    <button type=“button” onclick="location.href='/customers/create'">新規登録</button>

</body>

</html>
