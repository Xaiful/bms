{{-- 
@foreach ($districts as $district)
<tr>
    <td>{{$loop->index+1}}</td>
    <td>{{$district->name}}</td>
    <td>
        @foreach ($district->users as $user)
            <span class="badge badge-info mr-1">
                {{ $user->name }}
            </span>
        @endforeach
    </td>
</tr>
@endforeach
 --}}

 @extends('backend.layouts.app')
 @section('content')
     <div class="main-card mb-3 card">
         <div class="app-page-title">
             <div class="page-title-wrapper">
                 <div class="page-title-actions">
                     
                 </div>    
             </div>
         </div>
         <div class="card-body">
             <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                 <thead>
                 <tr>
                     <th>SL</th>
                     <th>Area Name</th>
                     <th>Area Start</th>
                     <th>Area End</th>
                     <th>ASPO Name</th>
                 </tr>
                 </thead>
                 <tbody>
                     @foreach ($areas as $area)
                     <tr>
                         <td>{{$loop->index+1}}</td>
                         <td>{{$area->name}}</td>
                         <td>{{$area->start}}</td>
                         <td>{{$area->end}}</td>
                         <th>
                             @foreach ($area->users as $user)
                                 {{ $user->name }}
                             @endforeach
                            
                         </th>
                        
                     </tr>
                     
                     @endforeach
                 </tbody>
             </table>
         </div>
     </div>
 @endsection
 