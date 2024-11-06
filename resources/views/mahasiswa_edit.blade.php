@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit data mahasiswa
                    </div>
                    <div class="card-body">
                        <form action="{{ url('mahasiswa/' . $mahasiswa->id, []) }}" method="POST">

                            @method('PUT')
                            @csrf
                            <x-form-input label="nim" name="nim" value="{{ $mahasiswa->nim ?? old('nim') }}" />

                            <x-form-input label="nama" name="nama" value="{{ $mahasiswa->nama ?? old('nama') }}" />

                            <x-form-input label="Email" name="email" value="{{ $mahasiswa->email ?? old('email') }}" />

                            <div class="form-group">
                                <label for="jurusan">jurusan</label>
                                <select id="jurusan" class="form-control" name="jurusan">
                                    @foreach ($list_mahasiswa as $a)
                                        <option value="{{ $a }}" @selected($a == $mahasiswa->jurusan))>
                                            {{ $a }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <x-form-input label="No HP" name="nomor_hp"
                                value="{{ $mahasiswa->nomor_hp ?? old('nomor_hp') }}" />

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                    </form>
                </div>`

            </div>
        </div>
    </div>
    </div>
@endsection
