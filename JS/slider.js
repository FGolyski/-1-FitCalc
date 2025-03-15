
    var i = 0;
    var images = [
        "./slider/1.jpg",
        "./slider/2.jpg",
        "./slider/3.jpg"
    ];

    function previousSlide() {
        if(i === 0) {
            i = 2;
        } else if(i === 1) {
            i = 0;
        } else if(i === 2) {
            i = 1;
        }
        document.getElementById('slider').src = images[i];
    }

    function nextSlide() {
        if(i === 0) {
            i = 1;
        } else if(i === 1) {
            i = 2;
        } else if(i === 2) {
            i = 0;
        }
        document.getElementById('slider').src = images[i];
    }