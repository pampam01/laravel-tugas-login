@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah data mahasiswa
                    </div>
                    <div class="card-body">
                        <form action="{{ url('mahasiswa', []) }}" method="POST">

                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label for="nim">nim</label>
                                <input id="nim" class="form-control" type="text" name="nim"
                                    value="{{ old('nim') }}">

                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" class="form-control" type="text" name="nama"
                                    value="{{ old('nama') }}">

                            </div>

                            <div class="form-group">
                                <label for="email">email</label>
                                <input id="email" class="form-control" type="text" name="email"
                                    value="{{ old('email') }}">

                            </div>

                            <div class="form-group">
                                <label for="jurusan">jurusan</label>
                                <select id="jurusan" class="form-control" name="jurusan">
                                    @foreach ($list_mahasiswa as $a)
                                        <option value="{{ $a }}" @selected($a == old('jurusan'))>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input id="no_hp" class="form-control" type="text" name="nomor_hp"
                                    value="{{ old('nomor_hp') }}">

                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
