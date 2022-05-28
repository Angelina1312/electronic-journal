@extends('auth.layouts.master')

@section('title', 'Расписание')

@section('content')
    <div class="col-md-12 mt-5">
        <h1>Пара № {{ $raspisanie->num_para }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Начало занятия</th>
                <th>Конец занятия</th>
                <th>Группа</th>
                <th>Предмет</th>
                <th>Аудитория</th>
            </tr>
                <tr>
                    <td>{{ $raspisanie->num_para}}</td>
                    <td>{{ $raspisanie->start }}</td>
                    <td>{{ $raspisanie->end }}</td>
                    <td>{{ $raspisanie->name_group }}</td>
                    <td>{{ $raspisanie->predmet }}</td>
                    <td>{{ $raspisanie->auditor }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
