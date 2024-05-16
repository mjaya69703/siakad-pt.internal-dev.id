@php
    $prefix = '';
    $rawType = Auth::user()->raw_type;
    switch ($rawType) {
        case 1:
            $prefix = 'finance.';
            break;
        case 2:
            $prefix = 'officer.';
            break;
        case 3:
            $prefix = 'academic.';
            break;
        case 4:
            $prefix = 'admin.';
            break;
        case 5:
            $prefix = 'support.';
            break;
        default:
            $prefix = 'web-admin.';
            break;
    }

@endphp
