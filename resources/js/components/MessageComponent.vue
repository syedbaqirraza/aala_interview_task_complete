<template>
    <div>
        <div class="row mb-3">
            <div class="col-lg-12 margin-tb">
                <div class="row mb-3">
                    <div class="col-lg-12 margin-tb">
                        <div class="alert" :class="alertType">
                            <p>{{ messageText }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["messageText", "alertType"],

    mounted() {
        console.log("messsage Component mounted.");
    },
};
</script>
