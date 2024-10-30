@if(session()->has('success'))
    <div class="alert alert-success d-flex justify-content-between" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="ki-duotone ki-category fs-1 me-3">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>
            <span>{{ trans('panelio::base.component.list_view.title', ['name' => $name]) }}</span>
        </h3>
        <div class="card-toolbar">
            <div id="list-btn-filter-box" class="d-none">
                <button type="button" class="btn btn-sm btn-light-facebook me-3" id="list-btn-search">
                    <i class="la la-search fs-2 position-absolute"></i>
                    <span class="d-none d-md-inline ps-9">{{ trans('panelio::base.component.list_view.search') }}</span>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-light-facebook me-3 px-3" id="list-btn-delete-filter" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ trans('panelio::base.component.list_view.delete_filters') }}">
                    <i class="la la-remove fs-2 p-0"></i>
                </button>
            </div>
            <button type="button" class="btn btn-sm btn-light-info btn-active-light-info" id="list-btn-filter">
                <i class="la la-filter fs-2 position-absolute"></i>
                <span class="d-none d-md-inline ps-9">{{ trans('panelio::base.component.list_view.filter') }}</span>
            </button>
        </div>
    </div>
    <div class="card-body py-5">
        <div class="border-bottom mb-5 d-none" id="list-filter-box">
            <div class="row align-items-center">
                {{ $filter ?? '' }}
            </div>
        </div>
        <form method="post" action="{{ $action }}" id="list-form" data-export="{{ $exportAction }}" data-import="{{ $importAction }}">
            @csrf
            <div class="dataTables_wrapper">
                <table class="table table-bordered table-striped table-hover table-check dataTable" id="datatable">
                    {{ $slot }}
                </table>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">let dt = null</script>
