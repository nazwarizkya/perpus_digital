@extends('layouts.master')

@section('content')
<div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <b> Edit Kategori</b>
                    </a>
                </div>
            </nav>
            <br>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">nama kategori</label>
                                <input type="text" value="{{$kategori->nama_kategori}}" name="nama_kategori" class="form-control"
                                    id="judul" aria-describedby="emailHelp">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection