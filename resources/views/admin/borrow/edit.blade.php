<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello musician {{Auth::user()->name}} sama😎
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
            <div class="card">
                   <h5> <div class="card-header">Form edit</div></h5>
                    <div class="card-body">
                        <form action="{{url('/borrow/update/'.$borrows->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="borrow_name"></label>
                            <input hidden type="number" class="form-control" name="id" value="{{$borrows->id}}">
                            <input type="text" class="form-control" name="borrow_name"value="{{$borrows->borrow_name}}">
                            </div>
                            
                            @error('borrow_name')
                                <div class="my-2">

                                    <span class="text-danger"> {{$message}} </span>
                                
                                </div>
                            @enderror
                            
                            <br>
                        <input type="submit" value="UPDATE" class="btn btn-info">
                        <!-- back button -->
                        <td><a href="{{url('/borrow/back')}}" class="btn btn-info">BACK</a></td>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
