<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer address</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>新規登録画面</h1>
    <form action="/customers" method="post">
        @csrf
        <p>
            <label for="name">名前 <input type="text" name="name" value="{{ old('name') }}"></label>
        </p>
        <p>
            <label for="email">メールアドレス <input type="text" name="email" value="{{ old('email') }}"></label>
        </p>
        <p>
            <label for="zipcode">郵便番号 <input type="text" name="zipcode"
                    value="{{ old('zipcode', $zipcode) }}"></label>
        </p>
        <p>
            <label for="address">住所 <input type="text" name="address" value="{{ old('address', $address) }}"></label>
        </p>
        <p>
            <label for="phone_number">電話番号 <input type="text" name="phone_number"
                    value="{{ old('phone_number') }}"></label>
        </p>

        {{-- <input type="submit" value="登録"> --}}
        <input type="submit" value="登録">
    </form>
    <button type=“button” onclick="location.href='/customers/create'">郵便番号検索に戻る</button>
</body>

</html>
