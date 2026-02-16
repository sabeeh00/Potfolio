// Header Toggle

let MenuBtn = document.getElementById("MenuBtn")

MenuBtn.addEventListener('click', function (e) {
  document.querySelector('body').classList.toggle('mobile-nav-active')
  this.classList.toggle('fa-xmark')
})

// Typing Effect

let typed = new Typed('.auto-input', {
  strings: ['Front-End Developer!', 'WordPress Developer!'],
  typeSpeed: 70,
  backSpeed: 70,
  backDelay: 2000,
  loop: true,
})
// Active link State on scroll

// Get All link 
let navlink = document.querySelectorAll('nav ul li a');
// Get All Sections
let sections = document.querySelectorAll('section');
console.log(sections)

window.addEventListener('scroll', function () {
  const scrollPos = window.scrollY
  sections.forEach(section => {
    if (scrollPos > section.offsetTop && scrollPos < (section.offsetTop + section.offsetHeight)) {
      navlink.forEach(link => {
        link.classList.remove('active');
        if (section.getAttribute('id') === link.getAttribute('href').substring(1)) {
          link.classList.add('active')
        }
      });
    }
  });
});

// Form submitt

var form = document.getElementById('Form');
form.addEventListener("submit", e => {
  e.preventDefault();
  fetch(form.action, {
    method: "POST",
    body: new FormData(document.getElementById("Form")),
  }).then(
    response => response.json()
  ).then((data) => {
    if (data.status === 'success') {
      alert(data.message);
      window.open('index.html', '_self');
    } else {
      console.error('Error:', data.message);
      alert('There was an error sending your message.');
    }
  });
});