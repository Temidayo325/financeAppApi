<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
          <meta charset="utf-8">
          <title>ExpenseX</title>
          <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
          <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          <style>
             body {
                 font-family: 'Nunito', sans-serif;
             }
         </style>
     </head>
     <body>
          <header class="md:flex md:items-center md:justify-around md:bg-hero-bg md:bg-cover">
               <div class="md:ml-16">
                    <h1 class="md:text-7xl leading-9 md:mb-3 font-bold text-primary">Your personal Financial Manager</h1>
                    <h3 class="md:text-2xl leading-9 text-primary">Take charge of your finances and secure your future today with <span>ExpenseX</span></h3>
                    <div class="md:border-2 md:border-primary md:rounded-full md:py-3 md:mt-6" >
                         <input type="email" name="" value="" class="md:w-2/3 text-center text-2xl text-primary md:ml-10 py-2 focus:outline-0 focus:border-transparent border-transparent bg-transparent" placeholder="Enter your Email Address">
                         <button type="button" name="button" class="bg-primary text-center text-white py-4 px-4 rounded-full text-xl ">JOIN THE WAITLIST</button>
                    </div>
               </div>
               <div class="md:ml-10">
                    <img src="images/screen.svg" alt="" class=" md:w-auto">
               </div>
          </header>
          <main class=" md:py-4 md:h-screen md:flex md:justify-center">
               <div class="md:flex md:justify-center md:items-center md:my-3 md:py-3">
                    <div class="md:w-2/6">
                         <h1 class="md:text-4xl leading-9 md:my-6 font-bold text-primary">All about ExpenseX</h1>
                         <p class=" leading-8 tracking-wide text-left text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                         <div class="flex justify-center md:my-10">
                              <button type="button" name="button" class=" bg-red-600 text-center text-white py-4 px-4 rounded-full text-xl ">Sign me up</button>
                         </div>
                    </div>
                    <div class="md:w-2/6 md:h-64 md:ml-8">
                         <img src="images/track.svg" alt="track your expenses" class="md:w-full md:h-full ">
                    </div>
               </div>
          </main>
          <section class=" md:py-4 md:h-screen md:flex md:justify-center md:bg-gray-100">
               <div class="md:flex md:justify-center md:items-center md:my-3 md:py-3">
                    <div class="md:w-2/6 md:h-72">
                         <img src="images/checklist.svg" alt="track your expenses" class="md:w-full md:h-full ">
                    </div>
                    <div class="md:w-3/6 md:ml-10">
                         <h1 class="md:text-4xl leading-9 md:my-6 font-bold text-primary">Why ExpenseX</h1>
                         <ol class="text-lg">
                              <li class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </li>
                              <li class="my-3"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                              <li class="my-3"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li>
                              <li class="my-3">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                              <li class="my-3"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                         </ol>
                         <div class="flex justify-center md:my-10">
                              <button type="button" name="button" class=" bg-red-600 text-center text-white py-4 px-4 rounded-full text-xl ">JOIN THE WAITLIST</button>
                         </div>
                    </div>
               </div>
          </section>
          <article class=" md:py-4 md:h-screen md:bg-white">
               <h1 class="md:text-4xl leading-9 text-center md:my-6 font-bold text-primary">Frequently asked questions</h1>
               <div class="md:w-3/6 md:mx-auto">
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8">
                         <p class="font-extrabold text-2xl mb-4 cursor-pointer togglep">What is ExpenseX</p>
                         <p class="hidden word">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8">
                         <p class="font-extrabold text-2xl mb-4 cursor-pointer togglep">What is ExpenseX</p>
                         <p class="hidden word">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8">
                         <p class="font-extrabold text-2xl mb-4 cursor-pointer togglep">What is ExpenseX</p>
                         <p class="hidden word">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8">
                         <p class="font-extrabold text-2xl mb-4 cursor-pointer togglep">What is ExpenseX</p>
                         <p class="hidden word">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
               </div>
          </article>
          <footer class="md:bg-primary md:py-12 md:pl-40">
               <div class="md:flex md:justify-start md:items-start">
                    <p class="text-gray-100 text-2xl">&copy ExpenseX 2022</p>
                    <nav class="text-gray-100 tracking-wide leading-9 text-lg md:ml-14">
                         <h3 class="font-bold">Socials</h3>
                         <ul>
                              <li><a href="https://www.instagram.com/lumina_ace/" target="_blank" >Instagram</a></li>
                              <li><a href="">Twitter</a></li>
                              <li><a href="">Facebook</a></li>
                         </ul>
                    </nav>
               </div>
               <div class="md:border-2 md:border-gray-400 md:rounded-full md:py-3 md:mt-6 md:w-3/6" >
                    <input type="email" name="" value="" class="md:w-2/3 text-center text-2xl text-gray-100 md:ml-2 py-2 focus:outline-0 focus:border-transparent border-transparent bg-transparent" placeholder="Enter your Email Address">
                    <button type="button" name="button" class="bg-red-600 text-center text-gray-100 py-4 px-4 rounded-full text-xl ">JOIN THE WAITLIST</button>
               </div>
          </footer>
     </body>
     <script>
          let hiddenP = document.querySelectorAll('.word')
          let togglep = document.querySelectorAll('.togglep')

               togglep.forEach( (item, index, arrayObj) => {
                    item.addEventListener('click', () => {
                         hiddenP[index].classList.toggle("hidden")
                    })
               });
     </script>
</html>
