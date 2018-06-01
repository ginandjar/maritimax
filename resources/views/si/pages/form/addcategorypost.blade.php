@extends('si.layouts.baselayout')

@section('bread-crumb')
<li>
    <a href="index.html">Home</a>
    <i class="fa fa-circle"></i>
</li>
<li>
    <span>Category Cargo</span>
    <i class="fa fa-circle"></i>
</li>
<li>
    <span>Form</span>
</li>
@endsection

@section('page-title')

<h1 class="page-title"> Category Cargo Form
    <!-- <small>bootstrap inputs, input groups, custom checkboxes and radio controls and more</small> -->
</h1>
@endsection

@section('formbody')
<div class="portlet-body form">
  <form class="form-horizontal" role="form" action="{{url('si/categorycargo')}}" method="POST">
    @csrf
      <div class="form-body">
          <div class="form-group">
              <label class="col-md-3 control-label">Category Cargo Name</label>
              <div class="col-md-9">
                  <input type="text" name="name" class="form-control" placeholder="Category Cargo Name">
                  <!-- <span class="help-block"> A block of help text. </span> -->
              </div>
          </div>
      </div>
      <div class="form-actions">
          <div class="row">
              <div class="col-md-offset-9 col-md-3">
                  <button type="submit" class="btn green">Submit</button>
                  <button type="button" class="btn default">Cancel</button>
              </div>
          </div>
      </div>
  </form>
</div>

@endsection