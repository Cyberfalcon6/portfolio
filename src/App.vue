<template>
  <div id="shell">
    <nav id="nav-small">
      <div class="logo padded">0X3B</div>
      <div class="work padded">My work</div>
      <div class="contact padded">Reach me</div>
    </nav>
    <nav id="nav-big">
      <div class="logo padded">0X3B</div>
      <div class="offers">Offers</div>
      <div class="stack">Tech-stack</div>
      <div class="work padded">My work</div>
      <div class="testimonials">Testimonials</div>
      <div class="contact">Contact</div>
      <div class="contact padded">Reach me</div>
    </nav>
    <div id="content">
      <div class="group">
        <div class="greeting">Hello there,</div>
        <div class="introduction">I'm <div class="name">Japhet</div>
        </div>
        <div class="role">A full-stack web developer&lt;/></div>
      </div>
      <div class="reach padded"> Reach me </div>
      <img src="./assets/web-development.png" id="illustration" alt="">
    </div>
    <div class="footer">
      <img src="./assets/yellow-wave.png" id="w1" class="yellow-wave" alt="">
      <img src="./assets/yellow-wave.png" id="w2" class="yellow-wave" alt="yello">
      <img src="./assets/yellow-wave.png" id="w3" class="yellow-wave" alt="yello">
      <img src="./assets/yellow-wave.png" id="w4" class="yellow-wave" alt="yello">
    </div>
  </div>
</template>
<script>
export default({
  name:"App"
})
</script>
<style>
:root {
  --primary: #673EE6;
  --secondary: #E6D53C;
  --tertiary: #FD5165;
  --gray: #E7E5EC;
}
.padded{
  padding: 7px;
  border-radius: 10px;
}
.logo{
  background-color: white;
  color: var(--primary);
}
#nav-big{
  display: none;
}
.h-flex{
  display: flex;
  justify-content: space-around;
}
@media(min-width: 768px){
  #content {
  display: flex;
  flex-direction: row;
  gap: 20px;
  align-items: center;
  overflow: scroll;
  justify-content: space-between;
  flex: 1;
  padding: 10px;
}
}
.greeting{
  align-self: flex-start;
  margin: 5px 20px;
}
.footer{
  position: relative;
  max-height: 90px;
  min-height: 70px;
}
.reach{
  background-color: var(--tertiary);
  color: white;
  padding: 15px;
}
#illustration{
  width: 100%;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.yellow-wave{
  position: absolute;
  left: -30px;
}
#w1{
  transform: scale(2, 1);
}
#w2{
  transform: scale(2, 1) translateX(20px) rotate(3deg);
  opacity: .8;
}
#w3{
  transform: scale(3, 1) translateX(30px) translateY(60px) rotate(20deg);
  opacity: .7;
}
#w4{
  transform: scale(3, 1) translateX(90px) rotate(35deg) translateY(50px);
  opacity: .6;
}
#shell {
  position: fixed;
  width: 100%;
  background-color: var(--gray);
  height: 100%;
  display: flex;
  color: var(--primary);
  font-weight: 600;
  flex-direction: column;

}
.introduction{
  font-size: 55px;
  display: flex;
  align-items: center;
  text-wrap: nowrap;
  gap: 10px;
}
.name{
  font-weight: 800;
}

#nav-small {
  height: 50px;
  display: flex;
  padding: 10px;
  padding-top: 25px;
  justify-content: space-between;
  align-items: center;
}
.work{
  color: white;
  background-color: var(--primary);
  font-weight: 700;
  padding: 12px;
}
#content {
  display: flex;
  flex-direction: column;
  gap: 20px;
  align-items: center;
  overflow: scroll;
  justify-content: space-between;
  flex: 1;
  padding: 10px;
}
</style>
