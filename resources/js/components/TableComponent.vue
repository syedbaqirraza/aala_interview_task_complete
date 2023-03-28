<template>
    <div>
        <div v-if="isMessage === true">
            <message :messageText="messageText" :alertType="alertType" />
        </div>
        <div v-if="imageData.length > 0">
            <div class="row">

                <div
                    class="card text-center mb-3"
                    style="width: 20%"
                    v-for="item in imageData"
                    :key="item.id"
                >
                    <img
                        v-bind:src="'/storage/watermark/' + item.filename"
                        class="card-img-top"
                    />
                    <div class="card-body">
                        <button
                            class="btn btn-danger col-12"
                            @click="deletePhoto(item.id)"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <h4>Record Not Found</h4>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import messageComponent from "./MessageComponent.vue";
export default {
    components: {
        message: messageComponent,
    },
    props: ["data"],
    data() {
        return {
            imageData: this.data,
            isMessage: false,
            messageText: "",
            alertType: "",
        };
    },
    mounted() {
        console.log("table components mounted");
    },
    methods: {
        deletePhoto(id) {
            axios.post(`/delete/files/${id}`).then((res) => {
                this.fetch();
            });
        },
        fetch() {
            axios.get("/get/files").then((res) => {
                this.imageData = res.data;
                this.isMessage = true;
                this.messageText = "Image Remove Successfully";
                this.alertType = "alert-success";
            });
        },
    },
};
</script>
