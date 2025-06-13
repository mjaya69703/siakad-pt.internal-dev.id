<?php

namespace App\Http\Controllers\Master\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use System
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// Use Models
use App\Models\Keuangan\Saldo;
use App\Models\Pengaturan\WebSetting;
// Use Plugins

class SaldoController extends Controller
{
    public function renderSaldo()
    {
        $user = Auth::user();
        $data['webs'] = WebSetting::first();
        $data['spref'] = $user ? $user->prefix : '';
        $data['menus'] = "Master";
        $data['pages'] = "Saldo";
        $data['academy'] = $data['webs']->school_apps . ' by ' . $data['webs']->school_name;
        $data['saldos'] = Saldo::all();
        
        return view('master.keuangan.saldo-index', $data, compact('user'));
    }

    public function handleSaldo(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'type' => 'required|in:Pemasukan,Pengeluaran',
                'amount' => 'required|numeric|min:0',
                'source' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'tagihan_id' => 'nullable|exists:tagihan_kuliahs,id',
                'transaction_code' => 'required|string|max:255',
            ]);

            // Generate unique codes
            $code = 'SAL-' . Str::random(8);
            $transactionCode = $request->transaction_code ?? 'TRX-' . Str::random(12);
            
            // Create new Saldo
            Saldo::create([
                'code' => $code,
                'type' => $request->type,
                'status' => 'Pending',
                'amount' => $request->amount,
                'transaction_code' => $transactionCode,
                'source' => $request->source,
                'desc' => $request->desc,
                'tagihan_id' => $request->tagihan_id,
                'created_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Saldo berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan Saldo: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateSaldo(Request $request, $code)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'type' => 'required|in:Pemasukan,Pengeluaran',
                'amount' => 'required|numeric|min:0',
                'source' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'status' => 'required|in:Pending,Sukses,Gagal',
                'tagihan_id' => 'nullable|exists:tagihan_kuliahs,id',
                'transaction_code' => 'required|string|max:255',
            ]);

            $saldo = Saldo::where('code', $code)->firstOrFail();

            $saldo->update([
                'type' => $request->type,
                'amount' => $request->amount,
                'source' => $request->source,
                'desc' => $request->desc,
                'status' => $request->status,
                'tagihan_id' => $request->tagihan_id,
                'transaction_code' => $request->transaction_code,
                'updated_by' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Saldo berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Saldo: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteSaldo($code)
    {
        try {
            DB::beginTransaction();

            $saldo = Saldo::where('code', $code)->firstOrFail();

            // Check if saldo is already processed
            if ($saldo->status !== 'Pending') {
                return redirect()->back()->with('error', 'Tidak dapat menghapus Saldo yang sudah diproses');
            }

            $saldo->update([
                'deleted_by' => Auth::id()
            ]);
            $saldo->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Saldo berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus Saldo: ' . $e->getMessage());
        }
    }
}
