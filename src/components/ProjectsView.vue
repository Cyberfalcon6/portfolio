<template>

        <div class="section-content">
          <!-- <h2><font-awesome-icon :icon="faBriefcase" /> <span class="highlight">Featured Projects</span></h2> -->
          <p class="subhead"> A few things I've built recently </p>
          <!-- <ProjectCard :project="projects"/> -->
          <div class="project-grid">
            <div class="project-card" :class="{'swayable': swayables.includes(1)}">
              <img src="@/assets/portfolio.png" alt="Portfolio Website">
              <div class="project-info">
                <h3> Portfolio Website </h3>
                <p> Vue-based personal brand site. </p>
              </div>
                 <div class="project-links">
                <div class="link"> <HugeiconsIcon :icon="Github01Icon" :size="25" color="white" /> <span class="text">  See on Github</span> </div>
                <div class="link"><HugeiconsIcon :icon="InternetIcon" :size="25" color="white" /> <span class="text">Preview live</span> </div>
              </div>
            </div>
            <div class="project-card" :class="{'swayable': swayables.includes(2)}">
              <img src="@/assets/ecommerce.webp" alt="E-commerce Platform">
              <div class="project-info">
                <h3>E-commerce Platform</h3>
                <p>Full-stack store using Node.js, Stripe, and MongoDB, built for scale.</p>
              </div>
              <div class="project-links">
                <div class="link"> <HugeiconsIcon :icon="Github01Icon" :size="25" color="white" /> <span class="text">  See on Github</span> </div>
                <div class="link"><HugeiconsIcon :icon="InternetIcon" :size="25" color="white" /> <span class="text">Preview live</span> </div>
              </div>
            </div>
            <div class="project-card" :class="{'swayable': swayables.includes(3)}">
              <img src="@/assets/cets.png" alt="CETS" width="100px">
              <div class="project-info">
                <h3> CETS website </h3>
                <p> Full customised educational website </p>
              </div>
                 <div class="project-links">
                <div class="link"> <HugeiconsIcon :icon="Github01Icon" :size="25" color="white" /> <span class="text">  See on Github</span> </div>
                <a href="https://cets.uk"><div class="link"><HugeiconsIcon :icon="InternetIcon" :size="25" color="white" /> <span class="text">Preview live</span> </div></a>
              </div>
            </div>
          </div>
        </div>
      

</template>

<script setup>
import { ref, onMounted } from 'vue'
import { HugeiconsIcon } from '@hugeicons/vue'
import { Github01Icon } from '@hugeicons/core-free-icons/index'
import { InternetIcon } from '@hugeicons/core-free-icons/index'
const swayables = ref([])

onMounted(() => {
  // mounted logic here
})


</script>


<style scoped>
*{
  box-sizing: border-box;
}
  .section-content{
    
  background-color: rgba(250, 235, 215, 0.507);
  }

  .project-grid {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  width: 100%;
  height: 100%;
  overflow: auto;
}
.project-card {
  background: white;
  padding: 2rem;
  max-width: 300px;
  margin: 10px;
  cursor: pointer;
  border-radius: 12px;
  position: relative;
  box-shadow: 1px 2px 15px -3px var(--primary);
  text-align: left;
  transition: all 0.3s ease;
}

.link{
  background-color: var(--primary);
  color: white;
  width: 40px;
  height: 40px;
  border-radius: 360px;
  display: flex;
  justify-content: center;
  overflow: hidden;
  align-items: center;
  text-wrap: nowrap;
  transition: all .2s ease-in-out;
}
.link:hover{
  background-color: rgb(74, 9, 159);
  width: 160px;
  gap: 10px;
}
.link:hover .text{
  visibility: visible;
  opacity: 1;
  width: fit-content;
}
.project-links{
  display: flex;
  flex-direction: row;
  justify-content: center;
  gap: 10px;
  /* background-color: #666; */
  align-items: center;
  position: absolute;
  bottom: 25px;
}
.link .text{
  visibility: hidden;
  opacity: 0;
  width: 0;
  transition: all .2s ease-in-out;
}

.swayable{
  
  animation: sway 1s 1;
  transition: all 0.3s ease;
}

@keyframes sway{
  0%{
    top: 0px;
  }
  50%{
    top: -10px;
  }
  100%{
    top: 0px;
  }
}

.project-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.subhead {
  font-size: 1.2rem;
  color: #666;
  font-weight: 600;
  margin-bottom: 1.5rem;
  margin-left: 20px;
}

.project-card h3 {
  color: var(--primary);
  margin-bottom: 0.75rem;
  font-weight: 600;
  font-size: 1.25rem;
}

.project-card p {
  color: #6b6b6b;
  font-weight: 500;
  line-height: 1.4;
}

.project-card img {
  width: 100%;
  border-radius: 10px 10px 0 0;
  height: 180px;
  object-fit: cover;
}

.project-info {
  padding-top: 1rem;
}

.project-card.featured {
  grid-column: span 2;
  grid-row: span 2;
}



</style>