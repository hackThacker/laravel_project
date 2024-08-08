<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex">
                            <h4>Post</h4>
                            @if (empty($post))
                            <a href="{{ route('post.create') }}" class="btn btn-primary">Add</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Categories</th>
                                            <th>Images</th>
                                            <th>Title</th>
                                            <th>Views</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $index => $post)
                                        <tr>
                                            <td class="text-center">{{ ++$index }}</td>
                                            <td>
                                                {{ $post->categories->pluck('title')->implode(', ') }}
                                            </td>
                                            <td>
                                                <img src="{{ asset($post->images) }}" alt="image" width="120">
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->views }}</td>
                                            <td>
                                                <form action="{{ route('post.destroy', $post->id) }}" method="post"
                                                    class="d-flex">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('post.edit', $post->id) }}"
                                                        class="btn btn-sm btn-primary me-2">Edit</a>
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
