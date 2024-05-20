@twillBlockTitle('Image & text')
@twillBlockIcon('image-text')

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


<x-twill::medias name="highlight" label="Image" />

<hr>

<x-twill::wysiwyg name="text" label="Contenuto" placeholder="Contenuto" :toolbar-options="$wysiwygOptions" :translated="true" />

<x-twill::input name="id" type="text" label="Element id" note="HTML element ID" />