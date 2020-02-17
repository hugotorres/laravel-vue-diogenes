<template>
<multipane class="custom-resizer" layout="vertical">
  <div class="pane">
    <div>
      <h6 class="title is-6">Pane 1</h6>
    </div>
  </div>
  <multipane-resizer></multipane-resizer>
  <div class="pane">
    <div>
      <h6 class="title is-6">Pane 2</h6>
    </div>
  </div>
  <multipane-resizer></multipane-resizer>
  <div class="pane" :style="{ flexGrow: 1 }">
    <div>
      <h6 class="title is-6">Pane 3</h6>
    </div>
  </div>
</multipane>
</template>

<script>
import { Multipane, MultipaneResizer } from '@/src';
export default {
  components: {
    Multipane,
    MultipaneResizer,
  },
};
</script>

