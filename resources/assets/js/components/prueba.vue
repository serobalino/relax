<template>
    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">Conducir</h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-widget17">
                <div class="m-widget17__stats">
                    <a-scene class="aframebox" embedded>
                        <a-videosphere rotation="0 180 0" src="#video"
                                       play-on-window-click
                                       play-on-vrdisplayactivate-or-enter-vr>
                        </a-videosphere>
                        <a-camera user-height="0" wasd-controls-enabled="false" arrow-key-rotation>
                        </a-camera>
                        <a-assets>
                            <video id="video" style="display:none"
                                   autoplay loop crossorigin="anonymous" playsinline webkit-playsinline preload="auto">
                                <source type="video/mp4"
                                        src="https://ucarecdn.com/bcece0a8-86ce-460e-856b-40dac4875f15/" />
                            </video>
                        </a-assets>
                    </a-scene>
                    <br><br>
                    <div class="form-row text-center">
                        <div class="col-12">
                            <a :href="ruta" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Registrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.config.ignoredElements = [
              'a-scene',
              'a-videosphere',
              'a-camera',
              'a-assets'
           ];
    import 'aframe';
    export default {
        name: "prueba",
        props:['ruta'],
    }
</script>

<style>
    .aframebox {
        height: 500px;
        width: 100%;
    }
</style>