@twillRepeaterTitle('Field')
@twillRepeaterTrigger('Add field')
@twillRepeaterTitleField('label', ['hidePrefix' => true])
@php
$fieldTypes = [
[
'value' => "text",
'label' => 'Text'
],
[
'value' => "email",
'label' => 'Email'
],
[
'value' => "textarea",
'label' => 'Teaxtarea'
],
[
'value' => "select",
'label' => 'Select'
],

];
@endphp

<x-twill::select name="type" label="Tipo di field" :options="$fieldTypes" default="text" />

<x-twill::formFieldset id="props" title="Properties" :open="false">

    <x-twill::input name="label" label="Label" :translated="true" />

    <x-twill::input name="placeholder" label="Placeholder" :translated="true" />

    <x-twill::formConnectedFields field-name="type" field-values="select" :render-for-blocks="true">
        <x-twill::repeater type="options" name="options" />
    </x-twill::formConnectedFields>

    <x-twill::formConnectedFields field-name="type" field-values="textarea" :render-for-blocks="true">
        <x-twill::input name="rows" label="Rows" type="number" />
    </x-twill::formConnectedFields>

    <x-twill::checkbox name="required" label="Field is required" />

</x-twill::formFieldset>