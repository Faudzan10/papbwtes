console.log("JS LOADED");
document.addEventListener("DOMContentLoaded", function(){

    const container = document.querySelector('.rating-input');

    if(!container){
        console.log("❌ rating-input tidak ditemukan");
        return;
    }

    const stars = container.querySelectorAll('span');

    function setRating(rating){
        document.getElementById('rating-value').value = rating;

        stars.forEach((star, index) => {
            if(index + 1 <= rating){
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }

    stars.forEach(star => {
        star.addEventListener('click', function(){
            const value = parseInt(this.dataset.value);
            console.log("klik:", value);
            setRating(value);
        });
    });
});