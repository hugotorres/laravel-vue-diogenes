<template>
   <div class="call-to-action-category">
<span badge badge-pill badge-primary>{{number}} Articulos</span>
<slot></slot>
<a href="#" class="badge badge-info">Ver Articulos</a>
   </div>
</template>

<script>
    export default {
        props:['number'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
