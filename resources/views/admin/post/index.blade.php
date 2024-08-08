<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex ">
                            <h4>Post </h4>
                            @if (empty($post))
                            <a href="{{route('post.create')}}" class="btn btn-primary">Add</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>categories</th>
                                            <th>Images</th>
                                            <th>Title</th>
                                            <th>Views</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $index=> $post)
                                        <tr>
                                            <td>
                                                {{++$index}}
                                            </td>
                                            <td></td>
                                            <td>
                                                <img alt="image" src="{{asset($post->logo)}}" width="35">
                                            </td>
                                            <td>{{$post->title}}</td>

                                            <td>{{$post->views}}</td>
                                            <td>

                                                </div>
                                            </td>

                                            <td>
                                                <form action="{{route('post.destroy',$post->id)}}"
                                                    method="post" class="d-flex">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('post.edit', $post->id)}}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    @endforeach
                                                </form>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
</x-app-layout>
