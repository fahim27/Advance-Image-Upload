<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Example Component</div>

                <div class="card-body">
                    <label>Upload Image</label>
                    <input type="file" class="form-control" name="image" @change="UploadImage">
                    <br />
                    <img :src="image" style="width: 100px;height: 80px;">
                    <br />
                    <br />
                    <button class="btn btn-success" @click="SaveUpload">Upload</button>
                    <button class="btn btn-danger" @click="cancel" v-if="loaded">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

    mounted() {
        this.getImage();
        console.log(this.getImage())
    },
    data() {
        return {
            image: '',
            loaded: false,
            file: null

        }
    },
    computed: {},

    methods: {

        UploadImage(e) {
            let image = e.target.files[0];
            this.read(image);
            let form = new FormData();
            form.append('image', image);
            this.file = form;

        },

        cancel() {
            this.image = "";
            this.loaded = false;
            this.getImage();
            this.$toasted.show('cancel Succeessfully', {
                type: "success"
            });

        },

        SaveUpload() {

            axios.post('/upload', this.file)
                .then((resp) => {
                    console.log(resp);
                    this.$toasted.show('Image Upload Successfully', {
                        type: "success"
                    });
                })
                .catch((error) => {

                })

        },

        getImage() {
            axios.get('/get/image')
                .then((resp) => {
                    this.image = `storage/` + resp.data[0].image;
                    console.log(resp.data[0].image);

                })
                .catch((error) => {

                })
        },
        read(image) {
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e => {
                this.image = e.target.result;
            }
            this.loaded = true;
        }

    }

}
</script>
