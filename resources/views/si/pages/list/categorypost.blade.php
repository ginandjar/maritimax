@extends('si.layouts.baselayout')

@section('bread-crumb')
<li>
    <a href="index.html">Home</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <span>Category Post</span>
    <i class="fa fa-circle"></i>
</li>
<li>
    <span>List</span>
</li>
@endsection

@section('page-title')

<h1 class="page-title"> Category Post List
    <!-- <small>bootstrap inputs, input groups, custom checkboxes and radio controls and more</small> -->
</h1>
@endsection

@section('formbody')
<div class="row">
  <div class="col-lg-12 margin-tb">

              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('categorypost.create') }}"> Create New Category</a>
              </div>
          </div>
</div>
  <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categoryPosts as $categoryPost)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $categoryPost->name }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('categorypost.edit',$categoryPost->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
  </table>

  {!! $categoryPosts->links() !!}
@endsection
