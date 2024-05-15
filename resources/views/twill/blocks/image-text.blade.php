@twillBlockTitle('Image & text')
@twillBlockIcon('image-text')

<x-twill::wysiwyg
    type="quill"
    name="text"
    label="Text"
    placeholder="Text"
    :toolbar-options="[
        'bold',
        'italic',
        ['list' => 'bullet'],
        ['list' => 'ordered'],
        [ 'script' => 'super' ],
        [ 'script' => 'sub' ],
        'link',
        'clean'
    ]"
    :translated="true"
/>


<x-twill::medias name="highlight" label="Image" />

<hr>

<x-twill::input name="id" type="text" label="Element id" note="HTML element ID" />