(function($) {
  let win = $(window);
  let doc = $(document);

  doc.ready(function() {
    // init slider for testimonaials
    if ( $('.carousel') ) { $('.carousel').carousel(); }
    // Page Builder API call
    pageBuilderInit();
    $('#converKitSubmit').on("click", function() { pageBuilderSubmit($('#converKitSubmit')); return false; } );
    // Mobile init
    $('.openMobile').on("click", function() {
      let mobile_nav = $('#mobile_nav');
      if ( mobile_nav.hasClass("open") ) {
        mobile_nav.removeClass("open");
      } else {
        mobile_nav.addClass("open");
      }
      return false;
    });

    $('#main_menu a').each(function() {
      let mobileMenu = $('#mobile_nav_inner');
      let link = $(this).attr("href");
      let title = $(this).html();
      if ( link != "" && link!= "#" ) {
      	mobileMenu.append('<a href="' + link + '" class="mobileMenuItem">' + title + '</a>');
      }
    });
    // If link is clicked and is discover
    $('body a').click(function() {
      let link = $(this).attr("href");
      if ( link == "#discovercall" || link == "#mystory" || link == "#brandauditcal" ) {
        $('html, body').animate({
            scrollTop: ( $(link).offset().top - 150 )
        }, 2000);
        return false;
      }
    });
    // Contact page
    $("#contactSubmit").on("click", function() {
      let emptyArr = [];
      let main_email = $("#main_email").val();
      let f_name = $("#f_name").val();
      let f_email = $("#f_email").val();
      let f_subject = $("#f_subject").val();
      let f_message = $("#f_message").val();
      let data = { main_email : main_email, f_name : f_name, f_email : f_email, f_subject : f_subject, f_message : f_message };

      $.each(data, function(i, val) {
        if ( val == "" || val == "undefined" ) {
          alert("Please fill in all required fields.");
          emptyArr.push(data[i]);
          return false;
        }
      });

      if ( emptyArr.length > 0 ) {
        return false;
      } else {
        var request = new XMLHttpRequest();

        request.open("POST", ajaxurl + "?action=contactFormSubmit", true);

        request.onreadystatechange = function() {
          if(this.readyState === 4 && this.status === 200) {
            let res = this.responseText;
            if ( res.error ) {
              fireToast("Something went wrong, please try again later.");
            } else {
              $("#contactForm").fadeOut(500, function() {
                $("#contactForm").html("<p>" + res + "</p>").fadeIn(500);
              });
            }
          }
        }

        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    		request.send("main_email=" + main_email + "&f_name=" + f_name + "&f_email=" + f_email + "&f_subject=" + f_subject + "&f_message=" + f_message);
      }

      return false;
    });
  });

  win.on("load", function() {
    // load events
    // hide loader
    $("#loaderWrap").addClass("loaded");
    setTimeout(function() {
      $("#loaderWrap").remove();
    }, 1000);
  });

  win.on("scroll", function () {
    let topPos = win.scrollTop();
    let scrollLoc = $('.scrollLoc');
    let docH = $(document).innerHeight();
    let docTop = topPos * 1.25;
    // scroll progress
    scrollLoc.css({
      width : (( docTop / docH ) * 100) + "%"
    });
    // scrollevents
    if ( topPos > 50 ) {
      $('#mainMenu').addClass("scrolled");
    } else {
      $('#mainMenu').removeClass("scrolled");
    }

    // Scroll content
    if ( $('.scrollFade') ) {
      $('.scrollFade').each(function() {
        let target = $(this);
        let postion = $(this).offset();
        let posTop = postion.top - 500;
        if ( $(this).isInViewport() ) {
          target.addClass("show");
        } else {
          if ( topPos >= posTop ) {
            $(this).addClass("show");
          } else {
            $(this).removeClass("show");
          }
        }
      });
    }
    // Scroll Elements
    $('.scrollThis').each(function() {
      let scrollfactor = $(this).data("scrollfactor");
      let scollPx = topPos / scrollfactor;
      $(this).css({
        "transform" : "translateY(-" + scollPx + 'px)',
        "-webkit-transform" : "translateY(-" + scollPx + 'px)',
        "-moz-transform" : "translateY(-" + scollPx + 'px)'
      });
    });
  });

  // converKit API
  // Geting ID for form and sending form to API to be processed
  function pageBuilderInit() {

    var request = new XMLHttpRequest();

    request.open("POST", ajaxurl + "?action=getConvertInfo", true);

    request.onreadystatechange = function() {
      if(this.readyState === 4 && this.status === 200) {
        let res = JSON.parse(this.responseText);
          $('#formID').attr("value", res.forms[0].id);
      }
    }

    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send();

  }

  function pageBuilderSubmit(target) {
    let id = target.parent().find("#formID").val();
    let firstname = target.parent().find("#c_first_name").val();
    let email = target.parent().find("#c_email").val();

      if ( firstname == "" | email == "" ) {
        fireToast("Please fill in all required fields.");
        return false;
      } else {

        var request = new XMLHttpRequest();

        request.open("POST", ajaxurl + "?action=addConvertSub", true);

        request.onreadystatechange = function() {
          if(this.readyState === 4 && this.status === 200) {
            let res = JSON.parse(this.responseText);

            if ( res.error ) {
              fireToast(res.message);
            } else {
              $("#converKitForm").fadeOut(500, function() {
                $("#converKitForm").addClass("success");
                $("#converKitForm").html("<h3>Success!</h3><p>" + res.message + "</p>").fadeIn(500);
              });
            }

          }
        }

      }

      request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  		request.send("formid=" + id + "&firstname=" + firstname + "&email=" + email);

    return false;
  }

  // Reusable functions
  // fireToast
  function fireToast(text) {
    var d = new Date();
    let toastContent = '<div id="toaster" role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">' +
                        '<div class="toast-header">' +
                          '<strong class="mr-auto">Wait a moment...</strong>' +
                          '<small>' + d.toLocaleTimeString() + '</small>' +
                          '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                          '</button>' +
                        '</div>' +
                        '<div class="toast-body">' +
                          text +
                        '</div>' +
                      '</div>';
    let toast = $(toastContent);
    $('body').append(toast);
    $("#toaster").toast("show");
    $('#myToast').on('hidden.bs.toast', function () {
      $("#toaster").remove();
    })
  }

})(jQuery);
