@extends('layout.index')
@section('title', 'Arsip Surat')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="tulisan" style="margin-left: 100px;">
                        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">ARSIP SURAT</h2>
                        <h4 class="card-description">
                            Berikut ini adalah surat surat yang terbit dan diarsipkan.
                        </h4>
                        <h4 class="card-description" style="margin-top: -5px;">Klik "Lihat" pada kolom aksi untuk menampilkan surat.</h4>
                    </div>

                    <div class="table-responsive pt-3">
                        <form action="{{route('cari')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control col-sm-6" name="cari" placeholder="Cari Surat" aria-label="Cari Surat" value="{{old('cari')}}" style="margin-left: 100px;">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered">
                            <thead style="background-color: #6AB6D7;">
                                <tr>
                                    <th style="font-weight: bold; font-size: large;">
                                        Nomor Surat
                                    </th>
                                    <th style="font-weight: bold; font-size: large;">
                                        Kategori
                                    </th>
                                    <th style="font-weight: bold; font-size: large;">
                                        Judul
                                    </th style="font-weight: bold; font-size: large;">
                                    <th style="font-weight: bold; font-size: large;">
                                        Waktu Pengarsipan
                                    </th>
                                    <th style="font-weight: bold; font-size: large;">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                <tr>
                                    <td>
                                        {{$data->nomor_surat}}
                                    </td>
                                    <td>
                                        {{$data->kategori}}
                                    </td>
                                    <td>
                                        {{$data->judul}}
                                    </td>
                                    <td>
                                        {{$data->created_at->format('m/d/Y')}}
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm deletekpedagang" href="#" data-id="{{ $data->id }}" data-kode="{{ $data->nomor_surat }}">Hapus</a>
                                        <a href="{{route('unduh_arsip',$data->file)}}" class="btn btn-warning btn-sm">
                                            Unduh</a>
                                        <a href="{{ route('lihat_arsip',$data->id) }}" class="btn btn-secondary btn-sm">
                                            Lihat</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('buat_arsip')}}" class="btn btn-secondary" style="margin-top: 10px;"><i class="typcn typcn-upload btn-icon-prepend"></i>
                            Arsipkan Surat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $('.deletekpedagang').click(function() {
        var kpedagangid = $(this).attr('data-id');
        var kpedagangkode = $(this).attr('data-kode');
        swal({
                title: "Yakin?",
                text: "Anda akan menghapus surat dengan nomor surat " + kpedagangkode + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "arsip/destroy/" + kpedagangid + ""
                    swal("Data Berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data Tidak Jadi Dihapus!");
                }
            });
    });
</script>
@endpush