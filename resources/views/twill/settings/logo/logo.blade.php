@twillBlockTitle('Logo')
@twillBlockIcon('text')
@twillBlockGroup('app')

@twillBlockValidationRules([
'logo' => 'required',
'favicon' => 'required',
])

<x-twill::medias label="Seleziona il logo" :max='1' name="logo" />
<x-twill::medias label="Seleziona Favicon" :max='1' name="favicon" />