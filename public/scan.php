<?php
// Define the directory to scan
$directory = dirname(__DIR__); // One directory up from public/
$outputDirectory = $directory;
$outputBaseName = 'vulnerability-scan';
$outputExtension = '.txt';
$maxRetention = 7;

// Get the current time
$currentTime = time();

// Initialize arrays to hold the results
$results = [];
$suspiciousPatterns = [
    // File Manager Patterns
    'filemanager' => ['filemanager', 'file-manager', 'file_manager', 'uploader', 'upload-manager'],
    'Shell Patterns' => ['shell', 'backdoor', 'cmd', 'command', 'exec', 'system', 'passthru', 'eval', 'base64_decode'],
    'Database Patterns' => ['mysql_connect', 'mysqli_connect', 'pdo_connect', 'db_connect'],
    'Upload Patterns' => ['upload', 'file_upload', 'file-upload', 'upload-file'],
    'Admin Patterns' => ['admin', 'administrator', 'adminer', 'phpmyadmin'],
    'Suspicious Functions' => ['shell_exec', 'exec', 'system', 'passthru', 'eval', 'assert', 'preg_replace', 'create_function'],
    'Common Malware' => ['c99', 'r57', 'wso', 'b374k', 'cgi-telnet', 'phpshell', 'phpremoteview']
];

// Directories and files to ignore
$ignorePaths = [
    'vendor',
    'storage',
    'bootstrap',
    'app',
    'config',
    'database',
    'resources',
    'routes',
    'tests',
    '.git',
    'node_modules',
    'composer.json',
    'composer.lock',
    'package.json',
    'package-lock.json',
    '.env',
    '.env.example',
    '.gitignore',
    'artisan',
    'phpunit.xml',
    'README.md',
    'webpack.mix.js',
    'mix-manifest.json',
    'public/index.php',
    'public/scan.php',
    'public/favicon.ico',
    'public/robots.txt',
    'public/dashboard/*.html',
    'public/dist/*.html',
    'public/.htaccess'
];

// Function to get the time difference in a human-readable format
function timeDifference($time1, $time2) {
    $diff = abs($time1 - $time2);
    $days = floor($diff / (60 * 60 * 24));
    return $days;
}

// Function to check if path should be ignored
function shouldIgnore($path, $ignorePaths) {
    foreach ($ignorePaths as $ignorePath) {
        if (strpos($path, $ignorePath) !== false) {
            return true;
        }
    }
    return false;
}

// Function to scan file content for suspicious patterns
function scanFileContent($filePath, $patterns) {
    $content = file_get_contents($filePath);
    $suspicious = [];
    
    foreach ($patterns as $category => $patternList) {
        foreach ($patternList as $pattern) {
            if (stripos($content, $pattern) !== false) {
                $suspicious[] = "$category: Found '$pattern'";
            }
        }
    }
    
    return $suspicious;
}

// Function to scan the directory
function scanDirectory($dir, $currentTime, &$results, $patterns, $ignorePaths) {
    $files = scandir($dir);
    $fileResults = []; // Temporary array to store results with timestamps
    
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $dir . DIRECTORY_SEPARATOR . $file;
            
            // Skip if path should be ignored
            if (shouldIgnore($filePath, $ignorePaths)) {
                continue;
            }
            
            if (is_file($filePath)) {
                $fileMTime = filemtime($filePath);
                $daysAgo = timeDifference($currentTime, $fileMTime);
                
                // Check file extension
                $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                $suspiciousExtensions = ['php', 'php3', 'php4', 'php5', 'phtml', 'phar', 'inc', 'html', 'htm'];
                
                if (in_array($extension, $suspiciousExtensions)) {
                    // Scan file content
                    $suspicious = scanFileContent($filePath, $patterns);
                    
                    if (!empty($suspicious)) {
                        $fileResults[] = [
                            'timestamp' => $fileMTime,
                            'content' => [
                                "SUSPICIOUS FILE: $filePath",
                                "Last modified: $daysAgo days ago",
                                "Suspicious patterns found:",
                                ...array_map(fn($s) => "  - $s", $suspicious),
                                "----------------------------------------"
                            ]
                        ];
                    }
                }
            } elseif (is_dir($filePath)) {
                scanDirectory($filePath, $currentTime, $results, $patterns, $ignorePaths);
            }
        }
    }
    
    // Sort results by timestamp (newest first)
    usort($fileResults, function($a, $b) {
        return $b['timestamp'] - $a['timestamp'];
    });
    
    // Add sorted results to main results array
    foreach ($fileResults as $result) {
        $results = array_merge($results, $result['content']);
    }
}

// Function to manage file retention
function manageRetention($outputDirectory, $outputBaseName, $outputExtension, $maxRetention) {
    for ($i = $maxRetention; $i > 1; $i--) {
        $oldFile = $outputDirectory . DIRECTORY_SEPARATOR . $outputBaseName . '-' . str_pad($i - 1, 2, '0', STR_PAD_LEFT) . $outputExtension;
        $newFile = $outputDirectory . DIRECTORY_SEPARATOR . $outputBaseName . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) . $outputExtension;
        
        if (file_exists($oldFile)) {
            rename($oldFile, $newFile);
        }
    }
}

// Manage file retention
manageRetention($outputDirectory, $outputBaseName, $outputExtension, $maxRetention);

// Scan the directory
scanDirectory($directory, $currentTime, $results, $suspiciousPatterns, $ignorePaths);

// Write the results to the output file
$outputFile = $outputDirectory . DIRECTORY_SEPARATOR . $outputBaseName . '-01' . $outputExtension;
file_put_contents($outputFile, implode(PHP_EOL, $results));

echo "Vulnerability scan complete. Results saved to $outputFile";
?>
