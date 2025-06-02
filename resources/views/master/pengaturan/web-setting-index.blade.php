@extends('core-themes.core-backpage')

@section('custom-css')
    <style>
        .profile-header {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
        }

        .nav-tabs .nav-link {
            color: #4b6cb7;
        }

        .nav-tabs .nav-link.active {
            color: #182848;
            font-weight: 600;
        }

        .form-label {
            font-weight: 500;
            color: #4b6cb7;
        }

        .required-field::after {
            content: " *";
            color: red;
        }

        .avatars {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .logo-preview {
            max-width: 200px;
            max-height: 100px;
            object-fit: contain;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-md-3 border-end">
                <div class="card-body">
                    <h4 class="subheader">Web Settings</h4>
                    <div class="list-group list-group-transparent" id="settingsTabs" role="tablist">
                        <a class="list-group-item list-group-item-action d-flex align-items-center active" id="identity-tab" data-bs-toggle="tab" href="#identity" role="tab">
                            <i class="fas fa-university me-2"></i> Identity
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab">
                            <i class="fas fa-address-book me-2"></i> Contact
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="social-tab" data-bs-toggle="tab" href="#social" role="tab">
                            <i class="fas fa-share-alt me-2"></i> Social Media
                        </a>
                        <a class="list-group-item list-group-item-action d-flex align-items-center" id="system-tab" data-bs-toggle="tab" href="#system" role="tab">
                            <i class="fas fa-cogs me-2"></i> System
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9 d-flex flex-column">
                <div class="card-body">
                    <h2 class="mb-4">Web Settings</h2>

                    <form action="{{ route($spref . 'pengaturan.web-settings-handle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="tab-content" id="settingsTabsContent">
                            <!-- Identity Tab -->
                            <div class="tab-pane fade show active" id="identity" role="tabpanel">
                                <h3 class="card-title">Institution Identity</h3>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label required-field">Application Name</label>
                                        <input type="text" class="form-control" name="school_apps" value="{{ $webs->school_apps }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required-field">Institution Name</label>
                                        <input type="text" class="form-control" name="school_name" value="{{ $webs->school_name }}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label required-field">Head of Institution</label>
                                        <input type="text" class="form-control" name="school_head" value="{{ $webs->school_head }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required-field">Website URL</label>
                                        <input type="url" class="form-control" name="school_link" value="{{ $webs->school_link }}" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-label required-field">Institution Description</label>
                                        <textarea class="form-control" name="school_desc" rows="4" required>{{ $webs->school_desc }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Vertical Logo</label>
                                        <div class="mb-2">
                                            <img src="{{ $webs->school_logo_vert }}" alt="Vertical Logo" class="logo-preview" id="preview-vert-logo">
                                        </div>
                                        <input type="file" class="form-control" name="school_logo_vert" id="vert-logo-input" accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Horizontal Logo</label>
                                        <div class="mb-2">
                                            <img src="{{ $webs->school_logo_hori }}" alt="Horizontal Logo" class="logo-preview" id="preview-hori-logo">
                                        </div>
                                        <input type="file" class="form-control" name="school_logo_hori" id="hori-logo-input" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Tab -->
                            <div class="tab-pane fade" id="contact" role="tabpanel">
                                <h3 class="card-title">Contact Information</h3>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="school_email" value="{{ $webs->school_email }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="school_phone" value="{{ $webs->school_phone }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="school_address" rows="3">{{ $webs->school_address }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Longitude</label>
                                        <input type="text" class="form-control" name="school_longitude" value="{{ $webs->school_longitude }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Latitude</label>
                                        <input type="text" class="form-control" name="school_latitude" value="{{ $webs->school_latitude }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Tab -->
                            <div class="tab-pane fade" id="social" role="tabpanel">
                                <h3 class="card-title">Social Media Links</h3>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Facebook</label>
                                        <input type="url" class="form-control" name="social_fb" value="{{ $webs->social_fb }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Instagram</label>
                                        <input type="url" class="form-control" name="social_ig" value="{{ $webs->social_ig }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">LinkedIn</label>
                                        <input type="url" class="form-control" name="social_in" value="{{ $webs->social_in }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Twitter/X</label>
                                        <input type="url" class="form-control" name="social_tw" value="{{ $webs->social_tw }}">
                                    </div>
                                </div>
                            </div>

                            <!-- System Tab -->
                            <div class="tab-pane fade" id="system" role="tabpanel">
                                <h3 class="card-title">System Settings</h3>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Current Academic Year</label>
                                        <input type="number" class="form-control" name="taka_now" value="{{ $webs->taka_now }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Max Login Attempts</label>
                                        <input type="number" class="form-control" name="max_login_attempts" value="{{ $webs->max_login_attempts }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1" {{ $webs->maintenance_mode ? 'checked' : '' }}>
                                            <label class="form-check-label" for="maintenance_mode">Maintenance Mode</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="enable_captcha" id="enable_captcha" value="1" {{ $webs->enable_captcha ? 'checked' : '' }}>
                                            <label class="form-check-label" for="enable_captcha">Enable Captcha</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent mt-4">
                            <div class="btn-list justify-content-end">
                                <button type="button" class="btn btn-1" onclick="window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-2">Save Changes</button>
                            </div>
                        </div>
                    </form>

                    <!-- Database Management Section - Moved outside main form -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Database Management</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route($spref . 'pengaturan.export-database') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-download me-2"></i>Export Database
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route($spref . 'pengaturan.import-database') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="database_file" accept=".sql" required>
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fas fa-upload me-2"></i>Import Database
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Logo preview functionality
            const vertLogoInput = document.getElementById('vert-logo-input');
            const horiLogoInput = document.getElementById('hori-logo-input');
            const previewVertLogo = document.getElementById('preview-vert-logo');
            const previewHoriLogo = document.getElementById('preview-hori-logo');

            function handleLogoPreview(input, preview) {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }

            handleLogoPreview(vertLogoInput, previewVertLogo);
            handleLogoPreview(horiLogoInput, previewHoriLogo);

            // Handle tab navigation
            const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    
                    // Remove active class from all tabs and links
                    document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.remove('show', 'active'));
                    document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('active'));
                    
                    // Add active class to current tab and link
                    this.classList.add('active');
                    target.classList.add('show', 'active');
                });
            });
        });
    </script>
@endsection
