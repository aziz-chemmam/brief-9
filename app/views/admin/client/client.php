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
require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/index.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/models/classClient.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/services/client/clientServecis.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/services/client/clientIntface.php");



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
                      
                        <a href="../client/client.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Client</a>
                      
                                           
                        <a href="../assurance/assurance.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Assureur</a>
                      
                        <a href="../claim/claim.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Claim</a>
                      
                        <a href="../article/article.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Article</a>
                      
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
                        <th>CLIENT ID</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>ADRESSE</th>
                        <th>CNI</th>
                        <th>ASSUTANCE</th>
                        <th>ACTION</th>
                        
                    </thead>
                    <tbody>
      
                    </tbody>
               
            </table>
            </div>
            
          </div>
          <!-- /End replace -->
        </div>
      </main>
    </div>
  
    </div>
</body>
</html>