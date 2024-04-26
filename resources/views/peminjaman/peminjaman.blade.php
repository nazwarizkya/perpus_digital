@extends('layouts.master')

@section('content')
<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                    <div class="card-body">
                        <div class="mb-4">Data Peminjaman</h1>
                        <br>
                        <br>

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

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                <tr>
                                    <th class="px-4 py-2">Nama Peminjam</th>
                                    <th class="px-4 py-2">Buku yang Dipinjam</th>
                                    <th class="px-4 py-2">Tgl Peminjaman</th>
                                    <th class="px-4 py-2">Tgl Harus kembali</th>
                                    <th class="px-4 py-2">tgl Pengembalian </th>
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
                                        <td class="px-4 py-2">{{ $p->sekarang }}</td>
                                      
                                        <td class="px-4 py-2">

                                       
                                            @if ($p->status === 'Dipinjam')
                                            <span class="badge bg-warning">{{ $p->status }}</span>
                                            @elseif ($p->status === 'Dikembalikan')
                                            <span class="badge bg-primary">{{ $p->status }}</span>
                                            @elseif ($p->status === 'Denda')
                                            <span class="badge bg-danger">{{ $p->status }}</span>
                                            @endif
                                    
                                        <td class="px-4 py-2">
                                            @if($p->status === 'Dipinjam')
                                                <form id="from_{{$p->id}}"action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-dark" type="submit">

                                        <i class="fas fa-sync"> Kembalikan</i>    
                                        </button>

                                        @elseif ($p->status ==='Denda')
                                        <a href="{{route ('peminjaman.denda', $p->id)}}" class="btn btn-danger">
                                            Bayar denda
                                        </a>
                                           
                                            @else($p-> === 'Dikembalikan')
                                                -
                                            @endif
                                        </td>
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