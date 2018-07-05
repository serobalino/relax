<template>
    <a-scene>
        <a-camera position="0 0 4"></a-camera>
        <a-sky></a-sky>
        <a-entity id="object-container" position="0 1.6 -2" scale=".4 .4 .4"></a-entity>
        <a-light type="ambient" intensity="0.7" color="#ffffff"></a-light>
        <a-light intensity="3" color="#00ffff" position="-5.72 6.65 0.80" animation__color="property:color; dir:alternate; dur:2000; easing:easeInOutSine; loop:true; to:#ff0000" alongpath="path:10,10,-10 -20,10,-10 10,0,-10; closed:true; dur:12000"></a-light>
        <a-light intensity="5" color="#ff0000" position="8.60 6.65 0.80" animation__color="property:color; dir:alternate; dur:2000; easing:easeInOutSine; loop:true; to:#0000ff" alongpath="path:-2,-2,5 2,-1,5 0,-1,5; closed:true; dur:3000;"></a-light>
    </a-scene>
</template>

<script>
    export default {
        name: "prueba"
    }
</script>

<style scoped>

</style>