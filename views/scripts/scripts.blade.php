<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->


<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>



<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>


<script>
    $(document).ready(function() {
        $('.close').addClass('btn btn-dark')
        $('.close').html('X');
    });
</script>

@include('scripts.UpdateStockJs')

<script defer
src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>



<script>
    $(document).ready(function() {
        $(".modal").removeAttr("tabindex");
    });
</script>


<script defer
src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('assets/editor/trumbowyg.min.js') }}"></script>

@include('not.not')


<script src="{{ asset('js/notify.js') }}"></script>

@isset($chart)
    <script src="{{ asset('js/Chart.js') }}" charset=" utf-8"></script>
    {!! $chart->script() !!}
@endisset



@isset($wizard)
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/wizard.js') }}"></script>
    <script src="{{ asset('js/dispense.js') }}"></script>
@endisset

@isset($existing)
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/dispense.js') }}"></script>
@endisset


@isset($MgtDrugsScript)
    <script src="{{ asset('js/MgtDrugs.js') }}"></script>
    <script defer src="{{ asset('js/custom.js') }}"></script>
@else
    <script defer src="{{ asset('js/custom.js') }}"></script>
@endisset


</body>
<!--end::Body-->

</html>
