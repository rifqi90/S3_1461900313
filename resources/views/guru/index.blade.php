@extends('layout')

@section('content')

<head>
    <title>Guru</title>
</head>
<table style="border: solid 1px; width: 50%; font-size: 2cm" >
    <thead>
        <th scope = "col" >Id</ th >
        <th scope = "col" >Nama</ th >
        <th scope = "col" >Mengajar</ th >
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Ade</td>
            <td>Matematika</td>
        </tr>    
        
        @foreach ($guru as $guru)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $guru->id }}</td>
                <td>{{ $guru->nama }}</td>
                <td>
                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a href="{{ route('guru.show', $guru->id) }}">
                                Lihat
                            </a>

                            <a href="{{ route('guru.edit', $guru->id) }}">
                                Edit
                            </a>

                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus data #{{ $guru->id }}?')">
                                Hapus
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>

@stop