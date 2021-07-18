<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <p class="title">Todo List</p>
        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form action="/todo/create" method="post" class="form-add">
            @csrf
            <input type="text" name="content" value="{{ $input }}" class="input-add">
            <button type="submit" class="button-add">追加</button>
        </form>
        @if (count($todos) > 0)
        <table>
            <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
            </tr>
            @foreach ($todos as $todo)
            <tr>
                <form action="/todo/update" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $todo->id }}">
                    <td>{{ $todo->created_at }}</td>
                    <td><input type="text" name="content" value="{{ $todo->content }}" class="input-update"></td>
                    <td><button type="submit" class="button-update">更新</button></td>
                </form>
                <form action="/todo/delete" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $todo->id }}">
                    <td><button type="submit" class="button-delete">削除</button></td>
                </form>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>
</body>
</html>
