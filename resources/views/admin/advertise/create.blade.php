<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>Advertise Create</h1>
                    <a href="{{ route('advertise.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('advertise.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="company_name"> Name <span class="text-danger">*</span></label>
                                <input type="text" id="company_name" name="company_name" class="form-control"
                                    placeholder="Enter company name" value="{{ old('company_name') }}">
                                @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="number">Number<span class="text-danger">*</span></label>
                                <input type="number" id="number" name="number" class="form-control"
                                    placeholder="Enter company number" value="{{ old('number') }}">
                                @error('number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="logo">images<span class="text-danger">*</span></label>
                                <input type="file" name="logo" id="logo" class="form-control" value="{{ old('logo') }}">
                                @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="link">link<span class="text-danger">*</span></label>
                                <input type="url" name="link" id="link" class="form-control"
                                    placeholder="Company link profile" value="{{ old('link') }}">
                                @error('link')
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
