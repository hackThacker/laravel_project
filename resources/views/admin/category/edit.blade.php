<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>category Edit</h1>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('category.update', $categories->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row py-6">
                            <!-- Title Field -->
                            <div class="py-3 col-6">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter category title" value="{{ $categories->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Slug Field -->
                            <div class="py-3 col-6">
                                <label for="slug">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter categories slug" value="{{ $categories->slug }}" readonly>
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="py-3 col-12">
                            <button type="submit" class="btn btn-success mt-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

