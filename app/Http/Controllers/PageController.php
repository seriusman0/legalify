<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PageController extends Controller
{
    public function services()
    {
        try {
            $services = [];
            $processSteps = [];
            $excelFile = public_path('legalify.id.xlsx');
            
            if (file_exists($excelFile)) {
                $spreadsheet = IOFactory::load($excelFile);
                $worksheet = $spreadsheet->getActiveSheet();
                $highestRow = $worksheet->getHighestRow();
                
                $currentCategory = null;
                $currentPackages = [];
                $inProcessSection = false;
                
                for ($row = 2; $row <= $highestRow; $row++) {
                    $title = trim($worksheet->getCell('A' . $row)->getValue() ?? '');
                    $description = trim($worksheet->getCell('B' . $row)->getValue() ?? '');
                    
                    // Get features from columns C to G
                    $features = [];
                    for ($col = 'C'; $col <= 'G'; $col++) {
                        $value = trim($worksheet->getCell($col . $row)->getValue() ?? '');
                        if (!empty($value)) {
                            $features[] = $value;
                        }
                    }
                    
                    // Handle process section
                    if ($title === 'Alur Proses') {
                        $inProcessSection = true;
                        continue;
                    }
                    
                    if ($inProcessSection && !empty($title)) {
                        if (preg_match('/^\d+\./', $title)) {
                            $processSteps[] = [
                                'title' => $title,
                                'description' => $description
                            ];
                        }
                        continue;
                    }
                    
                    // Skip empty rows
                    if (empty($title) && empty($description) && empty($features)) {
                        continue;
                    }
                    
                    // New category starts when title is not empty
                    if (!empty($title)) {
                        // Add previous category if exists
                        if ($currentCategory && !empty($currentPackages)) {
                            $services[] = [
                                'title' => $currentCategory,
                                'packages' => $currentPackages,
                                'is_process' => false
                            ];
                        }
                        $currentCategory = $title;
                        $currentPackages = [];
                    }
                    
                    // Add package to current category
                    if (!empty($description)) {
                        $currentPackages[] = [
                            'type' => $description,
                            'features' => $features,
                            'description' => $features[1] ?? '',
                            'price_range' => $features[3] ?? '',
                            'final_price' => $features[4] ?? '',
                            'main_features' => array_slice($features, 0, -3)
                        ];
                    }
                }
                
                // Add last category
                if ($currentCategory && !empty($currentPackages)) {
                    $services[] = [
                        'title' => $currentCategory,
                        'packages' => $currentPackages,
                        'is_process' => false
                    ];
                }
                
                // Add process section at the end
                if (!empty($processSteps)) {
                    $services[] = [
                        'title' => 'Alur Proses',
                        'steps' => $processSteps,
                        'is_process' => true
                    ];
                }
            }
            
            return view('services', compact('services'));
        } catch (\Exception $e) {
            \Log::error('Error loading services: ' . $e->getMessage());
            return view('services', ['services' => [], 'error' => 'Unable to load services data.']);
        }
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.max' => 'Nomor WhatsApp tidak boleh lebih dari :max karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Alamat email tidak boleh lebih dari :max karakter.',
            'company.max' => 'Nama perusahaan tidak boleh lebih dari :max karakter.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        try {
            Message::create($validated);
            return redirect()
                ->back()
                ->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi.')
                ->withInput();
        }
    }
}
