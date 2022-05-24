<div>
    <style>
        .sclist{
            list-style: none;
        }
        .sclist li{
            line-height: 33px;
            border-bottom: 3px solid #ccc;
        }
        .slink i{
            font-size:16px;
            margin-left:12px;

        }
    </style>
    <div class="container" style="padding:30px 0">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">          
                    <div class="col-md-4">
                        All Categories
                  </div>
                  <div class="col-md-4">
                        <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right" style="margin-right: -388px">Add New</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                  @if (Session::has('message'))
                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                      
                  @endif
                  <table class="table table-striped">
                      <thead> 
                      <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th>Slug</th>
                          <th>Sub Category</th>
                          <th>Action</th>
                      </tr>
                    </thead>  
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <ul class="sclist">
                                        @foreach ($category->subCategories as $scategory)
                                        <li>
                                            <i class="fa fa-caret-right"></i>{{ $scategory->name }} <a href="{{ route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug]) }}" class="slink"><i class="fa fa-edit"></i></a>
                                           <a href="#" onclick="confirm('Are You sure, You want to delete this subcategory ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{ $scategory->id }})" ><i class="fa fa-times text-danger"></i></a>  
                                        </li>
                                            
                                        @endforeach
                                    </ul>
                                </td>
                                <td> <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"> <button class="btn btn-primary">Edit</button> </a> </td>
                                <td> <a href="#" onclick="return confirm('Are you sure, You want to delete this Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})"> <button class="btn btn-danger">Delete</button> </a> </td>
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
