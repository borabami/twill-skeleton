@twillBlockTitle('Logo')
@twillBlockIcon('text')
@twillBlockGroup('app')

@twillBlockValidationRules([
'logo' => 'required',
'favicon' => 'required',
])

<x-twill::medias label="Select the logo" :max='1' name="logo" />
<x-twill::medias label="Select Favicon" :max='1' name="favicon" />