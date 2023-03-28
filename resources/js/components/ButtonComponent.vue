<template>
    <div>
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="text-center mt-2">
                    <button
                        @click="redirectUploadFile"
                        class="btn btn-info text-white"
                    >
                        <i class="fas fa-upload fa-2x text-white"></i> Upload
                        New Files
                    </button>
                    <button
                        @click="redirectAddWaterMark"
                        class="btn btn-info text-white"
                    >
                        <i class="fas fa-flag fa-2x text-white"></i> Change
                        Water Mark
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        redirectUploadFile() {
            window.location.href = "/files/create";
        },
        redirectAddWaterMark() {
            window.location.href = "/change-water-mark";
        },
    },
    mounted() {
        console.log("button component mounted.");
    },
};
</script>
