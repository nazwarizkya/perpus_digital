@extends ('layouts.master')
@section ('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="mb-4">
                        <a class="btn btn-dark" href="{{route('kategori.create')}}">
                            + Tambah Data Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama Kategori</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $k)
                            <tr>
                                <td class="px-4 py-2">{{ $k->nama_kategori }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('kategori.destroy', $k->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-trash-alt"></i>    
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
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