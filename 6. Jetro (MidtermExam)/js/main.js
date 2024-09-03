$(document).ready(function() {
    var images = [
        "img/slider-image.jpg",
        "img/slider-image2.jpg",
        "img/slider-image3.jpg",
        "img/slider-image4.jpg",
        "img/slider-image5.jpg",
        "img/slider-image6.jpg"
        
    ]; // Array of image paths
    var textValues = ["ONE","TWO","THREE","FOUR","FIVE","SIX"];

    var currentIndex = 0; // Current index of the displayed image

    // Function to update the image source
    function updateImage() {
        $(".main-pic-container img").attr("src", images[currentIndex]);
        $(".textinpic span").text(textValues[currentIndex]);
    }

    // Function to add border to the current slide
    function addEpek() {
        $(".other-slides li").eq(currentIndex).css({
            "transform": "translateY(-7px)",
            "border-top": "5px solid #e8663c",
            
        }); 
        $(".other-slides img").eq(currentIndex).css({
            "opacity": "0.6"
        }); 
        $(".text-gal").eq(currentIndex).css({
            "display": "block"
        }); 
    }

    // Function to remove border from all slides
    function removeEpek() {
        $(".other-slides li").eq(currentIndex).css({
            "transform": "none",
            "border-top": "none",
        }); 
        $(".other-slides img").eq(currentIndex).css({
            "opacity": "1"
        }); 
        $(".text-gal").eq(currentIndex).css({
            "display": "none"
        }); 
    }

    
    // Click event handler for the previous button
    $("#prev").click(function() {
        removeEpek();
        currentIndex = (currentIndex - 1 + images.length) % images.length; // Decrement index, loop back to end if needed
        updateImage();
        addEpek(); // Add border to the current slide
    });

    // Click event handler for the next button
    $("#next").click(function() {
        removeEpek(); // Remove border from all slides
        currentIndex = (currentIndex + 1) % images.length; // Increment index, loop back to start if needed
        updateImage();
        addEpek(); // Add border to the current slide
    });

    $(".other-slides li").click(function(event) {
        event.preventDefault(); // Prevent the default behavior of the <a> tag
        removeEpek(); // Remove border from all slides
        currentIndex = $(this).index(); // Get the index of the clicked thumbnail
        updateImage(); // Update the main image
        addEpek(); // Add border to the clicked thumbnail
    });


    // akordyon
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
           
            this.classList.toggle("active");

            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

    $(".text-gal a").click(function(event) {
        event.preventDefault(); // Prevent the default behavior ng <a tag

        // Get the image source and create an <img> element
        var imgSrc = $(this).closest('.gallery').find('img').attr('src');
        var $img = $('<img>').attr('src', imgSrc);

        // Create a container div for the expanded image
        var $overlay = $('<div class="overlay"></div>');
        var $expandedImage = $('<div class="expanded-image"></div>').append($img);
        $overlay.append($expandedImage);

        // Create an exit button ('x') and append it to the expanded image container
        var $exitButton = $('<button class="exit-button">x</button>');
        $expandedImage.append($exitButton);

        // Append the overlay to the body
        $('body').append($overlay);

        // Add click event listener to the exit button to remove the overlay when clicked
        $exitButton.click(function() {
            $overlay.remove();
        });
    });
   
});
