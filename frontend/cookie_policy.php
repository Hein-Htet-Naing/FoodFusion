<?php
require __DIR__ . '../../vendor/autoload.php';
session_start();

use Helper\Auth;

$check_user = Auth::checkUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cookies Policy - FoodFusion</title>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <script>
            tailwind.config = {
                  theme: {
                        extend: {
                              colors: {
                                    primary: '#f97316',
                                    secondary: '#ea580c',
                                    accent: '#fed7aa',
                              }
                        }
                  }
            }
      </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
      <?php require('header.php'); ?>

      <!-- Main Content -->
      <main class="container mx-auto px-4 py-8 max-w-4xl">
            <!-- Page Title -->
            <div class="mt-18 text-center">
                  <h2 class="text-3xl font-bold text-gray-800 mb-2 flex items-center justify-center">
                        <i class="fas fa-cookie-bite text-primary mr-3"></i>Cookies Policy
                  </h2>
                  <p class="text-gray-600">Last updated: September 06, 2025</p>
            </div>

            <!-- Content Sections -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                  <p class="mb-4">This Cookies Policy explains what Cookies are and how We use them. You should read this policy so You can understand what type of cookies We use, or the information We collect using Cookies and how that information is used. This Cookies Policy has been created with the help of the <a href="https://www.privacypolicies.com/cookies-policy-generator/" target="_blank" class="text-primary hover:underline">Cookies Policy Generator</a>.</p>
                  <p class="mb-4">Cookies do not typically contain any information that personally identifies a user, but personal information that we store about You may be linked to the information stored in and obtained from Cookies. For further information on how We use, store and keep your personal data secure, see our Privacy Policy.</p>
                  <p class="mb-4">We do not store sensitive personal information, such as mailing addresses, account passwords, etc. in the Cookies We use.</p>
            </div>

            <!-- Interpretation and Definitions -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Interpretation and Definitions</h2>

                  <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">Interpretation</h3>
                  <p class="mb-4">The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>

                  <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">Definitions</h3>
                  <p class="mb-4">For the purposes of this Cookies Policy:</p>

                  <ul class="space-y-4 pl-5">
                        <li>
                              <p><strong class="text-gray-800">Company</strong> (referred to as either "the Company", "We", "Us" or "Our" in this Cookies Policy) refers to FoodFusion.</p>
                        </li>
                        <li>
                              <p><strong class="text-gray-800">Cookies</strong> means small files that are placed on Your computer, mobile device or any other device by a website, containing details of your browsing history on that website among its many uses.</p>
                        </li>
                        <li>
                              <p><strong class="text-gray-800">Website</strong> refers to FoodFusion, accessible from <a href="http://localhost/L5DC112/FoodFusion/frontend/index.php" rel="external nofollow noopener" target="_blank" class="text-primary hover:underline">http://localhost/L5DC112/FoodFusion/frontend/index.php</a></p>
                        </li>
                        <li>
                              <p><strong class="text-gray-800">You</strong> means the individual accessing or using the Website, or a company, or any legal entity on behalf of which such individual is accessing or using the Website, as applicable.</p>
                        </li>
                  </ul>
            </div>

            <!-- The use of the Cookies -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">The use of the Cookies</h2>

                  <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">Type of Cookies We Use</h3>
                  <p class="mb-4">Cookies can be "Persistent" or "Session" Cookies. Persistent Cookies remain on your personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close your web browser.</p>
                  <p class="mb-4">We use both session and persistent Cookies for the purposes set out below:</p>

                  <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-accent/20 p-5 rounded-lg">
                              <h4 class="text-lg font-semibold text-gray-800 mb-3">Necessary / Essential Cookies</h4>
                              <p class="mb-2"><strong>Type:</strong> Session Cookies</p>
                              <p class="mb-2"><strong>Administered by:</strong> Us</p>
                              <p><strong>Purpose:</strong> These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.</p>
                        </div>

                        <div class="bg-accent/20 p-5 rounded-lg">
                              <h4 class="text-lg font-semibold text-gray-800 mb-3">Functionality Cookies</h4>
                              <p class="mb-2"><strong>Type:</strong> Persistent Cookies</p>
                              <p class="mb-2"><strong>Administered by:</strong> Us</p>
                              <p><strong>Purpose:</strong> These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.</p>
                        </div>
                  </div>
            </div>

            <!-- Your Choices Regarding Cookies -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Your Choices Regarding Cookies</h2>
                  <p class="mb-4">If You prefer to avoid the use of Cookies on the Website, first You must disable the use of Cookies in your browser and then delete the Cookies saved in your browser associated with this website. You may use this option for preventing the use of Cookies at any time.</p>
                  <p class="mb-4">If You do not accept Our Cookies, You may experience some inconvenience in your use of the Website and some features may not function properly.</p>
                  <p class="mb-4">If You'd like to delete Cookies or instruct your web browser to delete or refuse Cookies, please visit the help pages of your web browser.</p>

                  <div class="bg-gray-50 p-5 rounded-lg mt-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Browser-specific instructions:</h4>
                        <ul class="space-y-3">
                              <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                    <p>For the Chrome web browser, please visit this page from Google: <a href="https://support.google.com/accounts/answer/32050" rel="external nofollow noopener" target="_blank" class="text-primary hover:underline">https://support.google.com/accounts/answer/32050</a></p>
                              </li>
                              <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                    <p>For the Internet Explorer web browser, please visit this page from Microsoft: <a href="http://support.microsoft.com/kb/278835" rel="external nofollow noopener" target="_blank" class="text-primary hover:underline">http://support.microsoft.com/kb/278835</a></p>
                              </li>
                              <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                    <p>For the Firefox web browser, please visit this page from Mozilla: <a href="https://support.mozilla.org/en-US/kb/delete-cookies-remove-info-websites-stored" rel="external nofollow noopener" target="_blank" class="text-primary hover:underline">https://support.mozilla.org/en-US/kb/delete-cookies-remove-info-websites-stored</a></p>
                              </li>
                              <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                                    <p>For the Safari web browser, please visit this page from Apple: <a href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac" rel="external nofollow noopener" target="_blank" class="text-primary hover:underline">https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac</a></p>
                              </li>
                        </ul>
                  </div>

                  <p class="mt-6">For any other web browser, please visit your web browser's official web pages.</p>
            </div>

            <!-- More Information about Cookies -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">More Information about Cookies</h2>
                  <p class="mb-4">You can learn more about cookies: <a href="https://www.privacypolicies.com/blog/cookies/" target="_blank" class="text-primary hover:underline">What Are Cookies?</a>.</p>
            </div>

            <!-- Contact Us -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                  <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Contact Us</h2>
                  <p class="mb-4">If you have any questions about this Cookies Policy, You can contact us:</p>

                  <ul class="list-disc pl-5 mb-4 space-y-2">
                        <li>
                              <p>By email: <a href="mailto:privacy@foodfusion.com" class="text-primary hover:underline">privacy@foodfusion.com</a></p>
                        </li>
                        <li>
                              <p>By visiting this page on our website: <a href="http://localhost/L5DC112/FoodFusion/frontend/contact_us.php" rel="external nofollow noopener" target="_blank" class="text-primary hover:underline">http://localhost/L5DC112/FoodFusion/frontend/contact_us.php</a></p>
                        </li>
                  </ul>
            </div>
      </main>

      <!-- Footer -->
      <?php require('footer.php'); ?>
      <script src="js/navbar.js"></script>
</body>


</html>