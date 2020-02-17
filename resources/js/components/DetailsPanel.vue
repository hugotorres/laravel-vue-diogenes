<template>
  <div>
    <div
      class="side-panel"
      v-if="producto"
      v-bind:class="{ active: isActive , inactive: !isActive }"
    >
      <!--     <div class="toggle-panel" v-bind:class="{ active: isActive }" v-on:click="toggle">
      <i class="fa fa-chevron-left"></i>
      <i class="fa fa-chevron-right"></i>
      </div>-->
      <div class="side-content">
        <div class="content">
          <button type="button" class="close" aria-label="Close" v-on:click="toggle">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="row detalle">
            <div class="col-sm-6 my-4">
              <div id="carouselExampleInterval" class="carousel slide mx-auto" data-ride="carousel">
                <div class="carousel-inner">
                  <div
                    class="carousel-item"
                    data-interval="10000"
                    v-for="(image,idx) in producto.image"
                    v-bind:key="idx"
                    :class="{ active: idx==0 || idx==null }"
                  >
                    <img
                      v-bind:src="'/uploads/profile/' + image"
                      class="img-thumbnail slider-image"
                      alt="..."
                    />
                  </div>
                </div>
                <a
                  class="carousel-control-prev"
                  href="#carouselExampleInterval"
                  role="button"
                  data-slide="prev"
                >
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#carouselExampleInterval"
                  role="button"
                  data-slide="next"
                >
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-sm-6 my-4">
              <div class="product-description">{{producto.description}}</div>
              <div class="category">{{producto.category}}</div>
              <div class="gender">{{producto.gender}}</div>
              <div class="since">{{producto.created_at}}</div>
              <div class="updated">{{producto.updated_at}}</div>
              <div class="rating">{{producto.rating}}</div>

            </div>
            <div class="col-sm-12">
              <!-- SIDEBAR BUTTONS -->
              <div class="profile-userbuttons">
                <a  :href="producto.whatsapp" class="btn btn-success btn-sm">whatsapp</a>
                <a :href="producto.phone_number"  class="btn btn-danger btn-sm">Llamar</a>
                <a :href="producto.url_instagram"  class="btn btn-danger btn-sm">Instagram</a>
                 <a  :href="producto.url" class="btn btn-danger btn-sm">Sitio Web</a>
              </div>
              <!-- END SIDEBAR BUTTONS -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="default-content" v-bind:class="{ active: !isActive, inactive: isActive }">
      <div class="col">
        <div class="home-image text-center">
          <img src="/images/home.jpeg" alt />
          <h3>Find/Her</h3>
          <p>Encuentra las mas bellas bitches en tu area</p>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
.home-image img {
  height: 300px;
  text-align: center;
  border-radius: 50%;
}
.inactive {
  display: none;
}
.active {
  display: block !important;
}
.side-panel {
  max-width: 100%;
  height: 100%;
  opacity: 1;
  .slider-image {
    height: auto;
  }
}
.product-image {
  border-radius: 50%;
  height: 120px;
  text-align: center;
  background: #e3e3e3;
}
.product-description {
  padding: 20px;
  overflow: auto;
  background: #e7e7e72e;
}
.toggle-panel.active {
  box-shadow: #c1b8b8 4px 5px 4px 1px;
  z-index: 2;
}
.toggle-panel {
  position: absolute;
  right: 0px;
  z-index: 1000;
  background: rgb(255, 1, 1);
  padding: 10px;
  transition: all 1s ease-in;
}
.side-panel.active {
  display: block;
  z-index: 10;
  opacity: 1;
}
.default-content {
  padding: 20px;
  .inactive {
    display: none;
  }
}
</style>

<script>
export default {
  name: "DetailsPanel",
  /*   mounted() {
    this.detalles = this.producto;
  },
  updated() {
  }, */
  ready() {
    console.log("ready");
    console.log(this.detalles);
  },
  data() {
    return {
      images: []
    };
  },
  methods: {
    toggle: function(event) {
      this.isActive = !this.isActive;
    }
  },

  props: {
    isActive: {
      required: true,
      type: Boolean,
      default: false
    },
    producto: {
      required: true,
      type: Object,
      default: null
    }
  }
};
</script>

/* TODO

revisa rel bug por el cual desaparece
 la variable idx que pone como active uno de  las imagenes del carousel */
