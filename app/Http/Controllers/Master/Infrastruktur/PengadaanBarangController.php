<?php

namespace App\Http\Controllers\Master\Infrastruktur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Infrastruktur\PengadaanBarang;
use App\Models\Infrastruktur\Barang;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class PengadaanBarangController extends Controller
{
    public function renderPengadaanBarang()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Pengadaan Barang";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['pengadaanBarangs'] = PengadaanBarang::with('barang')->latest()->get();
        $data['barangs'] = Barang::all();
        
        return view('master.infrastruktur.pengadaan-barang-index', $data, compact('user'));
    }

    public function handlePengadaanBarang(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'barang_id' => 'required|integer|exists:barangs,id',
                'jumlah' => 'required|integer|min:1',
                'harga_satuan' => 'required|integer|min:0',
                'sumber_dana' => 'required|string|max:255',
                'tanggal_pengadaan' => 'required|date',
                'tanggal_pembelian' => 'required|date',
                'status' => 'required|in:Pending,Disetujui,Tidak Disetujui',
                'desc' => 'nullable|string'
            ]);

            // Calculate total price
            $total_harga = $request->jumlah * $request->harga_satuan;

            $code = 'PDB-' . Str::random(8);
            
            PengadaanBarang::create([
                'barang_id' => $request->barang_id,
                'code' => $code,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
                'total_harga' => $total_harga,
                'sumber_dana' => $request->sumber_dana,
                'tanggal_pengadaan' => $request->tanggal_pengadaan,
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'status' => $request->status,
                'desc' => $request->desc,
                'created_by' => Auth::id()
            ]);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.pengadaan-barang-render')->with('success', 'Pengadaan Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function updatePengadaanBarang(Request $request, $code)
    {
        try {
            DB::beginTransaction();
            
            $pengadaanBarang = PengadaanBarang::where('code', $code)->firstOrFail();
            
            $request->validate([
                'barang_id' => 'required|integer|exists:barangs,id',
                'jumlah' => 'required|integer|min:1',
                'harga_satuan' => 'required|integer|min:0',
                'sumber_dana' => 'required|string|max:255',
                'tanggal_pengadaan' => 'required|date',
                'tanggal_pembelian' => 'required|date',
                'status' => 'required|in:Pending,Disetujui,Tidak Disetujui',
                'desc' => 'nullable|string'
            ]);

            // Calculate total price
            $total_harga = $request->jumlah * $request->harga_satuan;
            
            $updateData = [
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
                'total_harga' => $total_harga,
                'sumber_dana' => $request->sumber_dana,
                'tanggal_pengadaan' => $request->tanggal_pengadaan,
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'status' => $request->status,
                'desc' => $request->desc,
                'updated_by' => Auth::id()
            ];
            
            $pengadaanBarang->update($updateData);

            DB::commit();
            $spref = Auth::user() ? Auth::user()->prefix : '';
            return redirect()->route($spref . 'infrastruktur.pengadaan-barang-render')->with('success', 'Data pengadaan barang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function deletePengadaanBarang($code)
    {
        try {
            DB::beginTransaction();

            $pengadaanBarang = PengadaanBarang::where('code', $code)->firstOrFail();

            $pengadaanBarang->update([
                'deleted_by' => Auth::id()
            ]);
            $pengadaanBarang->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Pengadaan Barang berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus pengadaan barang: ' . $e->getMessage());
        }
    }
}
