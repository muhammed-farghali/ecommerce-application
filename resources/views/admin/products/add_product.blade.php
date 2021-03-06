@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a>
    </div>
    <h1>Products</h1>
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
              <h5>Add Product</h5>
            </div>
            <div class="widget-content nopadding">
              <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-product') }}" name="add_product" id="add_product" novalidate="novalidate">
              	{{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">Category</label>
                  <div class="controls">
                    <select name="category_id" id="category_id" style="width:220px">
                      <option value="">Main Category</option>
                      @foreach($mainCategories as $mainCat)
                        <option id="main_category"  value="{{$mainCat->id}}"> {{$mainCat->name}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Sub-Category</label>
                  <div class="controls">
                    <select name="sub_category_id" id="sub_category_id" style="width:220px">
                      <option value="">Sub-Category</option>
                      @if (isset($subCategories))
                        @foreach($subCategories as $subCat)
                          <option id="sub_category" value="{{$subCat->id}}">{{$subCat->name}}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"> Name</label>
                  <div class="controls">
                    <input type="text" name="product_name" id="product_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"> Code</label>
                  <div class="controls">
                    <input type="text" name="product_code" id="product_code">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"> Price</label>
                  <div class="controls">
                    <input type="text" name="product_price" id="product_price">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label"> Color</label>
                  <div class="controls">
                    <input type="text" name="product_color" id="product_color">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Image</label>
                  <div class="controls">
                    <input type="file" name="product_image" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea type="text" name="product_description" id="description"></textarea>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Material & Care</label>
                  <div class="controls">
                    <textarea type="text" name="care" id="care"></textarea>
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Enable Product</label>
                    <div class="controls">
                      <label>
                        <input type="checkbox" name="status" value="1"/>
                      </label>
                    </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add Product" class="btn btn-success">
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
@section('script')
  <script>
    var j = jQuery.noConflict();
    j(document).ready(function(){
      j('#category_id').click(function() {
        j('#sub_category_id').empty();
        j('#s2id_sub_category_id').one('click',function() {
          var mainCategory = j('#s2id_category_id > a span').text();
          j.ajax({
              type:'get',
              url:'{{url('admin/product/sub-categories')}}',
              data: {
                main_category:mainCategory
              },
              success: function(res) {
                var resLength = res.length;
                console.log(resLength);
                for (i = 0; i < resLength; i++) {
                  j('#sub_category_id').append("<option value="+res[i]['id']+">" + res[i]['name'] + "</option>");
                }
              },
              error: function() {

              }
          });
        });
      });
    });
  </script>
@endsection