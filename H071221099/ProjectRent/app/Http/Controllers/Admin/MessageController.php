<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();

        return view('admin.messages.index', compact('messages')); 
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->back()->with([
            'message' => 'data berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'status' => 'required|in:pending,processed,completed',
        ]);

        $message->update(['status' => $request->status]);

        return redirect()->back()->with([
            'message' => 'Status pesanan berhasil diperbarui',
            'alert-type' => 'success',
        ]);
    }

    // ...
}


