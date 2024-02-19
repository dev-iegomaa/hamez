window.addEventListener("load", function () {

    const header = document.getElementById('header');
    const navigation = document.getElementById('navigation');
    const banner = document.getElementById('banner');
    const loading = document.getElementById('loading');

    setTimeout(function () {
       loading.style.cssText = `visibility: hidden`;
    }, 7);

    /**
     ** Carousel Height
     */

    const carouselItems = this.document.querySelectorAll(".carousel-item");

    carouselItems.forEach((element) => {
        element.style.height = `calc(93vh - ${header.getBoundingClientRect().height +
        navigation.getBoundingClientRect().height
        }px)`;
    });

    banner.style.height = `calc(93vh - ${header.getBoundingClientRect().height +
    navigation.getBoundingClientRect().height
    }px)`;

});
