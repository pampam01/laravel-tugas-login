@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nim</th>
                                    <th>nama</th>
                                    <th>email</th>
                                    <th>jurusan</th>
                                    <th>Nomor Hp</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $mhs->id }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->email }}</td>
                                        <td>{{ $mhs->jurusan }}</td>
                                        <td>{{ $mhs->nomor_hp }}</td>
                                        <td class="d-flex gap-2">
                                            <a class="btn btn-primary"
                                                href="{{ url('mahasiswa/' . $mhs->id . '/edit', []) }}">Edit</a>

                                            <form action="{{ url('mahasiswa/' . $mhs->id, []) }}" method="post"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
