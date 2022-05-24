<div>
   <div class="container" style="padding: 30px 0;">
       <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       Contact Message
                   </div>
                   <div class="panel-body">
                       <table class="table table-striped">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Name</th>
                                   <th>Email</th>       
                                   <th>Phone</th>       
                                   <th>Comment</th>       
                                   <th>Message Date</th>       
                               </tr>
                           </thead>
                           <tbody>
                               @php
                                   $i= 1;
                               @endphp
                               @foreach ($contact as $item)
                               <tr>
                                   <td>{{ $i++ }}</td>
                                   <td>{{ $item->name }}</td>
                                   <td>{{ $item->email }}</td>
                                   <td>{{ $item->phone }}</td>
                                   <td>{{ $item->comment }}</td>
                                   <td>{{ $item->created_at }}</td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                      {{ $contact->links() }}
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
