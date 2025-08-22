// Selecting all buttons from FAQ
const buttons = document.querySelectorAll('.space-y-4 button');

buttons.forEach(button => {
      button.addEventListener('click', () => {
            // Find the next sibling element (the answers)
            const answer = button.nextElementSibling;

            if (answer.classList.contains('hidden')) {
                  answer.classList.remove('hidden');
            } else {
                  answer.classList.add('hidden');
            }
      });
});

document.addEventListener("DOMContentLoaded", () => {
      const status_message = document.getElementById("status_message");
      //undisplay message after 3 seconds
      if (status_message) {
            setInterval(() => {
                  status_message.style.display = "none";
            }, 3000)
      }
})