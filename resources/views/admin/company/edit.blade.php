<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>Company Create</h1>
                    <a href="{{ route('company.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('company.update', $company->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="name">Company Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Enter company name" value="{{ $company->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="email">Company Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter company email" value="{{ $company->email }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="number">Company Number</label>
                                <input type="number" id="number" name="number" class="form-control"
                                    placeholder="Enter company number" value="{{ $company->number }}">
                                @error('number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="location">Company Location</label>
                                <input type="text" id="location" name="location" class="form-control"
                                    placeholder="Enter company location" value="{{ $company->location }}">
                                @error('location')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-header">
                            <h1>Company Details</h1>
                        </div>
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="editor_name">Editor Name</label>
                                <input type="text" id="editor_name" name="editor_name" class="form-control"
                                    placeholder="Enter editor name" value="{{ $company->editor_name }}">
                                @error('editor_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="pan_no">PAN No</label>
                                <input type="number" id="pan_no" name="pan_no" class="form-control"
                                    placeholder="Enter PAN No" value="{{ $company->pan_no }}">
                                @error('pan_no')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="company_no">Registration No</label>
                                <input type="number" id="company_no" name="company_no" class="form-control"
                                    placeholder="Enter registration no" value="{{ $company->company_no }}">
                                @error('company_no')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="logo">Company Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($company->logo)
                                <img src="{{ asset($company->logo) }}" alt="Company Logo" class="mt-2"
                                    style="max-width: 100px; max-height: 100px;">
                                @endif
                            </div>

                            <div class="card-header">
                                <h1>Company Social Profiles</h1>
                            </div>
                            <div class="row py-6">
                                <div class="py-3 col-6">
                                    <label for="facebook">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control"
                                        placeholder="Company Facebook profile" value="{{ $company->facebook }}">
                                    @error('facebook')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="py-3 col-6">
                                    <label for="twitter">Twitter</label>
                                    <input type="url" name="twitter" id="twitter" class="form-control"
                                        placeholder="Company Twitter profile" value="{{ $company->twitter }}">
                                    @error('twitter')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="py-3 col-6">
                                    <label for="instagram">Instagram</label>
                                    <input type="url" name="instagram" id="instagram" class="form-control"
                                        placeholder="Company Instagram profile" value="{{ $company->instagram }}">
                                    @error('instagram')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="py-3 col-6">
                                    <label for="youtube">YouTube</label>
                                    <input type="url" name="youtube" id="youtube" class="form-control"
                                        placeholder="Company YouTube profile" value="{{ $company->youtube }}">
                                    @error('youtube')
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
