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
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Thêm mới chi phí vận hành</h5>
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
        <form id="form" method="post" action="{{ route('dashboard.operatingCosts.addPost') }}" enctype="multipart/form-data">
        @csrf
        <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Chi phí vận hành của Maia</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group mt-10">
                        <label>Nội dung chi phí</label>
                        <input type="text" name="name" id="" value="" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mt-10">
                          <label>Số tiền chi</label>
                          <input type="text" name="cost" value="" placeholder="" class="form-control cost">
                        </div>
                      </div>
                </div>
              <!-- /.row -->
            </div>
        </div>
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
    $('.cost').on('keyup', function () {
        var value = $(this).val();
        let amount = formatPrice(value);
        $('.cost').val(format(amount));
    });
</script>

 <!--begin::Page Vendors(used by this page)-->
 <script src="{{asset('/admin/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
 <!--end::Page Vendors-->
 <!--begin::Page Scripts(used by this page)-->
 <script src="{{asset('/admin/assets/js/pages/crud/forms/editors/ckeditor-classic.js')}}"></script>


@endsection
