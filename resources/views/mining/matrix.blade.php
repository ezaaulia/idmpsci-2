@extends('layout.main')

@section('isi')

<div class="container">
    <h1>Confusion Matrix</h1>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Actual Positive</th>
                <th>Actual Negative</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Predicted Positive</th>
                <td>{{ $truePositive }}</td>
                <td>{{ $falsePositive }}</td>
            </tr>
            <tr>
                <th>Predicted Negative</th>
                <td>{{ $falseNegative }}</td>
                <td>{{ $trueNegative }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection