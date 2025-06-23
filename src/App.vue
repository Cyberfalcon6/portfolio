<!-- Updated design-focused, professional version of your web developer portfolio -->
<template>
  <div id="shell">
    <!-- Responsive Navigation -->
    <nav id="nav-small">
      <div class="logo padded">0X3B</div>
      <div class="work padded">My Work</div>
      <div class="contact padded">Reach me</div>
    </nav>
    <nav id="nav-big">
      <div class="logo padded">0X3B</div>
      <!-- <div class="offers nav-link">Offers</div> -->
      <!-- <div class="stack nav-link">Tech Stack</div> -->
      <div class="contact nav-link" :class="{ 'visible': selected == 'about' }" v-on:click="selected = 'about'"> About Me</div>
      <div class="work nav-link" :class="{ 'visible': selected == 'work' }" v-on:click="selected = 'work'">My Work</div>
      <div class="testimonials nav-link" :class="{ 'visible': selected == 'testimonials' }"
        v-on:click="selected = 'testimonials'">Testimonials</div>
    </nav>

    <div id="sections">
      <!-- Introduction -->
      <section class="section" v-if="selected=='about'">
        <div class="intro-layout">
          <div class="group">
            <div class="greeting">Hey</div>
            <div class="introduction">I'm <span class="name">{{ name }}</span></div>
            <div class="role" :class="{ 'zoom': zoom }" id="role">{{ role }}</div>
            <button class="cta-button">Get in touch</button>
            <button class="cta-button2" style="background-color: black;">See Projects</button>
          </div>
          <img src="./assets/developer-illustration.png" id="illustration"
            :style="{ transform: `scale(${imageScale})` }" alt="Hero illustration">
        </div>
      </section>

      <!-- Work -->
      <section class="section" v-if="selected == 'work'">
        <div class="section-content">
          <!-- <h2><font-awesome-icon :icon="faBriefcase" /> <span class="highlight">Featured Projects</span></h2> -->
          <p class="subhead">A few things I've built recently</p>
          <div class="project-grid">
            <div class="project-card">
              <img src="./assets/portfolio.png" alt="Portfolio Website">
              <div class="project-info">
                <h3>Portfolio Website</h3>
                <p>Vue-based personal brand site with smooth animations and scroll effects.</p>
              </div>
            </div>
            <div class="project-card">
              <img src="./assets/ecommerce.webp" alt="E-commerce Platform">
              <div class="project-info">
                <h3>E-commerce Platform</h3>
                <p>Full-stack store using Node.js, Stripe, and MongoDB, built for scale.</p>
              </div>
            </div>
            <div class="project-card">
              <img src="./assets/chatapp.jpg" alt="Chat App">
              <div class="project-info">
                <h3>Real-time Chat App</h3>
                <p>Socket.io-powered messaging with Vue.js front-end and JWT auth.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Stack -->
      <!-- <section class="section">
  <div class="section-content">
    <h2><font-awesome-icon :icon="faToolbox" /> <span class="highlight">Tech Toolbox</span></h2>
    <p class="subhead">My favorite tools and frameworks:</p>
    <div class="tech-icons">
      <div v-for="skill in skills" :key="skill.name" class="skill-bar">
        <label>{{ skill.name }}</label>
        <div class="bar">
          <div class="fill" :style="{ width: skill.value + '%' }"></div>
        </div>
      </div>
    </div>
  </div>
</section> -->

      <!-- Testimonials -->
      <!-- <section class="section">
  <div class="section-content">
    <h2><font-awesome-icon :icon="faCommentDots" /> <span class="highlight">Client Feedback</span></h2>
    <div class="carousel">
      <div class="slide active">
        <blockquote>“Japhet delivered the project ahead of schedule with perfect execution and exceeded expectations.”</blockquote>
        <cite>– Alex M., Product Manager</cite>
      </div>
      <div class="slide">
        <blockquote>“A fantastic developer with an eye for design. Highly recommended!”</blockquote>
        <cite>– Marie C., Designer</cite>
      </div>
    </div>
  </div>
</section>
   -->

      <!-- Contact -->
      <!-- <section class="section">
  <div class="section-content">
    <h2><font-awesome-icon :icon="faEnvelope" /> <span class="highlight">Let's Work Together</span></h2>
    <form class="contact-form">
      <input type="text" placeholder="👤 Your Name" required>
      <input type="email" placeholder="📧 Your Email" required>
      <textarea placeholder="💡 Tell me about your project..." required></textarea>
      <button type="submit">🚀 Send Message</button>
    </form>
  </div>
</section> -->
    </div>

    <!-- Footer Waves -->
    <!-- <div class="footer">
      <img src="./assets/yellow-wave.png" id="w1" class="yellow-wave" alt="">
      <img src="./assets/yellow-wave.png" id="w2" class="yellow-wave" alt="">
      <img src="./assets/yellow-wave.png" id="w3" class="yellow-wave" alt="">
      <img src="./assets/yellow-wave.png" id="w4" class="yellow-wave" alt="">
    </div> -->
  </div>
</template>

<script>
//import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faBriefcase, faToolbox, faCommentDots, faEnvelope } from '@fortawesome/free-solid-svg-icons'
export default {
  components: {
    // FontAwesomeIcon
  },
  name: "App",
  data() {
    return {
      faBriefcase,
      faToolbox,
      name: "",
      faCommentDots,
      faEnvelope,
      zoom: false,
      selected: "about",
      imageScale: 1,
      role: "",
      skills: [
        { name: 'Vue.js', value: 0 },
        { name: 'Node.js', value: 0 },
        { name: 'MongoDB', value: 0 },
        { name: 'Tailwind CSS', value: 0 },
        { name: 'TypeScript', value: 0 },
        { name: 'Figma', value: 0 }
      ]
    }
  },
  mounted() {
    document.addEventListener('mousemove', this.handleMouseMove);
    window.addEventListener('wheel', this.switchSections);
    this.animateSkills();
    this.animateName();
    // this.zoom = true;

  },
  unmounted() {
    document.removeEventListener('mousemove', this.handleMouseMove);
    window.removeEventListener('scroll', this.switchSections()
    );

  },
  methods: {
    switchSections(Event) {
      
        if(Event.deltaY > 55 || Event.deltaY < -55){
          if (this.selected == 'about') {
          this.selected = 'work';
        }
        else if (this.selected == 'work') {
          this.selected = 'testimonials';
        }
        else {
          this.selected = 'about';
        }
        }
      
    },
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
    },
    animateSkills() {
      const stackSection = document.querySelector('.tech-icons');
      if (!stackSection) return;
      const rect = stackSection.getBoundingClientRect();
      if (rect.top < window.innerHeight) {
        this.skills = this.skills.map(skill => ({ ...skill, value: 100 }));
      }
    },
    handleScroll(event) {
      const delta = Math.sign(event.deltaY);
      if ((delta > 0 && this.scrollIndex < this.totalSections - 1) || (delta < 0 && this.scrollIndex > 0)) {
        this.scrollIndex += delta;
      }
      if (this.scrollIndex === 0) {
        const scrollFactor = Math.min(Math.max(1 - window.scrollY / window.innerHeight, 0.5), 1);
        this.imageScale = scrollFactor;
      }
    },
    handleMouseMove(e) {
      if(this.selected=='about'){
        const container = document.querySelector('.intro-layout');
      const illustration = document.querySelector('#illustration');
      const rect = container.getBoundingClientRect();
      const x = (e.clientX - rect.left - rect.width / 2) / 30;
      const y = (e.clientY - rect.top - rect.height / 2) / 30;
      illustration.style.transform = `scale(${this.imageScale}) translate(${x}px, ${y}px)`;
      }
    }
  }
}
</script>

<style>
:root {
  --primary: #673EE6;
  --secondary: #E6D53C;
  --tertiary: #FD5165;
  --gray: #F9F9FB;
  --text-dark: #1f1f1f;
  --text-light: #fff;
  --shadow: rgba(0, 0, 0, 0.08);
}

body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background-color: var(--gray);
  color: var(--text-dark);
}

#shell {
  width: 100%;
  height: 100vh;
  overflow-y: auto;
  position: relative;
  background: var(--gray);
  display: flex;
  flex-direction: column;
}

@keyframes lightning {
  0% {
    opacity: 1;
  }

  25% {
    opacity: .7;
  }

  50% {
    opacity: 1;
  }

  75% {
    opacity: .7;
  }

  100% {
    opacity: 1;
  }
}

/* Navigation */
#nav-small,
#nav-big {
  z-index: 1000;
  padding: 1rem 2rem;
  display: flex;
  justify-content: center;
  position: fixed;
  width: 100%;
  font-weight: 600;
  align-items: flex-end;
  background: white;
}

.zoom {
  animation: zoom 1.2s ease-out;
  color: gray !important;
}

#nav-big {
  display: none;
}

@keyframes zoom {
  0% {
    transform: scale(1);
  }

  85% {
    transform: scale(1.3);
  }

  /* 90%{
    transform: scale(1.2);
  } */
  100% {
    transform: scale(1);
  }
}

.visible {
  color: var(--primary);
  font-size: 18px !important;
  display: flex;
  justify-content: center;
  box-shadow: 1px 1px 10px -5px #5635c5;
  background-color: #5735c529;
}

@media (min-width: 768px) {
  #nav-small {
    display: none;
  }

  #nav-big {
    display: flex;
  }
}

.nav-link {
  margin: 0 0.75rem;
  cursor: pointer;
  padding: 10px;
  font-weight: 600;
  font-size: 15px;
  border-radius: 5px;
  transition: all 0.3s;
}

.nav-link:hover {
  color: var(--primary);
}

.logo {
  font-weight: bold;
  font-size: 1.2rem;
  position: absolute;
  left: 10px;
  top: 10px;
  color: var(--primary);
}

/* Sections */
#sections {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 20px;
  transition: transform 0.8s ease-in-out;
}

.section {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 2rem;
  width: 100%;
}

.section-content {
  /* max-width: 900px; */
  width: 100%;
}

.intro-layout {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 2rem;
}

@media (min-width: 768px) {
  .intro-layout {
    width: 100%;
    flex-direction: row;
    justify-content: space-around;
  }
}

.greeting {
  font-size: 1.5rem;
  margin-bottom: 0.5rem;
}

.introduction {
  font-size: 3rem;
  font-weight: 600;
}

.name {
  color: var(--primary);
}

.role {
  font-size: 1.2rem;
  color: black;
  margin: 1rem 0;
  font-weight: 600;
  transition: all .2s ease-in;
}

.cta-button {
  background: var(--primary);
  color: white;
  padding: 0.75rem 1.5rem;
  border: none;
  margin: 5px;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 600;
  animation: lightning 1.5s 2;
  cursor: pointer;
  transition: background 0.3s;
}
.cta-button2 {
  background: var(--primary);
  color: white;
  padding: 0.75rem 1.5rem;
  border: none;
  margin: 5px;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s;
}

.cta-button:hover {
  background: #5635c5;
}

#illustration {
  max-width: 400px;
  width: 100%;
  transition: transform 0.4s ease;
  filter: drop-shadow(2px 2px 100px #9a81ea);
}

.projects {
  display: grid;
  gap: 1.5rem;
  margin-top: 2rem;
  text-align: left;
}

.projects li {
  list-style: none;
  padding: 1rem;
  border-radius: 10px;
  background: white;
  box-shadow: 0 4px 10px var(--shadow);
}

.projects li strong {
  display: block;
  color: var(--primary);
  font-size: 1.1rem;
}

.tech-icons {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
  margin-top: 2rem;
}

.tech-icons span {
  background: var(--primary);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 20px;
  font-weight: 500;
  font-size: 0.95rem;
}

blockquote {
  font-style: italic;
  font-size: 1.2rem;
  color: #444;
  margin: 1rem 0;
}

cite {
  color: #999;
  font-size: 0.9rem;
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  max-width: 500px;
  margin: 2rem auto 0;
}

.contact-form input,
.contact-form textarea {
  padding: 1rem;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  resize: vertical;
}

.contact-form button {
  background: var(--primary);
  color: white;
  padding: 0.75rem;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s;
}

.contact-form button:hover {
  background: #5635c5;
}

/* Footer */
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 90px;
  pointer-events: none;
}

.yellow-wave {
  position: absolute;
  left: -30px;
  animation: waveMotion 4s ease-in-out infinite;
}

@keyframes waveMotion {
  0% {
    transform: translateY(0);
  }

  50% {
    transform: translateY(8px);
  }

  100% {
    transform: translateY(0);
  }
}

#w1 {
  transform: scale(2, 1);
  animation-delay: 0s;
}

#w2 {
  transform: scale(2, 1) translateX(20px) rotate(3deg);
  opacity: .8;
  animation-delay: 0.2s;
}

#w3 {
  transform: scale(3, 1) translateX(30px) translateY(60px) rotate(20deg);
  opacity: .7;
  animation-delay: 0.4s;
}

#w4 {
  transform: scale(3, 1) translateX(90px) rotate(35deg) translateY(50px);
  opacity: .6;
  animation-delay: 0.6s;
}

.highlight {
  color: var(--primary);
  font-weight: 700;
}

.subhead {
  font-size: 1.2rem;
  color: #666;
  font-weight: 600;
  margin-bottom: 1.5rem;
}

.projects li p {
  margin: 0.25rem 0 0;
  color: #555;
}

.skill-bar {
  margin: 1rem 0;
  width: 100%;
}

.skill-bar label {
  font-weight: 600;
  margin-bottom: 0.5rem;
  display: block;
}

.bar {
  height: 10px;
  background: #ddd;
  border-radius: 5px;
  overflow: hidden;
}

.fill {
  height: 100%;
  background: var(--primary);
  width: 0;
  transition: width 1.5s ease;
  border-radius: 5px;
}

.carousel {
  position: relative;
  width: 100%;
  overflow: hidden;
  max-width: 600px;
  margin: auto;
}

.slide {
  display: none;
  animation: fadeIn 1s ease-in-out;
}

.slide.active {
  display: block;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
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
  box-shadow: 1px 2px 15px -3px var(--primary);
  text-align: left;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
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



.footer {
  z-index: -1;
}

html {
  scroll-behavior: smooth;
}
</style>