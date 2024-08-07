<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex ">
                            <h4>Category </h4>
                            <a href="{{route('category.create')}}" class="btn btn-primary">Add</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>title</th>
                                            <th>slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index=> $category)
                                        <td>{{++$index}}</td>
                                        <td>{{$category->title}}</td>

                                        <td>{{$category->slug}}</td>
<td>
                                        <form action="{{route('category.destroy',$category->id)}}" method="post"
                                            class="d-flex">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('category.edit', $category->id)}}"
                                                class="btn btn-sm btn-primary">Edit</a>
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
        </div>
        </div>
        </div>
</x-app-layout>
