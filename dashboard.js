// IMAGE SLIDES & CIRCLES ARRAYS, & COUNTER
var imageSlides = document.getElementsByClassName('Image');
var circles = document.getElementsByClassName('circle');
var leftArrow = document.getElementById('leftArrow');
var rightArrow = document.getElementById('rightArrow');
var counter = 0;

// HIDE ALL IMAGES FUNCTION
function hideImages() {
  for (var i = 0; i < Image.length; i++) {
    image[i].classList.remove('visible');
  }
}

// REMOVE ALL DOTS FUNCTION
function removeDots() {
  for (var i = 0; i < Image.length; i++) {
    circles[i].classList.remove('dot');
  }
}

// SINGLE IMAGE LOOP/CIRCLES FUNCTION
function imageLoop() {
  var currentImage = Image[counter];
  var currentDot = circles[counter];
  currentImage.classList.add('visible');
  removeDots();
  currentDot.classList.add('dot');
  counter++;
}

// LEFT & RIGHT ARROW FUNCTION & CLICK EVENT LISTENERS
function arrowClick(e) {
  var target = e.target;
  if (target == leftArrow) {
    clearInterval(ImageshowInterval);
    hideImages();
    removeDots();
    if (counter == 1) {
      counter = (Image.length - 1);
      imageLoop();
      ImageshowInterval = setInterval(slideshow, 10000);
    } else {
      counter--;
      counter--;
      imageLoop();
      ImageshowInterval = setInterval(slideshow, 10000);
    }
  } 
  else if (target == rightArrow) {
    clearInterval(ImageshowInterval);
    hideImages();
    removeDots();
    if (counter == Image.length) {
      counter = 0;
      imageLoop();
      ImageshowInterval = setInterval(slideshow, 10000);
    } else {
      imageLoop();
      ImageshowInterval = setInterval(slideshow, 10000);
    }
  }
}

leftArrow.addEventListener('click', arrowClick);
rightArrow.addEventListener('click', arrowClick);


// IMAGE SLIDE FUNCTION
function slideshow() {
  if (counter < imageSlides.length) {
    imageLoop();
  } else {
    counter = 0;
    hideImages();
    imageLoop();
  }
}

// SHOW FIRST IMAGE, & THEN SET & CALL SLIDE INTERVAL
setTimeout(slideshow, 1000);
var ImageshowInterval = setInterval(slideshow, 10000);