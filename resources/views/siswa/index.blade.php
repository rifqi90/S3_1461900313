@extends('layout')

@section('content')

<head>
    <title>Siswa</title>
</head>
<table style="border: solid 1px; width: 50%; font-size: 2cm" >
    <thead>
        <th scope = "col" >Id</ th >
        <th scope = "col" >Nama</ th >
        <th scope = "col" >Alamat</ th >
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Zam</td>
            <td>Kalimantan</td>
        </tr>    
        
        <tr>
            <td>2</td>
            <td>Arif</td>
            <td>Sidoarjo</td>
        </tr>    
        @foreach ($siswa as $siswa)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $siswa->id }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a href="{{ route('siswa.show', $siswa->id) }}">
                                Lihat
                            </a>

                            <a href="{{ route('siswa.edit', $siswa->id) }}">
                                Edit
                            </a>

                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus data #{{ $siswa->id }}?')">
                                Hapus
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>

@stop