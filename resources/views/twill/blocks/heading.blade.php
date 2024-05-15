@twillBlockTitle('Title')
@twillBlockIcon('text')
@twillBlockGroup('app')

@php
$selectOptions = [
[
'value' => "h1",
'label' => 'H1'
],
[
'value' => "h2",
'label' => 'H2'
],
[
'value' => "h3",
'label' => 'H3'
],
[
'value' => "h4",
'label' => 'H4'
],
[
'value' => "h5",
'label' => 'H5'
],
[
'value' => "h6",
'label' => 'H6'
],

];
@endphp

<x-twill::select name="tag" label="Title HTML Tag" placeholder="Seleziona un tag di title" :options="$selectOptions" default="h1" />

<x-twill::input name="heading" type="text" label="Title" :translated="true" />

<hr>

<x-twill::input name="id" type="text" label="Element id" note="HTML element ID" />