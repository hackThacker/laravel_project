<x-app-layout>
    <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header justify-content-between d-flex ">
                  <h4>Company </h4>
               @if (empty($company))
               <a href="{{route('company.create')}}" class="btn btn-primary">Add</a>
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
                          <th>company name</th>
                          <th>location</th>
                          <th>number</th>
                          <th>email</th>
                          <th>editor</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       @if (!empty($company))
                       <tr>
                        <td>
                          1
                        </td>
                        <td>
                          <img alt="image" src="{{asset($company->logo)}}" width="35">
                        </td>
                        <td>{{$company->name}}</td>

                        <td>{{$company->location}}</td>
                        <td>{{$company->number}}</td>
                        <td>{{$company->email}}</td>
                        <td>
                            <div class="badge badge-success badge-shadow">{{$company->editor_name}}</div>
                        </td>

                        <td>
                        <form action="{{route('company.destroy',$company->id)}}" method="post" class="d-flex">
                            @csrf
                            @method('delete')
                            <a href="{{route('company.edit', $company->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                            </form>
                        </td>
                      </tr>
                       @endif


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
