<x-app-layout>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h1>Advertise edit</h1>
                    <a href="{{ route('advertise.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('advertise.update', $advertise->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row py-6">
                            <div class="py-3 col-6">
                                <label for="company_name">Company Name</label>
                                <input type="text" id="company_name" name="company_name" class="form-control"
                                    placeholder="Enter company name" value="{{ $advertise->company_name }}">
                                @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="number">Company Number</label>
                                <input type="number" id="number" name="number" class="form-control"
                                    placeholder="Enter company number" value="{{ $advertise->number }}">
                                @error('number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="link">Company link</label>
                                <input type="link" id="link" name="link" class="form-control"
                                    placeholder="Enter company link" value="{{ $advertise->link }}">
                                @error('link')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="py-3 col-6">
                                <label for="logo">Company Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if ($advertise->logo)
                                <img src="{{ asset($advertise->logo) }}" alt="Company Logo" class="mt-2"
                                    style="max-width: 100px; max-height: 100px;">
                                @endif
                            </div>
                            <div class="py-3 col-6">
                                <label for="status">status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $advertise->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $advertise->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
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
