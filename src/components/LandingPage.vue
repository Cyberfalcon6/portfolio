<template>
    <div class="intro-layout">
          <div class="group">
            <div class="greeting"> Hey </div>
            <div class="introduction"> I'm <span class="name">{{ name }}</span></div>
            <div class="role" :class="{ 'zoom': zoom }" id="role">{{ role }}</div>
            <RouterLink to="/build"><button class="cta-button"> Get in touch </button></RouterLink>
            <RouterLink to="/projects" id="project-link"><button class="cta-button2" style="background-color: black;"> See Projects </button></RouterLink>
          </div>
          <img src="@/assets/developer-illustration.png" id="illustration"
            :style="{ transform: `scale(${imageScale})` }" alt="Hero illustration">
        </div>
</template>
<script>

export default({
    name: "LandingPage",
    data(){
        return{
            selected: "about",
            role: "",
            name: "",
        }
    },
    mounted(){
        //  document.addEventListener('mousemove', this.handleMouseMove);
        this.animateName();
    },
    methods: {
        handleMouseMove(e){
              if (this.$route.fullPath == '/about') {
                const container = document.querySelector('.intro-layout');
                const illustration = document.querySelector('#illustration');
                const rect = container.getBoundingClientRect();
                const x = (e.clientX - rect.left - rect.width / 2) / 30;
                const y = (e.clientY - rect.top - rect.height / 2) / 30;
                illustration.style.transform = `scale(${this.imageScale}) translate(${x}px, ${y}px)`;
              }
            }
    ,
    animateName() {
      const name = "Japhet";
      const role = "A full-stack web developer </> based in Kigali";
      var index = 0;
      var index2 = 0;
      const intervalId = setInterval(() => {
        this.name = this.name + name[index];
        index++;
        if (index >= name.length) {
          clearInterval(intervalId);
        }
      }, 25);
      setTimeout(() => {
        const intervalId2 = setInterval(() => {
          this.role = this.role + role[index2];
          index2++;
          if (index2 >= role.length) {
            this.zoom = true;
            clearInterval(intervalId2);
          }
        }, 25);
      }, 160);
    },}
})

</script>

<style scoped>

.intro-layout {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2rem;
  background-color: rgba(250, 235, 215, 0.507);
  height: 100%px;
  position: absolute;
  width: 100%;
}

#project-link{
  color: white !important;
  text-decoration: none;
}

@media (min-width: 768px) {
  .intro-layout {
    width: 100%;
    flex-direction: row;
  height: 100%;
    justify-content: space-around;
  }
}

</style>