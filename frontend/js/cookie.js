// A simple function to set a cookie
function setCookie(name, value, days) {
      let expires = "";
      if (days) {
            const date = new Date();
            // The cookie will expire in 'days' from now
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
      }
      // Set the cookie with the name, value, expiration, and path
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// function to get a cookie value
function getCookie(name) {
      const nameEQ = name + "=";
      const ca = document.cookie.split(';');
      for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
}

// run when the document is loaded
document.addEventListener('DOMContentLoaded', () => {
      const banner = document.getElementById('cookie-consent-banner');
      const acceptBtn = document.getElementById('accept-all-cookies');
      const declineBtn = document.getElementById('decline-cookies');

      // Check if  user has already given consent
      if (!getCookie('user_consent')) {
            // If no consent cookie is found, show the banner
            banner.style.display = 'flex';
      }

      acceptBtn.addEventListener('click', () => {
            // When the user accepts, set a cookie to remember their choice for 1 year
            setCookie('user_consent', 'accepted', 365);
            banner.style.display = 'none';
      });

      declineBtn.addEventListener('click', () => {
            // When the user declines, set a cookie to remember their choice for 1 year
            setCookie('user_consent', 'declined', 365);
            banner.style.display = 'none';
      });
});
