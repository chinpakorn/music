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
                        <form action="{{route('addBorrow')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="borrow_name">Input instrument</label>
                            <input type="text" class="form-control" name="borrow_name">
                            </div>
                            
                            @error('borrow_name')
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
                                @foreach($borrows as $row)
                                <tr>
                                <th>{{$borrows->firstItem()+$loop->index}}</th>
                                <td>{{$row->borrow_name}}</td>
                                <td>{{$row->borrow_id}}</td>
                                <td>{{$row->created_at->diffForHumans()}}</td>
                                <td><a href="{{url('borrow/edit/'.$row->id)}}" class="btn btn-info">Edit</a></td>
                                <td><a href="{{url('/borrow/delete/'.$row->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>   
                             @endforeach
                            <tr>
                        </tr>
                      </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</center>
</x-app-layout>
