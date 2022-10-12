@extends('layout.index')
@section('title', 'Arsipkan Surat')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <p style="font-size: 32px; margin-top: 15px;">ARSIP SURAT >> UNGGAH</p><br>
                <h4>
                    Unggah surat yang telah terbit pada form ini untuk diarsipkan.
                </h4>
                <h4 style="font-weight: bold;">Catatan</h4>
                <ul>
                    <li>
                        <p">Gunakan Form Berformat PDF</p>
                    </li>
                </ul>
                <br>
                <form class="forms-sample" action="{{route('arsip_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nomor_surat" id="exampleInputUsername2" placeholder="Nomor Surat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-4">
                            <select class="js-example-basic-single w-100 select2-hidden-accessible" name="kategori" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option>Pilih Kategori Surat</option>
                                <option value="Undangan">Undangan</option>
                                <option value="Pengumuman">Pengumuman</option>
                                <option value="Nota Dinas">Nota Dinas</option>
                                <option value="Pemberitahuan">Pemberitahuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" id="exampleInputMobile" placeholder="Judul">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                        <input type="file" name="file" class="file-upload-default">
                        <div class="input-group col-sm-5">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <a href="{{route('arsipindex')}}" class="btn btn-light"><b> Kembali<< </b> </a>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection