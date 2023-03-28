<template>
    <div>
        <div v-if="isMessage == true">
            <message :messageText="messageText" :alertType="alertType" />
        </div>
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="text-center mt-2">
                    <a
                        @click="redirectToAllImages"
                        class="btn text-white btn-success"
                        title="Upload files"

                    >
                        <i class="fas fa-image fa-2x text-white"></i> View All Files
                    </a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputFirstName">First Name</label>
            <input v-model="firstName" type="text" class="form-control" id="inputFirstName" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="inputMiddleName">Middle Name</label>
            <input v-model="middleName" type="text" class="form-control" id="inputMiddleName" placeholder="Enter Middle Name">
        </div>
        <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input v-model="lastName" type="text" class="form-control" id="inputLastName" placeholder="Enter Last Name">
        </div>

        <button @click="updateWaterMark" class="btn btn-primary">Add Watre Mark</button>

    </div>
</template>

<script>
import axios from 'axios';
import MessageComponent from './MessageComponent.vue';
export default {
    components:{
        message:MessageComponent,
    },
    data() {
        return {
            firstName:'',
            middleName:'',
            lastName:'',
            messageText:'',
            alertType:'',
            isMessage:false
        };
    },
    methods: {
        redirectToAllImages() {
            window.location.href = "/files";
        },
        updateWaterMark()
        {
          let watreMarkData=new FormData();
          watreMarkData.append("firstName", this.firstName);
          watreMarkData.append("middleName", this.middleName);
          watreMarkData.append("lastName", this.lastName);
          axios.post('/update-water-mark',watreMarkData).then((response)=>{

            this.isMessage=true;
            this.messageText="WaterMark Added Successfully";
            this.alertType='alert-success';
          }).catch((error)=>{
            console.log(error.response.data);
          }).finally();

        }
    },
};
</script>
