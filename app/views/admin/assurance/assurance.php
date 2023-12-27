<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
         $(document).ready(function(){
            $('#client').dataTable();

        });
    </script>

    <title>Document</title>
</head>
<body>

  <?php
  require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/controllers/assureurController.php");
  ?>

<div class="bg-gray-100">
    

    <div class="min-h-full">
      <div class="bg-gray-800 pb-32">
        <nav x-data="{ open: false }" class="bg-gray-800">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-b border-gray-700">
              <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="../../../../public/photo/FMA_Logo-.png" alt="Workflow">
                  </div>
                  <div class="hidden md:block">
                    <div class="ml-96 flex items-baseline space-x-4">
                      
                        <a href="../assurance/assurance.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Assureur</a>
                        
                                           
                        <a href="../article/article.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Article</a>
                      
                        <a href="../claim/claim.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Claim</a>
                      
                        <a href="../client/client.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Client</a>
                      
                        <a href="../prime/prime.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Premium</a>
                      
                    </div>
                  </div>
                </div>
                <div class="hidden md:block">
                  <div class="ml-4 flex items-center md:ml-6">
                    <button type="button" class="bg-gray-800 p-1 text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                      <span class="sr-only">View notifications</span>
            </button>
  
                    <!-- Profile dropdown -->
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="ml-3 relative">
                      <div>
                        <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                          <span class="sr-only">Open user menu</span>
                          <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                        </button>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="button" id="adduser" class="absolute ml-[1100px] top-[100px] bg-gray-700  px-5 py-2 rounded-lg text-white drop-shadow-lg	">
            Add Primes

        </button>
          </div>
        </nav>
        <header class="py-10">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white">
              Dashboard
            </h1>
          </div>
        </header>
      </div>
  
      <main class="-mt-32">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
          <!-- Replace with your content -->
          <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
            
            <table id="client" class="border-2">
                    <thead class="bg-gray-800 text-white">
                        <th>assurance ID</th>
                        <th>NOM</th>
                        
                        <th>ADRESSE</th>
                        
                        
                        <th>ACTION</th>
                        
                    </thead>
                    <tbody>
                    <?php 
                    $AssuranceService = new AssuranceService();
                     $assurances = $AssuranceService->display();
                     foreach ($assurances as $assurance) : ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= $assurance['assuranceId']; ?></td>
                            <td class="py-2 px-4 border-b"><?= $assurance['name']; ?></td>
                            <td class="py-2 px-4 border-b"><?= $assurance['address']; ?></td>
                            <td class="py-2 px-4 border-b flex">
                            <form action="../../../controllers/assureurController.php" method="post">
                                    <input type="hidden" name="action" value="editAssurance">
                                    <input type="hidden" name="assuranceId" value="<?= $assurance['assuranceId']; ?>">
                                    <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                </form>
                      
                                <form action="../../../controllers/assureurController.php" method="post">
                                    <input type="hidden" name="action" value="deleteAssurance">
                                    <input type="hidden" name="deleteAssuranceId" value="<?= $assurance['assuranceId']; ?>">
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
               
            </table>
          <!-- /End replace -->
        </div>
      </main>
    </div>

    </div>
    

    <div id="overlay" class="hidden h-screen w-full fixed top-0 left-0 bg-black/10 flex justify-center items-center">
     
            <form action="../../../controllers/assureurController.php" method="POST" id="overlay-form" class="w-[50%] bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white"></h3>
                    <button type="button" id="remove" class=" text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14" pointer-events="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                </div>
                <div class="p-6 space-y-6">
                    <div class="grid flex flex-col gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <input type="text" placeholder="NOM" name="name" id="Logo" value="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Logo" required="">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            
                            <input type="text" placeholder="ADRESSE" name="address" id="Name" value="" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" required="">
                        </div>
                        
                    </div>
                </div>
                <div class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                   
                        <button type="submit" name="action" value="addAssurance" class="text-white   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-grey-800 dark:hover:bg-gray-900 dark:focus:ring-blue-800">
                            AJOUTER
                        </button>
                </div>
            </form>
        </div>
        <script src="../../../../public/script.js"></script>
</body>
</html> 