<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $messages = $query->latest()->paginate(20);
        $newCount = ContactMessage::new()->count();

        return view('admin.messages.index', compact('messages', 'newCount'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Auto mark as read when viewing
        $message->markAsRead();

        return view('admin.messages.show', compact('message'));
    }

    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsRead();

        return redirect()->back()
            ->with('success', 'Pesan ditandai sebagai sudah dibaca');
    }

    public function markAsReplied($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsReplied();

        return redirect()->back()
            ->with('success', 'Pesan ditandai sebagai sudah dibalas');
    }

    public function archive($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->archive();

        return redirect()->back()
            ->with('success', 'Pesan diarsipkan');
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()
            ->with('success', 'Pesan berhasil dihapus');
    }

    public function updateNotes(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $message->update([
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()
            ->with('success', 'Catatan berhasil disimpan');
    }
}