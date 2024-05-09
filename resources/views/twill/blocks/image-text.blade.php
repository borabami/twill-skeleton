@twillBlockTitle('Testo dell`immagine')
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


<x-twill::medias name="highlight" label="Immagine" />

<hr>

<x-twill::input name="id" type="text" label="Elemento id" note="HTML elemento ID" />