@extends('auth.layouts.master')

@section('title', 'Админ панель')

@section('content')

    <div class="col-md-12 mt-5">
        <h1>Распределение ролей пользователей</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Имя пользователя</th>
                <th>Email</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                <a class="btn btn-warning" type="button" href="{{ route('users.edit', $user) }}">Редактировать пользователя</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить пользователя">
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <a class="btn btn-success" type="button" href="{{ route('users.create', $user) }}">Добавить пользователя</a>
    </div>


@endsection
