<template>
    <div class="container">
        <div class="photo-space">
            <div class="left-carret"></div>
            <img src="" alt="">
            <div class="right-carret"></div>
            <div class="details"></div>
        </div>
        <div class="other">
           <div class="project"></div>
        </div>
    </div>
</template>
<script>
    export default({
        data(){
            return{
                currentProject: {
                    name: "", 
                    photos: [
                        "@/assets/portfolio.png",
                        "@/assets/chatapp.jpg",
                        "@/assets/ecommerce.webp",
                    ]
                },
                projects: [
                    {
                        name: "Portfolio Website",
                        photo: "@/assets/portfolio.jpg"
                    },
                    {
                        name: "Portfolio Website",
                        photo: "@/assets/portfolio.jpg"
                    },
                    {
                        name: "Portfolio Website",
                        photo: "@/assets/portfolio.jpg"
                    },

                ]
            }
        }
    })
</script>
<style scoped>


.container{
    width: 100%;
    height: 100%;
    background-color: azure;

}
</style>