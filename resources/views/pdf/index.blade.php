<html>
<head>
  <title>Laporan PDF</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
          <h2>{{$title}}</h2>
          <h4>{{$date}}</h4>
        </div>
      </div>
    </div><br>
    <table class="table table-bordered">
      <tr>
        <th scope="col" class="px-6 py-3">ID Buku</th>
        <th scope="col" class="px-6 py-3">Judul</th>
        <th scope="col" class="px-6 py-3">Penulis</th>
        <th scope="col" class="px-6 py-3">Penerbit</th>
        <th scope="col" class="px-6 py-3">Tahun Terbit</th>
      </tr>
      @foreach ($bukus as $buku)
      <tr>
        <td>{{ $buku->bukuID }}</td>
        <td>{{ $buku->judul }}</td>
        <td>{{ $buku->penulis }}</td>
        <td>{{ $buku->penerbit }}</td>
        <td>{{ $buku->tahun_terbit }}</td>
      </tr>
      @endforeach
    </table>
<br>
    <table class="table table-bordered">
        <tr>
          <th scope="col" class="px-6 py-3">ID Peminjaman</th>
          <th scope="col" class="px-6 py-3">User</th>
          <th scope="col" class="px-6 py-3">Buku</th>
          <th scope="col" class="px-6 py-3">Tanggal Peminjaman</th>
          <th scope="col" class="px-6 py-3">Tanggal Pengembalian</th>
          <th scope="col" class="px-6 py-3">Status peminjaman</th>
        </tr>
        @foreach ($peminjaman as $pinjam)
        <tr>
          <td>{{ $pinjam->peminjamanID }}</td>
          <td>{{ $pinjam->users->namalengkap }}</td>
          <td>{{ $pinjam->buku->judul }}</td>
          <td>{{ $pinjam->tanggalpeminjaman }}</td>
          <td>{{ $pinjam->tanggalpengembalian }}</td>
          <td>{{ $pinjam->statuspeminjaman == 1? 'Pinjam' : 'Di Kembalikan' }}</td>
        </tr>
        @endforeach
      </table>
<br>
      <table class="table table-bordered">
        <tr>
            <th scope="col" class="px-6 py-3">ID User</th>
            <th scope="col" class="px-6 py-3">Username</th>
            <th scope="col" class="px-6 py-3">Nama Lengkap</th>
            <th scope="col" class="px-6 py-3">Alamat</th>
            <th scope="col" class="px-6 py-3">Email</th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->namalengkap }}</td>
          <td>{{ $user->alamat }}</td>
          <td>{{ $user->email }}</td>
        </tr>
        @endforeach
      </table>
  </div>
</body>
</html>