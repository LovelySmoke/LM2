@section('content')




<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
              Welcome {{ auth()->user()->name }}
            </div>
        </div>
      </div>   
    </div>    
</div>

<div class="mt-4 mb-4 d-flex align-items-center justify-content-between">
    <h4 class="m-0">Books</h4>
    <a href="{{route('books.create')}}" class="btn btn-outline-success">Create Book</a>
</div>



<div class="table">
  <table class="table table-bordered">
    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Author</th>
          <th>Updated At</th>
          <th>Created At</th>
          <th class="text-center">Action</th>
      </tr>
    </thead>
            
    <tbody>
    @foreach($book as $books) 
      <tr>
        <td>{{ $books->id }}</td>
        <td>{{ $books->name }}</td>
        <td>{{ $books->author }}</td>
        <td>{{ $books->updated_at }}</td>
        <td>{{ $books->created_at }}</td>
          <td class="text-center">
            <a href="{{ route('books.edit', $books->id) }}" class="btn btn-primary btn-sm">E</a>
            <form action="{{ route('books.destroy', $books->id) }}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm " type="submit">D</button>
            </form>
          </td>
      </tr>
    @endforeach
     </tbody>
  </table>
</div>