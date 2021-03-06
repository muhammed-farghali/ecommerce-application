@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Banners</a> <a href="#" class="current">Edit Banner</a>
    </div>
    <h1>Banners</h1>
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
              <h5>Edit Banner</h5>
            </div>
            <div class="widget-content nopadding">
              <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-banner', $banner->id) }}" name="edit_banner" id="edit_banner" novalidate="novalidate">
              	{{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">Banner Image</label>
                  <div class="controls">
                    <input type="file" name="image" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Title</label>
                  <div class="controls">
                    <input type="text" name="title" id="title" value={{ $banner->title }}>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Link</label>
                  <div class="controls">
                    <input type="text" name="link" id="link" value={{ $banner->link }}>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Enable</label>
                    <div class="controls">
                      <label>
                        <input type="checkbox" name="status" value="1" @if ($banner->status == 1) {{'checked'}} @endif >
                      </label>
                    </div>
                </div> 
                <div class="form-actions">
                  <input type="submit" value="Edit Banner" class="btn btn-success">
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