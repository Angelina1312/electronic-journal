@extends('auth.layouts.master')

@section('title', 'Студент №' . $journal->id)

@section('content')
    <div class="col-md-12 mt-5">
        <h1>Студент № {{ $journal->id }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>ФИО студента</th>
                <th>Оценка</th>
            </tr>
            <tr>
                <td>{{ $journal->id }}</td>
                <td>{{ $journal->name_student }}</td>
                <td>{{ $journal->presence }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
