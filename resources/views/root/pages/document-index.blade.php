@extends('base.base-root-index')
@section('submenu')
Public Document
@endsection
@section('custom-css')
<style>
    .clickable {
        cursor: pointer;
    }
    .clickable.active {
        background-color: #af9898c4;
        border-left: 4px solid #007bff;
    }
</style>
@endsection
@section('content')
<div class="breadcrumb-wrap-style-2" data-bg-image="https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg" style="border-radius: 20px; background-image: url(&quot;https://srv-xsample.internal-dev.id/assets/webprofil/media/banner/banner22.jpg&quot;);">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('root.home-index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('root.home-download') }}">Document</a></li>
        </ol>
    </nav>
    <div class="inner-banner-title">
        <h1 class="title">@yield('submenu')</h1>
    </div>
</div>
<div class="page-content row mt-4">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $menu }}</h5>
            </div>
            <div class="card-body row">
                @forelse ($docs as $item)
                <div class="form-group col-lg-12">
                    <p data-slug="{{ asset('storage/'. $item->path) }}" class="clickable"><img src="{{ asset('storage/'. $item->cover) }}" style="max-width: 50px; border-radius: 10px;" alt=""> {{ $item->name }}</p>
                </div>
                @empty
                <div class="form-group col-lg-12 text-center">
                    Tidak ada dokumen.
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Preview Files</h5>
            </div>
            <div class="card-body">
                <iframe id="pdf-iframe" src="https://test.pdf" allow-embed style="width:100%; height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const iframe = document.getElementById('pdf-iframe');
        const clickableElements = document.querySelectorAll('.clickable');

        // Set initial iframe source to the first clickable element's data-slug and mark it active
        if (clickableElements.length > 0) {
            iframe.src = clickableElements[0].getAttribute('data-slug');
            clickableElements[0].classList.add('active');
        }

        clickableElements.forEach(element => {
            element.addEventListener('click', function () {
                // Remove active class from all elements
                clickableElements.forEach(el => el.classList.remove('active'));
                // Add active class to the clicked element
                this.classList.add('active');
                // Update iframe src
                iframe.src = this.getAttribute('data-slug');
            });
        });
    });

</script>
@endsection
