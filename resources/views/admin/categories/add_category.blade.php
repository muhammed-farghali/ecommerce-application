@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Add Category</a>
    </div>
    <h1>Categories</h1>
      @if(session()->has('success_message'))
        <br>
          <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <p>{{session()->get('success_message')}}</p>
          </div>
      @endif
  </div>
  <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Category</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate">
              	{{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">Category Name</label>
                  <div class="controls">
                    <input type="text" name="category_name" id="category_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Category Lavel</label>
                  <div class="controls">
                    <select name="category_parent" id="parent_id">
                      <option value="0">Main Category</option>
                      @foreach ($levels as $level)
                        <option value="{{$level->id}}">{{$level->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea type="text" name="description" id="description"></textarea>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">URL</label>
                  <div class="controls">
                    <input type="text" name="url" id="url">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Enable Category</label>
                    <div class="controls">
                      <label>
                        <input type="checkbox" name="status" value="1"/>
                      </label>
                    </div>
                </div> 
                <div class="form-actions">
                  <input type="submit" value="Add Category" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection