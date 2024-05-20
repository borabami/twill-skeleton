@twillBlockTitle('Text')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    name="title"
    label="Title"
    :translated="true"
/>

@php

$wysiwygOptions = [
['header' => [1,2, 3, 4, 5, 6, false]],
'bold',
'italic',
'underline',
'strike',
'blockquote',
'code-block',
'ordered',
'bullet',
'hr',
'link',
'clean',
'align',
];

@endphp

<x-twill::wysiwyg name="text" label="Contenuto" placeholder="Contenuto" :toolbar-options="$wysiwygOptions" :translated="true" />

<hr>

<x-twill::input name="id" type="text" label="Elemento id" note="HTML elemento ID" />
