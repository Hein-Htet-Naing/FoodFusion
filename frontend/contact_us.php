<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use Helper\Auth;

$check_user = Auth::checkUser();

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/0bf00ca408.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../src/output.css">
      <title>Document</title>
</head>

<body class="font-sans antialiased">
      <?php require('header.php'); ?>

      <main class="bg-gradient-to-b from-orange-100 to-white">
            <!-- Contact Form -->
            <section class="pt-25 pb-16 px-6 max-w-4xl mx-auto">
                  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="md:flex">
                              <div class="md:w-1/2 p-8">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                                    <?php
                                    if (isset($_GET['status']) && $_GET['status'] == 'success') {
                                          echo '<div id="status_message" class="bg-green-100 border border-green-400 
                                          text-green-700 px-4 py-3 rounded mb-6">Thank you for your message! We\'ll 
                                          get back to you soon.</div>';
                                    } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
                                          echo '<div id="status_message" class="bg-red-100 border border-red-400 text-red-700 
                                          px-4 py-3 rounded mb-6">There was an error sending your message. Please try again.</div>';
                                    }
                                    ?>
                                    <form action="../backend/Public/contact.php" method="POST">
                                          <div class="mb-4">
                                                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                                                <input type="text" id="name" name="name"
                                                      class="w-full px-4 py-2
                                                 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                          </div>
                                          <div class="mb-4">
                                                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                                <input type="email" id="email" name="email"
                                                      class="w-full px-4 py-2 
                                                border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                                          </div>
                                          <div class="mb-4">
                                                <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                                                <select id="subject" name="subject"
                                                      class="w-full px-4 py-2 border rounded-lg 
                                                focus:outline-none focus:ring-2 focus:ring-orange-500">
                                                      <option value="General Inquiry">General Inquiry</option>
                                                      <option value="Recipe Suggestion">Recipe Suggestion</option>
                                                      <option value="Partnership">Partnership</option>
                                                      <option value="Technical Support">Technical Support</option>
                                                      <option value="Other">Other</option>
                                                </select>
                                          </div>
                                          <div class="mb-6">
                                                <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                                                <textarea id="message" name="message" rows="4"
                                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 
                                                focus:ring-orange-500"></textarea>
                                          </div>
                                          <button type="submit"
                                                class="w-full bg-orange-500 text-white 
                                          font-semibold py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors duration-300">
                                                Send Message
                                          </button>
                                    </form>
                              </div>
                              <div class="md:w-1/2 text-white p-8  bg-center bg-cover bg-fixed"
                                    style="background-image: url(img/building1.jpeg);">
                                    <h2 class=" text-2xl font-bold mb-6">Contact Information</h2>
                                    <div class="space-y-4">
                                          <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 
                                                            11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 
                                                            2h-1C9.716 21 3 14.284 3 6V5z" />
                                                      </svg>
                                                </div>
                                                <div class="ml-4">
                                                      <h3 class="text-lg font-semibold">Call Us</h3>
                                                      <p class="mt-1">+1 (555) 123-4567</p>
                                                </div>
                                          </div>
                                          <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 
                                                                  00-2 2v10a2 2 0 002 2z" />
                                                      </svg>
                                                </div>
                                                <div class="ml-4">
                                                      <h3 class="text-lg font-semibold">Email Us</h3>
                                                      <p class="mt-1">foodfusion45@gmail.com</p>
                                                </div>
                                          </div>
                                          <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                      </svg>
                                                </div>
                                                <div class="ml-4">
                                                      <h3 class="text-lg font-semibold">Visit Us</h3>
                                                      <p class="mt-1">123 Culinary Street, Foodville, FC 12345</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="mt-12">
                                          <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                                          <div class="flex space-x-4">
                                                <a href="#" class="text-white hover:text-orange-200">
                                                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 
                                                            9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 
                                                            2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 
                                                            2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                                      </svg>
                                                </a>
                                                <a href="#" class="text-white hover:text-orange-200">
                                                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 
                                                            4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048
                                                             1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 
                                                             1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 
                                                             1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 
                                                             0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 
                                                             0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.
                                                             06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 
                                                             4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456
                                                            0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.
                                                            3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 
                                                            1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h
                                                            .08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.
                                                            748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.
                                                            207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-
                                                            .047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 
                                                            100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                                      </svg>
                                                </a>
                                                <a href="#" class="text-white hover:text-orange-200">
                                                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 
                                                            0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107
                                                             0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 
                                                             4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 
                                                             18.407a11.616 11.616 0 006.29 1.84" />
                                                      </svg>
                                                </a>
                                                <a href="#" class="text-white hover:text-orange-200">
                                                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 
                                                                  6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-
                                                                  .454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 
                                                                  1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688
                                                                  -.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 
                                                                  1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 
                                                                  4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 
                                                                  0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                                      </svg>
                                                </a>
                                                <a href="#" class="text-white hover:text-orange-200">
                                                      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.
                                                            629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0
                                                            4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896
                                                            53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 
                                                            8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12
                                                            20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4
                                                            0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                                                  clip-rule="evenodd" />
                                                      </svg>
                                                </a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>

            <!-- FAQ Section -->
            <section class="py-16 px-6 max-w-4xl mx-auto">
                  <h2 class="text-3xl font-bold text-center text-orange-600 mb-12">Frequently Asked Questions</h2>
                  <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                              <button class="w-full flex justify-between items-center p-4 text-left bg-orange-50
                               hover:bg-orange-100 transition-colors duration-200">
                                    <span class="font-semibold text-gray-800">How can I submit my own recipe to FoodFusion?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-600"
                                          viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 
                                          0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                              </button>
                              <div class="p-4 bg-white hidden">
                                    <p class="text-gray-600">After creating an account, navigate to the Community Cookbook section and
                                          click "Submit Recipe." Fill out the form with your recipe details, ingredients, and instructions.
                                          Our team will review it before publishing to ensure it meets our quality standards.
                                    </p>
                              </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                              <button id="questionBtn" class="w-full flex justify-between items-center p-4 text-left bg-orange-50 hover:bg-orange-100 transition-colors duration-200">
                                    <span class="font-semibold text-gray-800">Can I request a specific recipe or cuisine?</span>
                                    <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 
                                          01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                              </button>
                              <div class="p-4 bg-white hidden">
                                    <p class="text-gray-600">
                                          Absolutely! We love hearing what our community wants to cook.
                                          Use the contact form above and select "Recipe Suggestion" as your subject.
                                          Our culinary team does their best to fulfill popular requests.
                                    </p>
                              </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                              <button class="w-full flex justify-between items-center p-4 text-left 
                              bg-orange-50 hover:bg-orange-100 transition-colors duration-200">
                                    <span class="font-semibold text-gray-800">Are the cooking classes free?</span>
                                    <svg
                                          xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-600"
                                          viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0
                                           01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                              </button>
                              <div class="p-4 bg-white hidden">
                                    <p class="text-gray-600">We offer both free and premium content.
                                          Basic cooking tutorials and many of our technique videos are completely free.
                                          Premium members get access to exclusive live classes, in-depth courses, and
                                          personalized feedback from our chefs.
                                    </p>
                              </div>
                        </div>
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                              <button
                                    class="w-full flex justify-between items-center p-4 text-left 
                              bg-orange-50 hover:bg-orange-100 transition-colors duration-200">
                                    <span class="font-semibold text-gray-800">How do I report an issue with the website?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 text-orange-600"
                                          viewBox="0 0 20 20"
                                          fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414
                                           0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                              </button>
                              <div class="p-4 bg-white hidden">
                                    <p class="text-gray-600">
                                          For technical issues, please use the contact form above and select
                                          "Technical Support" as your subject. Include as much detail as possible
                                          about the problem you're experiencing, including which browser and device you're using.
                                    </p>
                              </div>
                        </div>
                  </div>
            </section>

            <!-- Map Section -->
            <section class="py-16 px-6">
                  <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="md:flex">
                              <div class="md:w-1/2 p-8">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Our Headquarters</h2>
                                    <address class="not-italic text-gray-700 space-y-4">
                                          <div>
                                                <h3 class="font-semibold">FoodFusion Culinary Center</h3>
                                                <p>123 Culinary Street</p>
                                                <p>Foodville, FC 12345</p>
                                                <p>United States</p>
                                          </div>
                                          <div>
                                                <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                                                <p><strong>Email:</strong> foodfusion45@gmail.com</p>
                                          </div>
                                          <div>
                                                <p><strong>Office Hours:</strong></p>
                                                <p>Monday-Friday: 9am-6pm EST</p>
                                                <p>Saturday: 10am-4pm EST</p>
                                                <p>Sunday: Closed</p>
                                          </div>
                                    </address>
                              </div>
                              <div class="md:w-1/2 h-96">
                                    <!-- Embedded Google Map -->
                                    <iframe
                                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256027776!2d-73.9881176845937!3d40.7484401793279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1629999999999!5m2!1sen!2sus"
                                          width="100%" height="100%" style="border:0;" allowfullscreen=""
                                          loading="lazy"></iframe>
                              </div>
                        </div>
                  </div>
            </section>
      </main>
      <?php require('footer.php') ?>
      <script src="js/contact_us.js"></script>
      <script src="js/navbar.js"></script>
</body>

</html>