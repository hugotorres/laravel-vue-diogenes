<template>
  <div class="container my-4" v-if="show">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              id="home-tab"
              data-toggle="tab"
              href="#home"
              role="tab"
              aria-controls="home"
              aria-selected="true"
            >Perfil</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="profile-tab"
              data-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
            >Fotos</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="contact-tab"
              data-toggle="tab"
              href="#contact"
              role="tab"
              aria-controls="contact"
              aria-selected="false"
            >Contacto</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade show active"
            id="home"
            role="tabpanel"
            aria-labelledby="home-tab"
          >
            <form
              @submit="formSubmit"
              name="new-product"
              id="new-product"
              action
              class="form-horizontal"
            >
              <div class="row">
                <div class="col-sm-12 my-4">
                  <h5>Selecciona tu ubicaci?n actual:</h5>
                  <google-map-form v-on:updatePosition="updatePosition"></google-map-form>
                </div>
                <div class="col-sm-6 my-4">
                  <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input
                        type="text"
                        id="text"
                        v-model="profile.text"
                        name="text"
                        class="form-control"
                        required
                      />
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 my-4">
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-10">
                      <select
                        class="form-control"
                        id="category"
                        name="category"
                        v-model="profile.category_id"
                        required
                      >
                        <option value selected>---Select Category</option>
                        <option value="1">Chubby</option>
                        <option
                          v-for="{title, description, id} in categoriesData"
                          :key="id"
                          v-bind:value="id"
                        >{{title}}</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="container my-4">
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Descripci?n</label>
                    <div class="col-sm-12">
                      <textarea
                        rows="7"
                        id="description"
                        required
                        v-model="profile.description"
                        name="description"
                        class="form-control"
                      ></textarea>
                    </div>
                    <div class="box">
                      <input
                        @change="fileSelected"
                        type="file"
                        name="files"
                        id="file-1"
                        class="inputfile inputfile-1"
                        data-multiple-caption="{count} files selected"
                        multiple
                        accept="image/*"
                      />
                      <label for="file-1">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="20"
                          height="17"
                          viewBox="0 0 20 17"
                        >
                          <path
                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"
                          />
                        </svg>
                        <span>Choose a file&hellip;</span>
                      </label>
                    </div>
                  </div>
                  <div class="container col-sm-8 text-center center-block">
                    <button
                      id="find-me"
                      type="submit"
                      class="btn btn-success btn-lg btn-block"
                      :disabled="!profile.text && !profile.category_id && !profile.description"
                    >Guardar Cambios</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="form-group">
              <label for="image" class="col-sm-2 control-label">Fotos</label>
              <div class="col-sm-10">
                <div class="box">
                  <input
                    @change="fileSelected"
                    type="file"
                    name="files"
                    id="file-1"
                    class="inputfile inputfile-1"
                    data-multiple-caption="{count} files selected"
                    multiple
                    accept="image/*"
                  />
                  <label for="file-1">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="20"
                      height="17"
                      viewBox="0 0 20 17"
                    >
                      <path
                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"
                      />
                    </svg>
                    <span>Choose a file&hellip;</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="container col-sm-8 text-center center-block">
              <button
                id="find-me"
                type="submit"
                class="btn btn-success btn-lg btn-block"
                :disabled="!profile.text && !profile.category_id && !profile.description"
              >Guardar Cambios</button>
            </div>
            <div class="col-sm-12">
              <div
                class="imagen preview-image"
                v-for="item in filterImages(profileData.image)"
                v-bind:key="item.id"
              >
                <img v-if="item != ''" :src="'/uploads/profile/'+item" alt />
                <a @click="deleteImage(item)" class="button btn-sm btn-outline-danger">Borrar</a>
              </div>
            </div>

            <!--             <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div
                  class="carousel-item"
                  data-interval="10000"
                  v-for="(image,idx) in filterImages(profileData.image)"
                  v-bind:key="idx"
                  :class="{ active: idx==0 || idx==null }"
                >
                  <img v-bind:src="'/uploads/profile/' + image" class="d-block w-50" alt="..." />
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
            </div>-->
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="form-group">
              <label for="url" class="col-sm-2 control-label">Url</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  id="url"
                  name="url"
                  v-model="profile.url"
                  class="form-control"
                  required
                />
              </div>
            </div>
            <div class="form-group">
              <label for="url_instagram" class="col-sm-2 control-label">Url</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  id="url_instgram"
                  name="url_instagram"
                  v-model="profile.url_instagram"
                  class="form-control"
                  required
                />
              </div>
            </div>
            <div class="form-group">
              <label for="text" class="col-sm-2 control-label">whatsapp</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  id="whatsapp"
                  v-model="profile.whatsapp"
                  name="text"
                  class="form-control"
                  required
                />
              </div>
            </div>
            <div class="form-group">
              <label for="text" class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
                <input
                  type="text"
                  id="phone_number"
                  v-model="profile.phone_number"
                  name="text"
                  class="form-control"
                  required
                />
              </div>
            </div>

            <div class="container col-sm-8 text-center center-block">
              <button
                id="find-me"
                type="submit"
                class="btn btn-success btn-lg btn-block"
                :disabled="!profile.text && !profile.category_id && !profile.description"
              >Guardar Cambios</button>
            </div>
          </div>
        </div>

        <!--  -->
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
.preview-image {
  float: left;
  width: 30%;
  border-radius: 10px;
  border: thin solid white;
  img {
    width: 100%;
    border-radius: 10px;
    border: thin solid white;
  }
}
.inputs-box {
  box-shadow: inset #dcdcdc 0px 0px 10px 1px;
  border-radius: 11px;
  padding: 10px;
}
.form-box {
  border-radius: 20px;
  padding: 10px;
  box-shadow: #e2e2e2 0px 2px 8px 4px;
}
.form-control {
  border: none;
  background-color: #ffffff00;
  border-bottom: thin solid black;
  border-radius: 0;
}
input#file-1 {
  visibility: hidden;
}
.js .inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}

.inputfile + label {
  max-width: 80%;
  font-size: 1.25rem;
  /* 20px */
  font-weight: 700;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  padding: 0.625rem 1.25rem;
  /* 10px 20px */
}

.no-js .inputfile + label {
  display: none;
}

.inputfile:focus + label,
.inputfile.has-focus + label {
  outline: 1px dotted #000;
  outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
  /* pointer-events: none; */
  /* in case of FastClick lib use */
  border-bottom: thin solid lightgray;
}

.inputfile + label svg {
  width: 1em;
  height: 1em;
  vertical-align: middle;
  fill: currentColor;
  margin-top: -0.25em;
  /* 4px */
  margin-right: 0.25em;
  /* 4px */
}
.hidden {
  position: absolute;
  overflow: hidden;
  width: 0;
  height: 0;
  pointer-events: none;
}

/* style 1 */

.inputfile-1 + label {
  color: #f1e5e6;
  background-color: #d3394c;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
  background-color: #722040;
}
</style>

<script>
export default {
  components: {},
  data() {
    return {
      show: true,
      images: [],
      categoriesData: [],
      notification: "",
      profileData: {},
      imagUrls: []
    };
  },

  mounted() {
    this.profileData = this.profile;
    this.imgUrls = this.profileData.image;
  },
  props: ["profile"],
  ready: function() {
    this.profileData = this.profile;
    this.categoriesData = JSON.parse(this.categories);
    this.imgUrls = this.profileData.image;
  },
  methods: {
    getInputValue() {
      if (this.profile.text && this.profile.category_id && this.profile.image)
        return true;
      else return false;
    },
    uploadImage(event) {
      const URL = "/api/profile/upload";

      let data = new FormData();
      data.append("name", "my-picture");
      data.append("file", event.target.files[0]);

      let config = {
        header: {
          "Content-Type": "image/png"
        }
      };

      axios
        .put(URL, data, config)
        .then(response => {
          console.log("image upload response > ", response);
        })
        .then(response => alert(response));
    },
    deleteImage(image) {
      let data = new FormData();
      data.append("image", image);
      console.log(data);
      axios
        .delete("profile/image/", data)
        .then(response => {
          console.log("image deleted  > ", response);
        })
        .then(response => {
          console.log(response);
        });
    },

    formSubmit(e) {
      e.preventDefault();
      let formData = new FormData();

      let container = this;
      Object.keys(this.profile.images).forEach(appendImage);

      function appendImage(item, index) {
        formData.append(
          "image[" + index + "]",
          container.profile.images[index]
        );
      }
      formData.append("id", this.profile.id);
      formData.append("user_id", this.profile.user_id);

      formData.append("latitude", this.profile.latitude);
      formData.append("longitude", this.profile.longitude);
      formData.append("description", this.profile.description);
      formData.append("whatsapp", this.profile.whatsapp);
      formData.append("url", this.profile.url);
      formData.append("url_instagram", this.profile.url_instagram);
      formData.append("phone_number", this.profile.phone_number);

      formData.append("text", this.profile.text);
      formData.append("category_id", this.profile.category_id);

      let currentObj = this;
      this.axios
        .post("/api/profile/create", formData)
        .then(function(response) {
          console.log("data saved");
          console.log(response);
          currentObj.output = response;
          this.notification = response.data.success;
          currentObj.success = response.data.success;
          this.rerender();
          vm.$forceUpdate();
          window.location = window.location.href;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
      console.log("submit finished");
    },
    fileSelected(e) {
      e.preventDefault();
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.profile.images = files;
    },

    createImage(file, index) {
      let currentObj = this;
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      let formData = new FormData();
      formData.append("image", file);

      axios
        .post("/api/profile/upload", formData, config)
        .then(function(response) {
          currentObj.success = response.data.success;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    },

    removeImage() {
      this.profile.image = "";
    },
    updatePosition(params) {
      this.profile.latitude = params.lat;
      this.profile.longitude = params.lng;
    },
    filterImages(images) {
      if (images) {
        images = images.split("--");
        images.shift();
        return Object.assign({}, images);
      }
    },
    rerender() {
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
        console.log("re-render start");
        this.$nextTick(() => {
          console.log("re-render end");
        });
      });
    }
  }
};
</script>
