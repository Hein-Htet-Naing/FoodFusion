<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";

use Helper\Auth;
use Lupid\FoodFusion\Model\Contactprocess;


$check_admin = Auth::checkAdmin();
$comments = new Contactprocess();
$commentList =  $comments->fetch_all_messsage();

if (isset($_GET['status'])) {
      $msg = $_GET['status'] === 'success' ? 'Update Message Successfully' : 'Error Updating Message!';
      echo '<script>alert(' . $msg . ' )</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <title>Document</title>
      <style>
            /* Hide scrollbar for Chrome, Safari and Opera */
            .scroll_hidden::-webkit-scrollbar {
                  display: none !important;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            .scroll_hidden {
                  -ms-overflow-style: none !important;
                  /* IE and Edge */
                  scrollbar-width: none !important;
                  /* Firefox */
            }
      </style>
</head>

<body>

      <div class="flex h-screen bg-gray-100">

            <?php require_once('Sidebar.php'); ?>
            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">

                  <main class="w-full flex-1 p-6 scroll_hidden">
                        <div class="min-h-screen mt-10 md:mt-0">
                              <!-- showing messages from contact page -->
                              <div class="bg-white shadow rounded-lg">
                                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                          <h3 class="text-lg leading-6 font-medium text-gray-900">Messages</h3>
                                    </div>
                                    <div class="bg-white overflow-auto h-[80vh]">
                                          <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                      <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UserName</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Edit</span></th>
                                                      </tr>
                                                </thead>

                                                <?php foreach ($commentList as $cm) {
                                                      $status = $cm['status'] === 'pending' ? 'Pending' : 'Done';
                                                      echo
                                                      '
                                                         <tbody class="bg-white divide-y divide-gray-200">
                                                      <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                  <div>' . htmlspecialchars($cm['contact_id']) . '<div/>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                  <div class="text-sm text-gray-900">' . htmlspecialchars($cm['name']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($cm['email']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($cm['subject']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4  text-sm text-gray-500">
                                                                  <div class="text-sm text-gray-500">' . htmlspecialchars($cm['message']) . '</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                                  <a href="Public/contact.php?contactId=' . htmlspecialchars($cm['contact_id']) . '" 
                                                                  class="px-4 py-1 bg-orange-400 border border-orange-400 text-white hover:text-orange-900"
                                                                  >
                                                                  ' . htmlspecialchars($status) . '
                                                                  </a>
                                                            </td>
                                                </tbody>
                                                      ';
                                                } ?>

                                          </table>
                                    </div>
                              </div>
                        </div>
                  </main>
            </div>
      </div>

</body>

</html>