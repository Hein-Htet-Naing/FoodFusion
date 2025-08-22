<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <title>Document</title>
</head>

<body>

</body>

</html>

<!-- Stats Cards -->

<div class='flex min-h-screen'>
      <?php require('Sidebar.php'); ?>
      <!-- Page title & actions -->

      <div class="flex flex-col">
            <div class="hidden md:flex md:items-center md:justify-between mx-2 md:my-6">
                  <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
            </div>
            <div class="flex gap-8 md:flex-shrink ">
                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-orange-500 rounded-md p-3">
                                          <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                          </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Admin</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900">0</div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>+12.5% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>


                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                          <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                          </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Total user</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900">0</div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>+8.2% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                          <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                          </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Recipe</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900">0</div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-red-600 font-medium">
                                                <span>+5.3% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>


                  <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                              <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                          <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                          </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                          <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">Comments</dt>
                                                <dd>
                                                      <div class="text-lg font-medium text-gray-900">0</div>
                                                </dd>
                                          </dl>
                                    </div>
                              </div>
                              <div class="mt-4">
                                    <div class="border-t border-gray-200 pt-3 flex items-center justify-between">
                                          <div class="text-sm text-green-600 font-medium">
                                                <span>-10.4% from last month</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>