$(document).ready(function () {

    $(".custom-s").each(function () {
        $(this).wrap("<span class='select-wrapper'></span>");
        $(this).after("<span class='holder'></span>");
    });
    $(".custom-s").change(function () {
        var selectedOption = $(this).find(":selected").text();
        $(this).next(".holder").text(selectedOption);
    }).trigger('change');
    if ($('.prod-social').length) {
        $('.prod-socialh').share({
            networks: ['facebook', 'googleplus', 'twitter']
        });
    }

    customCheckbox("custom-c");
    customRadio("custom-r");
    var pencere = $(window).width();


    var pushreg = $.cookie('pushreg');
    if (isChrome && pencere > 900 && (!$.cookie("pushreg") || $.cookie("pushreg") == "null")) {
        setTimeout(function () {
            $(".notifperm").show();
        }, 1000);
    }

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        if (history.pushState) {
            history.pushState(null, null, e.target.hash);
        } else {
            window.location.hash = e.target.hash;
        }
    });


    $(window).scroll(function () {
        if ($(window).scrollTop() >= 120) {
            $('#header').addClass('header-fix');
        } else {
            $('#header').removeClass('header-fix');
        }
    });

    if (pencere > 768) {



        function sticky_relocate() {
            var window_top = $(window).scrollTop();
            var footer_top = $("#ftr").offset().top;
            var div_top = $('#fixsidebar-anchor').offset().top;
            var div_height = $(".fixsidebar").height();

            var padding = 50;

            if (window_top + div_height > footer_top - padding)
                $('.fixsidebar').css({top: (window_top + div_height - footer_top + padding) * -1})
            else if (window_top > div_top) {
                $('.fixsidebar').addClass('stick');
                $('.fixsidebar').css({top: 120})
            } else {
                $('.fixsidebar').removeClass('stick');
            }
        }

        if ($(".fixsidebar").length) {
            $(window).scroll(sticky_relocate);
            sticky_relocate();
        }

        $(".mini-access #cart").remove();

        $("#searchprod").autocomplete({
            source: base + "/ajaxhelper.php?prod=search",
            minLength: 2,
            select: function (event, ui) {
                window.location.href = base + "/" + ui.item.id;
                return false;
            },
            create: function () {
                $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                    return $('<li>').data('ui-item.autocomplete', item).append('<a href="' + base + '/' + item.id + '"><img src="' + base + '/uploads/' + item.image + '" class="acompimg" />' + item.label + '</a>').appendTo(ul);
                };
            }
        });

        $("#searchcity2").autocomplete({
            source: base + "/ajaxhelper.php?prod=searchcity",
            minLength: 2,
            select: function (event, ui) {
                window.location.href = base + "/" + area + "/" + ui.item.uri;
                return false;
            },
            create: function () {
                $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                    return $('<li>').data('ui-item.autocomplete', item).addClass("scity").append('<a href="javascript:void(0);">' + item.label + ', ' + item.label2 + '</a>').appendTo(ul);
                };
            }
        });





        if ($(".tels").length) {
            //$(".tels").mask("0999 999 99 99");
        }


    }

    $('.sett-left').on('click', function (e) {
        e.preventDefault();
        if ($(this).hasClass("sett-act")) {
            $(".sett").stop().animate({right: "-270px"}, 300);
            $(this).removeClass("sett-act");
        } else {
            $(".sett").stop().animate({right: "0px"}, 300);
            $(this).addClass("sett-act");
        }
    });

    $(".wsb").click(function () {
        var tel = $("#tel").val();
        var mt = encodeURIComponent($("#ws").val());
        window.location = "https://api.whatsapp.com/send?phone=" + tel + "&text=" + mt;
    });


    if ($('.mainslider').length) {
        $('.mainslider').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                }
            }
        });
    }


    $(".owl-carousel-main").each(function (index) {
        var itm = $(this).data('itm');
        $(this).owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                640: {
                    items: 2
                },
                800: {
                    items: itm
                }
            }
        });
    });

    $(".owl-carousel-main-top").each(function (index) {
        var itm = $(this).data('itm');
        $(this).owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                640: {
                    items: 2
                },
                800: {
                    items: 6
                }
            }
        });
    });


// placeholder for ie
    if ($('.placeholder2').length) {
        $('.placeholder2').placeholder();
    }

// thumb photo
    $(".thumbphoto").click(function () {
        var src = $(this).attr("data-zoom-image");
        $("#image").attr("src", src);
    });
    $(".FilterItem").click(function () {
        $(this).toggleClass("selected-filter");
    });
    $(".maincitychange").change(function () {
        if ($(this).val() !== "") {
            window.location = $(this).val();
        }
    });
    $('html').click(function () {
        $('.user-login-div').hide();
        $('.order-form-div').hide();
        $('.user-login').removeClass("highlight");
        $('.order-form').removeClass("highlight");

    });
    $('.user-login').click(function (e) {
        e.stopPropagation();
    });
    $('.order-form').click(function (e) {
        e.stopPropagation();
    });

    $(document).mouseup(function (e) {
        var container = $("#cart");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#cart').removeClass('active');
            $('#cart').removeClass('highlight');
        }
    });


    /*$('.user-login').hover(function () {
     $('.user-login-div').css("display","block");
     }, function(){
     $('.user-login-div').css("display","none");
     });*/

    $('.user-login .open-div').click(function (e) {
        $('.user-login-div').toggle();
        $('.user-login').toggleClass("highlight");
        $(".order-form-div").css("display", "none");
        $('.order-form').removeClass("highlight");
        $('#cart').removeClass("highlight");
    });

    $('.order-form .open-div').click(function (e) {
        $('.order-form-div').toggle();
        $('.order-form').toggleClass("highlight");
        $(".user-login-div").css("display", "none");
        $('.user-login').removeClass("highlight");
        $('#cart').removeClass("highlight");
    });

    $(".return-forget").click(function () {
        $(".login-form-div").fadeOut("fast", function () {
            $(".forget-form-div").fadeIn("fast");
        });
    });
    $(".return-login").click(function () {
        $(".forget-form-div").fadeOut("fast", function () {
            $(".login-form-div").fadeIn("fast");
        });
    });


    $(document).on("click", ".couponbutton", function () {
        var vr = $("#coupon").val();
        if (vr != "") {
            var postvar = "type=coupon&couponcode=" + vr;
            ajax("GET", base + "/ajaxhelper.php", postvar, ".coupon-area", function (data) {
                $(".coupon-area").html(data);
            });
        }
    });

    $(document).on("click", ".deletecoupon", function () {
        var postvar = "type=deletecoupon";
        ajax("GET", base + "/ajaxhelper.php", postvar, ".mini-cart-total", function (data) {
        });
        $('#cart .contents').load(base + '/ajaxhelper.php?type=mybasket');
    });

    $(document).on("click", ".tryagaincoupon", function () {
        $('#cart .contents').load(base + '/ajaxhelper.php?type=mybasket');
    });

    $(document).on("click", ".deleteproduct", function () {
        var vr = $(this).attr("id");
        var postvar = "type=deletebasketproduct&gid=" + vr;
        ajax("GET", base + "/ajaxhelper.php", postvar, ".mini-cart-total", function (data) {
            $("#cart-total").html(data);
        });
        $('#cart .contents').load(base + '/ajaxhelper.php?type=mybasket');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
    $(".scroll-top").click(function () {
        $("html, body").animate({scrollTop: 0}, 800);
        return false;
    });




    $("#devamcontent").click(function () {
        $('#devamcontentbox').toggle("slide");
    });

    $('#cart .carttrigger, .mobile-cart a').on('click', function () {
        $('#cart').toggleClass("highlight");
        if ($('#cart').hasClass('active')) {
            $('#cart').removeClass('active');

        } else {
            $('#cart').addClass('active');
            $('#cart .contents').load(base + '/ajaxhelper.php?type=mybasket');
        }
    });


    $(".search-form").submit(function () {
        var word = $("#searchprod").val();
        var lengthx = $("#searchprod").val().length;
        if (lengthx < 2) {
            return false;
        }
        $(".search-form").attr("action", base + "/" + src + "/" + word);
        window.location = base + '/' + src + '/' + word;
    });


    $(".basket-info-header").on("mouseenter", function (event) {
        $('.member-basket-detail').stop().slideToggle();
    }).on("mouseleave", function (event) {
        $('.member-basket-detail').stop().slideToggle();
    });

    $("#discprod").click(function () {

        if ($(this).is(":checked")) {
            window.location = $(this).val();
        } else {
            var nurl = location.href.replace("indirim=1", "indirim=0");
            window.location = nurl;
        }
    });

    $(".catfilter").click(function () {
        if ($(this).is(":checked")) {
            window.location = $(this).val();
        }
    });
    $(".cat-list-select-box").change(function () {
        if ($(this).val() !== "") {
            window.location = $(this).val();
        }
    });


    $(".search").click(function () {
        $("#mobilesearchdiv").hasClass("topshow") ? $("#mobilesearchdiv").removeClass("topshow") : $("#mobilesearchdiv").addClass("topshow")
    });
    $(".remove-search").click(function () {
        $("#mobilesearchdiv").hasClass("topshow") ? $("#mobilesearchdiv").removeClass("topshow") : $("#mobilesearchdiv").addClass("topshow")
    });

    $(".newsbut").click(function () {
        $("#newsletter-form").validate({
            rules: {
                eposta: {required: true, email: true}
            },
            showErrors: function (errorMap, errorList) {
                $("#newsletter-form .customerrorbox").html("Lütfen geçerli eposta adresi girin");
                if (this.numberOfInvalids() > 0) {
                    $("#newsletter-form .customerrorbox").show();
                } else {
                    $("#newsletter-form .customerrorbox").hide();
                }
            },
            errorPlacement: function (error, element) {
                return false;
            }
        });
    });


    $(".login-btn").click(function () {

        $("#login-form").validate({
            rules: {
                username: {required: true, email: true},
                password: {required: true, minlength: 5}
            },
            showErrors: function (errorMap, errorList) {
                $("#login-form .customerrorbox").html("Eposta adresiniz veya şifreniz hatalı");
                if (this.numberOfInvalids() > 0) {
                    $("#login-form .customerrorbox").show();
                } else {
                    $("#login-form .customerrorbox").hide();
                }
            },
            errorPlacement: function (error, element) {
                return false;
            }

        });
    });

    $(".order-query-btn").click(function () {
        $("#order-query-form").validate({
            rules: {
                username: {required: true, email: true},
                orderno: {required: true}
            },
            showErrors: function (errorMap, errorList) {
                $("#order-query-form .customerrorbox").html("Eposta adresiniz veya sipariş numaranız hatalı");
                if (this.numberOfInvalids() > 0) {
                    $("#order-query-form .customerrorbox").show();
                } else {
                    $("#order-query-form .customerrorbox").hide();
                }
            },
            errorPlacement: function (error, element) {
                return false;
            }

        });
    });


    $(".forget-btn").click(function () {
        $("#forget-form").validate({
            rules: {
                usernamef: {required: true, email: true}
            },
            messages: {
                usernamef: "Lütfen geçerli eposta adresi girin"
            },
            showErrors: function (errorMap, errorList) {
                $("#forget-form .customerrorbox").html("Lütfen geçerli eposta adresi girin");
                if (this.numberOfInvalids() > 0) {
                    $("#forget-form .customerrorbox").show();
                } else {
                    $("#forget-form .customerrorbox").hide();
                }
            },
            errorPlacement: function (error, element) {
                return false;
            }

        });
    });

    $(".addr-add").click(function () {
        $("#addr-form").validate({
            rules: {
                alias: {required: true},
                addrtype: {required: true},
                ctel: {required: true},
                add: {required: true},
                il: {required: true},
                ilce: {required: true}
            },
            showErrors: function (errorMap, errorList) {
                $("#addr-form .login-sub-title .warn").html("Lütfen tüm alanları doldurun");
                if (this.numberOfInvalids() > 0) {
                    $("#addr-form .login-sub-title .warn").show();
                } else {
                    $("#addr-form .login-sub-title .warn").hide();
                }
            },
            errorPlacement: function (error, element) {
                return false;
            }
        });
    });



    if (pencere <= 768) {

        $(".footer-menu a").each(function () {
            var el = $(this);
            var t = "";

            if (el.attr("href") != "javascript:void(0)") {
                t = "-> ";
            }
            $("<option />", {
                "value": el.attr("href"),
                "text": t + " " + el.text()
            }).appendTo(".footer-select");
        });

        $('.footer-select').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });

    }

    if (pencere <= 980) {

        $(".user-area-header").hover(function (event) {
            $('.member-menu-detail').stop().slideToggle();
        });

        $('#desktop-user-login .user-login-div').clone(true, true).appendTo('#mobile-user-login');
        $('#desktop-user-login .user-login-div').remove();
        $(".links #cart").remove();

        if ($(".topbar .member-link").length > 0) {
            $('#mobile-user-login .open-div').after().append("<div class=\"user-login-div\"><ul class=\"member-mobile-nav\"></ul></div> ");
            $('.topbar .member-link').clone(true, true).appendTo('#mobile-user-login .open-div .user-login-div ul');
            $('.topbar .member-link').remove();
        }

        $('.list-pgroup').remove();

        $('#search').clone(true, true).appendTo('#mobilesearchdiv');


        $('.menu').appendTo('#drilldown');
        $(".m-menu .menu").remove();
        $('#drilldown .menuicon').remove();
        $('#drilldown .newtag').remove();
        $('#drilldown div').contents().unwrap();

        var $breadcrumbs = $(".skin-classic-light.breadcrumbs");
        var $drillDown = $("#drilldown");
        var $current = $("#current");
        var $back = $("#back");

        if ($('#drilldown').length) {
            $drillDown.ctDrillDown({
                duration: 150,
                onOpened: manageBreadcrumbs,
                onClosed: manageBreadcrumbs
            });

            $back.click(function () {
                $drillDown.ctDrillDown("goUp", 1);
                return false;
            });

            manageBreadcrumbs();

            function manageBreadcrumbs() {
                var breadcrumbs = $drillDown.ctDrillDown("getBreadcrumbs");
                if (breadcrumbs.length < 2) {
                    $back.fadeOut();
                } else {
                    $back.fadeIn();
                }
                var current = breadcrumbs.pop();
                $current.html(current.text());
            }

        }

        function hasParentClass(e, classname) {
            if (e === document)
                return false;
            if (classie.has(e, classname)) {
                return true;
            }
            return e.parentNode && hasParentClass(e.parentNode, classname);
        }

        // http://coveroverflow.com/a/11381730/989439
        function mobilecheck() {
            var check = false;
            (function (a) {
                if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
                    check = true
            })(navigator.userAgent || navigator.vendor || window.opera);
            return check;
        }

        function init() {

            var container = document.getElementById('st-container'),
                    buttons = Array.prototype.slice.call(document.querySelectorAll('#st-trigger-effects > .btn-mobile-menu')),
                    // event type (if mobile use touch events)
                    eventtype = mobilecheck() ? 'touchstart' : 'click',
                    resetMenu = function () {
                        classie.remove(container, 'st-menu-open');
                    },
                    bodyClickFn = function (evt) {
                        if (!hasParentClass(evt.target, 'st-menu')) {
                            resetMenu();
                            document.removeEventListener(eventtype, bodyClickFn);
                        }
                    };





            buttons.forEach(function (el, i) {
                var effect = el.getAttribute('data-effect');

                el.addEventListener(eventtype, function (ev) {
                    ev.stopPropagation();
                    ev.preventDefault();
                    /*container.className = 'st-container'; // clear
                     classie.add(container, effect);
                     setTimeout(function () {
                     classie.add(container, 'st-menu-open');
                     }, 25);
                     document.addEventListener(eventtype, bodyClickFn);*/
                    if (classie.hasClass(container, 'st-menu-open')) {
                        resetMenu();
                    } else {
                        container.className = 'st-container'; // clear
                        classie.add(container, effect);
                        setTimeout(function () {
                            classie.add(container, 'st-menu-open');
                        }, 25);
                        document.addEventListener(eventtype, bodyClickFn);
                    }
                });
            });

        }

        init();


    }

});

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/tr_TR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));