<button style="width:100%;margin-top:10px;" data-v-59eeac35 onclick="clearCache()" type="button"
    class="button button--small button--action">Clear
    cache</button>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function clearCache() {

        let url = @json($url)
   
        axios.get(url)
        .then(response => {

           window['{{ config('twill.js_namespace') }}'].vm.notif({
            message: response.data.message,
            variant: response.data.variant
            });
      
        })
        .catch(error => {
       window['{{ config('twill.js_namespace') }}'].vm.notif({
        message: "Error",
        variant: 'error'
        });
        });
    }
</script>