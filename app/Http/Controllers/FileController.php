<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::orderBy('created_at', 'desc')->get();
        return view('files.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only('file');
        $data['user'] = Auth::user()->name;
        $data['name'] = $request->name;
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('files', 'public');
        }
        File::create($data);
        return back()->with('success', 'File uploaded successfully');
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);
        Storage::delete($file->file);
        $file->delete();
        return back()->with('success', 'File deleted successfully');
    }
}
