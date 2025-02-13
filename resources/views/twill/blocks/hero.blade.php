@twillBlockTitle('Hero')
@twillBlockIcon('image-text')

<x-twill::medias name="background-image" :label="twillTrans('Background image')" />

<x-twill::input name="title" :translated="true" type="text" label="Title" />

<x-twill::input name="subtitle" :translated="true" type="text" label="Subtitle" />

<x-twill::input type="textarea" name="text" label="Text" :rows="4" :translated="true" />

<x-twill::formConnectedFields field-name="scroll" :field-values="true" :render-for-blocks="true" />

<hr>

<x-twill::input name="id" type="text" label="Element id" note="HTML element ID" />