<template>
  <div  >
    <div class="d-none">
      <h2>Search and add a pin</h2>
      <label>
        <gmap-autocomplete @place_changed="setPlace"></gmap-autocomplete>
        <button @click="addMarker">Add</button>
      </label>
    </div>
    <gmap-map
      :center="center"
      :zoom="13"
      style="width:100%;  height: 80vh;"
      :options="{
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: true,
        streetViewControl: true,
        rotateControl: false,
        fullscreenControl: false,
        disableDefaultUi: false
        }"
    >
      <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        :title="m.title"
        @click="center=openDetails(m)"
      >
        <GmapInfoWindow :opened="infoOpened">{m.title}</GmapInfoWindow>
      </gmap-marker>
    </gmap-map>

    <!--     <div class="side-panel">
            <detail-panel  :isActive="sidePanel" :producto="detailRequested"></detail-panel>
    </div>-->
  </div>
</template>

<script>
import DetailsPanel from "./DetailsPanel";
export default {
  name: "GoogleMap",
  data() {
    return {
      infoOpened: false,
      center: { lat: 45.65, lng: -74.0417 },
      markers: this.setupMarkers(),
      categories: this.setupCategories(),
      places: Array,
      currentPlace: null,
      sidePanel: false,
      detailRequested: {}
    };
  },
  components: {
    DetailsPanel
  },
  props: ["detailActive"],

  mounted() {
    this.geolocate();
  },

  methods: {
    openDetails(m) {
      this.detailRequested = m;
      this.$emit("clickMarker", m);
      return m.position;
    },
    setPlace(place) {
      this.currentPlace = place;
    },
    setupCategories() {
      let arreglo = [];
      $.each(this.$attrs.categories, function(key, category) {
        arreglo.push({
          icon: category.icon,
          name: category.title,
          id: category.id
        });
      });
      return arreglo;
    },
    setupMarkers() {
      let arreglo = [];
      $.each(this.$attrs.markers, function(key, product) {
        const marker = {
          lat: parseFloat(product.latitude),
          lng: parseFloat(product.longitude)
        };
        arreglo.push({ position: marker, ...product });
      });
      return arreglo;
    },
    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng()
        };
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.currentPlace = null;
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
      });
    }
  }
};
</script>
