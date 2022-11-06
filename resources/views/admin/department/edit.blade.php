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
                        <form action="{{url('/department/update/'.$department->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="department_name"></label>
                            <input type="text" class="form-control" name="department_name"value="{{$department->department_name}}">
                            </div>
                            
                            @error('department_name')
                                <div class="my-2">

                                    <span class="text-danger"> {{$message}} </span>
                                
                                </div>
                            @enderror
                            
                            <br>
                        <input type="submit" value="UPDATE" class="btn btn-info">
                        <!-- back button -->
                        <td><a href="{{url('/department/back')}}" class="btn btn-info">BACK</a></td>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
