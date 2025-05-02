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
            // Check if file exists
            $filePath = public_path('legalify.id.xlsx');
            if (!file_exists($filePath)) {
                throw new \Exception("Excel file not found at: " . $filePath);
            }

            // Load the spreadsheet
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            
            $services = [];
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            
            // Debug information
            \Log::info('Excel file loaded successfully');
            \Log::info("Highest row: {$highestRow}, Highest column: {$highestColumn}");
            
            // Start from row 2 to skip header
            for ($row = 2; $row <= $highestRow; $row++) {
                $title = trim($worksheet->getCell('A' . $row)->getValue() ?? '');
                $description = trim($worksheet->getCell('B' . $row)->getValue() ?? '');
                
                // Debug row data
                \Log::info("Row {$row} - Title: {$title}, Description: {$description}");
                
                // Get features from columns C onwards
                $features = [];
                $currentColumn = 'C';
                while ($currentColumn <= $highestColumn) {
                    $feature = trim($worksheet->getCell($currentColumn . $row)->getValue() ?? '');
                    if (!empty($feature)) {
                        $features[] = $feature;
                    }
                    $currentColumn++;
                }
                
                // Debug features
                \Log::info("Row {$row} - Features: " . json_encode($features));
                
                if (!empty($title)) {
                    $services[] = [
                        'title' => $title,
                        'description' => $description,
                        'features' => $features
                    ];
                }
            }

            \Log::info('Total services loaded: ' . count($services));
            return view('services', compact('services'));
            
        } catch (\Exception $e) {
            \Log::error('Error loading services: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            $services = [];
            return view('services', compact('services'))->with('error', 'Unable to load services data: ' . $e->getMessage());
        }
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Alamat email tidak boleh lebih dari :max karakter.',
            'subject.required' => 'Subjek wajib diisi.',
            'subject.max' => 'Subjek tidak boleh lebih dari :max karakter.',
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
