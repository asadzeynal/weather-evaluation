<template>
  <div class="w-100" style="text-align: center">
    <h1 v-if="loaded">Baku Time: {{currentTime}}</h1>
  </div>
</template>

<script>
export default {
  data: () => ({
    currentTime: null,
    loaded: false,
    data: null,
    interval: null
  }),
  async mounted() {
    this.interval = setInterval(() => this.getTime(), 1000);
  },
  beforeDestroy() {
    clearInterval(this.interval);
  },
  methods: {
    getTime: async function ()  {
      try {
        this.data = (
          await axios.get(
            "/api/time"
          )
        ).data;
        this.currentTime = this.data.datetime.substring(
          this.data.datetime.indexOf("T") + 1,
          this.data.datetime.indexOf(".")
        );
        this.loaded = true;
      } catch (e) {
        console.error(e);
      }
    }
  }
};
</script>