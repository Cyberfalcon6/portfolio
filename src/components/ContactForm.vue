<template>
  <section class="contact-section">
    <div class="contact-card">
      <h2 class="form-title">
        <span class="gradient-text"> Let's Connect</span>
      </h2>

      <!-- Form -->
      <form @submit.prevent="handleSubmit" class="form-grid" v-if="!formSent">
        <div class="form-group">
          <label for="name">Name</label>
          <input v-model="form.name" type="text" id="name" required />
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input v-model="form.email" type="email" id="email" required />
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea v-model="form.message" id="message" rows="5" required></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="submit-btn">Send Message</button>
        </div>
      </form>

      <!-- Success Message -->
      <div v-else class="success-message">
        <HugeiconsIcon :icon="CheckmarkCircleIcon" :size="50" color="#6c2bd9" />
        <h3>Message Sent!</h3>
        <p>I'll get back to you soon — or connect via the socials below.</p>
        <button @click="resetForm" class="reset-btn">Send Another</button>
      </div>

      <!-- Divider -->
      <div class="divider">
        <span>or reach me on</span>
      </div>

      <!-- Social Media Icons -->
      <div class="social-icons">
        <a href="https://twitter.com/Cyberfalcon6600" target="_blank" class="icon twitter" title="Twitter">
          <HugeiconsIcon :icon="TwitterIcon" :size="25" color="#673EE6" />
        </a>
        <a href="https://github.com/cyberfalcon6" target="_blank" class="icon github" title="GitHub">
          <HugeiconsIcon :icon="Github01Icon" :size="25" color="black" />
        </a>
        <a href="https://www.linkedin.com/in/niyogakiza-japhet-66b272248/" target="_blank" class="icon linkedin" title="LinkedIn">
          <HugeiconsIcon :icon="Linkedin01Icon" :size="25" color="blue" />
        </a>
        <a href="mailto:you@example.com" class="icon mail" title="Email">
          <HugeiconsIcon :icon="Mail01Icon" :size="25" color="black" />
        </a>
      </div>
    </div>
  </section>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { HugeiconsIcon } from '@hugeicons/vue'
import {
  Github01Icon,
  TwitterIcon,
  Linkedin01Icon,
  Mail01Icon,
  CheckmarkCircleIcon
} from '@hugeicons/core-free-icons/index'

const form = reactive({
  name: '',
  email: '',
  message: ''
})

const formSent = ref(false)

const handleSubmit = () => {
  formSent.value = true
  // Connect to your real backend here
}

const resetForm = () => {
  form.name = ''
  form.email = ''
  form.message = ''
  formSent.value = false
}
</script>

<style scoped>
/* General Layout */
.contact-section {
  min-height: 100vh;
  background: #fef7f2;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 20px;
}

.contact-card {
  background: #ffffffdd;
  border-radius: 24px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
  max-width: 650px;
  width: 100%;
  padding: 40px;
  backdrop-filter: blur(12px);
  position: relative;
}

/* Title */
.form-title {
  font-size: 32px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.gradient-text {
  background: linear-gradient(to right, #6c2bd9, #aa3ffb);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Form Grid */
.form-grid {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-group label {
  font-weight: 600;
  margin-bottom: 8px;
  display: block;
  color: #444;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 14px 16px;
  border-radius: 16px;
  border: 2px solid #ddd;
  font-size: 16px;
  transition: 0.3s ease;
  background: #fff;
}

.form-group input:focus,
.form-group textarea:focus {
  border-color: #6c2bd9;
  outline: none;
}

/* Buttons */
.submit-btn,
.reset-btn {
  background-color: #6c2bd9;
  color: white;
  font-weight: 600;
  padding: 12px 28px;
  font-size: 16px;
  border: none;
  border-radius: 16px;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 4px 12px rgba(108, 43, 217, 0.3);
}

.submit-btn:hover,
.reset-btn:hover {
  background-color: #531bc7;
  transform: translateY(-2px);
}

/* Success State */
.success-message {
  text-align: center;
  font-size: 18px;
  line-height: 40px;
  animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

/* Divider */
.divider {
  text-align: center;
  margin: 40px 0 20px;
  position: relative;
}

.divider::before,
.divider::after {
  content: "";
  height: 1px;
  width: 40%;
  background-color: #ddd;
  position: absolute;
  top: 50%;
}

.divider::before { left: 0; }
.divider::after { right: 0; }

.divider span {
  color: #999;
  padding: 0 12px;
  font-size: 14px;
  background: #ffffffdd;
}

/* Social Icons */
.social-icons {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 10px;
}

.icon {
  transition: transform 0.2s ease, color 0.2s ease;
}

.icon:hover {
  transform: scale(1.2);
}
</style>
