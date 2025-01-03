<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="ki-duotone ki-category fs-1 me-3">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>
            <span class="text-gray-800">{{ trans('panelio::base.component.list_view.title', ['name' => $name]) }}</span>
        </h3>
        <div class="card-toolbar">
            @if(isset($filter) && $filter !== '')
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
            @endif
        </div>
    </div>
    <div class="card-body py-5">
        @if(isset($filter) && $filter !== '')
            <div class="border-bottom mb-5 d-none" id="list-filter-box">
                <div class="row align-items-center">
                    {!! $filter !!}
                </div>
            </div>
        @endif
        <form method="post" action="{{ $action }}" id="list-form" data-export="{{ $exportAction }}" data-import="{{ $importAction }}">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-check dataTable" id="datatable">
                    {{ $slot }}
                </table>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">let dt = null</script>
