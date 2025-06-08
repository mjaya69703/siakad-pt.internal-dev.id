<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NecoSiakad Setup Wizard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-primary-50 to-primary-100 min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between items-center relative">
                    <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 -translate-y-1/2"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-primary-500 -translate-y-1/2 transition-all duration-500"
                        id="progressBar" style="width: 0%"></div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2 step-icon active"
                            data-step="1">
                            <i class="ti ti-heart"></i>
                        </div>
                        <span class="text-sm font-medium text-primary-600">Selamat Datang</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2 step-icon"
                            data-step="2">
                            <i class="ti ti-settings"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Pengaturan</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2 step-icon"
                            data-step="3">
                            <i class="ti ti-user"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Admin</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mb-2 step-icon"
                            data-step="4">
                            <i class="ti ti-check"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Selesai</span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <!-- Step 1: Welcome -->
                    <div class="wizard-step active" id="step1">
                        <div class="text-center">
                            <div
                                class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <i class="ti ti-heart text-4xl text-white"></i>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Selamat Datang di NecoSiakad</h2>
                            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                                Terima kasih telah memilih NecoSiakad, sistem informasi akademik open-source.
                                Mari kita mulai proses pengaturan untuk mengkonfigurasi sistem Anda.
                            </p>
                            <button onclick="nextStep(1)"
                                class="inline-flex items-center px-6 py-3 bg-primary-500 text-white font-medium rounded-lg hover:bg-primary-600 transition-colors duration-200">
                                Mulai Pengaturan
                                <i class="ti ti-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Web Settings -->
                    <div class="wizard-step hidden" id="step2">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan Kampus</h2>
                        <form id="webSettingsForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Perguruan Tinggi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="webSettings[school_name]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan nama perguruan tinggi">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Rektor <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="webSettings[school_head]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan nama rektor">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Website Kampus <span class="text-red-500">*</span>
                                    </label>
                                    <input type="url" name="webSettings[school_link]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Contoh: https://university.ac.id">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Kampus
                                    </label>
                                    <input type="email" name="webSettings[school_email]"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Contoh: info@university.ac.id">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Telepon Kampus
                                    </label>
                                    <input type="tel" name="webSettings[school_phone]"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Contoh: 021-1234567">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Alamat Kampus
                                    </label>
                                    <textarea name="webSettings[school_address]" rows="2"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan alamat lengkap kampus"></textarea>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi Perguruan Tinggi <span class="text-red-500">*</span>
                                </label>
                                <textarea name="webSettings[school_desc]" rows="3" required
                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Masukkan deskripsi singkat tentang perguruan tinggi"></textarea>
                            </div>
                            <div class="flex justify-between pt-6">
                                <button type="button" onclick="prevStep(2)"
                                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <i class="ti ti-arrow-left mr-2"></i> Sebelumnya
                                </button>
                                <button type="button" onclick="nextStep(2)"
                                    class="px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors duration-200">
                                    Selanjutnya <i class="ti ti-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 3: Admin Account -->
                    <div class="wizard-step hidden" id="step3">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Buat Akun Super Admin</h2>
                        <form id="adminForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="admin[name]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan nama lengkap">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Pengguna <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="admin[username]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan nama pengguna">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="admin[email]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan alamat email">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Telepon <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" name="admin[phone]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan nomor telepon">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Kata Sandi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="admin[password]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan kata sandi">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Konfirmasi Kata Sandi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="password" name="admin[password_confirmation]" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Masukkan ulang kata sandi">
                                </div>
                            </div>
                            <div class="flex justify-between pt-6">
                                <button type="button" onclick="prevStep(3)"
                                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <i class="ti ti-arrow-left mr-2"></i> Sebelumnya
                                </button>
                                <button type="button" onclick="nextStep(3)"
                                    class="px-6 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors duration-200">
                                    Selanjutnya <i class="ti ti-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div class="wizard-step hidden" id="step4">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Konfirmasi Pengaturan</h2>
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="ti ti-settings mr-2 text-primary-500"></i>
                                    Pengaturan Kampus
                                </h3>
                                <div id="webSettingsSummary" class="space-y-4">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="ti ti-user mr-2 text-primary-500"></i>
                                    Akun Admin
                                </h3>
                                <div id="adminSummary" class="space-y-4">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                            </div>
                            <div class="flex justify-between pt-6">
                                <button type="button" onclick="prevStep(4)"
                                    class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <i class="ti ti-arrow-left mr-2"></i> Sebelumnya
                                </button>
                                <button type="button" onclick="completeSetup()"
                                    class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200">
                                    <i class="ti ti-check mr-2"></i> Selesai
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function showStep(step) {
                // Update progress bar
                const progress = ((step - 1) / 3) * 100;
                $('#progressBar').css('width', `${progress}%`);
                
                // Hide all steps
                $('.wizard-step').addClass('hidden');
                
                // Show current step
                $(`#step${step}`).removeClass('hidden');
                
                // Update step indicators
                $('.step-icon').each(function(index) {
                    if (index + 1 < step) {
                        $(this).removeClass('bg-gray-200 text-gray-600').addClass('bg-green-500 text-white');
                    } else if (index + 1 === step) {
                        $(this).removeClass('bg-gray-200 text-gray-600').addClass('bg-primary-500 text-white');
                    } else {
                        $(this).removeClass('bg-primary-500 text-white bg-green-500').addClass('bg-gray-200 text-gray-600');
                    }
                });
            }

            window.nextStep = function(currentStep) {
                if (validateStep(currentStep)) {
                    showStep(currentStep + 1);
                    if (currentStep + 1 === 4) {
                        updateSummary();
                    }
                }
            }

            window.prevStep = function(currentStep) {
                showStep(currentStep - 1);
            }

            function validateStep(step) {
                const form = $(`#step${step} form`)[0];
                if (form) {
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return false;
                    }
                }
                return true;
            }

            function updateSummary() {
                // Mapping for web settings labels
                const webSettingsLabels = {
                    'webSettings[school_name]': 'Nama Perguruan Tinggi',
                    'webSettings[school_head]': 'Nama Rektor',
                    'webSettings[school_link]': 'Website Kampus',
                    'webSettings[school_email]': 'Email Kampus',
                    'webSettings[school_phone]': 'Telepon Kampus',
                    'webSettings[school_address]': 'Alamat Kampus',
                    'webSettings[school_desc]': 'Deskripsi Perguruan Tinggi',
                };

                // Update Web Settings Summary
                const webSettingsForm = $('#webSettingsForm');
                const webSettingsSummary = $('#webSettingsSummary');
                let webSettingsHtml = '';
                
                webSettingsForm.find('input, textarea').each(function() {
                    const name = $(this).attr('name');
                    if ($(this).val() && webSettingsLabels[name]) {
                        webSettingsHtml += `
                            <div class="flex items-start">
                                <i class="ti ti-check-circle text-green-500 mt-1 mr-3"></i>
                                <div>
                                    <div class="font-medium text-gray-900">${webSettingsLabels[name]}</div>
                                    <div class="text-gray-600">${$(this).val()}</div>
                                </div>
                            </div>`;
                    }
                });
                webSettingsSummary.html(webSettingsHtml);

                // Mapping for admin labels
                const adminLabels = {
                    'admin[name]': 'Nama Lengkap',
                    'admin[username]': 'Nama Pengguna',
                    'admin[email]': 'Email',
                    'admin[phone]': 'Telepon',
                    // Passwords are not displayed in summary
                };

                // Update Admin Summary
                const adminForm = $('#adminForm');
                const adminSummary = $('#adminSummary');
                let adminHtml = '';
                
                adminForm.find('input, textarea').each(function() {
                    const name = $(this).attr('name');
                    if (name && $(this).val() && name !== 'admin[password]' && name !== 'admin[password_confirmation]' && adminLabels[name]) {
                        adminHtml += `
                            <div class="flex items-start">
                                <i class="ti ti-check-circle text-green-500 mt-1 mr-3"></i>
                                <div>
                                    <div class="font-medium text-gray-900">${adminLabels[name]}</div>
                                    <div class="text-gray-600">${$(this).val()}</div>
                                </div>
                            </div>`;
                    }
                });
                adminSummary.html(adminHtml);
            }

            window.completeSetup = function() {
                const completeButton = $('#step4 button:last-child');
                if (!completeButton.length) {
                    console.error('Complete button not found');
                    return;
                }

                // Show loading state
                const originalText = completeButton.html();
                completeButton.html('<i class="ti ti-loader animate-spin mr-2"></i> Memproses...').prop('disabled', true);

                // Get form data
                const webSettingsForm = $('#webSettingsForm');
                const adminForm = $('#adminForm');

                // Validate forms
                if (!webSettingsForm[0].checkValidity() || !adminForm[0].checkValidity()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Mohon lengkapi semua field yang wajib diisi',
                    });
                    completeButton.html(originalText).prop('disabled', false);
                    return;
                }

                // Create data object
                const data = {
                    webSettings: {},
                    admin: {}
                };

                // Add web settings
                webSettingsForm.find('input, textarea').each(function() {
                    const name = $(this).attr('name');
                    if (name) {
                        const key = name.replace('webSettings[', '').replace(']', '');
                        data.webSettings[key] = $(this).val();
                    }
                });

                // Add admin data
                adminForm.find('input, textarea').each(function() {
                    const name = $(this).attr('name');
                    if (name) {
                        const key = name.replace('admin[', '').replace(']', '');
                        data.admin[key] = $(this).val();
                    }
                });

                // Get CSRF token
                const token = $('meta[name="csrf-token"]').attr('content');

                // Send request
                $.ajax({
                    url: '/api/setup',
                    method: 'POST',
                    data: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        if (response.success) {
                            completeButton.html('<i class="ti ti-check mr-2"></i> Berhasil!')
                                .removeClass('bg-green-500 hover:bg-green-600')
                                .addClass('bg-primary-500 hover:bg-primary-600');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = '/';
                            });
                        } else {
                            throw new Error(response.message || 'Setup gagal');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Setup error:', {xhr, status, error});
                        let errorMessage = 'Setup gagal. Silakan coba lagi.';
                        
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.message) {
                                    errorMessage = response.message;
                                }
                            } catch (e) {
                                console.error('Error parsing response:', e);
                            }
                        }
                        
                        completeButton.html(originalText).prop('disabled', false);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessage,
                        });
                    }
                });
            }
        });
    </script>
</body>

</html>
