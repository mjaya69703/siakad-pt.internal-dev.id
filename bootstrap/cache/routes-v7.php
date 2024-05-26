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
            '_route' => 'generated::QETJnYgyGnQQcTnP',
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
            '_route' => 'generated::Vw30r63pyQvUJIJf',
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
      '/web-admin/absen-harian' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.presensi.absen-harian',
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
      '/web-admin/absen-izin-cuti' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.presensi.absen-izin-cuti',
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
      '/web-admin/finance/approval-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.approval.absen-index',
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
      '/web-admin/finance/approval-absen/approved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.approval.absen-index-approved',
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
      '/web-admin/finance/approval-absen/rejected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.approval.absen-index-rejected',
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
      '/web-admin/support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.support.ticket-index',
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
      '/finance/signout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.auth-signout-post',
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
      '/finance/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-index',
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
      '/finance/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-profile',
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
      '/finance/absen-harian' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.presensi.absen-harian',
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
      '/finance/absen-izin-cuti' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.presensi.absen-izin-cuti',
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
      '/finance/profile/update-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-profile-save-image',
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
      '/finance/profile/update-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-profile-save-data',
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
      '/finance/profile/update-kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-profile-save-kontak',
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
      '/finance/profile/update-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-profile-save-password',
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
      '/finance/presensi/save-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-presensi-input-absen',
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
      '/finance/presensi/save-izin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-presensi-input-izin',
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
      '/finance/presensi/update-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.home-presensi-update-absen',
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
      '/finance/data-tagihan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.tagihan-index',
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
      '/finance/data-tagihan/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.tagihan-create',
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
      '/finance/data-tagihan/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.tagihan-store',
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
      '/finance/data-pembayaran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.pembayaran-index',
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
      '/finance/data-pembayaran/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.pembayaran-create',
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
      '/finance/data-pembayaran/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.pembayaran-store',
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
      '/finance/data-keuangan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.keuangan-index',
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
      '/finance/data-keuangan/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.keuangan-store',
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
      '/finance/approval-absen' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.approval.absen-index',
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
      '/finance/approval-absen/approved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.approval.absen-index-approved',
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
      '/finance/approval-absen/rejected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.approval.absen-index-rejected',
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
      '/finance/support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.support.ticket-index',
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
      '/dosen/data-akademik/jadwal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.akademik.jadwal-index',
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
      '/mahasiswa/support' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.support.ticket-index',
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
      '/mahasiswa/support/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.support.ticket-open',
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
      0 => '{^(?|/mahasiswa/(?|a(?|uth\\-reset/([^/]++)(?|(*:47)|/save(*:59))|jax/getTicketLastReply/([^/]++)(*:98))|tagihan/(?|([^/]++)/invoice(*:133)|view/([^/]++)(?|(*:157)|/payment(?|(*:176)|/success(*:192))))|jadwal\\-kuliah/([^/]++)/absen(*:232)|support/(?|view/([^/]++)(*:264)|create/(?|([^/]++)(*:290)|store(?|(*:306)|\\-reply/([^/]++)(*:330)))))|/admin/auth\\-reset/([^/]++)(?|(*:372)|/save(*:385))|/dosen/(?|auth\\-reset/([^/]++)(?|(*:427)|/save(*:440))|data\\-akademik/jadwal/(?|([^/]++)/absen(*:488)|absen/([^/]++)/update(*:517)))|/web\\-admin/(?|absen\\-harian/view/([^/]++)(*:569)|workers/data\\-(?|admin/([^/]++)/(?|edit(*:616)|update(*:630)|destroy(*:645))|staff/([^/]++)/(?|edit(*:676)|update(*:690)|destroy(*:705))|dosen/([^/]++)/(?|edit(*:736)|update(*:750)|destroy(*:765))|mahasiswa/([^/]++)/(?|edit(*:800)|update(*:814)|destroy(*:829)))|master/data\\-(?|fakultas/([^/]++)/(?|update(*:882)|destroy(*:897))|p(?|studi/([^/]++)/(?|update(*:934)|destroy(*:949))|roku/([^/]++)/(?|update(*:981)|destroy(*:996)))|taka/([^/]++)/(?|update(*:1029)|destroy(*:1045))|k(?|elas/([^/]++)/(?|view/mahasiswa(*:1090)|cetak/mahasiswa(*:1114)|update(*:1129)|destroy(*:1145))|urikulum/([^/]++)/(?|view(*:1180)|update(*:1195)|destroy(*:1211)))|matkul/([^/]++)/(?|update(*:1247)|destroy(*:1263))|jadkul/([^/]++)/(?|viewAbsen(*:1301)|cetakAbsen(*:1320)|update(?|Absen(*:1343)|(*:1352))|destroy(*:1369)))|inventory/data\\-(?|gedung/([^/]++)/(?|update(*:1424)|destroy(*:1440))|ruang/([^/]++)/(?|update(*:1474)|destroy(*:1490)))|finance/(?|data\\-(?|tagihan/([^/]++)/(?|update(*:1547)|destroy(*:1563))|pembayaran/([^/]++)/(?|update(*:1602)|destroy(*:1618))|keuangan/([^/]++)/(?|update(*:1655)|destroy(*:1671)))|approval\\-absen/([^/]++)/update/(?|accept(*:1723)|reject(*:1738)))|support/(?|view/([^/]++)(*:1773)|create/store\\-reply/([^/]++)(*:1810)))|/finance/(?|a(?|bsen\\-harian/view/([^/]++)(*:1863)|pproval\\-absen/([^/]++)/update/(?|accept(*:1912)|reject(*:1927)))|data\\-(?|tagihan/([^/]++)/(?|update(*:1973)|destroy(*:1989))|pembayaran/([^/]++)/(?|update(*:2028)|destroy(*:2044))|keuangan/([^/]++)/(?|update(*:2081)|destroy(*:2097)))|support/(?|view/([^/]++)(*:2132)|create/store\\-reply/([^/]++)(*:2169))))/?$}sDu',
    ),
    3 => 
    array (
      47 => 
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
      59 => 
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
      98 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.ajax.support.ticket-last-reply',
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
      133 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.home-tagihan-invoice',
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
      157 => 
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
      176 => 
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
      192 => 
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
      232 => 
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
      264 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.support.ticket-view',
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
      290 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.support.ticket-create',
          ),
          1 => 
          array (
            0 => 'dept',
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
      306 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.support.ticket-store',
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
      330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mahasiswa.support.ticket-store-reply',
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
          5 => true,
          6 => NULL,
        ),
      ),
      372 => 
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
      385 => 
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
      427 => 
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
      440 => 
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
      488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.akademik.jadwal-absen',
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
      517 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dosen.akademik.jadwal-absen-update',
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
      569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.presensi.absen-harian-view',
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
      616 => 
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
      630 => 
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
      645 => 
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
      676 => 
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
      690 => 
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
      705 => 
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
      736 => 
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
      750 => 
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
      765 => 
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
      800 => 
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
      814 => 
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
      829 => 
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
      882 => 
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
      897 => 
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
      934 => 
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
      949 => 
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
      981 => 
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
      996 => 
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
      1029 => 
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
      1045 => 
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
      1090 => 
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
      1114 => 
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
      1129 => 
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
      1145 => 
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
      1180 => 
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
      1195 => 
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
      1211 => 
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
      1247 => 
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
      1263 => 
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
      1301 => 
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
      1320 => 
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
      1343 => 
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
      1352 => 
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
      1369 => 
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
      1424 => 
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
      1440 => 
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
      1474 => 
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
      1490 => 
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
      1547 => 
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
      1563 => 
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
      1602 => 
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
      1618 => 
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
      1655 => 
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
      1671 => 
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
      1723 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.approval.absen-update-accept',
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
      1738 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.approval.absen-update-reject',
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
      1773 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.support.ticket-view',
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
      1810 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web-admin.support.ticket-store-reply',
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
          5 => true,
          6 => NULL,
        ),
      ),
      1863 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.presensi.absen-harian-view',
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
      1912 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.approval.absen-update-accept',
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
      1927 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.approval.absen-update-reject',
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
      1973 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.tagihan-update',
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
      1989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.tagihan-destroy',
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
      2028 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.pembayaran-update',
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
      2044 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.pembayaran-destroy',
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
      2081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.keuangan-update',
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
      2097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.finance.keuangan-destroy',
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
      2132 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.support.ticket-view',
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
      2169 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'finance.support.ticket-store-reply',
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
    'generated::QETJnYgyGnQQcTnP' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000032e0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QETJnYgyGnQQcTnP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'generated::Vw30r63pyQvUJIJf' => 
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
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000003340000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Vw30r63pyQvUJIJf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'web-admin.presensi.absen-harian' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/absen-harian',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenHarian',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenHarian',
        'as' => 'web-admin.presensi.absen-harian',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.presensi.absen-izin-cuti' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/absen-izin-cuti',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenIzinCuti',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenIzinCuti',
        'as' => 'web-admin.presensi.absen-izin-cuti',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.presensi.absen-harian-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/absen-harian/view/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenView',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenView',
        'as' => 'web-admin.presensi.absen-harian-view',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzinCuti',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzinCuti',
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
    'web-admin.approval.absen-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/approval-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsen',
        'as' => 'web-admin.approval.absen-index',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.approval.absen-index-approved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/approval-absen/approved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenApproved',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenApproved',
        'as' => 'web-admin.approval.absen-index-approved',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.approval.absen-index-rejected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/finance/approval-absen/rejected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenRejected',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenRejected',
        'as' => 'web-admin.approval.absen-index-rejected',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.approval.absen-update-accept' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/finance/approval-absen/{code}/update/accept',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenAccept',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenAccept',
        'as' => 'web-admin.approval.absen-update-accept',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.approval.absen-update-reject' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'web-admin/finance/approval-absen/{code}/update/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenReject',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenReject',
        'as' => 'web-admin.approval.absen-update-reject',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.support.ticket-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@index',
        'as' => 'web-admin.support.ticket-index',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.support.ticket-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-admin/support/view/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@view',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@view',
        'as' => 'web-admin.support.ticket-view',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web-admin.support.ticket-store-reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web-admin/support/create/store-reply/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Web Administrator',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@storeReply',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@storeReply',
        'as' => 'web-admin.support.ticket-store-reply',
        'namespace' => NULL,
        'prefix' => '/web-admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.auth-signout-post' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/signout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'controller' => 'App\\Http\\Controllers\\Admin\\AuthController@AuthSignOutPost',
        'as' => 'finance.auth-signout-post',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'as' => 'finance.home-index',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@profile',
        'as' => 'finance.home-profile',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.presensi.absen-harian' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/absen-harian',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenHarian',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenHarian',
        'as' => 'finance.presensi.absen-harian',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.presensi.absen-izin-cuti' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/absen-izin-cuti',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenIzinCuti',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenIzinCuti',
        'as' => 'finance.presensi.absen-izin-cuti',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.presensi.absen-harian-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/absen-harian/view/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenView',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenView',
        'as' => 'finance.presensi.absen-harian-view',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-profile-save-image' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/profile/update-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveImageProfile',
        'as' => 'finance.home-profile-save-image',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-profile-save-data' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/profile/update-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataProfile',
        'as' => 'finance.home-profile-save-data',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-profile-save-kontak' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/profile/update-kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataKontak',
        'as' => 'finance.home-profile-save-kontak',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-profile-save-password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/profile/update-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveDataPassword',
        'as' => 'finance.home-profile-save-password',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-presensi-input-absen' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'finance/presensi/save-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveAbsen',
        'as' => 'finance.home-presensi-input-absen',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-presensi-input-izin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'finance/presensi/save-izin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzinCuti',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@saveIzinCuti',
        'as' => 'finance.home-presensi-input-izin',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.home-presensi-update-absen' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/presensi/update-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'controller' => 'App\\Http\\Controllers\\Admin\\PresensiController@absenPulang',
        'as' => 'finance.home-presensi-update-absen',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.tagihan-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/data-tagihan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@index',
        'as' => 'finance.finance.tagihan-index',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.tagihan-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/data-tagihan/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@create',
        'as' => 'finance.finance.tagihan-create',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.tagihan-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'finance/data-tagihan/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@store',
        'as' => 'finance.finance.tagihan-store',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.tagihan-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/data-tagihan/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@update',
        'as' => 'finance.finance.tagihan-update',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.tagihan-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'finance/data-tagihan/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\GenerateTagihanController@destroy',
        'as' => 'finance.finance.tagihan-destroy',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.pembayaran-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/data-pembayaran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@index',
        'as' => 'finance.finance.pembayaran-index',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.pembayaran-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/data-pembayaran/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@create',
        'as' => 'finance.finance.pembayaran-create',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.pembayaran-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'finance/data-pembayaran/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@store',
        'as' => 'finance.finance.pembayaran-store',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.pembayaran-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/data-pembayaran/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@update',
        'as' => 'finance.finance.pembayaran-update',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.pembayaran-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'finance/data-pembayaran/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\PembayaranController@destroy',
        'as' => 'finance.finance.pembayaran-destroy',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.keuangan-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/data-keuangan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@index',
        'as' => 'finance.finance.keuangan-index',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.keuangan-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'finance/data-keuangan/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@store',
        'as' => 'finance.finance.keuangan-store',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.keuangan-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/data-keuangan/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@update',
        'as' => 'finance.finance.keuangan-update',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.finance.keuangan-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'finance/data-keuangan/{code}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\BalanceController@destroy',
        'as' => 'finance.finance.keuangan-destroy',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.approval.absen-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/approval-absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsen',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsen',
        'as' => 'finance.approval.absen-index',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.approval.absen-index-approved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/approval-absen/approved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenApproved',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenApproved',
        'as' => 'finance.approval.absen-index-approved',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.approval.absen-index-rejected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/approval-absen/rejected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenRejected',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@indexAbsenRejected',
        'as' => 'finance.approval.absen-index-rejected',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.approval.absen-update-accept' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/approval-absen/{code}/update/accept',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenAccept',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenAccept',
        'as' => 'finance.approval.absen-update-accept',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.approval.absen-update-reject' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'finance/approval-absen/{code}/update/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenReject',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\ApprovalController@updateAbsenReject',
        'as' => 'finance.approval.absen-update-reject',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.support.ticket-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@index',
        'as' => 'finance.support.ticket-index',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.support.ticket-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'finance/support/view/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@view',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@view',
        'as' => 'finance.support.ticket-view',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'finance.support.ticket-store-reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'finance/support/create/store-reply/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'user-access:Departement Finance',
          2 => 'is-active:1',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@storeReply',
        'controller' => 'App\\Http\\Controllers\\Admin\\Pages\\Finance\\TicketSupportController@storeReply',
        'as' => 'finance.support.ticket-store-reply',
        'namespace' => NULL,
        'prefix' => '/finance',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
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
    'dosen.akademik.jadwal-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/data-akademik/jadwal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\Akademik\\JadwalAjarController@index',
        'controller' => 'App\\Http\\Controllers\\Dosen\\Akademik\\JadwalAjarController@index',
        'as' => 'dosen.akademik.jadwal-index',
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
    'dosen.akademik.jadwal-absen' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dosen/data-akademik/jadwal/{code}/absen',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\Akademik\\JadwalAjarController@indexAbsen',
        'controller' => 'App\\Http\\Controllers\\Dosen\\Akademik\\JadwalAjarController@indexAbsen',
        'as' => 'dosen.akademik.jadwal-absen',
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
    'dosen.akademik.jadwal-absen-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'dosen/data-akademik/jadwal/absen/{code}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'dsn-access:Dosen Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Dosen\\Akademik\\JadwalAjarController@updateAbsen',
        'controller' => 'App\\Http\\Controllers\\Dosen\\Akademik\\JadwalAjarController@updateAbsen',
        'as' => 'dosen.akademik.jadwal-absen-update',
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
    'mahasiswa.home-tagihan-invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/tagihan/{code}/invoice',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanInvoice',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\HomeController@tagihanInvoice',
        'as' => 'mahasiswa.home-tagihan-invoice',
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
    'mahasiswa.support.ticket-index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/support',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@index',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@index',
        'as' => 'mahasiswa.support.ticket-index',
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
    'mahasiswa.support.ticket-open' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/support/open',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@open',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@open',
        'as' => 'mahasiswa.support.ticket-open',
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
    'mahasiswa.support.ticket-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/support/view/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@view',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@view',
        'as' => 'mahasiswa.support.ticket-view',
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
    'mahasiswa.support.ticket-create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/support/create/{dept}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@create',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@create',
        'as' => 'mahasiswa.support.ticket-create',
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
    'mahasiswa.support.ticket-store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/support/create/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@store',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@store',
        'as' => 'mahasiswa.support.ticket-store',
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
    'mahasiswa.support.ticket-store-reply' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mahasiswa/support/create/store-reply/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@storeReply',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@storeReply',
        'as' => 'mahasiswa.support.ticket-store-reply',
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
    'mahasiswa.ajax.support.ticket-last-reply' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mahasiswa/ajax/getTicketLastReply/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'mhs-access:Mahasiswa Aktif',
        ),
        'uses' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@AjaxLastReply',
        'controller' => 'App\\Http\\Controllers\\Mahasiswa\\Pages\\SupportController@AjaxLastReply',
        'as' => 'mahasiswa.ajax.support.ticket-last-reply',
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
