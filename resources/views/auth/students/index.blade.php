@extends('auth.layouts.master')

@section('title', 'Студенты')

@section('content')

    <div class="col-md-12 mt-5">
        <h1>Список студентов</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Группа</th>
            </tr>

            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name1 }}</td>
                    <td>{{ $student->name2 }}</td>
                    <td>{{ $student->name3 }}</td>
                    <td>{{ $student->name_group }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('student.destroy', $student) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('student.show', $student) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('student.edit', $student) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>

        <a class="btn btn-success" type="button"
           href="{{ route('student.create', $student) }}">Добавить студента</a>
    </div>


@endsection
