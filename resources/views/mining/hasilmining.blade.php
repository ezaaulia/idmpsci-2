<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Rekomendasi Status Kelas Siswa</title> --}}
    <style>
      /* Gaya tabel */
      table,
      th,
      td {
          border: 1px solid black;
          border-collapse: collapse;
      }

      th,
      td {
          padding: 5px;
          text-align: left;
      }
  </style>
</head>

<body>
  <h2><strong>Rekomendasi Hasil Klasifikasi Siswa</strong></h2>
    <table style="width:100%;">
        <thead>
          <tr>
            <th scope="col" class="text-center align-middle">No.</th>
            <th scope="col" class="text-center align-middle">NIS</th>
            <th scope="col" class="text-center align-middle">Nama Siswa</th>
            <th scope="col" class="text-center align-middle">Asal Sekolah</th>
            <th scope="col" class="text-center align-middle">Hasil Kelas</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($siswa as $s)    
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->asal }}</td>
                <td>{{ $s->hasil_mining }}</td>
            </tr>
            @empty
            <!-- Pesan ketika data kosong -->
            <tr>
                <td colspan="6" style="text-align: center;">
                    <h2><strong>Data kosong!!</strong></h2>
                </td>
            </tr>
          @endforelse
        </tbody>
    </table>
</body>


</html>