<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:10240',
        ]);

        $data['name'] = $request->name;
        $data['user'] = Auth::user()->name;
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('documents', 'public');
        }

        Document::create($data);

        return redirect()->route('documents.index')->with('success', 'Document created successfully');
    }
}
