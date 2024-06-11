@extends('base.base-root-index')
@section('content')
<div class="page-content row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-body">

                Ini Adalah Prodi {{ $pstudi->name }}
            </div>
        </div>
    </div>
</div>
@endsection
