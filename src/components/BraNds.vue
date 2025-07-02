<template>
  <section class="brands-section">
    <div class="brands-container">
      <h2 class="section-title">
        <span class="gradient-text">🚀 Brands I Work With</span>
      </h2>

      <div class="brands-grid">
        <div v-for="brand in brands" :key="brand.name" class="brand-card">
          <img :src="brand.logo" :alt="brand.name" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const brands = [
  {
    name: "Spotify",
    logo: "https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg"
  },
  {
    name: "Google",
    logo: "https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg"
  },
  {
    name: "Amazon",
    logo: "https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg"
  },
  {
    name: "Figma",
    logo: "https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg"
  },
  {
    name: "Netflix",
    logo: "https://upload.wikimedia.org/wikipedia/commons/6/69/Netflix_logo.svg"
  },
  {
    name: "Adobe",
    logo: "https://upload.wikimedia.org/wikipedia/commons/d/dc/Adobe_Systems_logo_and_wordmark.svg"
  }
]
</script>

<style scoped>
.brands-section {
  background: #fef7f2;
  padding: 80px 20px;
  text-align: center;
}

.section-title {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 40px;
}

.gradient-text {
  background: linear-gradient(to right, #6c2bd9, #aa3ffb);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.brands-container {
  max-width: 1000px;
  margin: 0 auto;
}

.brands-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
  gap: 30px;
  justify-items: center;
}

.brand-card {
  background: white;
  padding: 20px;
  border-radius: 20px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100px;
}

.brand-card img {
  max-height: 50px;
  max-width: 100%;
  object-fit: contain;
}

.brand-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
}
</style>
