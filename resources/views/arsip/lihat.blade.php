@extends('layout.index')
@section('title', 'Lihat Arsip')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <p style="font-size: 32px; margin-top: 15px;">Arsip Surat >> Lihat</p><br>
                <h4 style="font-weight: bold;">Nomor : {{$data->nomor_surat}}</h4>
                <h4 style="font-weight: bold;">Kategori : {{$data->kategori}}</h4>
                <h4 style="font-weight: bold;">Judul : {{$data->judul}}</h4>
                <h4 style="font-weight: bold;">Waktu Unggah : {{$data->created_at}}</h4>
                <br>
                <iframe src="/asset_baru/{{$data->file}}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                <br></br>
                <a href="{{route('arsipindex')}}" class="btn btn-danger">
                    << Kembali </a>
                        <a href="{{route('unduh_arsip',$data->file)}}" class="btn btn-warning">
                            Unduh</a>
                        <a href="{{ route('edit_arsip',$data->id) }}" class="btn btn-secondary">
                            Edit/Ganti File</a>
            </div>
        </div>
    </div>
</div>
@endsection