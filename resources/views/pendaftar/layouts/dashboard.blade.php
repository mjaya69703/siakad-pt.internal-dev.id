<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Pendaftar') - {{ config('app.name') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        .sidebar-brand {
            padding: 1rem;
            color: white;
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }
        
        .sidebar-nav li a {
            display: block;
            padding: 0.75rem 1rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .sidebar-nav li a:hover,
        .sidebar-nav li a.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="{{ route('pendaftar.dashboard') }}" class="sidebar-brand d-flex align-items-center">
            <i class="fas fa-graduation-cap me-2"></i>
            <span>PMB Dashboard</span>
        </a>
        
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('pendaftar.dashboard') }}" class="{{ request()->routeIs('pendaftar.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('pendaftar.profile') }}" class="{{ request()->routeIs('pendaftar.profile') ? 'active' : '' }}">
                    <i class="fas fa-user me-2"></i> Profil Saya
                </a>
            </li>
            <li>
                <a href="{{ route('pendaftar.pendaftaran') }}" class="{{ request()->routeIs('pendaftar.pendaftaran*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt me-2"></i> Pendaftaran
                </a>
            </li>
            <li>
                <a href="{{ route('pendaftar.dokumen') }}" class="{{ request()->routeIs('pendaftar.dokumen*') ? 'active' : '' }}">
                    <i class="fas fa-folder me-2"></i> Dokumen
                </a>
            </li>
            <li>
                <a href="{{ route('pendaftar.status') }}" class="{{ request()->routeIs('pendaftar.status') ? 'active' : '' }}">
                    <i class="fas fa-info-circle me-2"></i> Status Pendaftaran
                </a>
            </li>
        </ul>
        
        <div class="mt-auto p-3">
            <form action="{{ route('pendaftar.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm w-100">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="btn btn-link d-lg-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="d-flex align-items-center ms-auto">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth('pendaftar')->user()->name) }}&background=667eea&color=fff&size=32" 
                                 class="rounded-circle me-2" width="32" height="32">
                            <span>{{ auth('pendaftar')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('pendaftar.profile') }}">
                                <i class="fas fa-user me-2"></i> Profil
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('pendaftar.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Page Content -->
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });
        });
    </script>
    
    @stack('scripts')
    
    <!-- SweetAlert for notifications -->
    @if(session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
    @endif
    
    @if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
    @endif
</body>
</html>
