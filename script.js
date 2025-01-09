const stars = document.querySelectorAll('.rating span');
const ratingInput = document.getElementById('rating'); // Ensure this is the correct input ID

stars.forEach((star, index) => {
    star.addEventListener('click', () => {
        // Update the hidden rating input value to reflect the selected star
        ratingInput.value = index + 1; // Set rating to 1-5, not 0-4

        // Update the selected stars visually
        stars.forEach((s, i) => {
            if (i <= index) {
                s.classList.add('selected');
            } else {
                s.classList.remove('selected');
            }
        });

        // If rating is 4 or 5, redirect to the Google search URL
        if (ratingInput.value == '4' || ratingInput.value == '5') {
            window.location.href = 'https://www.google.com/search?gs_ssp=eJzj4tVP1zc0zC5MNjAsyjUzYLRSNagwMjE2T0o1trRISTNLNLY0tDKoMDQ2Tk2ySExNNDIyMTcyS_ZiT0xPLcvPSQUAJXMR0g&q=agevole&oq=ag&gs_lcrp=EgZjaHJvbWUqFQgBEC4YJxivARjHARiABBiKBRiOBTIPCAAQIxgnGOMCGIAEGIoFMhUIARAuGCcYrwEYxwEYgAQYigUYjgUyBggCEEUYQDIGCAMQRRg5Mg0IBBAAGJECGIAEGIoFMgYIBRBFGDwyBggGEEUYPDIGCAcQRRg80gEIMTM1M2owajeoAgiwAgE&sourceid=chrome&ie=UTF-8#lrd=0x2437be398df6a391:0x133eb8aea224726c,3,,,,';
        }
    });
});

// Ensure the correct rating value is sent when the form is submitted
const form = document.querySelector('form');
form.addEventListener('submit', (e) => {
    if (ratingInput.value === '0') { // Check if rating is still 0
        alert('Please select a rating!');
        e.preventDefault(); // Prevent form submission
    } else {
        // You can log the value for debugging purposes
        console.log('Rating to be sent: ', ratingInput.value);
    }
});


// On page load, check the localStorage and hide fields if necessary
window.onload = function() {
    ['name', 'contact', 'email', 'feedback'].forEach(field => {
        let state = localStorage.getItem(field);
        if (state === 'off') {
            document.getElementById(field + '-field').style.display = 'none';
        }
    });
};
