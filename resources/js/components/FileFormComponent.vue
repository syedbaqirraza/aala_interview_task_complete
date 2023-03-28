<template>
    <div>
        <div class="container">
            <div v-if="isMessage == true">
                <message :messageText="messageText" :alertType="alertType" />
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="image">Select File</label>
                    <input
                        class="form-control"
                        type="file"
                        ref="file"
                        @change="handleFileUpload"
                    />
                </div>
                <br />
                <button @click="uploadFile" class="btn btn-success">
                    Upload File
                </button>
                <button
                    type="submit"
                    @click="redirectToAllImages"
                    class="btn btn-info text-white"
                >
                    View All Images
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import messageComponent from "./MessageComponent.vue";

export default {
    components: {
        message: messageComponent,
    },
    data() {
        return {
            file: "",
            messageText: "",
            alertType: "",
            isMessage: false,
        };
    },
    methods: {
        redirectToAllImages() {
            window.location.href = "/files";
        },
        handleFileUpload() {
            this.file = this.$refs.file.files[0];
        },
        uploadFile() {
            let formData = new FormData();
            formData.append("file", this.file);
            axios
                .post("/files", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    console.log("succeess");
                    this.messageText = "Image Upload Successfully";
                    this.alertType = "alert-success";
                    this.isMessage = true;
                    console.log(response);
                    this.$refs.file.value = '';
                    this.file = '';
                })
                .catch((error) => {
                    this.isMessage = true;
                    this.messageText = error.response.data.error.file[0];
                    this.alertType = "alert-danger";
                })
                .finally(function () {
                    console.log("excuted");
                    // always executed
                });
        },
    },
    mounted() {
        console.log("file form component mounted.");
    },
};
</script>
