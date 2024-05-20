@twillBlockTitle('General')
@twillBlockIcon('text')
@twillBlockGroup('app')

<hr>

<x-twill::formFieldset title="Cache" :open="false">
    <a17-cache-button url="/api/clear-cache"></a17-cache-button>
</x-twill::formFieldset>

<hr>

<x-twill::formFieldset title="Logo and Favicon" :open="false">
    <x-twill::medias label="Select the Logo" :max='1' name="logo" />
    <x-twill::medias label="Select Favicon" :max='1' name="favicon" />
</x-twill::formFieldset>