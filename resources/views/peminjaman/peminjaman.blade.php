@extends('layouts.master')

@section('content')
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-white">
                        <h1 class="h3 font-weight-bold mb-4">Data Peminjaman</h1>
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('peminjaman.tambah') }}" class="btn btn-dark">
                                + Tambah Data Peminjaman
                            </a>
                            <a href="{{ route('print') }}" class="btn btn-primary">
                            <i class="fa fa-download"></i> Ekpor PDF</a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Nama Peminjam</th>
                                    <th class="px-4 py-2">Buku yang Dipinjam</th>
                                    <th class="px-4 py-2">Tanggal Peminjaman</th>
                                    <th class="px-4 py-2">Tanggal Pengembalian</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peminjaman as $p)
                                    <tr>
                                        <td class="px-4 py-2">{{ $p->user->name }}</td>
                                        <td class="px-4 py-2">{{ $p->buku->judul }}</td>
                                        <td class="px-4 py-2">{{ $p->tanggal_peminjaman }}</td>
                                        <td class="px-4 py-2">{{ $p->tanggal_pengembalian }}</td>
                                        <td class="px-4 py-2">{{ $p->status }}</td>
                                        <td class="px-4 py-2">
                                            @if($p->status === 'Dipinjam')
                                                <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-sync"></i>    
                                        </button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-2 text-center">Tidak ada data buku.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection