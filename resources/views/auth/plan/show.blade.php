@extends('auth.layouts.master')

@section('title', 'План № ' . $plan->id)

@section('content')
    <div class="col-md-12 mt-5">
        <h1>План № {{ $plan->id }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Тема</th>
                <th>План работы</th>
            </tr>
            <tr>
                <td>{{ $plan->id }}</td>
                <td>{{ $plan->subject }}</td>
                <td>{{ $plan->work_plan }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
