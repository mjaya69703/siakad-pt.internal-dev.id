@extends('base.base-dash-index')
@section('title')
    Data Kampus
@endsection
@section('menu')
    Data Kampus
@endsection
@section('submenu')
    Modifikasi Data Kampus
@endsection
@section('urlmenu')
    #
@endsection
@section('subdesc')
    Halaman untuk data Kampus
@endsection
@section('content')
<section class="content">

    <form action="{{ route($prefix.'system.setting-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">

            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Edit Logo Kampus</h4>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="card-body">
                        <a href="#"><img src="{{ asset('storage/images/'.$web->school_logo) }}" class="card-img-top" alt="Logo Kampus"></a>
                        <hr>
                        <div class="form-group">
                            <label for="school_logo">Logo Kampus</label>
                            <input type="file" name="school_logo" id="school_logo" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Modifikasi @yield('menu')</h4>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-lg-12 col-12">
                            <label for="school_name">Nama Sekolah</label>
                            <input type="text" name="school_name" id="school_name" class="form-control" value="{{ $web->school_name }}" placeholder="Inputkan nama sekolah...">
                            @error('school_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="school_apps">Nama Aplikasi</label>
                            <input type="text" name="school_apps" id="school_apps" class="form-control" value="{{ $web->school_apps }}" placeholder="Inputkan nama aplikasi...">
                            @error('school_apps')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="school_head">Nama Rektor / Ketua Institusi</label>
                            <input type="text" name="school_head" id="school_head" class="form-control" value="{{ $web->school_head }}" placeholder="Inputkan nama rektor / kepala institusi...">
                            @error('school_head')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="school_desc">Kata Sambutan</label>
                            <textarea name="school_desc" id="dark" class="form-control" cols="30" rows="10" placeholder="Inputkan pesan sambutan...">{{ $web->school_desc }}</textarea>
                            @error('school_desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="school_link">Link Website Sekolah</label>
                            <input type="text" name="school_link" id="school_link" class="form-control" value="{{ $web->school_link }}" placeholder="Inputkan link website sekolah...">
                            @error('school_link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="school_phone">No Telepon</label>
                            <input type="text" name="school_phone" id="school_phone" class="form-control" value="{{ $web->school_phone }}" placeholder="Inputkan nomor telepon sekolah...">
                            @error('school_phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-12">
                            <label for="school_email">Alamat Email</label>
                            <input type="text" name="school_email" id="school_email" class="form-control" value="{{ $web->school_email }}" placeholder="Inputkan alamat email sekolah...">
                            @error('school_email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">

        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Pengaturan Website</h4>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <div class="card-body row">
                    <div id="alertPlaceholder"></div>
                    <div class="col-lg-6 col-12">
                        <label for="branch">Branch Channel</label>
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <select name="branch" id="branch" class="form-select">
                                <option value="" selected>Update Channel</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch['name'] }}">{{ $branch['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="" style="margin-left: 5px">
                                <button class="btn btn-warning" id="syncButton"><i class="fa-solid fa-sync"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('web-admin.system.database-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="sqldata">Import / Export & Reset Database ( .sql )</label>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <input type="file" name="sqldata" id="sqldata" class="form-control">
                                <button type="submit" class="btn btn-primary" style="margin-left: 5px;"><i class="fa-solid fa-upload"></i></button>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#databaseReset" style="margin-left: 5px;" class="btn btn-danger"><i class="fa-solid fa-sync"></i></a>
                                <div class="" style="margin-left: 5px">
                                    <a href="{{ route('web-admin.system.database-export') }}" class="btn btn-success"><i class="fa-solid fa-download"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Data Identitas Kampus</h4>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
                <div class="card-body">
                    Coming Soon
                </div>
            </div>
        </div>
    </div>
    </section>
    <div class="me-1 mb-1 d-inline-block">

        <!--Extra Large Modal -->
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade text-left w-100" id="databaseReset" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-l"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">Reset Database</h4>
                            <div class="">
                                <button type="submit" class="btn btn-outline-primary" >
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <span class="text-center"><b>Peringatan !!!</b> Aksi ini akan mereset semua database anda. <br>Silahkan inputkan <b>Secret Key</b> untuk melanjutkan</span>
                                <div class="form-group col-12 mt-2 mb-2">
                                    <label for="secret">Secret Keys</label>
                                    <input type="text" name="secret" id="secret" class="form-control">
                                    @error('secret')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <span>Note:
                                    <br> 1. Semua data dibersihkan, hanya menyisakan data default saja.
                                    <br> 2. Secret Key dapat dilihat pada .env.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('custom-js')
    <script src="{{ asset('dist') }}/assets/extensions/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('dist') }}/assets/static/js/pages/tinymce.js"></script>
    <script>
        document.getElementById("school_logo").onchange = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.querySelector('.card-img-top');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };


        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const refreshBranchesBtn = document.getElementById('xxxx');
                refreshBranchesBtn.addEventListener('click', function(event) {
                    event.preventDefault();
                    location.reload(); // Simply reload the page to refresh branches
                });
            });
        </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const syncButton = document.getElementById('syncButton');
        const branchSelect = document.getElementById('branch');
        const alertPlaceholder = document.getElementById('alertPlaceholder');

        syncButton.addEventListener('click', function(event) {
            event.preventDefault();

            fetch('{{ route('web-admin.system.website-check') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                alertPlaceholder.innerHTML = '';
                if (data.message.includes('There is an update available')) {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-warning';
                    alertDiv.innerHTML = `${data.message} <a href="#" id="updateNow">Update Now</a>`;
                    alertPlaceholder.appendChild(alertDiv);

                    document.getElementById('updateNow').addEventListener('click', function(e) {
                        e.preventDefault();
                        const selectedBranch = branchSelect.value;

                        fetch('{{ route('web-admin.system.website-update') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ branch: selectedBranch })
                        })
                        .then(response => response.json())
                        .then(updateData => {
                            alertPlaceholder.innerHTML = '';
                            const updateAlertDiv = document.createElement('div');
                            updateAlertDiv.className = updateData.status === 'success' ? 'alert alert-success' : 'alert alert-danger';
                            updateAlertDiv.innerHTML = updateData.message;
                            alertPlaceholder.appendChild(updateAlertDiv);
                        });
                    });
                } else {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success';
                    alertDiv.textContent = data.message;
                    alertPlaceholder.appendChild(alertDiv);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
@endsection
