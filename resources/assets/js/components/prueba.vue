<template>
    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">Prueba</h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-widget17">
                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                    <div class="m-widget17__chart" style="height:20px;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                        </div>
                    </div>
                </div>
                <div class="m-widget17__stats">
                    <a-scene>
                        <a-videosphere rotation="0 180 0" src="#video"
                                       play-on-window-click
                                       play-on-vrdisplayactivate-or-enter-vr>
                        </a-videosphere>

                        <a-camera user-height="0" wasd-controls-enabled="false" arrow-key-rotation>
                        </a-camera>
                        <a-assets>
                            <video id="video" style="display:none"
                                   autoplay loop crossorigin="anonymous" playsinline webkit-playsinline>
                                <source type="video/mp4"
                                        src="http://relax.local/videos/montañarusa.mp4" />
                            </video>
                        </a-assets>
                    </a-scene>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'aframe';
    export default {
        name: "prueba"
    }
</script>

<style scoped>

</style>