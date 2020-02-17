<template>
  <div class="container-fluid">
    <div class="d-none">
      <h2>ingrese su dirección</h2>
      <label>
        <gmap-autocomplete @place_changed="setPlace"></gmap-autocomplete>
        <button @click="addMarker">Add</button>
      </label>
    </div>
    <gmap-map
      :center="center"
      :zoom="18"
      style="width:100%;  height: 400px;"
      :options="{
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: true,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false,
        disableDefaultUi: true
        }"
    >
      <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        :draggable="true"
        @click="center=m.position"
        v-on:dragend="dragEnd"
      ></gmap-marker>
    </gmap-map>
  </div>
</template>

<script>
export default {
  name: "GoogleMap",
  data() {
    return {
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 45.65, lng: -74.0417 },
      markers: [{ position: this.center }],
      places: [],
      currentPlace: this.center,
      position: {}
    };
  },

  mounted() {
    // this.geolocate();
    this.getLocation();
  },

  methods: {
    dragEnd(event) {
      this.position.lat = event.latLng.lat();
      this.position["lng"] = event.latLng.lng();
      console.log(this.position);
      this.$emit("updatePosition", this.position);
    },
    getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(this.showPosition);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    },
    showPosition(position) {
      const marker = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      this.markers.push({ position: marker });
      this.places.push(position);
      this.center = marker;
      this.$emit("updatePosition", marker);
    },
    // receives a place object via the autocomplete component
    setPlace(place) {
      console.log(place);
      this.currentPlace = place;
    },
    addMarker() {
      console.log("adding marker");
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
