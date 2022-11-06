<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello musician {{Auth::user()->name}} sama😎
        </h2>
    </x-slot>
    <center>
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                @if(session("success"))
                    <div class="alert alert-success">{{(session("success"))}}</div>
                @endif
                <div class="card">
                   <h3> <div class="card-header">Table instrument</div></h3>
                    <div class="card-body">
                        <form action="{{route('addDepartment')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="department_name">Input instrument</label>
                            <input type="text" class="form-control" name="department_name">
                            </div>
                            
                            @error('department_name')
                                <div class="my-2">

                                    <span class="text-danger"> {{$message}} </span>
                                
                                </div>
                            @enderror
                            
                            <br>
                        <input type="submit" value="SAVE" class="btn btn-info">
                    </form>
                    <br>
                        <table class="table table-striped">
                            <thead class="table-info">
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Instrument</th>
                                <th scope="col">UserID</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $row)
                                <tr>
                                <th>{{$departments->firstItem()+$loop->index}}</th>
                                <td>{{$row->department_name}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->created_at->diffForHumans()}}</td>
                                <td><a href="{{url('/department/edit/'.$row->id)}}" class="btn btn-info">Edit</a></td>
                                <td><a href="{{url('/department/softdelete/'.$row->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>   
                             @endforeach
                            <tr>
                        </tr>
                      </tbody>
                    </table>
                    {{$trashDepartments->links()}}
                </div>
            </div>

             @if(count($trashDepartments)>0)
                <div class="card my-3">
                <div class="card">
                   <h3> <div class="card-header">Table trash</div></h3>
                        <table class="table table-striped">
                            <thead class="table-info">
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Instrument</th>
                                <th scope="col">UserID</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trashDepartments as $row)
                                <tr>
                                <th>{{$trashDepartments->firstItem()+$loop->index}}</th>
                                <td>{{$row->department_name}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->created_at->diffForHumans()}}</td>
                                <td><a href="{{url('/department/restore/'.$row->id)}}" class="btn btn-info">Restore</a></td>
                                <td><a href="{{url('/department/delete/'.$row->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>   
                             @endforeach
                            <tr>
                        </tr>
                      </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</center>
</x-app-layout>
