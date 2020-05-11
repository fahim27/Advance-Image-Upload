<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <label>Upload Image</label>
                        <input type="file" class="form-control" name="image" @change="getImage">
                        <img :src="image" style="width: 100px;height: 80px;">
                        <br/>
                        <button class="btn btn-success" @click="fetchImage">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
            console.log('Component mounted.');
            this.fetchImage()
        },
        data(){
           return{
               image:''
           }
        },
        computed:{

        },

        methods:{
            upload(){
                axios.post('/upload',{
                    image: this.image
                })
                .catch((resp)=>{
                    console.log(resp);
                })
            },
            getImage(e){
                let image=e.target.files[0];
                let reader=new FileReader();
                reader.readAsDataURL(image);
                reader.onload=e=>{
                    this.image=e.target.result;
                }

            },

            fetchImage(){
                axios.get('/get/image')
                    .catch((resp)=>{
                        console.log(resp);
                    })

            }
        }

    }
</script>
