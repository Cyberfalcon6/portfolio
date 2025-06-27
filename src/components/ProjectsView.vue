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
                <p> Vue-based personal brand site with smooth animations and scroll effects. </p>
              </div>
            </div>
            <div class="project-card" :class="{'swayable': swayables.includes(2)}">
              <img src="@/assets/ecommerce.webp" alt="E-commerce Platform">
              <div class="project-info">
                <h3>E-commerce Platform</h3>
                <p>Full-stack store using Node.js, Stripe, and MongoDB, built for scale.</p>
              </div>
            </div>
            <div class="project-card" :class="{'swayable': swayables.includes(3)}">
              <img src="@/assets/chatapp.jpg" alt="Chat App">
              <div class="project-info">
                <h3> Real-time Chat App </h3>
                <p> Socket.io-powered messaging with Vue.js front-end and JWT auth. </p>
              </div>
            </div>
          </div>
        </div>
      

</template>

<script>
    export default({
        name: "ProjectsView",
        data(){
          return{
            swayables: []
          }
        },
        methods: {

        },
        mounted(){
          
        }
    })
</script>


<style scoped>

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