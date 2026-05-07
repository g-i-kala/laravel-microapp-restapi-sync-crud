<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FakeStore Sync Preview</title>
</head>

<body>
    <h1>FakeStore Sync Preview</h1>

    @if ($error)
        <p style="color: red;">{{ $error }}</p>
    @else
        <p>Total items in API: {{ $count }}</p>

        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>API ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['external_id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['category_name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>

</html>
