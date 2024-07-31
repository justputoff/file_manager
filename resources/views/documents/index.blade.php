@extends('layouts.main')

@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Upload Document</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File Document</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mt-2">
        <h5 class="card-header">Table Files</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">User</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Link</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $document->user }}</td>
                        <td>{{ $document->name }}</td>
                        <td>{{ url(Storage::url($document->file)) }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="copyToClipboard('{{ url(Storage::url($document->file)) }}')">Copy</button>
                            <a href="{{ Storage::url($document->file) }}" target="_blank" class="btn btn-sm btn-success">Open</a>
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->

<script>
    function copyToClipboard(url) {
        navigator.clipboard.writeText(url);
        alert('Link copied to clipboard');
    }
</script>
@endsection
