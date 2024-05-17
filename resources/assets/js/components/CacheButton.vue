<template>
    <!-- eslint-disable -->
    <div class="cache-button">
        <button @click="clearCache" type="button">Clear cache</button>
    </div>
</template>

<script setup>
/* eslint-disable */
import axios from 'axios';

const props = defineProps({
    /**
     * 
     */
    url: {
        type: String,
        default: ''
    },
});

/**
 * 
 */
function clearCache() {

    let url = props.url

    axios.get(url)
        .then((response) => {
            window[process.env.VUE_APP_NAME].vm.notif({
                message: response.data.message,
                variant: response.data.variant
            });
        }, (error) => {
            window[process.env.VUE_APP_NAME].vm.notif({
                message: 'Ops',
                variant: 'error'
            });
        });
}

</script>
<style lang="scss" scoped>
.cache-button {

    margin-top: 10px;

    button {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        height: 40px;
        width: 100%;
        cursor: pointer;
        background: #3278B8;
        color: white;
        -webkit-font-smoothing: antialiased;
        border-radius: 2px;
        font-size: 1em;
        outline: none;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        letter-spacing: inherit;
        display: inline-block;
        border: 0px;

        &:hover {
            background: #2D6CA6;
        }
    }
}
</style>
