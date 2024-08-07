<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>Category Create</h1>
                    <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fas fa-backward"></i><span>Go Back</span></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="title">Title </label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter title name" value="{{ old('name') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="py-3 col-12">
                            <button type="submit" class="btn btn-success mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
