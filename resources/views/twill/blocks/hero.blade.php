@twillBlockTitle('Hero')
@twillBlockIcon('image-text')

<x-twill::medias name="background-image" :label="twillTrans('Immagine di sfondo')" />

<x-twill::input name="title" :translated="true" type="text" label="Titolo" />

<x-twill::input name="subtitle" :translated="true" type="text" label="Sottotitolo" />

<x-twill::input type="textarea" name="text" label="Text" :rows="4" :translated="true" />

<x-twill::checkbox name="scroll" label="Scroll" />

<x-twill::formConnectedFields field-name="scroll" :field-values="true" :render-for-blocks="true">
    <x-twill::input name="scroll_id" type="text" label="Scorrere elemento id" :translated="true" />
</x-twill::formConnectedFields>

<hr>

<x-twill::input name="id" type="text" label="Elemento id" note="HTML elemento ID" />