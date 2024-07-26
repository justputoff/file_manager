@extends('layouts.main')

@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Upload File</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" id="file" name="file" required>
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
                        <th class="text-white">Link</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $file->user }}</td>
                        <td>{{ url(Storage::url($file->file)) }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="copyToClipboard('{{ url(Storage::url($file->file)) }}')">Copy</button>
                            <a href="{{ Storage::url($file->file) }}" target="_blank" class="btn btn-sm btn-success">Open</a>
                            <form action="{{ route('files.destroy', $file->id) }}" method="POST" style="display:inline-block;">
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
