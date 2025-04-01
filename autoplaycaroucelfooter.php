<style>
body {
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-color:rgba(243, 243, 241, 0.69);
}

.carousel2 {
  width: auto;
  overflow: hidden;
  justify-content: center;
  align-items: center;
  background-origin: border-box;
  background-clip: content-box, border-box;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.wrap2 {
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: 300px;
  justify-items: stretch;
  animation: slide 130s linear infinite;
  animation-play-state: running;
}

.wrap2 img {
  width: 220px;
  height: 70px;
  object-fit: cover;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3);
}

.wrap2 img:hover {
  transform: scale(1.1);
  box-shadow: 0 8px 30px rgba(255, 255, 255, 0.8), 0 4px 20px rgba(0, 0, 0, 0.4);
  border-color: rgba(255, 255, 255, 0.8);
}

.wrap2:hover {
  animation-play-state: paused;
}

@keyframes slide {
  to {
    translate: calc(-4 * 350px);
  }
}
.text-center{
  font-size: 15px;
}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="carousel2">

      <h1 class="text-center">BRAND YOU CAN TRUST</h1>
        <div class="wrap2">
            <img src="./assets/uploads/product_photos/BRAND/MARIWASA.png" alt="">
            <img src="./assets/uploads/product_photos/BRAND/DAVIES.png" alt="">
            <img src="./assets/uploads/product_photos/BRAND/KOTEN.png" alt="">
            <img src="./assets/uploads/product_photos/BRAND/BESTANK.png" alt="">
            <img src="./assets/uploads/product_photos/BRAND/OMNI.png" alt="">
            <img src="./assets/uploads/product_photos/BRAND/TECHNOTRADE.png" alt="">
            <img src="https://www.omniphilippines.com.ph/wp-content/uploads/2016/07/site-logo.png" alt="">
            <img src="https://asahiappliances.com/wp-content/uploads/2021/08/logo2.gif" alt="">
            <img src="https://static.simonelectric.com/themes/custom/simonelectric_theme/logo.png" alt="">
            <img src="https://www.pioneer-adhesives.com/wp-content/uploads/2021/06/cropped-cropped-Pioneer-Logo-1.png" alt="pioner adhesive">
            <img src="https://asahiappliances.com/wp-content/uploads/2021/08/logo2.gif" alt="">
        </div>
    </div>
</body>
</html>

