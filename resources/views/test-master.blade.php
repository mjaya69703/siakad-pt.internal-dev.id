<!DOCTYPE html>
<html>
<head>
    <title>Test Data Master</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Test Data Master Akademik</h1>
    
    <h2>Jenjang Pendidikan:</h2>
    <div id="jenjang-list">
        @foreach($jenjangs as $jenjang)
            <button onclick="loadProdi({{ $jenjang->id }})" style="margin: 5px; padding: 10px;">
                {{ $jenjang->nama }} ({{ $jenjang->singkatan }})
            </button>
        @endforeach
    </div>
    
    <h2>Program Studi:</h2>
    <div id="prodi-list">
        <p>Pilih jenjang untuk melihat program studi</p>
    </div>

    <script>
        function loadProdi(jenjangId) {
            $('#prodi-list').html('<p>Loading...</p>');
            
            fetch(`{{ url('/pendaftar/api/program-studi') }}/${jenjangId}`)
                .then(response => response.json())
                .then(data => {
                    let html = '<ul>';
                    data.forEach(prodi => {
                        html += `<li>ID: ${prodi.id} - ${prodi.name} (${prodi.code})</li>`;
                    });
                    html += '</ul>';
                    $('#prodi-list').html(html);
                })
                .catch(error => {
                    $('#prodi-list').html('<p>Error loading data: ' + error + '</p>');
                });
        }
    </script>
</body>
</html>
