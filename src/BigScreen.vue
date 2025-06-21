<template>
  <div class="hero">
    <nav class="navbar">
      <div class="logo">0x38</div>
      <ul class="nav-links">
        <li><a href="#offers">Offers</a></li>
        <li><a href="#tech">Tech-stack</a></li>
        <li><a href="#work" class="active">my work</a></li>
        <li><a href="#testimonials">Testimonials</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>

    <section class="intro">
      <div class="text-section">
        <p class="greeting">Hello there,</p>
        <h1>I’m <span class="highlight">Japhet</span></h1>
        <p class="subtitle">A full-stack web Developer</p>
        <button class="reach-button">Reach me</button>
      </div>
      <div class="image-section">
        <img src="@/assets/developer-illustration.png" alt="Japhet illustration" class="illustration">
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: 'HeroSection',
};
</script>

<style scoped>
.hero {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(to bottom, #f8f8fb, #fff8dc);
  padding: 0;
  margin: 0;
  height: 100vh;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.5rem 3rem;
  background-color: transparent;
}

.logo {
  font-weight: bold;
  font-size: 1.5rem;
  background-color: white;
  padding: 0.5rem 1rem;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.nav-links {
  display: flex;
  list-style: none;
  gap: 2rem;
}

.nav-links a {
  text-decoration: none;
  color: #5e3ef6;
  font-weight: 500;
}

.nav-links .active {
  background-color: #5e3ef6;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 8px;
}

.intro {
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 4rem 2rem;
}

.text-section {
  max-width: 40%;
}

.greeting {
  font-size: 1.2rem;
  color: #6b6b6b;
}

.highlight {
  color: #5e3ef6;
  font-size: 3rem;
  font-weight: bold;
}

.subtitle {
  margin-top: 0.5rem;
  color: #5e3ef6;
  font-weight: 500;
}

.reach-button {
  margin-top: 1.5rem;
  background-color: #ff6464;
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 8px;
  font-size: 1rem;
  cursor: pointer;
}

.image-section .illustration {
  max-width: 350px;
  height: auto;
}
</style>