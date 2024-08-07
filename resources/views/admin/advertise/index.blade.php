<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between d-flex ">
                            <h4>advertise </h4>
                            @if (empty($advertise))
                            <a href="{{route('advertise.create')}}" class="btn btn-primary">Add</a>
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
                                            <th>logo</th>
                                            <th>name</th>
                                            <th>number</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advertises as $index=> $advertise)
                                        <tr>
                                            <td>
                                                {{++$index}}
                                            </td>
                                            <td>
                                                <a href="{{$advertise->link}}" target="_blank">
                                                <img alt="image" src="{{asset($advertise->logo)}}" width="35"></a>
                                            </td>
                                            <td>{{$advertise->company_name}}</td>

                                            <td>{{$advertise->number}}</td>
                                            <td>
                                                @if ($advertise->status == 1)
                                                <span class="badge badge-success badge-shadow">Active</span>
                                                @else
                                                <span class="badge badge-danger badge-shadow">InActive</span>
                                                @endif
                                                </div>
                                            </td>

                                            <td>
                                                <form action="{{route('advertise.destroy',$advertise->id)}}"
                                                    method="post" class="d-flex">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('advertise.edit', $advertise->id)}}"
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
