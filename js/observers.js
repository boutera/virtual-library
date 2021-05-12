

  $('#contact-form').submit(function(e) {
    e.preventDefault();
    $('.comments').empty();
    var postdata = $('#contact-form').serialize();
    
    $.ajax({
        type: 'POST',
        url: 'php/contact.php',
        data: postdata,
        dataType: 'json',
        success: function(json) {
             
            if(json.isSuccess) 
            {
                $('#contact-form').append("<p class='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                $('#contact-form')[0].reset();
            }
            else
            {
                $('#firstname + .comments').html(json.firstnameError);
                $('#name + .comments').html(json.nameError);
                $('#email + .comments').html(json.emailError);
                $('#phone + .comments').html(json.phoneError);
                $('#message + .comments').html(json.messageError);
            }                
        }
    });
});




const header = document.querySelector("header");
const sectionOne = document.querySelector(".home-intro");

const faders = document.querySelectorAll(".fade-in");
const sliders = document.querySelectorAll(".slide-in");

const sectionOneOptions = {
  rootMargin: "-200px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
  entries,
  sectionOneObserver
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      header.classList.add("nav-scrolled");
    } else {
      header.classList.remove("nav-scrolled");
    }
  });
},
sectionOneOptions);

sectionOneObserver.observe(sectionOne);

const appearOptions = {
  threshold: 0,
  rootMargin: "0px 0px -250px 0px"
};

const appearOnScroll = new IntersectionObserver(function(
  entries,
  appearOnScroll
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      return;
    } else {
      entry.target.classList.add("appear");
      appearOnScroll.unobserve(entry.target);
    }
  });
},
appearOptions);

faders.forEach(fader => {
  appearOnScroll.observe(fader);
});

sliders.forEach(slider => {
  appearOnScroll.observe(slider);
});





