<template>
  <div class="home-map-wrapper row">
    <!--     <multipane class="foo" layout="vertical">
      <div :style="{ width: '100%' }" v-bind:class="mapClass">
        <google-map v-on:clickMarker="clickMarker" :markers="products" :categories="categories"></google-map>
      </div>

      <multipane-resizer></multipane-resizer>

      <div :style="{ flexGrow: 1,maxWidth:'50%',minWidth:'50%' }">
        <detail-panel :isActive="sidePanel" :producto="detailRequested" v-if="detailRequested"></detail-panel>
      </div>
    </multipane>-->

    <div class="col-sm-6 mapa">
      <div>
        <google-map v-on:clickMarker="clickMarker" :markers="products" :categories="categories"></google-map>
      </div>
    </div>

    <div class="col-sm-6 detalles"  >
      <div>
        <detail-panel :isActive="sidePanel" :producto="detailRequested" v-if="detailRequested"></detail-panel>
      </div>
    </div>
  </div>
</template>

<script>
import GoogleMap from "./GoogleMap";
import { Multipane, MultipaneResizer } from "vue-multipane";
import DetailsPanel from "./DetailsPanel";
export default {
  data() {
    return {
      products: this.$attrs.products,
      categories: this.$attrs.categories,
      sidePanel: false,
      detailRequested: {},
      mapClass: "closed"
    };
  },
  name: "HomeMap",
  mounted() {
    console.log(this.products);
  },
  components: {
    GoogleMap,
    DetailsPanel,
    Multipane,
    MultipaneResizer
  },
  methods: {
    clickMarker(event) {
      this.sidePanel = true;
      this.detailRequested = event;
      this.mapClass = "open";
    }
  }
};
</script>
<style lang=scss scoped>
i {
  padding: 5px;
}
.open {
  width: 70%;
}
.closed {
  width: 98% !important;
}
.multipane.foo.layout-h .multipane-resizer {
  margin: 0;
  top: 0; /* reset default styling */
  background: blue;
  height: 400px !important;
}
.custom-resizer {
  width: 100%;
  height: 400px;
}
.pane {
  text-align: left;
  padding: 15px;
  overflow: hidden;
  background: #eee;
  border: 1px solid #ccc;
}
.pane ~ .pane {
  background: black;
}
.multipane-resizer {
  height: 400px !important;

  &:before {
    display: block;
    content: "";
    width: 3px;
    height: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -1.5px;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
  }
  &:hover {
    &:before {
      border-color: #999;
    }
  }
}
</style>
