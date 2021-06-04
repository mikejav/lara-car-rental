<form action="{{ $action }}" method="POST">
    @method($method)
    @csrf

    @foreach ($fieldDefs as $fieldDef)

        @php
            $type = $fieldDef['type'];
            $fieldName = $fieldDef['name'];
            $fieldLabel = $fieldDef['label'];
            $fieldValue = $formValues[$fieldName] ?? null;
            $isRequired = isset($fieldDef['required']);
        @endphp

        <div class="form-group row mb-3">

            <label for="{{ $fieldName }}" class="col-sm-3 col-form-label">
                {{ $fieldLabel }}
                @if ($isRequired)
                    <span class="text-danger ml-1 noselect">*</span>
                @endif
            </label>

            <div class="col-sm-9">

                @switch($type)
                    @case('TEXT')
                        <x-text-field :name="$fieldName" :value="$oldValue($fieldName)" />
                        @break
                    @case('TEXTAREA')
                        <x-textarea-field :name="$fieldName" :value="$oldValue($fieldName)" />
                        @break
                    @case('NUMBER')
                        <x-number-field :name="$fieldName" :value="$oldValue($fieldName)" />
                        @break
                    {{-- @case('DOUBLE')
                        <x-number-field :name="$fieldName" :step="0.01" :value="$oldValue($fieldName)" />
                        @break --}}
                    @case('DATE')
                        <x-date-field :name="$fieldName" :value="$oldValue($fieldName)" />
                        @break
                    @case('SELECT')
                        <x-select-field :name="$fieldName" :options="$fieldDef['options']" :value="$oldValue($fieldName)" />
                        @break
                @endswitch

            </div>
        </div>
    
    @endforeach

    <div class="d-flex mt-4">
        <div class="ml-auto">

            @if ($cancelLink)
                <a href="{{ $cancelLink }}" class="btn btn-secondary ml-auto mr-1">Cancel</a>
            @endif

            <button type="submit" class="btn btn-primary ml-auto">Save</button>

        </div>
    </div>
</form>
