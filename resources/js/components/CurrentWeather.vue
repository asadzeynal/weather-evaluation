<template>
  <div class="row w-100">
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-red">
          <i class="fa fa-temperature-high"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Current Temperature</span>
          <span class="info-box-number">{{options.currentTemp}} Celsius</span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-yellow">
          <i class="fa fa-cloud-sun" style="color:white"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Feels Like</span>
          <span class="info-box-number">{{options.feelsLike}} Celsius</span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-green">
          <i class="fa fa-water"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Humidity</span>
          <span class="info-box-number">{{options.humidity}} %</span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-blue">
          <i class="fas fa-wind"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Wind Speed</span>
          <span class="info-box-number">{{options.windSpeed}} m/s</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
export default {
  props: {
    options: {
      current: null,
      windSpeed: null,
      humidity: null,
      feelsLike: null,
      pressure: null
    }
  }
};
</script>