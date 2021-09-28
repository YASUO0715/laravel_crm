<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer edit</title>
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
    <h1>編集画面</h1>
    <!-- 更新先はitemsのidにしないと増える php artisan rote:listで確認① -->
    <form action="/customers/{{ $customer->id }}" method="post">
        @csrf
        <!-- formタグはPUTやDELETEをサポートしていないため、@ methodで指定する必要がある -->
        @method('PATCH')
        <!-- idはそのまま -->
        <input type="hidden" name="id" value="{{ $customer->id }}">
        <p>
            <label for="name">名前 <input type="string" name="name" value="{{ old('name', $customer->name) }}"></label>
        </p>
        <p>
            <label for="email">メールアドレス <input type="text" name="email"
                    value="{{ old('email', $customer->email) }}"></label>
        </p>
        <p>
            <label for="zipcode">郵便番号 <input type="number" name="zipcode"
                    value="{{ old('zipcode', $customer->zipcode) }}"></label>
        </p>
        <p>
            <label for="address">住所 <input type="text" name="address"
                    value="{{ old('address', $customer->address) }}"></label>
        </p>
        <p>
            <label for="phoneNumber">電話番号 <input type="string" name="phoneNumber"
                    value="{{ old('phoneNumber', $customer->phoneNumber) }}"></label>
        </p>
        <input type="submit" value="更新">
        <p><b><a href="/customers">戻る</a></b></p>
    </form>
</body>

</html>
