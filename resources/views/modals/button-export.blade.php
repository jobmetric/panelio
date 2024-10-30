<p class="text-muted fs-5 fw-semibold mb-10">{{ trans('panelio::base.modal.export.description') }}</p>
<div class="row pb-10">
    @if(in_array(\JobMetric\Panelio\Enums\ImportExportTypeEnum::EXCEL(), $types))
        <div class="@if(count($types) > 3) col-6 @else col-12 @endif">
            <input type="radio" class="btn-check" name="button_export" value="excel" id="input-button-export-excel" @if(count($types) == 1) checked @endif>
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex justify-content-center align-items-center mb-5" for="input-button-export-excel">
                <span class="text-dark fw-bold fs-3 lh-1">{{ trans('panelio::base.modal.import_export_options.excel.name') }}</span>
            </label>
        </div>
    @endif
    @if(in_array(\JobMetric\Panelio\Enums\ImportExportTypeEnum::WORD(), $types))
        <div class="@if(count($types) > 3) col-6 @else col-12 @endif">
            <input type="radio" class="btn-check" name="button_export" value="word" id="input-button-export-word" @if(count($types) == 1) checked @endif>
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex justify-content-center align-items-center mb-5" for="input-button-export-word">
                <span class="text-dark fw-bold fs-3 lh-1">{{ trans('panelio::base.modal.import_export_options.word.name') }}</span>
            </label>
        </div>
    @endif
    @if(in_array(\JobMetric\Panelio\Enums\ImportExportTypeEnum::CSV(), $types))
        <div class="@if(count($types) > 3) col-6 @else col-12 @endif">
            <input type="radio" class="btn-check" name="button_export" value="csv" id="input-button-export-csv" @if(count($types) == 1) checked @endif>
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex justify-content-center align-items-center mb-5" for="input-button-export-csv">
                <span class="text-dark fw-bold fs-3 lh-1">{{ trans('panelio::base.modal.import_export_options.csv.name') }}</span>
            </label>
        </div>
    @endif
    @if(in_array(\JobMetric\Panelio\Enums\ImportExportTypeEnum::PDF(), $types))
        <div class="@if(count($types) > 3) col-6 @else col-12 @endif">
            <input type="radio" class="btn-check" name="button_export" value="pdf" id="input-button-export-pdf" @if(count($types) == 1) checked @endif>
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex justify-content-center align-items-center mb-5" for="input-button-export-pdf">
                <span class="text-dark fw-bold fs-3 lh-1">{{ trans('panelio::base.modal.import_export_options.pdf.name') }}</span>
            </label>
        </div>
    @endif
    @if(in_array(\JobMetric\Panelio\Enums\ImportExportTypeEnum::JSON(), $types))
        <div class="@if(count($types) > 3) col-6 @else col-12 @endif">
            <input type="radio" class="btn-check" name="button_export" value="json" id="input-button-export-json" @if(count($types) == 1) checked @endif>
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex justify-content-center align-items-center mb-5" for="input-button-export-json">
                <span class="text-dark fw-bold fs-3 lh-1">{{ trans('panelio::base.modal.import_export_options.json.name') }}</span>
            </label>
        </div>
    @endif
    @if(in_array(\JobMetric\Panelio\Enums\ImportExportTypeEnum::XML(), $types))
        <div class="@if(count($types) > 3) col-6 @else col-12 @endif">
            <input type="radio" class="btn-check" name="button_export" value="xml" id="input-button-export-xml" @if(count($types) == 1) checked @endif>
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex justify-content-center align-items-center mb-5" for="input-button-export-xml">
                <span class="text-dark fw-bold fs-3 lh-1">{{ trans('panelio::base.modal.import_export_options.xml.name') }}</span>
            </label>
        </div>
    @endif
</div>
<button class="btn btn-primary w-100" onclick="panelio.button.export()">{{ trans('panelio::base.modal.export.submit') }}</button>
