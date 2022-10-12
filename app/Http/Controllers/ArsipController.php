<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipModel;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArsipModel::orderBy('id', 'desc')->get();;

        return view('arsip.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nomor_surat' => 'required|string|max:155',
            'kategori' => 'required',
            'judul' => 'required',
            'file' => 'required',
        ]);
        $file = $request->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('asset_baru', $filename);

        $data = new ArsipModel();
        $data->nomor_surat = $request->nomor_surat;
        $data->kategori = $request->kategori;
        $data->judul = $request->judul;
        $data->file = $filename;
        $data->save();

        if ($data) {
            return redirect()
                ->route('arsipindex')
                ->with([
                    'success' => 'Berhasil menambahkan data'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Gagal brow!'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ArsipModel::find($id);
        return view('arsip.lihat', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ArsipModel::find($id);
        return view('arsip.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nomor_surat' => 'required|string|max:155',
            'kategori' => 'required',
            'judul' => 'required',
        ]);

        $data = ArsipModel::find($id);
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048',
            ]);
            $file = $request->file;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('asset_baru', $filename);
        }
        $data->nomor_surat = $request->nomor_surat;
        $data->kategori = $request->kategori;
        $data->judul = $request->judul;
        $data->file = $filename;
        $data->save();
        return redirect()->route('arsipindex')
            ->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ArsipModel::findorfail($id);
        $data->delete();
        return redirect()->route('arsipindex')
            ->with('success', 'Data Berhasil dihapus');
    }
    public function download(Request $request, $file)
    {
        return response()->download(public_path('asset_baru/' . $file));
    }
    public function about()
    {
        return view('about.about');
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $data = ArsipModel::where('nomor_surat', 'like', "%" . $cari . "%")->orwhere('kategori', 'like', "%" . $cari . "%")->orwhere('judul', 'like', "%" . $cari . "%")->paginate(5);
        session()->flashInput($request->input());
        return view('arsip.index', compact('data'));
    }
}
