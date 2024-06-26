@extends('layouts.master')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List Buku</div>

                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('buku.create') }}" class="btn btn-dark">
                                + Tambah Data Buku
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead class="bg-dark text-white">
                                    <th>foto</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                  
                                    <th>Aksi</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($buku as $b)
                                    <tr>
                                    <td class="px-4 py-2 border">
                                        <img src="{{ asset('storage/'.$b->foto) }}" alt="Foto Buku" width="100">
                                    </td>
                                        <td>{{ $b->judul }}</td>
                                        <td>{{ $b->penulis }}</td>
                                        <td>{{ $b->penerbit }}</td>
                                        <td>{{ $b->tahun_terbit }}</td>
                                 
                                       
                              
                                    <td>
                                    <form action="{{ route('buku.destroy', $b->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                         
                                        <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-trash-alt"></i>    
                                        </button>
                                 
                                        <a class="btn btn-dark" href="{{ route('buku.edit', $b->id) }}">
                                        <i class="fa  fa-edit"></i> 
                                    </a>
                                      
                                        </button>  
                                        </form>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data buku.</td>
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