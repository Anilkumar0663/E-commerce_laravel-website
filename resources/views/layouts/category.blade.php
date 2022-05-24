<div>
    <div class="container" style="padding:30px 0">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  All Categories
              </div>
              <div class="panel-body">
                  <table class="table table-striped">
                      <thead> 
                      <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th>Slug</th>
                          <th>Action</th>
                      </tr>
                    </thead>  
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td><button class="btn btn-primary"> Edit</button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$categories->links()}}
              </div>
          </div>
      </div>
    </div>
    </div>
</div>
