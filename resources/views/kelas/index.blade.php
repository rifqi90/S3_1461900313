@extends('layout')

@section('content')

<head>
    <title>Kelas</title>
</head>
<table style="border: solid 1px; width: 50%; font-size: 2cm" >
    <thead>
        <th scope = "col" >Id</ th >
        <th scope = "col" >Id_Siswa</ th >
        <th scope = "col" >Id_Guru</ th >
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>1</td>
        </tr>    
        
        <tr>
            <td>2</td>
            <td>1</td>
            <td>1</td>
        </tr>    
        @foreach ($kelas as $kelas)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kelas->id }}</td>
                <td>{{ $kelas->id_siswa }}</td>
                <td>
                    <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a href="{{ route('kelas.show', $kelas->id) }}">
                                Lihat
                            </a>

                            <a href="{{ route('kelas.edit', $kelas->id) }}">
                                Edit
                            </a>

                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus data #{{ $kelas->id }}?')">
                                Hapus
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>

@stop