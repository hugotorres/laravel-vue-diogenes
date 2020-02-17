<template>
<div class="col-sm-8 input-group input-group-sm  ">
  <input type="text" class="form-control" placeholder="termino de busqueda" aria-label="Recipient's username" aria-describedby="button-addon2">
  <select class="form-control" id="category" name="category"  >
        <option value="" selected>---Select Category</option>
        <option   v-for="{title, description, id} in categories" :key="id"  v-bind:value="id">{{title}}</option>
    </select>
    <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search-location"></i>Buscar</button>
  </div>
</div>
</template>

<script>
    export default {
        data(){
                return{
                    categories:{}
                }
        },
       props:  ['categories'] ,
            ready: function() {
                this.categories = JSON.parse(this.categories);
            },

    }
</script>
