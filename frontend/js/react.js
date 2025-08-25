const likeButtons = document.querySelectorAll('.like-btn');

likeButtons.forEach(button => {
      button.addEventListener('click', () => {
            let cookbookId = button.getAttribute("cookbook_id");
            let countreact = button.querySelector("span");
            console.log(cookbookId);
            fetch("../backend/Public/Reaction.php", {
                  method: "POST",
                  headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                  },
                  body: "cookbook_id=" + cookbookId
            })
                  .then(response => response.json())
                  .then(data => {
                        if (data.success) {
                              countreact.textContent = data.new_react;
                              button.classList.add("bg-red-600");
                        } else {
                              console.warn("Reaction failed:", data.message);
                        }
                  })
                  .catch(error => {
                        console.error("Error:", error);
                  });

      });
});