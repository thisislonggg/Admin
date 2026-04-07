<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ContactController extends Controller
{
    // 1. Menampilkan daftar kontak dengan Pagination (Read)
    public function index()
    {
        // Mengambil 10 data kontak per halaman, diurutkan dari yang terbaru
        $contacts = Contact::latest()->paginate(10); 
        return view('crm-contacts', compact('contacts'));
    }

    // 2. Menyimpan kontak baru (Create)
    public function store(Request $request)
    {
        // 1. Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'keterangan' => 'nullable|string|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
        ]);

        // 2. Siapkan array data untuk disimpan
        $data = $request->except('avatar'); // Ambil semua data kecuali file avatar

        // 3. Proses upload avatar (jika user mengunggah file)
        if ($request->hasFile('avatar')) {
            // Simpan gambar ke folder 'public/storage/avatars'
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath; // Tambahkan path gambar ke array data
        }

        // 4. Simpan ke database
        Contact::create($data);

        // 5. Kembalikan pengguna ke halaman daftar kontak dengan pesan sukses
        return redirect()->route('contacts.index')->with('success', 'Kontak baru berhasil ditambahkan!');
    }

public function create()
    {
        // Mengarahkan ke file resources/views/crm-contacts-create.blade.php
        return view('crm-contacts-create');
    }

public function edit($id)
    {
        // Cari kontak berdasarkan ID, jika tidak ada akan muncul 404 Not Found
        $contact = Contact::findOrFail($id); 
        
        // Arahkan ke view form edit dengan membawa data kontak tersebut
        return view('crm-contacts-edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            // Perhatikan email: kita mengecualikan ID kontak ini agar emailnya sendiri tidak dianggap duplikat
            'email' => 'required|email|unique:contacts,email,' . $id, 
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Ambil data lama dari database
        $contact = Contact::findOrFail($id);
        $data = $request->except('avatar'); // Ambil input form selain file

        // 3. Cek jika ada upload foto avatar baru
        if ($request->hasFile('avatar')) {
            // Hapus foto lama di folder storage jika ada
            if ($contact->avatar && Storage::disk('public')->exists($contact->avatar)) {
                Storage::disk('public')->delete($contact->avatar);
            }
            
            // Simpan foto baru
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath; 
        }

        // 4. Update data di database
        $contact->update($data);

        // 5. Kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui!');
    }

    // 3. Menghapus kontak (Delete)
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Contact deleted successfully.');
    }

    // Catatan: Untuk fungsi edit (Update), biasanya butuh halaman form terpisah 
    // atau menggunakan Modal (Pop-up).
}