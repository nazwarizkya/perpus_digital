@extends ('layouts.master')
@section ('content')

<div class="container py-4">
<div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="mb-4">
                        <a class="btn btn-dark" href="{{route('kategori.create')}}">
                            + Tambah Data Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
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
                                        
                                        <a class="btn btn-dark" href="{{ route('kategori.edit', $k->id) }}">
                                        <i class="fa  fa-edit"></i> 
                                    </a>
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