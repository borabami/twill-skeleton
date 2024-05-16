@twillBlockTitle('Google Settings')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input label="Analytics ID" name="analytics_id" placeholder="XXXXXXXXX" />

<x-twill::input label="Google Tag Manager Head" name="google_tag_manager_head" type="textarea"
    placeholder='<script type="text/javascript">' />

<x-twill::input label="Google Tag Manager Body" name="google_tag_manager_body" type="textarea"
    placeholder='<script type="text/javascript">' />

<div data-v-0793316e="" style="margin-top: 10px;">
    <p data-v-0793316e="" class="f--small input__note">Visit <a data-v-0793316e="" target="_blank"
            href="https://analytics.google.com/" aria-label="Google Analytics">Google Analytics</a> page for more details.</p>
</div>