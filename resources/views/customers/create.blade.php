<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zipcode create</title>
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
    <h1>郵便番号検索画面</h1>
    @csrf
    <p>
        <label for="name">郵便番号検索 <input type="text" name="name" placeholder="検索したい郵便番号">
            <button type=“button” onclick="location.href='/customers/address'">検索</button>
    </p>
    </form>
    <button type=“button” onclick="location.href='/customers'">一覧に戻る</button>

</body>

</html>
