<div class="card mb-5 mb-xl-8 shadow-xl">
    <!--begin::Body-->
    <div class="card-body pb-0">
        <!--begin::Header-->
        <div class="d-flex align-items-center mb-5">
            <!--begin::User-->
            <div class="d-flex align-items-center flex-grow-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-45px me-5">
                    <i class="fas fa-2x fa-user" aria-hidden="true"></i>
                </div>
                <!--end::Avatar-->
                <!--begin::Info-->
                <div class="d-flex flex-column">
                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">LTMIS Admin</a>
                    <span class="text-gray-400 fw-bold">
                        Property Irregularity Information System
                    </span>
                </div>
                <!--end::Info-->
            </div>
            <!--end::User-->
            <!--begin::Menu-->

            <!--end::Menu-->
        </div>
        <!--end::Header-->
        <!--begin::Post-->
        <div class="mb-7">
            <!--begin::Text-->
            <div class="text-gray-800 mb-5">Hello {{ Auth::user()->name }}. This is the final step in filling your the
                property irregularity report. Please do not leave empty spaces in the form. Enter N/A in the fields that
                do not apply to you</div>
            <!--end::Text-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center mb-5">

            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Post-->
        <!--begin::Separator-->
        <div class="separator mb-4 pt-4"></div>


        <button type="submit" class="btn btn-danger float-end my-3">Submit</button>
        <!--end::Separator-->
        <!--begin::Reply input-->


        <!--edit::Reply input-->
    </div>
    <!--end::Body-->
</div>

{{-- </form> --}}
