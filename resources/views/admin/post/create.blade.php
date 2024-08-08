<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>Post Create</h1>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-6">

                            <div class="py-3 col-12">
                                <label for="categories">Select Category <span class="text-danger">*</span></label>
                                <select name="categories[]" id="categories" multiple class="form-control select2">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('categories')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="py-3 col-12">
                                <label for="title"> Title <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter Title name" value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-12">
                                <label for="description">Description<span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control summernote"> {{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-12">
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
