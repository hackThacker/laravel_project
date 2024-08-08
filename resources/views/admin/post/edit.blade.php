<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>post edit</h1>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter company name" value="{{ $post->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="number">Company Number</label>
                                <input type="number" id="number" name="number" class="form-control"
                                    placeholder="Enter company number" value="{{ $post->number }}">
                                @error('number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control summernote"> {{ $post->description }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="images">images<span class="text-danger">*</span></label>
                                <input type="file" name="images" id="images" class="form-control"
                                    value="{{ old('images') }}">
                                @error('images')
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
