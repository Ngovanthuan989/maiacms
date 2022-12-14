@extends('dashboard.layout.master')
<link href="{{asset('/admin/assets/css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
@section('main')
<style>
    .error{
        color:red !important;
    }
    .image-input .image-input-wrapper {
        width: 250px;
        height: 200px;
    }
</style>
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Thêm mới đơn hàng</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->

            <!--end::Toolbar-->
        </div>
    </div>
    <div class="container">
        @include('elements.show_error')
        <form id="form" method="post" action="{{ route('dashboard.product.addPost') }}" enctype="multipart/form-data">
        @csrf
        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Thông tin chung</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input type="text" name="customer_name" class="form-control customer_name" placeholder="Tên khách hàng" value="">
                  </div>
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="customer_phone" class="form-control customer_name" placeholder="Số điện thoại" value="">
                  </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tỉnh/ Thành Phố</label>
                        <select class="form-control province" name="province"  style="width: 100%;">
                            <option value="1">Đang bán</option>
                            <option value="2">Dừng bán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quận/ Huyện</label>
                        <select class="form-control district" name="district"  style="width: 100%;">
                            <option value="1">Đang bán</option>
                            <option value="2">Dừng bán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phường/ Xã</label>
                        <select class="form-control select2bs4" name="status"  style="width: 100%;">
                            <option value="1">Đang bán</option>
                            <option value="2">Dừng bán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ cụ thể</label>
                        <input type="text" name="address" class="form-control address" placeholder="Điạ chỉ" value="">
                      </div>

                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
        </div>
            </div>
        </div>



        {{-- Danh sách ảnh sản phẩm --}}

        {{-- <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Danh sách ảnh sản phẩm</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <!-- /.row -->
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Chiều dài sản phẩm</label>
                    <input type="number" min="1" name="product_length" value="" placeholder="Chiều dài: cm" class="form-control data_pro">
                  </div>

                </div>

                 <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Chiều rộng sản phẩm</label>
                    <input type="number" name="product_width" id="package_width" value="" placeholder="Chiều rộng: cm" class=" form-control data_pro">
                  </div>

                </div>

                <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Chiều cao sản phẩm</label>
                    <input type="number" name="product_height" value="" placeholder="Chiều cao: cm" class="form-control data_pro">
                  </div>
                </div>
              </div>
            </div>
        </div> --}}


        {{-- Giá bán,kích thước sản phẩm --}}

        <div class="card card-default" style="margin-top: 20px;">
            <div class="card-header">
              <h3 class="card-title">Thông tin chi tiết</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Sản phẩm</label>
                        <select class="form-control select2bs4" name="status"  style="width: 100%;">
                            @foreach ($get_product as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                      </div>
                      {{-- <div class="form-group mt-10">
                        <label>Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product_code" value="" placeholder="Mã sản phẩm" class=" form-control data_pro">
                        <svg id="barcode_sku" style="display: none;"></svg>
                      </div> --}}
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Số lượng</label>
                        <input type="number" name="qty" value="" placeholder="Số lượng" class="form-control">
                      </div>
                      {{-- <div class="form-group mt-10">
                        <label>Đơn vị tính (chiếc, hộp, lọ, kg...)</label>
                        <input type="text" id="unit_name" name="unit_name" value="" class="form-control data_pro" placeholder="Đơn vị tính, vd: hộp, lạng, con, bộ,..">
                      </div> --}}
                    </div>

                  </div>
              <!-- /.row -->
              {{-- <div class="row">
                <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Chiều dài sản phẩm</label>
                    <input type="number" min="1" name="product_length" value="" placeholder="Chiều dài: cm" class="form-control data_pro">
                  </div>

                </div>

                 <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Chiều rộng sản phẩm</label>
                    <input type="number" name="product_width" id="package_width" value="" placeholder="Chiều rộng: cm" class=" form-control data_pro">
                  </div>

                </div>

                <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Chiều cao sản phẩm</label>
                    <input type="number" name="product_height" value="" placeholder="Chiều cao: cm" class="form-control data_pro">
                  </div>

                </div>
                <div class="col-sm-3">
                  <div class="form-group mt-10">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="product_amount" value="" placeholder="Số lượng sản phẩm" class="form-control data_pro">
                  </div>

                </div>

              </div> --}}
            </div>
        </div>
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Lưu</button>
    </form>
</div>


@endsection
@section('js')
<script src="{{asset('/admin/assets/js/pages/custom/user/add-user.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script>
    var avatar2 = new KTImageInput('kt_image_2');
</script>

<script>
    $(document).ready(function () {
        jQuery.validator.addMethod("noSpace", function(value, element) {
            value = value.trim();
            if (value != "") {
                return true;
            }
            return value.indexOf(" ") < 0 && value != "";
        }, "No space please and don't leave it empty");

        $("#form").validate({
            rules: {
                product_name: {
                    required: true,
                    noSpace: true,
                },
                product_description:{
                    required: true,
                    noSpace: true,
                    maxlength: 300,
                    minlength: 50
                },
                product_amount:{
                    required: true,
                    noSpace: true,
                    number: true
                },
                product_content:{
                    required: true,
                    noSpace: true,
                    minlength: 100
                },
                unit_price:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                price_sale:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                product_code:{
                    required: true,
                    noSpace: true,
                    maxlength: 6,
                    minlength: 4
                },
                unit_name:{
                    required: true,
                    noSpace: true,
                },
                product_length:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                product_width:{
                    required: true,
                    noSpace: true,
                    number: true,
                },
                product_height:{
                    required: true,
                    noSpace: true,
                    number: true,
                }

            },
            // Specify validation error messages
            messages: {
                product_name:{
                    required: '* Tên sản phẩm không được để trống!',
                    noSpace: '* Tên sản phẩm không được để trống!',

                },
                product_description:{
                    required: '* Mô tả ngắn không được để trống!',
                    noSpace: '* Mô tả ngắn không được để trống!',
                    minlength:'* Mô tả ngắn ít nhất phải là 50 kí tự',
                    maxlength: '* Mô tả ngắn nhiều nhất là 300 kí tự'
                },
                product_content:{
                    required: '* Giới thiệu sản phẩm không được để trống!',
                    noSpace: '* Giới thiệu sản phẩm không được để trống!',
                    minlength: '* Giới thiệu sản phẩm ít nhất phải có 100 ký tự'
                },
                unit_price:{
                    required: '* Giá gốc sản phẩm không được để trống!',
                    noSpace: '* Giá gốc sản phẩm không được để trống!',
                    number:'* Giá gốc sản phẩm phải là số!'
                },
                price_sale:{
                    required: '* Giá bán sản phẩm không được để trống!',
                    noSpace: '* Giá bán sản phẩm không được để trống!',
                    number:'* Giá sản bán sản phẩm phải là số!'
                },
                product_code:{
                    required: '* Mã sản phẩm không được để trống!',
                    noSpace: '* Mã sản phẩm không được để trống!',
                    minlength:'* Mã sản phẩm ít nhất phải là 4 kí tự',
                    maxlength: '* Mã sản phẩm nhiều nhất là 6 kí tự'
                },
                unit_name:{
                    required: '* Đơn vị tính không được để trống!',
                    noSpace: '* Đơn vị tính không được để trống!',
                },
                product_length:{
                    required: '* Chiều dài sản phẩm không được để trống!',
                    noSpace: '* Chiều dài sản phẩm không được để trống!',
                    number:'* Chiều dài sản phẩm phải là số!'
                },
                product_amount:{
                    required: '* Số lượng sản phẩm không được để trống!',
                    noSpace: '* Số lượng sản phẩm không được để trống!',
                    number:'* Số lượng sản phẩm phải là số!'
                },
                product_width:{
                    required: '* Chiều rộng sản phẩm không được để trống!',
                    noSpace: '* Chiều rộng sản phẩm không được để trống!',
                    number:'* Chiều rộng sản phẩm phải là số!'
                },
                product_height:{
                    required: '* Chiều cao sản phẩm không được để trống!',
                    noSpace: '* Chiều cao sản phẩm không được để trống!',
                    number:'* Chiều cao sản phẩm phải là số!'
                },

            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    })
 </script>

 <!--begin::Page Vendors(used by this page)-->
 <script src="{{asset('/admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
 <!--end::Page Vendors-->
 <!--begin::Page Scripts(used by this page)-->
 <script src="{{asset('/admin/assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>


@endsection
