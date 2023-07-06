@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>author</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($book as $books)
        <tr>
            <td>{{$books->id}}</td>
            <td>{{$books->name}}</td>
            <td>{{$books->author}}</td>
            <td class="text-center">
                <a href="{{ route('books.edit', $books->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('books.destroy', $books->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection