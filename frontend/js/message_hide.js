document.addEventListener("DOMContentLoaded", () => {
      const message = document.querySelector(".status_message");

      if (message) {
            setInterval(() => {
                  message.style.display = "none";
            }, 3000)
      }
})