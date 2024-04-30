@extends('base.base-dash-index')
@section('title')
    Absensi Perkuliahan - Siakad By Internal Developer
@endsection
@section('menu')
    Data Jadwal Kuliah
@endsection
@section('submenu')
    Absen Perkuliahan
@endsection
@section('urlmenu')
@endsection
@section('subdesc')
    Halaman untuk melihat Jadwal Kuliah
@endsection
@section('custom-css')
<style>
    table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  /* background-color: #f8f8f8; */
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
@endsection
@section('content')
<section class="section">
  <form action="{{ route('mahasiswa.home-jadkul-absen-store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="card">
      <div class="card-header">
          <h5 class="card-title d-flex justify-content-between align-items-center">
              @yield('submenu')
              <div class="">
                  {{-- <a href="{{ route('web-admin.master.jadkul-create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i></a> --}}
                  <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
              </div>
          </h5>
      </div>
      <div class="card-body row">
          <div class="form-group col-lg-4 col-12">
            <img src="" class="card-img-top" alt="">
            <label for="absen_proof">Bukti Absensi</label>
            <input type="file" name="absen_proof" id="absen_proof" class="form-control" placeholder="inputkan bukti absensi...">
            @error('absen_proof')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-4 col-12" style="display: none">
            <label for="jadkul_code">Jadwal Kuliah ( Code )</label>
            <input type="text" name="jadkul_code" id="jadkul_code" value="{{ $jadkul->code }}" readonly class="form-control" placeholder="inputkan kode jadwal kuliah...">
            @error('jadkul_code')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-4 col-12">
            <label for="jadkul_name">Absen Mata Kuliah</label>
            <input type="text" name="jadkul_name" id="jadkul_name" value="{{ $jadkul->matkul->name . ' - ' . $jadkul->pert_id }}" readonly class="form-control" placeholder="inputkan kode jadwal kuliah...">
            @error('jadkul_name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-4 col-12" style="display: none">
            <label for="author_id">ID Mahasiswa</label>
            <input type="text" name="author_id" id="author_id" value="{{ Auth::guard('mahasiswa')->user()->id }}" readonly class="form-control" placeholder="inputkan id mahasiswa...">
            @error('author_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-4 col-12">
            <label for="author_name">Nama Mahasiswa</label>
            <input type="text" name="author_name" id="author_name" value="{{ Auth::guard('mahasiswa')->user()->mhs_name }}" readonly class="form-control" placeholder="inputkan id mahasiswa...">
            @error('author_name')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-3 col-12">
            <label for="author_class">Kelas Mahasiswa</label>
            <input type="text" name="author_class" id="author_class" value="{{ Auth::guard('mahasiswa')->user()->kelas->name }}" readonly class="form-control" placeholder="inputkan id mahasiswa...">
            @error('author_class')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-3 col-12">
            <label for="absen_type">Jenis Kehadiran</label>
            <select name="absen_type" id="absen_type" class="form-select">
              <option value="">Pilih Jenis Kehadiran</option>
              <option value="H">Hadir</option>
              <option value="I">Izin</option>
              <option value="S">Sakit</option>
            </select>
            @error('absen_type')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-3 col-12">
            <label for="absen_date">Tanggal Perkuliahan</label>
            <input type="date" name="absen_date" id="absen_date" value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly class="form-control" placeholder="inputkan id mahasiswa...">
            @error('absen_date')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-lg-3 col-12">
            <label for="absen_time">Waktu Absen</label>
            <input type="time" name="absen_time" id="absen_time" class="form-control">
            @error('absen_time')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
      </div>
  </div>
  </form>

</section>
@endsection
@section('custom-js')
<script>
  document.getElementById("absen_proof").onchange = function(event) {
      var reader = new FileReader();
      reader.onload = function() {
          var output = document.querySelector('.card-img-top');
          output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
  };
</script>
<script>
  // Update waktu setiap detik
  setInterval(updateTime, 1000);

  function updateTime() {
      var now = new Date();
      var hours = now.getHours().toString().padStart(2, '0');
      var minutes = now.getMinutes().toString().padStart(2, '0');
      var timeString = hours + ':' + minutes;
      document.getElementById('absen_time').value = timeString;
  }
</script>
@endsection