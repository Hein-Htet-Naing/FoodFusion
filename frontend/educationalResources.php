<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Educational Resources - FoodFusion</title>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="font-sans antialiased text-shadow-lg text-gray-800 bg-gradient-to-b from-orange-50 to-white">

      <?php require('header.php') ?>

      <main class="container mx-auto px-4 py-12">

            <header class="text-center my-12">
                  <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Educational Resources</h1>
                  <p class="text-lg text-gray-600 max-w-2xl mx-auto">Learn about sustainability and renewable energy with our collection of downloadable guides, infographics, and videos.</p>
            </header>

            <section id="downloadables" class="mb-16">
                  <h2 class="text-3xl font-bold border-l-4 border-orange-500 pl-4 mb-8">Downloadable Guides</h2>
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center text-center transform hover:-translate-y-2 transition-transform duration-300">
                              <i class="fas fa-solar-panel text-5xl text-green-500 mb-4"></i>
                              <h3 class="text-xl font-semibold mb-2">Intro to Solar Energy</h3>
                              <p class="text-gray-600 mb-4 flex-grow">A beginner's guide to understanding how solar panels work and their benefits.</p>
                              <a href="#" class="mt-auto inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                    <i class="fas fa-file-pdf mr-2"></i> Download PDF
                              </a>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center text-center transform hover:-translate-y-2 transition-transform duration-300">
                              <i class="fas fa-wind text-5xl text-green-500 mb-4"></i>
                              <h3 class="text-xl font-semibold mb-2">The Power of Wind</h3>
                              <p class="text-gray-600 mb-4 flex-grow">Explore the technology behind wind turbines and their role in clean energy.</p>
                              <a href="#" class="mt-auto inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                    <i class="fas fa-file-pdf mr-2"></i> Download PDF
                              </a>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center text-center transform hover:-translate-y-2 transition-transform duration-300">
                              <i class="fas fa-leaf text-5xl text-green-500 mb-4"></i>
                              <h3 class="text-xl font-semibold mb-2">Sustainable Living Tips</h3>
                              <p class="text-gray-600 mb-4 flex-grow">Practical tips for reducing your carbon footprint at home and in the kitchen.</p>
                              <a href="#" class="mt-auto inline-flex items-center bg-green-500 text-white font-bold py-2 px-4 rounded-full hover:bg-green-600 transition-colors">
                                    <i class="fas fa-file-pdf mr-2"></i> Download PDF
                              </a>
                        </div>
                  </div>
            </section>

            <section id="visuals">
                  <h2 class="text-3xl font-bold border-l-4 border-orange-500 pl-4 mb-8">Infographics & Videos</h2>
                  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                        <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                              <h3 class="text-xl font-semibold mb-4 text-center">Types of Renewable Energy</h3>
                              <img src="img/typess-of-renewable-energy.jpg" alt="Infographic about renewable energy" class="rounded-md shadow-sm w-full">
                              <p class="text-gray-600 mt-4">A visual breakdown of the primary sources of renewable energy, from solar and wind to hydro and geothermal.</p>
                              <a href="#" class="mt-4 block text-center w-full bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-full hover:bg-gray-300 transition-colors">View Full Size</a>
                        </div>
                        <div class="lg:col-span-2 space-y-8">
                              <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row">
                                    <div class="sm:w-1/3 relative pb-[56.25%] sm:pb-0 h-48 sm:h-auto">
                                          <video class="absolute top-0 left-0 w-full h-full object-cover" src="img/video/windTurbine.mp4" controls muted autoplay loop></video>
                                    </div>
                                    <div class="p-6 sm:w-2/3">
                                          <h3 class="text-xl font-semibold mb-2">How Do Wind Turbines Work?</h3>
                                          <p class="text-gray-600">An animated explanation of the science behind wind power generation. Simple, clear, and informative.</p>
                                    </div>
                              </div>
                              <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col sm:flex-row">
                                    <div class="sm:w-1/3 relative pb-[56.25%] sm:pb-0 h-48 sm:h-auto">
                                          <video class="absolute top-0 left-0 w-full h-full object-cover" src="img/video/TheFutureofEnergy.mp4" controls muted autoplay loop></video>
                                    </div>
                                    <div class="p-6 sm:w-2/3">
                                          <h3 class="text-xl font-semibold mb-2">The Future of Energy</h3>
                                          <p class="text-gray-600">A short documentary exploring the innovations that are shaping the future of sustainable energy worldwide.</p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>

      </main>

      <?php require('footer.php') ?>

</body>

</html>