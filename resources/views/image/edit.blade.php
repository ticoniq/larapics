<x-layout title="Update image">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Update Image</div>

                    <div class="card-body">
                        <x-form action="{{ $image->route('update') }}" method="PUT" >
                            <div class="mb-3">
                                <img src="{{ asset('storage/'.$image->file) }}" alt="{{ $image->title }}" class="img-fluid">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="title">Photo Title</label>
                                <input type="text" name="title" value="{{ old('title', $image->title) }}" id="title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('images.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </x-form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
