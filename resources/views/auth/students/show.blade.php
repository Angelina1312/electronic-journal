@extends('auth.layouts.master')

@section('title', 'Студент № ' . $student->id)

@section('content')
    <div class="col-md-12 mt-5">
        <h1>Студент № {{ $student->id }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Группа</th>
            </tr>
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name1 }}</td>
                <td>{{ $student->name2 }}</td>
                <td>{{ $student->name3 }}</td>
                <td>{{ $student->name_group }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
