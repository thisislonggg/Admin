<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'nama' => 'required|string',
            'phone' => 'required|string',
        ]);

        // 2. Simpan ke database CRM
        $lead = Lead::create([
            'nama' => $request->nama,
            'phone' => $request->phone,
            'message' => $request->message
        ]);

        // 3. Trigger API WhatsApp (Contoh)
        $this->sendWA($lead);

        return response()->json(['success' => true, 'message' => 'Lead berhasil disimpan!']);
    }

    private function sendWA($lead)
    {
        // Sesuaikan dengan provider WA API pilihanmu (Wablas, Fonnte, dll)
        $wa_endpoint = env('WA_API_URL'); 
        $wa_token = env('WA_API_TOKEN');

        Http::withHeaders([
            'Authorization' => $wa_token
        ])->post($wa_endpoint, [
            'target' => $lead->phone, // Nomor WA tujuan
            'message' => "Halo {$lead->nama}, terima kasih sudah mengisi form. Tim kami akan segera menghubungi Anda."
        ]);
    }
}