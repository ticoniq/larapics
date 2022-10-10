<x-layout title="Discover free image">
    <div class="container-fluid mt-4">
        @if ($message = session('message'))
            <x-alert type="success" dismissable>
                {{ $component->icon() }}
                {{ $message }}
            </x-alert>
        @endif
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($images as $image)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <a href="{{ $image->permalink() }}"><img src="{{ asset('storage/' . $image->file) }}"
                                alt="{{ $image->title }}" class="card-img-top"></a>
                        <div class="photo-buttons">
                            <a href="{{ $image->route('edit') }}" class="btn btn-sm btn-info me-2">Edit</a>
                            <x-form action="{{ $image->route('destroy') }}" method="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </x-form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $images->links() }}
    </div>
</x-layout>
