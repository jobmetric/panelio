<p class="text-muted fs-5 fw-semibold mb-10">{{ trans('panelio::base.modal.import.description') }}</p>
<div class="row pb-10">
    <x-file-manager>
        <x-file-single name="عکس اصلی" collection="base" mime-types="*" />
    </x-file-manager>
</div>
<p class="text-muted fs-5 fw-semibold mb-10">{{ trans('panelio::base.modal.import.formats', ['formats' => implode(', ', $types)]) }}</p>
<button class="btn btn-primary w-100" onclick="panelio.button.import()">{{ trans('panelio::base.modal.import.submit') }}</button>
