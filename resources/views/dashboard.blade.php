<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello musician {{Auth::user()->name}} sama😎
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="container">
            <div class="row">
            <table class="table table-striped">
                <thead class="table-info">
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Started when</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($users as $row)
                    <tr>
                    <th>{{$i++}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->created_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    <tr>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
