<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-pendaftar-debug', function() {
    try {
        // Test import classes one by one
        $pendaftar = new \App\Models\Pendaftaran\Pendaftar();
        echo "✓ Pendaftar model OK<br>";
        
        $gelombang = new \App\Models\PMB\GelombangPendaftaran();
        echo "✓ GelombangPendaftaran model OK<br>";
        
        $jalur = new \App\Models\PMB\JalurPendaftaran();
        echo "✓ JalurPendaftaran model OK<br>";
        
        $periode = new \App\Models\PMB\PeriodePendaftaran();
        echo "✓ PeriodePendaftaran model OK<br>";
        
        $taka = new \App\Models\Akademik\TahunAkademik();
        echo "✓ TahunAkademik model OK<br>";
        
        // Test the controller
        $controller = new \App\Http\Controllers\Master\PMB\PendaftarController();
        echo "✓ PendaftarController OK<br>";
        
        echo "<br><strong>All imports successful!</strong>";
        
    } catch (\Exception $e) {
        echo "❌ Error: " . $e->getMessage();
        echo "<br>File: " . $e->getFile();
        echo "<br>Line: " . $e->getLine();
        echo "<br><pre>" . $e->getTraceAsString() . "</pre>";
    }
});
