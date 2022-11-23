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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Chỉnh sửa chi phí sản phẩm</h5>
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
        <form id="form" method="post" action="{{ route('dashboard.cashFlowProduct.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Chi phí nhập hàng của sản phẩm theo đợt</h3>
            </div>
            <input type="hidden" name="id" value="{{$get_cashfolow->id}}">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Sản phẩm</label>
                        <select class="form-control" name="product_id"  style="width: 100%;">
                            @foreach ($get_product as $product)
                                <option value="{{$product->id}}"@if ($get_cashfolow->product_id==$product->id)
                                    selected
                                @endif>{{$product->product_name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Đợt 1</label>
                        <input type="text" name="dot[]" id="product_code" value="1" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-10">
                          <label>Số tiền</label>
                          <input type="text" name="tien[]" value="{{$dot1}}" placeholder="" class="form-control dot1">
                        </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Đợt 2</label>
                        <input type="text" name="dot[]" id="product_code" value="2" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-10">
                          <label>Số tiền</label>
                          <input type="text" name="tien[]" value="{{$dot2}}" placeholder="" class="form-control dot2">
                        </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Đợt 3</label>
                        <input type="text" name="dot[]" id="product_code" value="3" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-10">
                          <label>Số tiền</label>
                          <input type="text" name="tien[]" value="{{$dot3}}" placeholder="" class="form-control dot3">
                        </div>
                      </div>
                </div>
              <!-- /.row -->
            </div>
        </div>
            </div>
        </div>

        <div class="card card-default" style="margin-top: 20px;">
            <div class="card-header">
              <h3 class="card-title">Doanh thu và chi phí khác</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Doanh thu</label>
                        <input type="text" name="money_back" value="{{$get_cashfolow->money_back}}" placeholder="" class="form-control money_back">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Chi phí ads</label>
                        <input type="text" name="ads_costs" value="{{$get_cashfolow->ads_costs}}" placeholder="" class="form-control ads_costs">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Chi phí khác</label>
                        <input type="text" name="other_costs" value="{{$get_cashfolow->other_costs}}" placeholder="" class="form-control other_costs">
                      </div>
                    </div>
                  </div>
            </div>

        </div>
        <button style="margin-top: 10px;" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Cập nhập</button>
    </form>
</div>


@endsection
@section('js')
<script src="{{asset('/admin/assets/js/pages/custom/user/add-user.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script>
    var avatar2 = new KTImageInput('kt_image_2');
</script>

{{-- <script>
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
 </script> --}}
 <script>
        function filterStr(data) {
            str = data.replace(/,/g, '');
            return str.trim();
        }
        function formatPrice(data) {
            var price_value = data ? filterStr(data) : 0;
            if (price_value) {
                price_value = price_value.replace(/ |\D/gi, '');
            }
            return price_value;
        }
        function format(str) {
            var length = 3,
                separator = ".",
                count = 0,
                result = str.split('').reduceRight((a, c) => {
                    if (count === length) {
                        a.push(separator);
                        count = 1;
                    } else count++;
                    a.push(c);
                    return a;
                }, []).reverse().join('');

            return result;
        }
        $('.dot1').on('keyup', function () {
            var value = $(this).val();
            let amount = formatPrice(value);
            $('.dot1').val(format(amount));
        });
        $('.dot2').on('keyup', function () {
            var value = $(this).val();
            let amount = formatPrice(value);
            $('.dot2').val(format(amount));
        });
        $('.dot3').on('keyup', function () {
            var value = $(this).val();
            let amount = formatPrice(value);
            $('.dot3').val(format(amount));
        });

        $('.money_back').on('keyup', function () {
            var value = $(this).val();
            let amount = formatPrice(value);
            $('.money_back').val(format(amount));
        });
        $('.ads_costs').on('keyup', function () {
            var value = $(this).val();
            let amount = formatPrice(value);
            $('.ads_costs').val(format(amount));
        });
        $('.other_costs').on('keyup', function () {
            var value = $(this).val();
            let amount = formatPrice(value);
            $('.other_costs').val(format(amount));
        });
 </script>

 <!--begin::Page Vendors(used by this page)-->
 <script src="{{asset('/admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
 <!--end::Page Vendors-->
 <!--begin::Page Scripts(used by this page)-->
 <script src="{{asset('/admin/assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>


@endsection
