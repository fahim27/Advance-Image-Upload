<template>
<div>
    <cropper classname="cropper" :src="img" :stencilProps="{
      aspectRatio: 10/12
    }" @change="change"></cropper>
</div>
</template>

<script>
import Vue from 'vue'
import {
    Cropper
} from 'vue-advanced-cropper'

export default {
        
        data(){
        
             return {
              img: 'https://images.pexels.com/photos/226746/pexels-photo-226746.jpeg'

             }
        },
        methods: {
            change({
                coordinates,
                canvas
            }) {
                console.log(coordinates, canvas)
            }
        },
        components: {
            Cropper
        }
    
}
</script>

<style scoped>
.cropper {
    height: 600px;
    background: #DDD;
}
</style>
