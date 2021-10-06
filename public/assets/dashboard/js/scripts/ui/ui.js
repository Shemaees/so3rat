// ***************************************************************************************
// Body Click Event
// ***************************************************************************************

$('body').click(function () {
    closeAnyDropDown();
});

// ***************************************************************************************
// Window Scroll Event
// ***************************************************************************************

$(window).scroll(function () {
    closeAnyDropDown();
});

// ***************************************************************************************
// Function to get language
// ***************************************************************************************
window.getLang =function getLang() {
    var lang = $('html').attr('lang');
    if (lang == 'ar') {
        return true;
    }
    else {
        return false;
    }
}

window.animateCSS =(element, animation, prefix = 'animate__') =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
        const animationName = `${prefix}${animation}`;
        const node = document.querySelector(element);

        node.classList.add(`${prefix}animated`, animationName);

        // When the animation ends, we clean the classes and resolve the Promise
        function handleAnimationEnd(event) {
            event.stopPropagation();
            node.classList.remove(`${prefix}animated`, animationName);
            resolve('Animation ended');
        }

        node.addEventListener('animationend', handleAnimationEnd, {once: true});
    })

// ***************************************************************************************
// Check element display property
// ***************************************************************************************

window.elementDisplayed =function elementDisplayed(element) {
    const elementDisplayValue = element.css('display');
    return (elementDisplayValue != 'none' ? true : false);
}

// ***************************************************************************************
// Function to window size
// ***************************************************************************************
window.getWindowSize =function getWindowSize() {
    const window_size = $(window).width();
    return window_size;
}

// ***************************************************************************************
// Function to show and hide element
// ***************************************************************************************
window.showElement =function showElement(element, duration = 0) {
    element.show(duration);
}

window.hideElement =function hideElement(element, duration = 0) {
    element.hide(duration);
}

window.closeAnyDropDown =function closeAnyDropDown(targetDropdown) {
    const dropdowns = $(".custom-dropdown").not(targetDropdown);
    $.each(dropdowns, function (key, value) {
        $(value).hide();
    });
}

// ***************************************************************************************
// Something to do when document is ready
// ***************************************************************************************

$(document).ready(() => {

    window.truncateText=function truncateText(elements, maxLength) {
        $.each(elements, function (key, value) {
            var text = value.innerText;
            if (text.length > maxLength) {
                newText = text.substring(0, maxLength).concat("...");
                $(this).text(newText);
            }
        });
    }
    // function to handle filter state on load
    window.handleFilterState=function handleFilterState() {
        var categories = $(".categories-group input");
        $.each(categories, function (key, value) {
            if (value.checked) {
                $(this).next().css({
                    'color': 'red',
                    'font-weight': 500
                })
                $(this).parent().next().fadeIn();
            }
            else {
                $(this).next().css({
                    'color': '#808a85',
                    'font-weight': 400
                });
                $(this).parent().next().fadeOut();
            }
        });
    }

    // Truncate text of course card title
    var cardTitles = $(".card-title a");
    var cardTexts = $(".card-text");
    var diplomaTexts = $(".diploma-text");
    var articleCardText = $(".article-card .body .text a");
    truncateText(cardTitles, 50);
    truncateText(cardTexts, 115);
    truncateText(articleCardText, 186);
    if (getWindowSize() >= 1200 && getWindowSize() <= 1400)
        truncateText(diplomaTexts, 100);
    else
        truncateText(diplomaTexts, 110);

    // Function to handle filter state
    handleFilterState();



});

// ******************************************************************************
// Scripts for main filter (show tooltip on remove filter icon enter and leave)
// ******************************************************************************

$(".form-check-toggler").mouseenter(function () {
    var tooltip = $(".form-check-tooltip", this);
    tooltip.fadeIn(400);
});

$(".form-check-toggler").mouseleave(function () {
    var tooltip = $(".form-check-tooltip", this);
    setTimeout(() => {
        tooltip.fadeOut(100);
    }, 150);
});

$(".form-check-toggler").click(function () {
    var categoryInput = $(".category-input", $(this).parent());
    categoryInput.prop('checked', false);
    categoryInput.trigger('change');
});

$(".categories-group input").change(function () {
    handleHiddenInputLabel($(this));
});

window.handleHiddenInputLabel = function handleHiddenInputLabel(input) {
    var inputChecked = input.prop('checked');
    var formCheckLabel = input.next();
    var formCheckToggler = $(".form-check-toggler", input.parent().parent());
    if (inputChecked) {
        formCheckLabel.css({
            'color': 'red',
            'font-weight': 500
        });
        formCheckToggler.fadeIn(200);
    }
    else {
        formCheckLabel.css({
            'color': '#808a85',
            'font-weight': 400
        });
        formCheckToggler.fadeOut(500);
    }
}

// ******************************************************************************
// ******************************************************************************

// ******************************************************************************
// Load More and Load Less Click
// ******************************************************************************

$(".load-more-link").click(function (e) {
    e.preventDefault();
    $(this).hide().parent().find('.show-more').removeClass('d-none').addClass('d-flex');
    $(".load-less-link").show();
});

$(".load-less-link").click(function (e) {
    e.preventDefault();
    $(this).hide().parent().find('.show-more').addClass('d-none').removeClass('d-flex');;
    $(".load-more-link").show();
});

// ****************************************************************************************
// Sidebar Scripts
// ****************************************************************************************

window.handleSidebarWidth=function handleSidebarWidth(sidebar) {
    if (sidebar.width() > 0) {
        closeSideBar(sidebar);
    }
    else {
        openSideBar(sidebar);
    }
}

window.openSideBar =function openSideBar(sidebar) {
    if (getWindowSize() >= 768 && getWindowSize() < 992) {
        sidebar.animate({
            width: '40%'
        }, 500);
        setTimeout(() => {
            $("*", sidebar).css('visibility', 'visible');
        }, 300);
    }
    else if (getWindowSize() >= 600 && getWindowSize() < 768) {
        sidebar.animate({
            width: '50%'
        }, 500);
        setTimeout(() => {
            $("*", sidebar).css('visibility', 'visible');
        }, 300);
    }
    else if (getWindowSize() <= 550) {
        sidebar.animate({
            width: '100%'
        }, 500);
        setTimeout(() => {
            $("*", sidebar).css('visibility', 'visible');
        }, 300);
    }
}

window.closeSideBar=function closeSideBar(sidebar) {
    $("*", sidebar).css('visibility', 'hidden');
    setTimeout(() => {
        sidebar.animate({
            width: 0
        }, 500);
    }, 50);
}

$("#sidebar").click(function (e) {
    e.stopPropagation();
});

$(".in-sidebar-toggler").click(function (e) {
    e.stopPropagation();
    const sidebar = $('#sidebar');
    handleSidebarWidth(sidebar);
});

$("#sidebar-toggler").click(function (e) {
    e.stopPropagation();
    const sidebar = $('#sidebar');
    handleSidebarWidth(sidebar);
});

// ***************************************************************************************
// Layout Scripts
// ***************************************************************************************

$(".explore-container-toggler").click(function (e) {
    e.stopPropagation();
    const contentDropdown = $(".content-dropdown");
    closeAnyDropDown(contentDropdown);
    contentDropdown.toggle();
});

// *************************************************************************************
// User Profile control dropdown scripts
// *************************************************************************************

$(".user-profile-control").click(function (e) {
    e.stopPropagation();
    e.preventDefault();
    const userContentDropDown = $(".profile-control-dropdown");
    closeAnyDropDown(userContentDropDown);
    userContentDropDown.toggle();
});

// ****************************************************************************
// notfication control dropdown scripts
// *****************************************************************************

$(".notification-dropdown-controller").click(
    function (e) {
        e.stopPropagation();
        e.preventDefault();
        const notificationDropDown = $(".notfication-control-dropdown");
        closeAnyDropDown(notificationDropDown);
        if (getWindowSize() < 600)
            notificationDropDown.slideToggle();
        else
            notificationDropDown.toggle();
    }
);

//for mobile
$(".notification-sidebar-toggler").click(function (event) {
    event.stopPropagation();
    const notificationDropDown = $(".notfication-control-dropdown");
    closeAnyDropDown(notificationDropDown);
    notificationDropDown.slideUp();
});

// Bookmarks scripts

$(".bookmark-dropdown-controller").click(function (event) {
    event.stopPropagation();
    event.preventDefault();
    const wishlistDropdown = $(".wishlist-control-dropdown");
    closeAnyDropDown(wishlistDropdown);
    if (getWindowSize() < 600)
        wishlistDropdown.slideDown();
    else
        wishlistDropdown.toggle();
});

//for mobile
$(".wishlist-sidebar-toggler").click(function (event) {
    event.stopPropagation();
    const wishlistDropdown = $(".wishlist-control-dropdown");
    closeAnyDropDown(wishlistDropdown);
    wishlistDropdown.slideUp();
});

// user-learning scripts

$(".user-learning-controller").click(function (event) {
    event.stopPropagation();
    event.preventDefault();
    const learningDropdown = $(".learning-control-dropdown");
    closeAnyDropDown(learningDropdown);
    if (getWindowSize() < 600)
        learningDropdown.slideDown();
    else
        learningDropdown.toggle();
});

// *************************************************************************************************
// Custom Dropdown
// *************************************************************************************************

$(".custom-dropdown").click(function (event) {
    // Stop propagation to avoid body click event triggering
    event.stopPropagation();
});


// *************************************************************************************************
// About us page
// *************************************************************************************************
// Add minus icon for collapse element which is open by default
$(".acc-cont .collapse.show").each(function () {
    $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
});

// Toggle plus minus icon on show hide of collapse element
$(".acc-cont .collapse").on('show.bs.collapse', function () {
    $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
}).on('hide.bs.collapse', function () {
    $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
});
