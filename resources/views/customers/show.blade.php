<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show customer detail</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>顧客詳細画面</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        {{-- </table>
    <table border='1'> --}}
        <tr>
            <td class="cell1">{{ $customer->id }}</td>
            <td class="cell2">{{ $customer->name }}</td>
            <td class="cell3">{{ $customer->email }}</td>
            <td class="cell4">{{ $customer->zipcode }}</td>
            <td class="cell5">{{ $customer->address }}</td>
            <td class="cell6">{{ $customer->phoneNumber }}</td>
        </tr>
    </table>
    <div class="button-group button">
        <button type="button" onclick="location.href='/customers/{{ $customer->id }}/edit'">編集画面</button>
        <form action="/customers/{{ $customer->id }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
            <br>
        </form>
        <button type=“button” onclick="location.href='/customers'">一覧に戻る</button>
    </div>

</body>

</html>
