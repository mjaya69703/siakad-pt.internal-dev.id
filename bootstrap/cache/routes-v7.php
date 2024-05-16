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
            '_route' => 'generated::7zw3CTo1SPc7vjh1',
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
      '/dev' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rtTDq1nBlPjHHmXO',
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
      '/mahasiswa/auth-signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-signin-page',
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
      '/mahasiswa/auth-signin/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-signin-post',
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
      '/mahasiswa/auth-forgot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-forgot-page',
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
      '/mahasiswa/auth-forgot/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-forgot-verify',
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
      '/admin/auth-signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth-signin-page',
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
      '/admin/auth-signin/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth-signin-post',
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
      '/admin/auth-forgot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth-forgot-page',
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
      '/admin/auth-forgot/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth-forgot-verify',
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
      '/dosen/auth-signin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-signin-page',
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
      '/dosen/auth-signin/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-signin-post',
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
      '/dosen/auth-forgot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-forgot-page',
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
      '/dosen/auth-forgot/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-forgot-verify',
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
      '/web-admin/signout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.auth-signout-post',
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
            '_route' => 'web-admin.home-index',
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
      '/web-admin/home/ajax/GetMhsGender' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home.ajax-mhs-gender',
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
            '_route' => 'web-admin.home-profile',
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
      '/web-admin/presensi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi',
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
      '/web-admin/presensi/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi-list',
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
      '/web-admin/profile/update-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-profile-save-image',
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
      '/web-admin/profile/update-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-profile-save-data',
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
      '/web-admin/profile/update-kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-profile-save-kontak',
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
      '/web-admin/profile/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-profile-save-password',
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
      '/web-admin/presensi/save-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi-input-absen',
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
      '/web-admin/presensi/save-sakit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi-input-sakit',
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
      '/web-admin/presensi/save-izin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi-input-izin',
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
      '/web-admin/presensi/update-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi-update-absen',
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
      '/web-admin/workers/data-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.admin-index',
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
      '/web-admin/workers/data-admin/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.admin-create',
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
      '/web-admin/workers/data-admin/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.admin-store',
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
      '/web-admin/workers/data-staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.staff-index',
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
      '/web-admin/workers/data-staff/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.staff-create',
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
      '/web-admin/workers/data-staff/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.staff-store',
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
      '/web-admin/workers/data-dosen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.lecture-index',
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
      '/web-admin/workers/data-dosen/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.lecture-create',
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
      '/web-admin/workers/data-dosen/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.lecture-store',
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
      '/web-admin/workers/data-mahasiswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.student-index',
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
      '/web-admin/workers/data-mahasiswa/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.student-create',
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
      '/web-admin/workers/data-mahasiswa/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.student-store',
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
      '/web-admin/master/data-fakultas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.fakultas-index',
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
      '/web-admin/master/data-fakultas/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.fakultas-store',
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
      '/web-admin/master/data-pstudi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.pstudi-index',
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
      '/web-admin/master/data-pstudi/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.pstudi-store',
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
      '/web-admin/master/data-taka' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.taka-index',
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
      '/web-admin/master/data-taka/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.taka-store',
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
      '/web-admin/master/data-proku' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.proku-index',
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
      '/web-admin/master/data-proku/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.proku-store',
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
      '/web-admin/master/data-kelas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kelas-index',
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
      '/web-admin/master/data-kelas/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kelas-store',
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
      '/web-admin/master/data-kurikulum' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kurikulum-index',
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
      '/web-admin/master/data-kurikulum/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kurikulum-store',
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
      '/web-admin/master/data-matkul' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.matkul-index',
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
      '/web-admin/master/data-matkul/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.matkul-create',
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
      '/web-admin/master/data-matkul/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.matkul-store',
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
      '/web-admin/master/data-jadkul' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-index',
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
      '/web-admin/master/data-jadkul/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-create',
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
      '/web-admin/master/data-jadkul/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-store',
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
      '/web-admin/inventory/data-gedung' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.gedung-index',
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
      '/web-admin/inventory/data-gedung/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.gedung-store',
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
      '/web-admin/inventory/data-ruang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.ruang-index',
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
      '/web-admin/inventory/data-ruang/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.ruang-store',
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
      '/web-admin/finance/data-tagihan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.tagihan-index',
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
      '/web-admin/finance/data-tagihan/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.tagihan-create',
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
      '/web-admin/finance/data-tagihan/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.tagihan-store',
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
      '/web-admin/finance/data-pembayaran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.pembayaran-index',
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
      '/web-admin/finance/data-pembayaran/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.pembayaran-create',
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
      '/web-admin/finance/data-pembayaran/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.pembayaran-store',
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
      '/web-admin/finance/data-keuangan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.keuangan-index',
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
      '/web-admin/finance/data-keuangan/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.keuangan-store',
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
      '/administrative/signout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.auth-signout-post',
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
      '/administrative/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-index',
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
      '/administrative/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-profile',
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
      '/administrative/presensi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi',
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
      '/administrative/presensi/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi-list',
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
      '/administrative/profile/update-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-profile-save-image',
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
      '/administrative/profile/update-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-profile-save-data',
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
      '/administrative/profile/update-kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-profile-save-kontak',
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
      '/administrative/profile/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-profile-save-password',
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
      '/administrative/presensi/save-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi-input-absen',
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
      '/administrative/presensi/save-sakit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi-input-sakit',
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
      '/administrative/presensi/save-izin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi-input-izin',
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
      '/administrative/presensi/update-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi-update-absen',
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
      '/faculty/signout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.auth-signout-post',
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
      '/faculty/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-index',
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
      '/faculty/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-profile',
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
      '/faculty/presensi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi',
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
      '/faculty/presensi/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi-list',
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
      '/faculty/profile/update-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-profile-save-image',
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
      '/faculty/profile/update-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-profile-save-data',
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
      '/faculty/profile/update-kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-profile-save-kontak',
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
      '/faculty/profile/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-profile-save-password',
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
      '/faculty/presensi/save-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi-input-absen',
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
      '/faculty/presensi/save-sakit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi-input-sakit',
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
      '/faculty/presensi/save-izin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi-input-izin',
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
      '/faculty/presensi/update-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi-update-absen',
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
      '/dosen/signout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-signout-post',
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
      '/dosen/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.home-index',
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
      '/dosen/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.home-profile',
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
      '/dosen/profile/update-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.home-profile-save-image',
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
      '/dosen/profile/update-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.home-profile-save-data',
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
      '/dosen/profile/update-kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.home-profile-save-kontak',
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
      '/dosen/profile/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.home-profile-save-password',
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
      '/mahasiswa/signout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-signout-post',
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
      '/mahasiswa/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-index',
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
      '/mahasiswa/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-profile',
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
      '/mahasiswa/tagihan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-tagihan-index',
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
      '/mahasiswa/jadwal-kuliah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-jadkul-index',
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
      '/mahasiswa/jadwal-kuliah/absen/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-jadkul-absen-store',
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
      '/mahasiswa/profile/update-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-profile-save-image',
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
      '/mahasiswa/profile/update-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-profile-save-data',
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
      '/mahasiswa/profile/update-kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-profile-save-kontak',
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
      '/mahasiswa/profile/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-profile-save-password',
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
      '/mahasiswa/ajax/getTagihan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.ajax-tagihan-index',
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
    ),
    2 => 
    array (
      0 => '{^(?|/mahasiswa/(?|auth\\-reset/([^/]++)(?|(*:44)|/save(*:56))|tagihan/view/([^/]++)(?|(*:88)|/payment(?|(*:106)|/success(*:122)))|jadwal\\-kuliah/([^/]++)/absen(*:161))|/admin(?|/auth\\-reset/([^/]++)(?|(*:203)|/save(*:216))|istrative/presensi/view/([^/]++)(*:257))|/dosen/auth\\-reset/([^/]++)(?|(*:296)|/save(*:309))|/web\\-admin/(?|presensi/view/([^/]++)(*:355)|workers/data\\-(?|admin/([^/]++)/(?|edit(*:402)|update(*:416)|destroy(*:431))|staff/([^/]++)/(?|edit(*:462)|update(*:476)|destroy(*:491))|dosen/([^/]++)/(?|edit(*:522)|update(*:536)|destroy(*:551))|mahasiswa/([^/]++)/(?|edit(*:586)|update(*:600)|destroy(*:615)))|master/data\\-(?|fakultas/([^/]++)/(?|update(*:668)|destroy(*:683))|p(?|studi/([^/]++)/(?|update(*:720)|destroy(*:735))|roku/([^/]++)/(?|update(*:767)|destroy(*:782)))|taka/([^/]++)/(?|update(*:815)|destroy(*:830))|k(?|elas/([^/]++)/(?|view/mahasiswa(*:874)|cetak/mahasiswa(*:897)|update(*:911)|destroy(*:926))|urikulum/([^/]++)/(?|view(*:960)|update(*:974)|destroy(*:989)))|matkul/([^/]++)/(?|update(*:1024)|destroy(*:1040))|jadkul/([^/]++)/(?|viewAbsen(*:1078)|cetakAbsen(*:1097)|update(?|Absen(*:1120)|(*:1129))|destroy(*:1146)))|inventory/data\\-(?|gedung/([^/]++)/(?|update(*:1201)|destroy(*:1217))|ruang/([^/]++)/(?|update(*:1251)|destroy(*:1267)))|finance/data\\-(?|tagihan/([^/]++)/(?|update(*:1321)|destroy(*:1337))|pembayaran/([^/]++)/(?|update(*:1376)|destroy(*:1392))|keuangan/([^/]++)/(?|update(*:1429)|destroy(*:1445))))|/faculty/presensi/view/([^/]++)(*:1488))/?$}sDu',
    ),
    3 => 
    array (
      44 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-reset-page',
          ),
          1 => 
          array (
            0 => 'token',
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
      56 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.auth-reset-post',
          ),
          1 => 
          array (
            0 => 'token',
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
      88 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-tagihan-view',
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
      106 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-tagihan-payment',
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
      122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-tagihan-payment-success',
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
      161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-jadkul-absen',
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
      203 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth-reset-page',
          ),
          1 => 
          array (
            0 => 'token',
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
      216 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth-reset-post',
          ),
          1 => 
          array (
            0 => 'token',
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
      257 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administrative.home-presensi-view',
          ),
          1 => 
          array (
            0 => 'date',
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
      296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-reset-page',
          ),
          1 => 
          array (
            0 => 'token',
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
      309 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.auth-reset-post',
          ),
          1 => 
          array (
            0 => 'token',
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
      355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.home-presensi-view',
          ),
          1 => 
          array (
            0 => 'date',
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
      402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.admin-edit',
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
      416 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.admin-update',
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
      431 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.admin-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.staff-edit',
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
      476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.staff-update',
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
      491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.staff-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.lecture-edit',
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
      536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.lecture-update',
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
      551 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.lecture-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      586 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.student-edit',
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
      600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.student-update',
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
      615 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.workers.student-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.fakultas-update',
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
      683 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.fakultas-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.pstudi-update',
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
      735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.pstudi-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.proku-update',
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
      782 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.proku-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      815 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.taka-update',
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
      830 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.taka-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kelas-mahasiswa-view',
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
      897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kelas-mahasiswa-cetak',
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
      911 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kelas-update',
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
      926 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kelas-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      960 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kurikulum-view',
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
      974 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kurikulum-update',
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
      989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.kurikulum-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1024 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.matkul-update',
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
      1040 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.matkul-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1078 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-absen-view',
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
      1097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-absen-cetak',
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
      1120 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-absen-update',
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
      1129 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-update',
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
      1146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.master.jadkul-destroy',
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
            '_route' => 'web-admin.inventory.gedung-update',
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
      1217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.gedung-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1251 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.ruang-update',
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
      1267 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.inventory.ruang-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.tagihan-update',
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
      1337 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.tagihan-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.pembayaran-update',
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
      1392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.pembayaran-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1429 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.keuangan-update',
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
      1445 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.finance.keuangan-destroy',
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
          5 => false,
          6 => NULL,
        ),
      ),
      1488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'faculty.home-presensi-view',
          ),
          1 => 
          array (
            0 => 'date',
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
    'generated::7zw3CTo1SPc7vjh1' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005280000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7zw3CTo1SPc7vjh1',
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
        'uses' => 'App\\Http\\Controllers\\Root\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Root\\HomeController@index',
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
    'generated::rtTDq1nBlPjHHmXO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dev',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:110:"function () {
    return \\view(\'base.base-root-index\');
    // return view(\'base.panel.base-panel-content\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000052e0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::rtTDq1nBlPjHHmXO',
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
    'mahasiswa.auth-signin-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/auth-signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthSignInPage',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthSignInPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mahasiswa.auth-signin-page',
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
    'mahasiswa.auth-signin-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/auth-signin/post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthSignInPost',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthSignInPost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mahasiswa.auth-signin-post',
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
    'mahasiswa.auth-forgot-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/auth-forgot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthForgotPage',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthForgotPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mahasiswa.auth-forgot-page',
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
    'mahasiswa.auth-forgot-verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/auth-forgot/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthForgotVerify',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthForgotVerify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mahasiswa.auth-forgot-verify',
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
    'mahasiswa.auth-reset-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/auth-reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthResetPage',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthResetPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mahasiswa.auth-reset-page',
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
    'mahasiswa.auth-reset-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/auth-reset/{token}/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthResetPassword',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthResetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'mahasiswa.auth-reset-post',
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
    'admin.auth-signin-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/auth-signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignInPage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignInPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.auth-signin-page',
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
    'admin.auth-signin-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/auth-signin/post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignInPost',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignInPost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.auth-signin-post',
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
    'admin.auth-forgot-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/auth-forgot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthForgotPage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthForgotPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.auth-forgot-page',
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
    'admin.auth-forgot-verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/auth-forgot/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthForgotVerify',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthForgotVerify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.auth-forgot-verify',
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
    'admin.auth-reset-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/auth-reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthResetPage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthResetPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.auth-reset-page',
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
    'admin.auth-reset-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/auth-reset/{token}/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthResetPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthResetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin.auth-reset-post',
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
    'dosen.auth-signin-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/auth-signin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthSignInPage',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthSignInPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dosen.auth-signin-page',
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
    'dosen.auth-signin-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dosen/auth-signin/post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthSignInPost',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthSignInPost',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dosen.auth-signin-post',
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
    'dosen.auth-forgot-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/auth-forgot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthForgotPage',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthForgotPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dosen.auth-forgot-page',
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
    'dosen.auth-forgot-verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dosen/auth-forgot/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthForgotVerify',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthForgotVerify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dosen.auth-forgot-verify',
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
    'dosen.auth-reset-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/auth-reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthResetPage',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthResetPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dosen.auth-reset-page',
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
    'dosen.auth-reset-post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dosen/auth-reset/{token}/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthResetPassword',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthResetPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dosen.auth-reset-post',
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
    'web-admin.auth-signout-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/signout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'as' => 'web-admin.auth-signout-post',
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
    'web-admin.home-index' => 
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
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'as' => 'web-admin.home-index',
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
    'web-admin.home.ajax-mhs-gender' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/home/ajax/GetMhsGender',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@getMhsGender',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@getMhsGender',
        'as' => 'web-admin.home.ajax-mhs-gender',
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
    'web-admin.home-profile' => 
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
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'as' => 'web-admin.home-profile',
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
    'web-admin.home-presensi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/presensi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@index',
        'as' => 'web-admin.home-presensi',
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
    'web-admin.home-presensi-list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/presensi/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiList',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiList',
        'as' => 'web-admin.home-presensi-list',
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
    'web-admin.home-presensi-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/presensi/view/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiView',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiView',
        'as' => 'web-admin.home-presensi-view',
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
    'web-admin.home-profile-save-image' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/profile/update-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'as' => 'web-admin.home-profile-save-image',
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
    'web-admin.home-profile-save-data' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/profile/update-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'as' => 'web-admin.home-profile-save-data',
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
    'web-admin.home-profile-save-kontak' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/profile/update-kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'as' => 'web-admin.home-profile-save-kontak',
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
    'web-admin.home-profile-save-password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/profile/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'as' => 'web-admin.home-profile-save-password',
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
    'web-admin.home-presensi-input-absen' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/presensi/save-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'as' => 'web-admin.home-presensi-input-absen',
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
    'web-admin.home-presensi-input-sakit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/presensi/save-sakit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveSakit',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveSakit',
        'as' => 'web-admin.home-presensi-input-sakit',
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
    'web-admin.home-presensi-input-izin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/presensi/save-izin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzin',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzin',
        'as' => 'web-admin.home-presensi-input-izin',
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
    'web-admin.home-presensi-update-absen' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/presensi/update-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'as' => 'web-admin.home-presensi-update-absen',
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
    'web-admin.workers.admin-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexAdmin',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexAdmin',
        'as' => 'web-admin.workers.admin-index',
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
    'web-admin.workers.admin-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-admin/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createAdmin',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createAdmin',
        'as' => 'web-admin.workers.admin-create',
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
    'web-admin.workers.admin-edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-admin/{code}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editAdmin',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editAdmin',
        'as' => 'web-admin.workers.admin-edit',
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
    'web-admin.workers.admin-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/workers/data-admin/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeAdmin',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeAdmin',
        'as' => 'web-admin.workers.admin-store',
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
    'web-admin.workers.admin-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/workers/data-admin/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateAdmin',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateAdmin',
        'as' => 'web-admin.workers.admin-update',
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
    'web-admin.workers.admin-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/workers/data-admin/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyAdmin',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyAdmin',
        'as' => 'web-admin.workers.admin-destroy',
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
    'web-admin.workers.staff-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexWorkers',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexWorkers',
        'as' => 'web-admin.workers.staff-index',
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
    'web-admin.workers.staff-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-staff/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createWorkers',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createWorkers',
        'as' => 'web-admin.workers.staff-create',
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
    'web-admin.workers.staff-edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-staff/{code}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editWorkers',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editWorkers',
        'as' => 'web-admin.workers.staff-edit',
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
    'web-admin.workers.staff-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/workers/data-staff/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeWorkers',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeWorkers',
        'as' => 'web-admin.workers.staff-store',
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
    'web-admin.workers.staff-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/workers/data-staff/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateWorkers',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateWorkers',
        'as' => 'web-admin.workers.staff-update',
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
    'web-admin.workers.staff-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/workers/data-staff/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyWorkers',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyWorkers',
        'as' => 'web-admin.workers.staff-destroy',
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
    'web-admin.workers.lecture-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-dosen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexLecture',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexLecture',
        'as' => 'web-admin.workers.lecture-index',
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
    'web-admin.workers.lecture-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-dosen/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createLecture',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createLecture',
        'as' => 'web-admin.workers.lecture-create',
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
    'web-admin.workers.lecture-edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-dosen/{code}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editLecture',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editLecture',
        'as' => 'web-admin.workers.lecture-edit',
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
    'web-admin.workers.lecture-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/workers/data-dosen/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeLecture',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeLecture',
        'as' => 'web-admin.workers.lecture-store',
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
    'web-admin.workers.lecture-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/workers/data-dosen/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateLecture',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateLecture',
        'as' => 'web-admin.workers.lecture-update',
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
    'web-admin.workers.lecture-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/workers/data-dosen/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyLecture',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyLecture',
        'as' => 'web-admin.workers.lecture-destroy',
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
    'web-admin.workers.student-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-mahasiswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@indexStudent',
        'as' => 'web-admin.workers.student-index',
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
    'web-admin.workers.student-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-mahasiswa/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@createStudent',
        'as' => 'web-admin.workers.student-create',
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
    'web-admin.workers.student-edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/workers/data-mahasiswa/{code}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@editStudent',
        'as' => 'web-admin.workers.student-edit',
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
    'web-admin.workers.student-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/workers/data-mahasiswa/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@storeStudent',
        'as' => 'web-admin.workers.student-store',
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
    'web-admin.workers.student-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/workers/data-mahasiswa/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@updateStudent',
        'as' => 'web-admin.workers.student-update',
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
    'web-admin.workers.student-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/workers/data-mahasiswa/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\WorkersController@destroyStudent',
        'as' => 'web-admin.workers.student-destroy',
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
    'web-admin.master.fakultas-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-fakultas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@index',
        'as' => 'web-admin.master.fakultas-index',
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
    'web-admin.master.fakultas-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-fakultas/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@store',
        'as' => 'web-admin.master.fakultas-store',
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
    'web-admin.master.fakultas-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-fakultas/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@update',
        'as' => 'web-admin.master.fakultas-update',
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
    'web-admin.master.fakultas-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-fakultas/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\FakultasController@destroy',
        'as' => 'web-admin.master.fakultas-destroy',
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
    'web-admin.master.pstudi-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-pstudi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@index',
        'as' => 'web-admin.master.pstudi-index',
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
    'web-admin.master.pstudi-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-pstudi/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@store',
        'as' => 'web-admin.master.pstudi-store',
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
    'web-admin.master.pstudi-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-pstudi/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@update',
        'as' => 'web-admin.master.pstudi-update',
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
    'web-admin.master.pstudi-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-pstudi/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramStudiController@destroy',
        'as' => 'web-admin.master.pstudi-destroy',
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
    'web-admin.master.taka-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-taka',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@index',
        'as' => 'web-admin.master.taka-index',
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
    'web-admin.master.taka-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-taka/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@store',
        'as' => 'web-admin.master.taka-store',
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
    'web-admin.master.taka-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-taka/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@update',
        'as' => 'web-admin.master.taka-update',
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
    'web-admin.master.taka-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-taka/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\TahunAkademikController@destroy',
        'as' => 'web-admin.master.taka-destroy',
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
    'web-admin.master.proku-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-proku',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@index',
        'as' => 'web-admin.master.proku-index',
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
    'web-admin.master.proku-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-proku/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@store',
        'as' => 'web-admin.master.proku-store',
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
    'web-admin.master.proku-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-proku/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@update',
        'as' => 'web-admin.master.proku-update',
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
    'web-admin.master.proku-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-proku/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\ProgramKuliahController@destroy',
        'as' => 'web-admin.master.proku-destroy',
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
    'web-admin.master.kelas-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-kelas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@index',
        'as' => 'web-admin.master.kelas-index',
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
    'web-admin.master.kelas-mahasiswa-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-kelas/{code}/view/mahasiswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@viewMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@viewMahasiswa',
        'as' => 'web-admin.master.kelas-mahasiswa-view',
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
    'web-admin.master.kelas-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-kelas/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@store',
        'as' => 'web-admin.master.kelas-store',
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
    'web-admin.master.kelas-mahasiswa-cetak' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-kelas/{code}/cetak/mahasiswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@cetakMahasiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@cetakMahasiswa',
        'as' => 'web-admin.master.kelas-mahasiswa-cetak',
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
    'web-admin.master.kelas-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-kelas/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@update',
        'as' => 'web-admin.master.kelas-update',
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
    'web-admin.master.kelas-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-kelas/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KelasController@destroy',
        'as' => 'web-admin.master.kelas-destroy',
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
    'web-admin.master.kurikulum-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-kurikulum',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@index',
        'as' => 'web-admin.master.kurikulum-index',
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
    'web-admin.master.kurikulum-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-kurikulum/{code}/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@view',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@view',
        'as' => 'web-admin.master.kurikulum-view',
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
    'web-admin.master.kurikulum-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-kurikulum/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@store',
        'as' => 'web-admin.master.kurikulum-store',
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
    'web-admin.master.kurikulum-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-kurikulum/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@update',
        'as' => 'web-admin.master.kurikulum-update',
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
    'web-admin.master.kurikulum-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-kurikulum/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\KurikulumController@destroy',
        'as' => 'web-admin.master.kurikulum-destroy',
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
    'web-admin.master.matkul-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-matkul',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@index',
        'as' => 'web-admin.master.matkul-index',
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
    'web-admin.master.matkul-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-matkul/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@create',
        'as' => 'web-admin.master.matkul-create',
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
    'web-admin.master.matkul-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-matkul/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@store',
        'as' => 'web-admin.master.matkul-store',
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
    'web-admin.master.matkul-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-matkul/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@update',
        'as' => 'web-admin.master.matkul-update',
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
    'web-admin.master.matkul-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-matkul/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\MataKuliahController@destroy',
        'as' => 'web-admin.master.matkul-destroy',
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
    'web-admin.master.jadkul-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-jadkul',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@index',
        'as' => 'web-admin.master.jadkul-index',
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
    'web-admin.master.jadkul-absen-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-jadkul/{code}/viewAbsen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@viewAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@viewAbsen',
        'as' => 'web-admin.master.jadkul-absen-view',
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
    'web-admin.master.jadkul-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/master/data-jadkul/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@create',
        'as' => 'web-admin.master.jadkul-create',
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
    'web-admin.master.jadkul-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-jadkul/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@store',
        'as' => 'web-admin.master.jadkul-store',
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
    'web-admin.master.jadkul-absen-cetak' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/master/data-jadkul/{code}/cetakAbsen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@cetakAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@cetakAbsen',
        'as' => 'web-admin.master.jadkul-absen-cetak',
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
    'web-admin.master.jadkul-absen-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-jadkul/{code}/updateAbsen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@updateAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@updateAbsen',
        'as' => 'web-admin.master.jadkul-absen-update',
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
    'web-admin.master.jadkul-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/master/data-jadkul/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@update',
        'as' => 'web-admin.master.jadkul-update',
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
    'web-admin.master.jadkul-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/master/data-jadkul/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Core\\JadwalKuliahController@destroy',
        'as' => 'web-admin.master.jadkul-destroy',
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
    'web-admin.inventory.gedung-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/inventory/data-gedung',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@index',
        'as' => 'web-admin.inventory.gedung-index',
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
    'web-admin.inventory.gedung-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/inventory/data-gedung/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@store',
        'as' => 'web-admin.inventory.gedung-store',
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
    'web-admin.inventory.gedung-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/inventory/data-gedung/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@update',
        'as' => 'web-admin.inventory.gedung-update',
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
    'web-admin.inventory.gedung-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/inventory/data-gedung/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\GedungController@destroy',
        'as' => 'web-admin.inventory.gedung-destroy',
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
    'web-admin.inventory.ruang-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/inventory/data-ruang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@index',
        'as' => 'web-admin.inventory.ruang-index',
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
    'web-admin.inventory.ruang-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/inventory/data-ruang/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@store',
        'as' => 'web-admin.inventory.ruang-store',
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
    'web-admin.inventory.ruang-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/inventory/data-ruang/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@update',
        'as' => 'web-admin.inventory.ruang-update',
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
    'web-admin.inventory.ruang-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/inventory/data-ruang/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Inventory\\RuangController@destroy',
        'as' => 'web-admin.inventory.ruang-destroy',
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
    'web-admin.finance.tagihan-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/data-tagihan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@index',
        'as' => 'web-admin.finance.tagihan-index',
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
    'web-admin.finance.tagihan-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/data-tagihan/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@create',
        'as' => 'web-admin.finance.tagihan-create',
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
    'web-admin.finance.tagihan-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/finance/data-tagihan/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@store',
        'as' => 'web-admin.finance.tagihan-store',
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
    'web-admin.finance.tagihan-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/finance/data-tagihan/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@update',
        'as' => 'web-admin.finance.tagihan-update',
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
    'web-admin.finance.tagihan-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/finance/data-tagihan/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@destroy',
        'as' => 'web-admin.finance.tagihan-destroy',
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
    'web-admin.finance.pembayaran-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/data-pembayaran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@index',
        'as' => 'web-admin.finance.pembayaran-index',
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
    'web-admin.finance.pembayaran-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/data-pembayaran/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@create',
        'as' => 'web-admin.finance.pembayaran-create',
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
    'web-admin.finance.pembayaran-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/finance/data-pembayaran/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@store',
        'as' => 'web-admin.finance.pembayaran-store',
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
    'web-admin.finance.pembayaran-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/finance/data-pembayaran/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@update',
        'as' => 'web-admin.finance.pembayaran-update',
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
    'web-admin.finance.pembayaran-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/finance/data-pembayaran/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@destroy',
        'as' => 'web-admin.finance.pembayaran-destroy',
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
    'web-admin.finance.keuangan-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/data-keuangan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@index',
        'as' => 'web-admin.finance.keuangan-index',
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
    'web-admin.finance.keuangan-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/finance/data-keuangan/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@store',
        'as' => 'web-admin.finance.keuangan-store',
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
    'web-admin.finance.keuangan-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/finance/data-keuangan/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@update',
        'as' => 'web-admin.finance.keuangan-update',
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
    'web-admin.finance.keuangan-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'web-admin/finance/data-keuangan/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@destroy',
        'as' => 'web-admin.finance.keuangan-destroy',
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
    'administrative.auth-signout-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administrative/signout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'as' => 'administrative.auth-signout-post',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administrative/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'as' => 'administrative.home-index',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administrative/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'as' => 'administrative.home-profile',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administrative/presensi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@index',
        'as' => 'administrative.home-presensi',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi-list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administrative/presensi/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiList',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiList',
        'as' => 'administrative.home-presensi-list',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'administrative/presensi/view/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiView',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiView',
        'as' => 'administrative.home-presensi-view',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-profile-save-image' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'administrative/profile/update-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'as' => 'administrative.home-profile-save-image',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-profile-save-data' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'administrative/profile/update-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'as' => 'administrative.home-profile-save-data',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-profile-save-kontak' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'administrative/profile/update-kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'as' => 'administrative.home-profile-save-kontak',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-profile-save-password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'administrative/profile/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'as' => 'administrative.home-profile-save-password',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi-input-absen' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administrative/presensi/save-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'as' => 'administrative.home-presensi-input-absen',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi-input-sakit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administrative/presensi/save-sakit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveSakit',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveSakit',
        'as' => 'administrative.home-presensi-input-sakit',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi-input-izin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'administrative/presensi/save-izin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzin',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzin',
        'as' => 'administrative.home-presensi-input-izin',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'administrative.home-presensi-update-absen' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'administrative/presensi/update-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Administrative Staff',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'as' => 'administrative.home-presensi-update-absen',
        'namespace' => NULL,
        'prefix' => '/administrative',
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
    'faculty.auth-signout-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faculty/signout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'as' => 'faculty.auth-signout-post',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faculty/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'as' => 'faculty.home-index',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faculty/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'as' => 'faculty.home-profile',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faculty/presensi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@index',
        'as' => 'faculty.home-presensi',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi-list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faculty/presensi/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiList',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiList',
        'as' => 'faculty.home-presensi-list',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faculty/presensi/view/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiView',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@presensiView',
        'as' => 'faculty.home-presensi-view',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-profile-save-image' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'faculty/profile/update-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'as' => 'faculty.home-profile-save-image',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-profile-save-data' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'faculty/profile/update-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'as' => 'faculty.home-profile-save-data',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-profile-save-kontak' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'faculty/profile/update-kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'as' => 'faculty.home-profile-save-kontak',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-profile-save-password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'faculty/profile/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'as' => 'faculty.home-profile-save-password',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi-input-absen' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'faculty/presensi/save-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'as' => 'faculty.home-presensi-input-absen',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi-input-sakit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'faculty/presensi/save-sakit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveSakit',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveSakit',
        'as' => 'faculty.home-presensi-input-sakit',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi-input-izin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'faculty/presensi/save-izin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzin',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzin',
        'as' => 'faculty.home-presensi-input-izin',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'faculty.home-presensi-update-absen' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'faculty/presensi/update-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Faculty Coordinator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'as' => 'faculty.home-presensi-update-absen',
        'namespace' => NULL,
        'prefix' => '/faculty',
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
    'dosen.auth-signout-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/signout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthSignOutPost',
        'controller' => 'App\\Http\\Controllers\\Dosen\\AuthController@AuthSignOutPost',
        'as' => 'dosen.auth-signout-post',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'dosen.home-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Dosen\\HomeController@index',
        'as' => 'dosen.home-index',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'dosen.home-profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\HomeController@profile',
        'controller' => 'App\\Http\\Controllers\\Dosen\\HomeController@profile',
        'as' => 'dosen.home-profile',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'dosen.home-profile-save-image' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dosen/profile/update-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveImageProfile',
        'controller' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveImageProfile',
        'as' => 'dosen.home-profile-save-image',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'dosen.home-profile-save-data' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dosen/profile/update-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveDataProfile',
        'controller' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveDataProfile',
        'as' => 'dosen.home-profile-save-data',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'dosen.home-profile-save-kontak' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dosen/profile/update-kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveDataKontak',
        'controller' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveDataKontak',
        'as' => 'dosen.home-profile-save-kontak',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'dosen.home-profile-save-password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dosen/profile/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveDataPassword',
        'controller' => 'App\\Http\\Controllers\\Dosen\\HomeController@saveDataPassword',
        'as' => 'dosen.home-profile-save-password',
        'namespace' => NULL,
        'prefix' => '/dosen',
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
    'mahasiswa.auth-signout-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/signout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthSignOutPost',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\AuthController@AuthSignOutPost',
        'as' => 'mahasiswa.auth-signout-post',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@index',
        'as' => 'mahasiswa.home-index',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@profile',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@profile',
        'as' => 'mahasiswa.home-profile',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-tagihan-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/tagihan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanIndex',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanIndex',
        'as' => 'mahasiswa.home-tagihan-index',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-jadkul-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/jadwal-kuliah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@jadkulIndex',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@jadkulIndex',
        'as' => 'mahasiswa.home-jadkul-index',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-tagihan-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/tagihan/view/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanView',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanView',
        'as' => 'mahasiswa.home-tagihan-view',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-tagihan-payment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/tagihan/view/{code}/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanPayment',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanPayment',
        'as' => 'mahasiswa.home-tagihan-payment',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-tagihan-payment-success' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/tagihan/view/{code}/payment/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanSuccess',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanSuccess',
        'as' => 'mahasiswa.home-tagihan-payment-success',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-jadkul-absen' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/jadwal-kuliah/{code}/absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@jadkulAbsen',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@jadkulAbsen',
        'as' => 'mahasiswa.home-jadkul-absen',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-jadkul-absen-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/jadwal-kuliah/absen/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@jadkulAbsenStore',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@jadkulAbsenStore',
        'as' => 'mahasiswa.home-jadkul-absen-store',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-profile-save-image' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'mahasiswa/profile/update-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveImageProfile',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveImageProfile',
        'as' => 'mahasiswa.home-profile-save-image',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-profile-save-data' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'mahasiswa/profile/update-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveDataProfile',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveDataProfile',
        'as' => 'mahasiswa.home-profile-save-data',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-profile-save-kontak' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'mahasiswa/profile/update-kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveDataKontak',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveDataKontak',
        'as' => 'mahasiswa.home-profile-save-kontak',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.home-profile-save-password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'mahasiswa/profile/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveDataPassword',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@saveDataPassword',
        'as' => 'mahasiswa.home-profile-save-password',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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
    'mahasiswa.ajax-tagihan-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/ajax/getTagihan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanIndexAjax',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanIndexAjax',
        'as' => 'mahasiswa.ajax-tagihan-index',
        'namespace' => NULL,
        'prefix' => '/mahasiswa',
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