@extends('ouvriers.layout')

@section('title', 'ouvrier')

@section("modou")
    {{--Mettre ici le code--}}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Space des Ouvriers!</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('ouvriers.create') }}"> New Ovrier </a>
                </div>
            </div>
        </div>
    
       {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
         @endif
         --}} 
    
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nom</th>
                <th>prenom</th>
                <th>Telephon</th>
                <th>Email</th>
                <th width="280px">Action </th>
            </tr>
            @foreach ($ouvriers as $ouvrier)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ouvrier->nom }}</td>
                <td>{{ $ouvrier->prenom }}</td>
                <td>{{ $ouvrier->telephon }}</td>
                <td>{{ $ouvrier->email }}</td>
                <td>
                    <form action="{{ route('ouvriers.destroy',$ouvrier->id) }}" method="POST">
    
                        <a class="btn btn-info" href="{{ route('ouvriers.show',$ouvrier->id) }}">Show</a>
    
                        <a class="btn btn-primary" href="{{ route('ouvriers.edit',$ouvrier->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    
        {!! $ouvriers->links() !!}
        
@endsection

