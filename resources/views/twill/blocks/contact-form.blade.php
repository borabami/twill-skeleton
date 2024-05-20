@twillBlockTitle('Contact form')
@twillBlockIcon('text')
@twillBlockGroup('app')

@twillBlockValidationRules([
'to' => ['required', 'email'],
])
@twillBlockValidationRulesForTranslatedFields([
'subject' => ['required', 'string'],
'success_message' => ['required', 'string'],
])

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


<hr />

<x-twill::formFieldset id="settings" title="Settings" :open="false">

    <x-twill::input name="to" :label="twillTrans('To')" />

    <x-twill::input name="subject" :label="twillTrans('Subject')" :translated="true" type="textarea" rows="2" />

    <x-twill::wysiwyg name="success_message" :label="twillTrans('Success message')"
        :placeholder="twillTrans('ex. Request sent successfully!')" :toolbar-options="$wysiwygOptions" :translated="true" />

    <x-twill::wysiwyg name="privacy_disclaimer" :label="twillTrans('Privacy disclaimer')"
        :placeholder="twillTrans('ex. I agree with terms and conditions')" :toolbar-options="$wysiwygOptions" :translated="true" />

</x-twill::formFieldset>

<hr />

<x-twill::formFieldset id="fields" title="Fields" :open="false">

    <x-twill::repeater type="fields" name="fields" />

</x-twill::formFieldset>
<hr />

<x-twill::formFieldset id="submit_button" :title="twillTrans('Submit button')" :open="false">

    <x-twill::input name="submit_button_label" :label="twillTrans('Submit button label')" :translated="true"
        :placeholder="twillTrans('ex. Submit')" />

</x-twill::formFieldset>

<hr>

<x-twill::input name="id" type="text" label="Elemento id" note="HTML elemento ID" />