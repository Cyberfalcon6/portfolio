<template>
    <div class="outer-shell flex flex-col h-[100%] overflow-auto flex-1">
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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 200"
     class="text-[var(--primary)] fill-current block mb-[-1px] w-full h-auto" preserveAspectRatio="none">
  <g transform="scale(1,0.5) translate(0,80)">
    <path fill="#36169a" fill-opacity="1" d="M0,224L34.3,229.3C68.6,235,137,245,206,218.7C274.3,192,343,128,411,128C480,128,549,192,617,224C685.7,256,754,256,823,229.3C891.4,203,960,149,1029,154.7C1097.1,160,1166,224,1234,229.3C1302.9,235,1371,181,1406,154.7L1440,128L1440,320L0,320Z"></path>
  </g>
  <g transform="scale(1.03,0.5) translate(0,70)">
    <path fill="#36169a" fill-opacity="0.3" d="M0,224L34.3,229.3C68.6,235,137,245,206,218.7C274.3,192,343,128,411,128C480,128,549,192,617,224C685.7,256,754,256,823,229.3C891.4,203,960,149,1029,154.7C1097.1,160,1166,224,1234,229.3C1302.9,235,1371,181,1406,154.7L1440,128L1440,320L0,320Z"></path>
  </g>
</svg>
<!-- <div class="line w-[full] h-[130px] bg-[var(--primary)]"></div> -->
        <ProjectsView/>
        <ContactForm />
        <BraNds />
    </div>
</template>
<script>
import BraNds from './BraNds.vue';
import ProjectsView from './ProjectsView.vue';
import ContactForm from './ContactForm.vue';

export default({
    name: "LandingPage",
    components: {ProjectsView, BraNds, ContactForm},
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
  height: max-content;
  gap: 2rem;
  background-color: rgba(250, 235, 215, 0.507);
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
    justify-content: space-around;
  }
}

</style>