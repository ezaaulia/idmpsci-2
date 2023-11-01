

<h1>Hasil Prediksi</h1>

<table>
    <thead>
        <tr>
            <th>Data Pengujian</th>
            <th>Hasil Prediksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($predictions as $index => $prediction)
            <tr>
                <td>Data ke {{ $index + 1 }}</td>
                <td>{{ $prediction }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

