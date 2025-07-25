<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ehfPu47sQzGEbtGa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tHMYIGyHOdl6V92K',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2PHFCkhvYqAnlDCE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'root.home-index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pengumuman' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'root.pengumuman-index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kalender-akademik' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'root.kalender-akademik-index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/welcome' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'root.welcome',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setup.process',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auth.render-signin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'auth.handle-signin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auth.render-forgot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'auth.handle-forgot',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auth.handle-logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/error/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'error.verify',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/error/access' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'error.access',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/error/notfound' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'error.notfound',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.handle-logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.dashboard-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.profile-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.profile-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.absensi-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.absensi-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/tahun-akademik' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.taka-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.taka-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/program-studi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.prodi-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.prodi-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/fakultas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.fakultas-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.fakultas-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/kurikulum' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kurikulum-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kurikulum-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/mata-kuliah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.mata-kuliah-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.mata-kuliah-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/kelas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kelas-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kelas-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/jadwal-kuliah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jadwal-kuliah-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jadwal-kuliah-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/jenis-kelas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jenis-kelas-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jenis-kelas-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/akademik/waktu-kuliah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.waktu-kuliah-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.waktu-kuliah-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/periode' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.periode-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.periode-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/jalur' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jalur-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jalur-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/biaya' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.biaya-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.biaya-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/syarat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.syarat-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.syarat-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/gelombang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.gelombang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.gelombang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/jadwal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jadwal-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jadwal-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/pendaftar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/pendaftar/export/excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-export-excel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/pendaftar/export/pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-export-pdf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pmb/pendaftar/batch/status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-batch-status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengguna/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.users-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.users-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengguna/dosen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.dosen-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.dosen-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengguna/mahasiswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.mahasiswa-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.mahasiswa-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/publikasi/kategori' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.kategori-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.kategori-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/publikasi/berita' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.berita-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.berita-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/publikasi/pengumuman' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.pengumuman-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.pengumuman-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/publikasi/galeri' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengaturan/web-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.web-settings-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.web-settings-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengaturan/export-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.export-database',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengaturan/import-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.import-database',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengaturan/log-aktivitas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.log-aktivitas-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/pengaturan/log-aktivitas/filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.log-aktivitas-filter',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/gedung' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.gedung-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.gedung-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/ruang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.ruang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.ruang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/kategori-barang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.kategori-barang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.kategori-barang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/barang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.barang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.barang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/mutasi-barang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.mutasi-barang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.mutasi-barang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/pengadaan-barang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.pengadaan-barang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.pengadaan-barang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/infrastruktur/inventaris-barang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.inventaris-barang-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.inventaris-barang-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/keuangan/saldo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.saldo-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.saldo-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-admin/keuangan/tagihan-kuliah-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-render',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-handle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/livewire/preview\\-file/([^/]++)(*:39)|/pengumuman/([^/]++)/view(*:71)|/kalender\\-akademik/([^/]++)/view(*:111)|/web\\-admin/(?|a(?|bsen/([^/]++)(*:151)|kademik/(?|tahun\\-akademik/([^/]++)(?|(*:197))|program\\-studi/([^/]++)(?|(*:232))|fakultas/([^/]++)(?|(*:261))|k(?|urikulum/([^/]++)(?|(*:294))|elas/([^/]++)(?|(*:319)))|mata\\-kuliah/([^/]++)(?|(*:353))|j(?|adwal\\-kuliah/([^/]++)(?|(*:391))|enis\\-kelas/([^/]++)(?|(*:423)))|get\\-waktu\\-kuliah/([^/]++)(*:460)|waktu\\-kuliah/([^/]++)(?|(*:493))))|p(?|mb/(?|pe(?|riode/([^/]++)(?|(*:536))|ndaftar/(?|([^/]++)(?|(*:567)|/(?|dokumen(*:586)|validasi(*:602)))|batch/validasi(*:626)))|ja(?|lur/([^/]++)(?|(*:656))|dwal/([^/]++)(?|(*:681)))|biaya/([^/]++)(?|(*:708))|syarat/([^/]++)(?|(*:735))|gelombang/([^/]++)(?|(*:765)))|eng(?|guna/(?|users/([^/]++)(?|/(?|views(*:815)|profile(*:830))|(*:839))|dosen/([^/]++)(?|/(?|views(*:874)|profile(*:889))|(*:898))|mahasiswa/([^/]++)(?|/(?|views(*:937)|profile(*:952))|(*:961)))|aturan/log\\-aktivitas/([^/]++)(?|/view(*:1009)|(*:1018)))|ublikasi/(?|kategori/([^/]++)(?|(*:1061))|berita/([^/]++)(?|/view(*:1094)|(*:1103))|pengumuman/([^/]++)(?|/view(*:1140)|(*:1149))|galeri/(?|([^/]++)(?|/(?|view(*:1188)|foto(*:1201))|(*:1211))|foto/([^/]++)(*:1234))))|infrastruktur/(?|gedung/([^/]++)(?|(*:1281))|ruang/([^/]++)(?|(*:1308))|kategori\\-barang/([^/]++)(?|(*:1346))|barang/([^/]++)(?|(*:1374))|mutasi\\-barang/([^/]++)(?|(*:1410))|pengadaan\\-barang/([^/]++)(?|(*:1449))|inventaris\\-barang/([^/]++)(?|(*:1489)))|keuangan/(?|saldo/([^/]++)(?|(*:1529))|tagihan\\-kuliah\\-group/([^/]++)(?|(*:1573)|/(?|publish(*:1593)|archive(*:1609)|detail(*:1624))))))/?$}sDu',
    ),
    3 => 
    array (
      39 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      71 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'root.pengumuman-view',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      111 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'root.kalender-akademik-view',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      151 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.absensi-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.taka-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.taka-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      232 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.prodi-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.prodi-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      261 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.fakultas-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.fakultas-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      294 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kurikulum-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kurikulum-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kelas-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.kelas-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      353 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.mata-kuliah-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.mata-kuliah-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jadwal-kuliah-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jadwal-kuliah-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      423 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jenis-kelas-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.jenis-kelas-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      460 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.get-waktu-kuliah',
          ),
          1 => 
          array (
            0 => 'jenis_kelas_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.waktu-kuliah-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.akademik.waktu-kuliah-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.periode-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.periode-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-detail',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      586 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-dokumen-handle',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-validasi',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.pendaftar-batch-validasi',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      656 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jalur-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jalur-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jadwal-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.jadwal-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      708 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.biaya-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.biaya-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.syarat-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.syarat-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      765 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.gelombang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pmb.gelombang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      815 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.users-views',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.users-profile',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      839 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.users-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.users-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.dosen-views',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      889 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.dosen-profile',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.dosen-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.dosen-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      937 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.mahasiswa-views',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.mahasiswa-profile',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      961 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.mahasiswa-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengguna.mahasiswa-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1009 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.log-aktivitas-view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1018 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.pengaturan.log-aktivitas-delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1061 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.kategori-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.kategori-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1094 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.berita-view',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1103 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.berita-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.berita-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.pengumuman-view',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1149 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.pengumuman-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.pengumuman-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-view',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1201 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-foto-handle',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1211 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.publikasi.galeri-foto-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.gedung-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.gedung-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1308 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.ruang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.ruang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1346 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.kategori-barang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.kategori-barang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.barang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.barang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1410 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.mutasi-barang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.mutasi-barang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1449 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.pengadaan-barang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.pengadaan-barang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.inventaris-barang-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.infrastruktur.inventaris-barang-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.saldo-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.saldo-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-update',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-delete',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1593 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-publish',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1609 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-archive',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1624 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.keuangan.tagihan-kuliah-group-detail',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ehfPu47sQzGEbtGa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::ehfPu47sQzGEbtGa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tHMYIGyHOdl6V92K' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::tHMYIGyHOdl6V92K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2PHFCkhvYqAnlDCE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000007a90000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2PHFCkhvYqAnlDCE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'root.home-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\RootController@renderHomePage',
        'controller' => 'App\\Http\\Controllers\\RootController@renderHomePage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'root.home-index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'root.pengumuman-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pengumuman',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\RootController@renderPengumuman',
        'controller' => 'App\\Http\\Controllers\\RootController@renderPengumuman',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'root.pengumuman-index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'root.pengumuman-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pengumuman/{code}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\RootController@renderPengumumanView',
        'controller' => 'App\\Http\\Controllers\\RootController@renderPengumumanView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'root.pengumuman-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'root.kalender-akademik-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kalender-akademik',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\RootController@renderKalenderAkademik',
        'controller' => 'App\\Http\\Controllers\\RootController@renderKalenderAkademik',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'root.kalender-akademik-index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'root.kalender-akademik-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kalender-akademik/{code}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\RootController@renderKalenderAkademikView',
        'controller' => 'App\\Http\\Controllers\\RootController@renderKalenderAkademikView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'root.kalender-akademik-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'root.welcome' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'welcome',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\RootController@renderWelcome',
        'controller' => 'App\\Http\\Controllers\\RootController@renderWelcome',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'root.welcome',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setup.process' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SetupController@processSetup',
        'controller' => 'App\\Http\\Controllers\\SetupController@processSetup',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'setup.process',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.render-signin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
          2 => 'first.setup',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@renderSignin',
        'controller' => 'App\\Http\\Controllers\\AuthController@renderSignin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.render-signin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.handle-signin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
          2 => 'first.setup',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@handleSignin',
        'controller' => 'App\\Http\\Controllers\\AuthController@handleSignin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.handle-signin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.render-forgot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
          2 => 'first.setup',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@renderForgot',
        'controller' => 'App\\Http\\Controllers\\AuthController@renderForgot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.render-forgot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.handle-forgot' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
          2 => 'first.setup',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@handleForgot',
        'controller' => 'App\\Http\\Controllers\\AuthController@handleForgot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.handle-forgot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.handle-logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
          2 => 'first.setup',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@handleLogout',
        'controller' => 'App\\Http\\Controllers\\AuthController@handleLogout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.handle-logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'error.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'error/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Root\\ErrorController@ErrorVerify',
        'controller' => 'App\\Http\\Controllers\\Root\\ErrorController@ErrorVerify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'error.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'error.access' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'error/access',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Root\\ErrorController@ErrorAccess',
        'controller' => 'App\\Http\\Controllers\\Root\\ErrorController@ErrorAccess',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'error.access',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'error.notfound' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'error/notfound',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Root\\ErrorController@ErrorNotFound',
        'controller' => 'App\\Http\\Controllers\\Root\\ErrorController@ErrorNotFound',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'error.notfound',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.handle-logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@handleLogout',
        'controller' => 'App\\Http\\Controllers\\AuthController@handleLogout',
        'as' => 'web-admin.handle-logout',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.dashboard-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Private\\User\\RootController@renderDashboard',
        'controller' => 'App\\Http\\Controllers\\Private\\User\\RootController@renderDashboard',
        'as' => 'web-admin.dashboard-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.profile-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Private\\User\\RootController@renderProfile',
        'controller' => 'App\\Http\\Controllers\\Private\\User\\RootController@renderProfile',
        'as' => 'web-admin.profile-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.profile-handle' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Private\\User\\RootController@handleProfile',
        'controller' => 'App\\Http\\Controllers\\Private\\User\\RootController@handleProfile',
        'as' => 'web-admin.profile-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.absensi-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Private\\User\\Pages\\AbsensiController@renderAbsensi',
        'controller' => 'App\\Http\\Controllers\\Private\\User\\Pages\\AbsensiController@renderAbsensi',
        'as' => 'web-admin.absensi-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.absensi-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Private\\User\\Pages\\AbsensiController@handleAbsensi',
        'controller' => 'App\\Http\\Controllers\\Private\\User\\Pages\\AbsensiController@handleAbsensi',
        'as' => 'web-admin.absensi-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.absensi-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/absen/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Private\\User\\Pages\\AbsensiController@updateAbsensi',
        'controller' => 'App\\Http\\Controllers\\Private\\User\\Pages\\AbsensiController@updateAbsensi',
        'as' => 'web-admin.absensi-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.taka-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/tahun-akademik',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@renderTaka',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@renderTaka',
        'as' => 'web-admin.akademik.taka-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.taka-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/tahun-akademik',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@handleTaka',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@handleTaka',
        'as' => 'web-admin.akademik.taka-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.taka-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/tahun-akademik/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@updateTaka',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@updateTaka',
        'as' => 'web-admin.akademik.taka-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.taka-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/tahun-akademik/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@deleteTaka',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\TahunAkademikController@deleteTaka',
        'as' => 'web-admin.akademik.taka-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.prodi-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/program-studi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@renderProdi',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@renderProdi',
        'as' => 'web-admin.akademik.prodi-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.prodi-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/program-studi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@handleProdi',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@handleProdi',
        'as' => 'web-admin.akademik.prodi-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.prodi-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/program-studi/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@updateProdi',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@updateProdi',
        'as' => 'web-admin.akademik.prodi-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.prodi-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/program-studi/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@deleteProdi',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\ProgramStudiController@deleteProdi',
        'as' => 'web-admin.akademik.prodi-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.fakultas-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/fakultas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@renderFakultas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@renderFakultas',
        'as' => 'web-admin.akademik.fakultas-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.fakultas-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/fakultas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@handleFakultas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@handleFakultas',
        'as' => 'web-admin.akademik.fakultas-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.fakultas-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/fakultas/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@updateFakultas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@updateFakultas',
        'as' => 'web-admin.akademik.fakultas-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.fakultas-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/fakultas/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@deleteFakultas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\FakultasController@deleteFakultas',
        'as' => 'web-admin.akademik.fakultas-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kurikulum-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/kurikulum',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@renderKurikulum',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@renderKurikulum',
        'as' => 'web-admin.akademik.kurikulum-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kurikulum-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/kurikulum',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@handleKurikulum',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@handleKurikulum',
        'as' => 'web-admin.akademik.kurikulum-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kurikulum-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/kurikulum/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@updateKurikulum',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@updateKurikulum',
        'as' => 'web-admin.akademik.kurikulum-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kurikulum-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/kurikulum/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@deleteKurikulum',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KurikulumController@deleteKurikulum',
        'as' => 'web-admin.akademik.kurikulum-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.mata-kuliah-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/mata-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@renderMataKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@renderMataKuliah',
        'as' => 'web-admin.akademik.mata-kuliah-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.mata-kuliah-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/mata-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@handleMataKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@handleMataKuliah',
        'as' => 'web-admin.akademik.mata-kuliah-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.mata-kuliah-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/mata-kuliah/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@updateMataKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@updateMataKuliah',
        'as' => 'web-admin.akademik.mata-kuliah-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.mata-kuliah-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/mata-kuliah/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@deleteMataKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\MataKuliahController@deleteMataKuliah',
        'as' => 'web-admin.akademik.mata-kuliah-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kelas-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/kelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@renderKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@renderKelas',
        'as' => 'web-admin.akademik.kelas-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kelas-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/kelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@handleKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@handleKelas',
        'as' => 'web-admin.akademik.kelas-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kelas-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/kelas/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@updateKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@updateKelas',
        'as' => 'web-admin.akademik.kelas-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.kelas-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/kelas/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@deleteKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\KelasController@deleteKelas',
        'as' => 'web-admin.akademik.kelas-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jadwal-kuliah-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/jadwal-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@renderJadwalKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@renderJadwalKuliah',
        'as' => 'web-admin.akademik.jadwal-kuliah-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jadwal-kuliah-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/jadwal-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@handleJadwalKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@handleJadwalKuliah',
        'as' => 'web-admin.akademik.jadwal-kuliah-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jadwal-kuliah-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/jadwal-kuliah/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@updateJadwalKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@updateJadwalKuliah',
        'as' => 'web-admin.akademik.jadwal-kuliah-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jadwal-kuliah-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/jadwal-kuliah/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@deleteJadwalKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@deleteJadwalKuliah',
        'as' => 'web-admin.akademik.jadwal-kuliah-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.get-waktu-kuliah' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/get-waktu-kuliah/{jenis_kelas_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@getWaktuKuliahByJenisKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JadwalKuliahController@getWaktuKuliahByJenisKelas',
        'as' => 'web-admin.akademik.get-waktu-kuliah',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jenis-kelas-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/jenis-kelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@renderJenisKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@renderJenisKelas',
        'as' => 'web-admin.akademik.jenis-kelas-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jenis-kelas-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/jenis-kelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@handleJenisKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@handleJenisKelas',
        'as' => 'web-admin.akademik.jenis-kelas-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jenis-kelas-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/jenis-kelas/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@updateJenisKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@updateJenisKelas',
        'as' => 'web-admin.akademik.jenis-kelas-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.jenis-kelas-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/jenis-kelas/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@deleteJenisKelas',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\JenisKelasController@deleteJenisKelas',
        'as' => 'web-admin.akademik.jenis-kelas-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.waktu-kuliah-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/akademik/waktu-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@renderWaktuKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@renderWaktuKuliah',
        'as' => 'web-admin.akademik.waktu-kuliah-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.waktu-kuliah-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/akademik/waktu-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@handleWaktuKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@handleWaktuKuliah',
        'as' => 'web-admin.akademik.waktu-kuliah-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.waktu-kuliah-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/akademik/waktu-kuliah/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@updateWaktuKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@updateWaktuKuliah',
        'as' => 'web-admin.akademik.waktu-kuliah-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.akademik.waktu-kuliah-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/akademik/waktu-kuliah/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@deleteWaktuKuliah',
        'controller' => 'App\\Http\\Controllers\\Master\\Akademik\\WaktuKuliahController@deleteWaktuKuliah',
        'as' => 'web-admin.akademik.waktu-kuliah-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.periode-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/periode',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@renderPeriode',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@renderPeriode',
        'as' => 'web-admin.pmb.periode-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.periode-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/periode',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@handlePeriode',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@handlePeriode',
        'as' => 'web-admin.pmb.periode-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.periode-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/periode/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@updatePeriode',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@updatePeriode',
        'as' => 'web-admin.pmb.periode-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.periode-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/periode/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@deletePeriode',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PeriodePendaftaranController@deletePeriode',
        'as' => 'web-admin.pmb.periode-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jalur-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/jalur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@renderJalur',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@renderJalur',
        'as' => 'web-admin.pmb.jalur-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jalur-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/jalur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@handleJalur',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@handleJalur',
        'as' => 'web-admin.pmb.jalur-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jalur-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/jalur/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@updateJalur',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@updateJalur',
        'as' => 'web-admin.pmb.jalur-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jalur-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/jalur/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@deleteJalur',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JalurPendaftaranController@deleteJalur',
        'as' => 'web-admin.pmb.jalur-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.biaya-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/biaya',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@renderBiaya',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@renderBiaya',
        'as' => 'web-admin.pmb.biaya-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.biaya-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/biaya',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@handleBiaya',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@handleBiaya',
        'as' => 'web-admin.pmb.biaya-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.biaya-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/biaya/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@updateBiaya',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@updateBiaya',
        'as' => 'web-admin.pmb.biaya-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.biaya-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/biaya/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@deleteBiaya',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\BiayaPendaftaranController@deleteBiaya',
        'as' => 'web-admin.pmb.biaya-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.syarat-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/syarat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@renderSyarat',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@renderSyarat',
        'as' => 'web-admin.pmb.syarat-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.syarat-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/syarat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@handleSyarat',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@handleSyarat',
        'as' => 'web-admin.pmb.syarat-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.syarat-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/syarat/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@updateSyarat',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@updateSyarat',
        'as' => 'web-admin.pmb.syarat-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.syarat-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/syarat/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@deleteSyarat',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\SyaratPendaftaranController@deleteSyarat',
        'as' => 'web-admin.pmb.syarat-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.gelombang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/gelombang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@renderGelombang',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@renderGelombang',
        'as' => 'web-admin.pmb.gelombang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.gelombang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/gelombang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@handleGelombang',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@handleGelombang',
        'as' => 'web-admin.pmb.gelombang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.gelombang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/gelombang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@updateGelombang',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@updateGelombang',
        'as' => 'web-admin.pmb.gelombang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.gelombang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/gelombang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@deleteGelombang',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\GelombangPendaftaranController@deleteGelombang',
        'as' => 'web-admin.pmb.gelombang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jadwal-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/jadwal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@renderJadwal',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@renderJadwal',
        'as' => 'web-admin.pmb.jadwal-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jadwal-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/jadwal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@handleJadwal',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@handleJadwal',
        'as' => 'web-admin.pmb.jadwal-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jadwal-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/jadwal/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@updateJadwal',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@updateJadwal',
        'as' => 'web-admin.pmb.jadwal-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.jadwal-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/jadwal/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@deleteJadwal',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\JadwalPMBController@deleteJadwal',
        'as' => 'web-admin.pmb.jadwal-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/pendaftar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@renderPendaftar',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@renderPendaftar',
        'as' => 'web-admin.pmb.pendaftar-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/pendaftar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@handlePendaftar',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@handlePendaftar',
        'as' => 'web-admin.pmb.pendaftar-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/pendaftar/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@updatePendaftar',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@updatePendaftar',
        'as' => 'web-admin.pmb.pendaftar-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pmb/pendaftar/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@deletePendaftar',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@deletePendaftar',
        'as' => 'web-admin.pmb.pendaftar-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/pendaftar/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@renderDetail',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@renderDetail',
        'as' => 'web-admin.pmb.pendaftar-detail',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-dokumen-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/pendaftar/{code}/dokumen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@handleDokumen',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@handleDokumen',
        'as' => 'web-admin.pmb.pendaftar-dokumen-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-validasi' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pmb/pendaftar/{code}/validasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@validasiDokumen',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@validasiDokumen',
        'as' => 'web-admin.pmb.pendaftar-validasi',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-export-excel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/pendaftar/export/excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@exportPendaftarExcel',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@exportPendaftarExcel',
        'as' => 'web-admin.pmb.pendaftar-export-excel',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-export-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pmb/pendaftar/export/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@exportPendaftarPDF',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@exportPendaftarPDF',
        'as' => 'web-admin.pmb.pendaftar-export-pdf',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-batch-validasi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/pendaftar/batch/validasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@batchValidasiDokumen',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@batchValidasiDokumen',
        'as' => 'web-admin.pmb.pendaftar-batch-validasi',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pmb.pendaftar-batch-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pmb/pendaftar/batch/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@batchUpdateStatus',
        'controller' => 'App\\Http\\Controllers\\Master\\PMB\\PendaftarController@batchUpdateStatus',
        'as' => 'web-admin.pmb.pendaftar-batch-status',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.users-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengguna/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@renderUsers',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@renderUsers',
        'as' => 'web-admin.pengguna.users-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.users-views' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengguna/users/{code}/views',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@viewUsers',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@viewUsers',
        'as' => 'web-admin.pengguna.users-views',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.users-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pengguna/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@handleUsers',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@handleUsers',
        'as' => 'web-admin.pengguna.users-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.users-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengguna/users/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@updateUsers',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@updateUsers',
        'as' => 'web-admin.pengguna.users-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.users-profile' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengguna/users/{code}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@handleProfile',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@handleProfile',
        'as' => 'web-admin.pengguna.users-profile',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.users-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pengguna/users/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@deleteUsers',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\UsersController@deleteUsers',
        'as' => 'web-admin.pengguna.users-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.dosen-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengguna/dosen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@renderDosen',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@renderDosen',
        'as' => 'web-admin.pengguna.dosen-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.dosen-views' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengguna/dosen/{code}/views',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@viewDosen',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@viewDosen',
        'as' => 'web-admin.pengguna.dosen-views',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.dosen-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pengguna/dosen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@handleDosen',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@handleDosen',
        'as' => 'web-admin.pengguna.dosen-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.dosen-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengguna/dosen/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@updateDosen',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@updateDosen',
        'as' => 'web-admin.pengguna.dosen-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.dosen-profile' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengguna/dosen/{code}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@handleProfile',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@handleProfile',
        'as' => 'web-admin.pengguna.dosen-profile',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.dosen-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pengguna/dosen/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@deleteDosen',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\DosenController@deleteDosen',
        'as' => 'web-admin.pengguna.dosen-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.mahasiswa-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengguna/mahasiswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@renderMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@renderMahasiswa',
        'as' => 'web-admin.pengguna.mahasiswa-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.mahasiswa-views' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengguna/mahasiswa/{code}/views',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@viewMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@viewMahasiswa',
        'as' => 'web-admin.pengguna.mahasiswa-views',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.mahasiswa-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pengguna/mahasiswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@handleMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@handleMahasiswa',
        'as' => 'web-admin.pengguna.mahasiswa-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.mahasiswa-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengguna/mahasiswa/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@updateMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@updateMahasiswa',
        'as' => 'web-admin.pengguna.mahasiswa-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.mahasiswa-profile' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengguna/mahasiswa/{code}/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@handleProfile',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@handleProfile',
        'as' => 'web-admin.pengguna.mahasiswa-profile',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengguna.mahasiswa-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pengguna/mahasiswa/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@deleteMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengguna\\MahasiswaController@deleteMahasiswa',
        'as' => 'web-admin.pengguna.mahasiswa-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.kategori-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/kategori',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@renderKategori',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@renderKategori',
        'as' => 'web-admin.publikasi.kategori-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.kategori-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/publikasi/kategori',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@handleKategori',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@handleKategori',
        'as' => 'web-admin.publikasi.kategori-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.kategori-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/publikasi/kategori/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@updateKategori',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@updateKategori',
        'as' => 'web-admin.publikasi.kategori-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.kategori-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/publikasi/kategori/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@deleteKategori',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\KategoriController@deleteKategori',
        'as' => 'web-admin.publikasi.kategori-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.berita-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/berita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@renderBerita',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@renderBerita',
        'as' => 'web-admin.publikasi.berita-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.berita-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/berita/{code}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@viewBerita',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@viewBerita',
        'as' => 'web-admin.publikasi.berita-view',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.berita-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/publikasi/berita',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@handleBerita',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@handleBerita',
        'as' => 'web-admin.publikasi.berita-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.berita-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/publikasi/berita/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@updateBerita',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@updateBerita',
        'as' => 'web-admin.publikasi.berita-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.berita-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/publikasi/berita/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@deleteBerita',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\BeritaController@deleteBerita',
        'as' => 'web-admin.publikasi.berita-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.pengumuman-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/pengumuman',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@renderPengumuman',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@renderPengumuman',
        'as' => 'web-admin.publikasi.pengumuman-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.pengumuman-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/pengumuman/{code}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@viewPengumuman',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@viewPengumuman',
        'as' => 'web-admin.publikasi.pengumuman-view',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.pengumuman-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/publikasi/pengumuman',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@handlePengumuman',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@handlePengumuman',
        'as' => 'web-admin.publikasi.pengumuman-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.pengumuman-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/publikasi/pengumuman/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@updatePengumuman',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@updatePengumuman',
        'as' => 'web-admin.publikasi.pengumuman-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.pengumuman-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/publikasi/pengumuman/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@deletePengumuman',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\PengumumanController@deletePengumuman',
        'as' => 'web-admin.publikasi.pengumuman-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/galeri',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@renderGaleri',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@renderGaleri',
        'as' => 'web-admin.publikasi.galeri-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/publikasi/galeri/{code}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@viewGaleri',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@viewGaleri',
        'as' => 'web-admin.publikasi.galeri-view',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/publikasi/galeri',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@handleGaleri',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@handleGaleri',
        'as' => 'web-admin.publikasi.galeri-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/publikasi/galeri/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@updateGaleri',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@updateGaleri',
        'as' => 'web-admin.publikasi.galeri-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/publikasi/galeri/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@deleteGaleri',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@deleteGaleri',
        'as' => 'web-admin.publikasi.galeri-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-foto-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/publikasi/galeri/{code}/foto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@handleFoto',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@handleFoto',
        'as' => 'web-admin.publikasi.galeri-foto-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.publikasi.galeri-foto-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/publikasi/galeri/foto/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@deleteFoto',
        'controller' => 'App\\Http\\Controllers\\Master\\Publikasi\\GaleriController@deleteFoto',
        'as' => 'web-admin.publikasi.galeri-foto-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.web-settings-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengaturan/web-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@renderIndex',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@renderIndex',
        'as' => 'web-admin.pengaturan.web-settings-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.web-settings-handle' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/pengaturan/web-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@handleSettings',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@handleSettings',
        'as' => 'web-admin.pengaturan.web-settings-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.export-database' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengaturan/export-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@exportDatabase',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@exportDatabase',
        'as' => 'web-admin.pengaturan.export-database',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.import-database' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/pengaturan/import-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@importDatabase',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\WebSettingController@importDatabase',
        'as' => 'web-admin.pengaturan.import-database',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.log-aktivitas-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengaturan/log-aktivitas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@renderLogAktivitas',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@renderLogAktivitas',
        'as' => 'web-admin.pengaturan.log-aktivitas-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.log-aktivitas-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengaturan/log-aktivitas/{id}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@viewLogAktivitas',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@viewLogAktivitas',
        'as' => 'web-admin.pengaturan.log-aktivitas-view',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.log-aktivitas-filter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/pengaturan/log-aktivitas/filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@filterLogAktivitas',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@filterLogAktivitas',
        'as' => 'web-admin.pengaturan.log-aktivitas-filter',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.pengaturan.log-aktivitas-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/pengaturan/log-aktivitas/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@deleteLogAktivitas',
        'controller' => 'App\\Http\\Controllers\\Master\\Pengaturan\\LogAktivitasController@deleteLogAktivitas',
        'as' => 'web-admin.pengaturan.log-aktivitas-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.gedung-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/gedung',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@renderGedung',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@renderGedung',
        'as' => 'web-admin.infrastruktur.gedung-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.gedung-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/gedung',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@handleGedung',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@handleGedung',
        'as' => 'web-admin.infrastruktur.gedung-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.gedung-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/gedung/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@updateGedung',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@updateGedung',
        'as' => 'web-admin.infrastruktur.gedung-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.gedung-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/gedung/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@deleteGedung',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\GedungController@deleteGedung',
        'as' => 'web-admin.infrastruktur.gedung-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.ruang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/ruang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@renderRuang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@renderRuang',
        'as' => 'web-admin.infrastruktur.ruang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.ruang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/ruang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@handleRuang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@handleRuang',
        'as' => 'web-admin.infrastruktur.ruang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.ruang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/ruang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@updateRuang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@updateRuang',
        'as' => 'web-admin.infrastruktur.ruang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.ruang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/ruang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@deleteRuang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\RuangController@deleteRuang',
        'as' => 'web-admin.infrastruktur.ruang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.kategori-barang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/kategori-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@renderKategoriBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@renderKategoriBarang',
        'as' => 'web-admin.infrastruktur.kategori-barang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.kategori-barang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/kategori-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@handleKategoriBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@handleKategoriBarang',
        'as' => 'web-admin.infrastruktur.kategori-barang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.kategori-barang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/kategori-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@updateKategoriBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@updateKategoriBarang',
        'as' => 'web-admin.infrastruktur.kategori-barang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.kategori-barang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/kategori-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@deleteKategoriBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\KategoriBarangController@deleteKategoriBarang',
        'as' => 'web-admin.infrastruktur.kategori-barang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.barang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@renderBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@renderBarang',
        'as' => 'web-admin.infrastruktur.barang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.barang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@handleBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@handleBarang',
        'as' => 'web-admin.infrastruktur.barang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.barang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@updateBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@updateBarang',
        'as' => 'web-admin.infrastruktur.barang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.barang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@deleteBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\BarangController@deleteBarang',
        'as' => 'web-admin.infrastruktur.barang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.mutasi-barang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/mutasi-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@renderMutasiBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@renderMutasiBarang',
        'as' => 'web-admin.infrastruktur.mutasi-barang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.mutasi-barang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/mutasi-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@handleMutasiBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@handleMutasiBarang',
        'as' => 'web-admin.infrastruktur.mutasi-barang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.mutasi-barang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/mutasi-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@updateMutasiBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@updateMutasiBarang',
        'as' => 'web-admin.infrastruktur.mutasi-barang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.mutasi-barang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/mutasi-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@deleteMutasiBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\MutasiBarangController@deleteMutasiBarang',
        'as' => 'web-admin.infrastruktur.mutasi-barang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.pengadaan-barang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/pengadaan-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@renderPengadaanBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@renderPengadaanBarang',
        'as' => 'web-admin.infrastruktur.pengadaan-barang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.pengadaan-barang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/pengadaan-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@handlePengadaanBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@handlePengadaanBarang',
        'as' => 'web-admin.infrastruktur.pengadaan-barang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.pengadaan-barang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/pengadaan-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@updatePengadaanBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@updatePengadaanBarang',
        'as' => 'web-admin.infrastruktur.pengadaan-barang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.pengadaan-barang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/pengadaan-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@deletePengadaanBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\PengadaanBarangController@deletePengadaanBarang',
        'as' => 'web-admin.infrastruktur.pengadaan-barang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.inventaris-barang-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/infrastruktur/inventaris-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@renderInventarisBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@renderInventarisBarang',
        'as' => 'web-admin.infrastruktur.inventaris-barang-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.inventaris-barang-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/infrastruktur/inventaris-barang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@handleInventarisBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@handleInventarisBarang',
        'as' => 'web-admin.infrastruktur.inventaris-barang-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.inventaris-barang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/infrastruktur/inventaris-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@updateInventarisBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@updateInventarisBarang',
        'as' => 'web-admin.infrastruktur.inventaris-barang-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.infrastruktur.inventaris-barang-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/infrastruktur/inventaris-barang/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@deleteInventarisBarang',
        'controller' => 'App\\Http\\Controllers\\Master\\Infrastruktur\\InventarisBarangController@deleteInventarisBarang',
        'as' => 'web-admin.infrastruktur.inventaris-barang-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.saldo-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/keuangan/saldo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@renderSaldo',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@renderSaldo',
        'as' => 'web-admin.keuangan.saldo-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.saldo-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/keuangan/saldo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@handleSaldo',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@handleSaldo',
        'as' => 'web-admin.keuangan.saldo-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.saldo-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/keuangan/saldo/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@updateSaldo',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@updateSaldo',
        'as' => 'web-admin.keuangan.saldo-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.saldo-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/keuangan/saldo/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@deleteSaldo',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\SaldoController@deleteSaldo',
        'as' => 'web-admin.keuangan.saldo-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@renderTagihanKuliahGroup',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@renderTagihanKuliahGroup',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-render',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-handle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@handleTagihanKuliahGroup',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@handleTagihanKuliahGroup',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-handle',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@updateTagihanKuliahGroup',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@updateTagihanKuliahGroup',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-update',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@deleteTagihanKuliahGroup',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@deleteTagihanKuliahGroup',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-delete',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-publish' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group/{code}/publish',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@publishTagihanKuliahGroup',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@publishTagihanKuliahGroup',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-publish',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-archive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group/{code}/archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@archiveTagihanKuliahGroup',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@archiveTagihanKuliahGroup',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-archive',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.keuangan.tagihan-kuliah-group-detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/keuangan/tagihan-kuliah-group/{code}/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'checkUser:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@viewTagihanDetail',
        'controller' => 'App\\Http\\Controllers\\Master\\Keuangan\\TagihanKuliahGroupController@viewTagihanDetail',
        'as' => 'web-admin.keuangan.tagihan-kuliah-group-detail',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
