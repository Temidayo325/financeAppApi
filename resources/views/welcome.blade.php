<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>ExpenseX</title>
          <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Patrick+Hand&display=swap" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
          <link href="{{ asset('css/app.css') }}" rel="stylesheet">
          <script src="{{ asset('js/app.js') }}" defer></script>
          <style>
             body {
                 font-family: 'Lato', sans-serif;
             }
         </style>
     </head>
     <body class="">
          <div class="sticky top-0 my-2 md:py-3 md:px-16 bg-white z-50 px-5 md:px-0 z-10">
               <nav class="flex justify-between relative">
                    <h1 class="text-secondary leading-9 tracking-wide text-2xl font-bold"><a>ExpenseX</a></h1>
                    <img src="images/menu.svg" alt="menu" title="menu by icon8" class="md:hidden w-8 h-8 menu">
                    <ul class="w-screen h-screen bg-blue-200 navigation-links-wrapper text-lg fixed z-20 top-0 py-12 left-0 hidden animate__animated animate__slideInRight animate__faster">
                         <li class="cursor-pointer text-3xl font-bold my-6 flex justify-end mr-12">
                              <img src="images/cancel.svg" alt="cancel" title="hide navigation panel" class="w-5 h-5 menu"></li>
                         <li class="mobile-link text-center font-bold text-2xl leading-10 mt-10 text-primary"> <a href="#header" >Home</a>  </li>
                         <li class="mobile-link text-center font-bold text-2xl leading-10"> <a href="#about" >About</a>  </li>
                         <li class="mobile-link text-center font-bold text-2xl leading-10"> <a href="#blog" >Blog</a>  </li>
                         <li class="mobile-link text-center font-bold text-2xl leading-10"> <a href="#faq" >FAQs</a>  </li>
                         <li class="text-center font-bold mt-12 text-sm mt-64"> <a href="/privacy">Terms of service   .   Privacy policy</a> </li>
                    </ul>
                    <ul class="hidden md:flex md:justify-end gap-4 text-lg">
                         <li class="link border-b-2 border-primary"> <a href="#header" >Home</a>  </li>
                         <li class="link"> <a href="#about" >About</a>  </li>
                         <li class="link"> <a href="#blog" >Blog</a>  </li>
                         <li class="link"> <a href="#faq" >FAQs</a>  </li>
                         <li > <a href="#waitlist" class="md:bg-primary md:px-6 md:py-3 text-white rounded-full">JOIN OUR WAITLIST</a>  </li>
                    </ul>
               </nav>
          </div>
          <header class="md:flex md:items-center md:justify-between md:bg-hero-bg md:bg-cover md:h-screen overflow-hidden relative px-5 md:px-0" id="header">
               <div class="md:ml-16 mt-8">
                    <h1 class="md:text-6xl text-3xl text-center md:text-left leading-14 md:mb-3 font-bold text-black md:w-11/12 ">Your personal <span class="text-primary">Financial</span> Manager</h1>
                    <h3 class="md:text-2xl text-md font-bold text-center md:text-left mt-2 md:mt-0 leading-7 text-black">Take charge of your finances and secure your future today with <span>ExpenseX</span></h3>
                    <div class="md:border-2 md:border-primary md:rounded-full md:py-3 md:mt-6 md:flex md:justify-between mt-3 grid" >
                         <input type="email" name="" value="" class="w-full border-2 md:border-0 rounded-lg mb-3 md:mb-0 border-primary md:w-72 text-center md:text-2xl text-primary md:ml-10 py-2 focus:outline-0 focus:border-transparent email-only" placeholder="Enter your Email Address">
                         <a href="#waitlist"  class="bg-primary text-center text-white py-2 w-full md:py-4 px-4 rounded-lg md:rounded-full text-md md:text-xl mr-3 join">JOIN THE WAITLIST</a>
                    </div>
               </div>
               <div class="hidden md:block md:ml-28 md:relative md:overflow-hidden md:w-8/12 md:h-4/6 z-20">
                    <img src="images/hero-background.svg" alt="" class="z-0 md:w-auto md:w-6/12 md:ml-9 md:h-3/4">
                    <img src="images/hero-upper.svg" alt="" class="z-20 md:w-auto absolute top-0 left-24 md:w-7/12">
               </div>
          </header>
          <main class=" md:py-24 md:h-screen mt-14 md:mt-0 px-5 md:px-0" id="about">
               <h1 class="text-primary md:text-2xl font-bold md:leading-10 md:tracking-wide text-center block text-xl">HOW DOES IT WORK?</h1>
               <p class="text-center md:leading-9 md:my-4 md:text-2xl block md:tracking-wider md:w-6/12 mx-auto">Find out how ExpenseX can help you achieve your financial goals. All you have to do is sign up and we'll guide you.</p>
               <div class="md:flex md:justify-center mt-8 md:mt-0">
                    <div class="md:flex md:justify-start md:my-10 hidden">
                         <div >
                              <div class="bg-tertiary w-20 h-20 rounded-full flex justify-center items-center">
                                   <img src="images/vector1.svg" alt="plan icon" class="w-10 h-10">
                              </div>
                              <h1 class="text-center md:text-2xl font-bold text-black md:my-4">PLAN</h1>
                         </div>
                         <div class="flex justify-start items-center mx-14 mb-16">
                              <div class="md:w-2 md:h-2 md:rounded-full bg-primary"></div>
                              <div class="md:w-48 md:h-1 bg-primary"></div>
                              <div class="md:w-2 md:h-2 md:rounded-full bg-primary"></div>
                         </div>
                         <div >
                              <div class="bg-tertiary w-20 h-20 rounded-full flex justify-center items-center">
                                   <img src="images/vector2.svg" alt="plan icon" class="w-10 h-10">
                              </div>
                              <h1 class="text-center md:text-2xl font-bold text-black md:my-4">SAVE</h1>
                         </div>
                         <div class="flex justify-start items-center mx-14 mb-16">
                              <div class="md:w-2 md:h-2 md:rounded-full bg-primary"></div>
                              <div class="md:w-48 md:h-1 bg-primary"></div>
                              <div class="md:w-2 md:h-2 md:rounded-full bg-primary"></div>
                         </div>
                         <div >
                              <div class="bg-tertiary w-20 h-20 rounded-full flex justify-center items-center">
                                   <img src="images/vector3.svg" alt="plan icon" class="w-10 h-10">
                              </div>
                              <h1 class="text-center md:text-2xl font-bold text-black md:my-4">INVEST</h1>
                         </div>
                    </div>
                    <div class="md:hidden">
                         <div class="flex justify-start items-center">
                              <img src="images/vector1.svg" alt="plan icon" class="w-14 h-12 rounded-full mr-4">
                              <div class="">
                                   <h1 class="font-bold text-primary text-lg">Plan</h1>
                                   <p class="text-md">Choose from our curated plans to help you manage your finances</p>
                              </div>
                         </div>
                         <div class="flex justify-start items-center mt-4">
                              <img src="images/vector2.svg" alt="plan icon" class="w-14 h-12 rounded-full mr-4">
                              <div class="">
                                   <h1 class="font-bold text-primary text-lg">Save</h1>
                                   <p class="text-md">Store up funds to buy that dream of yours and for emergencies</p>
                              </div>
                         </div>
                         <div class="flex justify-start items-center mt-4">
                              <img src="images/vector3.svg" alt="plan icon" class="w-14 h-12 rounded-full mr-4">
                              <div class="">
                                   <h1 class="font-bold text-primary text-lg">Invest</h1>
                                   <p class="text-md">Find the best and trending opportunities to grow your wealth</p>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="md:flex md:justify-center gap-24 md:w-8/12 md:mx-auto hidden">
                    <p class="text-xl text-center leading-9 tracking-wide md:4/12 md:mx-4">Choose from our curated plans to help you manage your finances</p>
                    <p class="text-xl text-center leading-9 tracking-wide md:4/12 md:mx-4">Store up funds to buy that dream of yours and for emergencies</p>
                    <p class="text-xl text-center leading-9 tracking-wide md:2/12 md:mx-4">Find the best and trending opportunities to grow your wealth</p>
               </div>
          </main>
          <section class=" md:py-0 md:h-screen mt-14 md:mt-0 px-5 md:px-0" id="blog">
               <h1 class="text-primary md:text-3xl text-xl font-bold md:leading-10 md:tracking-wide text-center block mb-6 md:mb-14 md:mt-6">BLOG</h1>
               <div class="md:flex md:justify-center md:gap-24 md:w-10/12 md:mx-auto">
                    <div class="md:overflow-hidden md:rounded md:w-72 shadow-md mt-10 md:shadow-none">
                         <img src="images/freedom.jpg" alt="Image depicting the story of ExpenseX" class="md:w-full md:h-72 md:mb-4">
                         <h2 class="md:text-2xl text-xl font-bold tracking-wide leading-9 text-center md:text-left">ExpenseX: Our story</h2>
                         <p class="block leading-9 text-lg md:text-xl px-1 md:px-0">Out story starts like any other - With an idea. How do we achieve .....</p>
                         <div class="flex justify-center">
                              <a href="#" class="bg-primary py-2 px-6 text-white text-center md:my-3  w-full">Read more</a>
                         </div>
                    </div>
                    <div class="md:overflow-hidden md:rounded md:w-72 shadow-md mt-14 md:shadow-none">
                         <img src="images/richest.jpg" alt="Richest man in Babylon review" class="md:w-full md:h-72 md:mb-4 rounded-md">
                         <h2 class="text-xl text-center md:text-left md:text-2xl font-bold tracking-wide leading-9">The Richest man in Babylon: A review</h2>
                         <p class="block leading-9 text-lg md:text-xl px-1 md:px-0">A book lauded as one of the best financial .....</p>
                         <div class="flex justify-center">
                              <a href="#" class="bg-primary py-2 px-6 text-white text-center md:my-3  w-full">Read more</a>
                         </div>
                    </div>
                    <div class="md:overflow-hidden md:rounded md:w-72 shadow-md mt-14 md:shadow-none">
                         <img src="images/janitor.jpg" alt="The million dollar story" class="md:w-full md:h-72 md:mb-4 rounded-md">
                         <h2 class="text-center md:text-left text-xl md:text-2xl font-bold tracking-wide leading-10 md:py-2">The Million dollar story</h2>
                         <p class="block leading-9 md:text-xl text-lg md:py-2 px-1 md:px-0">How did a Janitor die a millionaire? Let's talk  .....</p>
                         <div class="flex justify-center">
                              <a href="#" class="bg-primary py-2 px-6 text-white text-center md:my-3 w-full">Read more</a>
                         </div>
                    </div>
               </div>
          </section>
          <article class=" md:py-0 md:h-screen md:py-12 mt-12 md:mt-0 px-5 md:px-0" id="faq">
               <h1 class="text-primary md:text-2xl font-bold md:leading-10 md:tracking-wide text-center block text-xl my-2 md:my-0">FREQUENTLY ASKED QUESTIONS</h1>
               <div class="md:w-3/6 md:mx-auto">
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8 my-6 px-2">
                         <p class="md:font-extrabold font-bold text-lg md:text-2xl mb-4 cursor-pointer togglep">How does ExpenseX work? <span><img src="images/dropdown-icon.svg" alt="" class="w-5 h-5 inline mx-1"></span></p>
                         <p class="hidden word md:text-2xl text-black text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8 my-6 px-2">
                         <p class="md:font-extrabold font-bold text-lg md:text-2xl mb-4 cursor-pointer togglep">What does ExpenseX do for me?<span><img src="images/dropdown-icon.svg" alt="" class="w-5 h-5 inline mx-1"></span></p>
                         <p class="hidden word md:text-2xl text-black text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8 my-6 px-2">
                         <p class="md:font-extrabold font-bold text-lg md:text-2xl mb-4 cursor-pointer togglep">When will ExpenseX be available?<span><img src="images/dropdown-icon.svg" alt="" class="w-5 h-5 inline mx-1"></span></p>
                         <p class="hidden word md:text-2xl text-black text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8 my-6 px-2">
                         <p class="md:font-extrabold font-bold text-lg md:text-2xl mb-4 cursor-pointer togglep">How do I become a beta-tester?<span><img src="images/dropdown-icon.svg" alt="" class="w-5 h-5 inline mx-1"></span></p>
                         <p class="hidden word md:text-2xl text-black text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
                    <ol class="border-2 border-gray-200 rounded-3xl py-4 tracking-wide leading-9 md:px-4 md:my-8 my-6 px-2">
                         <p class="md:font-extrabold font-bold text-lg md:text-2xl mb-4 cursor-pointer togglep">Is ExpenseX a registered broker?<span><img src="images/dropdown-icon.svg" alt="" class="w-5 h-5 inline mx-1"></span></p>
                         <p class="hidden word md:text-2xl text-black text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </ol>
               </div>
          </article>
          <section class=" md:py-0 mb-20 md:py-16 mt-16 md:mt-0 px-5 md:px-0" id="waitlist">
               <h1 class="text-primary md:text-2xl font-bold md:leading-10 md:tracking-wide text-center block text-xl my-2 md:my-0">WHAT ARE YOU WAITING FOR?</h1>
               <p class="text-center md:leading-9 md:my-4 md:text-xl block md:tracking-wider md:w-6/12 mx-auto font-bold">Join the waitlist and get early access to our products and services.</p>
               <div class="md:w-4/12 md:mx-auto md:my-3">
                    <p class="status text-center text-xl font-bold text-green"></p>
                    <form class="" method="post">
                         <div class="mt-2 mb-4">
                              <label for="name" class="text-lg md:text-xl text-black leading-9 tracking-wide block font-bold">Name</label>
                              <p class="text-md text-red-600 text-left md:my-2 md:py-1 name-failure"></p>
                              <input type="text" name="name" value="" placeholder="Enter your name" class="block py-2 px-3 text-lg md:text-xl border-2 border-primary font-bold text-primary w-full rounded-2xl" id="name" required>
                         </div>
                         <div class="my-3">
                              <label for="email" class="text-lg md:text-xl text-black leading-9 tracking-wide block font-bold">Email Address</label>
                              <p class="text-md text-red-600 text-left md:my-2 md:py-1 email-failure"></p>
                              <input type="email" name="email" value="" placeholder="Enter your email address" class="block py-2 px-3 text-lg md:text-xl border-2 border-primary font-bold text-primary w-full rounded-2xl" required id="email">
                         </div>
                         <div class="flex justify-center my-8">
                              <button type="button" name="button" class="text-center rounded-md px-10 py-2 bg-primary text-white leading-10 tracking-wider md:text-xl  text-lg w-full font-bold" id="submit">JOIN OUR WAITLIST</button>
                         </div>
                    </form>
               </div>
          </section>
          <footer class="bg-primary md:py-6 py-5 px-5 md:px-0">
               <div class="flex justify-between md:items-start md:w-8/12 md:mx-auto">
                    <p class="text-white text-md  font-bold md:font-normal">&copy 2022 Lumina Ace</p>
                    <a href="/privacy" class="text-white text-xl hidden md:block">Privacy policy</a>
                    <div class="flex justify-end items-center flex-row-reverse gap-5">
                         <a href="https://www.instagram.com/lumina_ace/" target="_blank" >
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-7 w-7 md:h-8 md:w-8 fill-white "version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 56.7 56.7" enable-background="new 0 0 56.7 56.7" xml:space="preserve"><g><path d="M28.2,16.7c-7,0-12.8,5.7-12.8,12.8s5.7,12.8,12.8,12.8S41,36.5,41,29.5S35.2,16.7,28.2,16.7z M28.2,37.7   c-4.5,0-8.2-3.7-8.2-8.2s3.7-8.2,8.2-8.2s8.2,3.7,8.2,8.2S32.7,37.7,28.2,37.7z"/>
                         	<circle cx="41.5" cy="16.4" r="2.9"/>
                         	<path d="M49,8.9c-2.6-2.7-6.3-4.1-10.5-4.1H17.9c-8.7,0-14.5,5.8-14.5,14.5v20.5c0,4.3,1.4,8,4.2,10.7c2.7,2.6,6.3,3.9,10.4,3.9   h20.4c4.3,0,7.9-1.4,10.5-3.9c2.7-2.6,4.1-6.3,4.1-10.6V19.3C53,15.1,51.6,11.5,49,8.9z M48.6,39.9c0,3.1-1.1,5.6-2.9,7.3   s-4.3,2.6-7.3,2.6H18c-3,0-5.5-0.9-7.3-2.6C8.9,45.4,8,42.9,8,39.8V19.3c0-3,0.9-5.5,2.7-7.3c1.7-1.7,4.3-2.6,7.3-2.6h20.6   c3,0,5.5,0.9,7.3,2.7c1.7,1.8,2.7,4.3,2.7,7.2V39.9L48.6,39.9z"/>
                              </g>
                              </svg>
                         </a>
                         <a href="https://twitter.com/ace_lumina?t=baukixMjuhJG4CxMHTGwjQ&s=09" target="_blank" >
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-7 w-7 md:h-8 md:w-8 fill-white" enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve"><path d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/>
                              </svg>
                         </a>
                         <a href="https://medium.com/@antoine.lame/whats-new-in-laravel-november-edition-a114be864adf" target="_blank" >
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 md:h-8 md:w-8 fill-white" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink" height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 1151 1151" width="100%" xml:space="preserve"><g transform="matrix(1,0,0,1,-246.226,-1.33631)"><path d="M883.45,576.26C883.45,739.93 751.67,872.61 589.12,872.61C426.57,872.61 294.78,739.93 294.78,576.26C294.78,412.59 426.56,279.9 589.12,279.9C751.68,279.9 883.45,412.59 883.45,576.26" style="fill-rule:nonzero;"/></g><g transform="matrix(1,0,0,1,-246.226,-1.33631)"><path d="M1206.34,576.26C1206.34,730.32 1140.45,855.26 1059.17,855.26C977.89,855.26 912,730.32 912,576.26C912,422.2 977.88,297.26 1059.16,297.26C1140.44,297.26 1206.33,422.16 1206.33,576.26" style="fill-rule:nonzero;"/></g><g transform="matrix(1,0,0,1,-246.226,-1.33631)"><path d="M1338.41,576.26C1338.41,714.26 1315.24,826.2 1286.65,826.2C1258.06,826.2 1234.9,714.29 1234.9,576.26C1234.9,438.23 1258.07,326.32 1286.65,326.32C1315.23,326.32 1338.41,438.22 1338.41,576.26" style="fill-rule:nonzero;"/></g><g transform="matrix(1,0,0,1,-246.226,-1.33631)"><path d="M1633.77,0L1337.48,0L1337.48,0.25L296.29,0.25L296.29,0L-0,0L-0,1150.07L119.51,1150.07L119.51,1150.51L1529.92,1150.51L1529.92,1150.07L1633.77,1150.07L1633.77,0ZM1337.48,296.54L1337.48,854.21L296.29,854.21L296.29,296.54L1337.48,296.54Z" style="fill:none;fill-rule:nonzero;"/></g>
                              </svg>
                         </a>
                    </div>
               </div>
          </footer>
     </body>
     <script>
          let hiddenP = document.querySelectorAll('.word')
          let togglep = document.querySelectorAll('.togglep')
          let mobileLinks = document.querySelectorAll(".mobile-link")

               togglep.forEach( (item, index, arrayObj) => {
                    item.addEventListener('click', () => {
                         hiddenP[index].classList.toggle("hidden")
                    })
               });

               document.querySelector('#submit').addEventListener('click', () => {
               console.info("I am clicking")
               let name = document.querySelector('#name').value
               let email = document.querySelector('#email').value
               if (name !== '' && name !== undefined && name.length >= 4) {
                    if (email !== '' && email !== undefined && email.length > 9) {
                         // send axios request
                         axios.post('/register', {name: name, mail: email})
                              .then( (res) => {
                                    console.log(res.data)
                                    alert(res.data.message)
                               })
                              .catch(err => console.log(err));
                    }else{
                         document.querySelector('.email-failure').innerHTML = 'Invalid Email: Enter a valid Email Address'
                    }
               }else{
                    document.querySelector('.name-failure').innerHTML = 'Invalid name: Enter a valid name'
                    console.info(name)
               }
          })
          let links = document.querySelectorAll('.link')
               links.forEach((item, index) => {
                    item.addEventListener('click', () => {
                         // Clear all the other border from the other classes
                         ClearLinks()
                         // Add border to the clicked element
                         item.classList.add("border-b-2", "border-primary")
                    })
               });
               function ClearLinks()
               {
                    links.forEach((item, index) => {
                         item.classList.remove("border-b-2", "border-primary")
                    });

               }
               function ClearColors()
               {
                    mobileLinks.forEach((item, index) => {
                         item.classList.remove("text-primary")
                    });
               }
               mobileLinks.forEach((item, i) => {
                    item.addEventListener('click', () => {
                         ClearColors()
                         item.classList.add("text-primary")
                         if (!nav.classList.contains("animate__slideInRight")) {
                              nav.classList.replace("animate__slideInRight", "animate__slideOutRight")
                         }else{
                              nav.classList.replace("animate__slideOutRight", "animate__slideInRight")
                         }
                         nav.classList.toggle("hidden")
                    })
               });

               document.querySelector('.join').addEventListener('click', () => {
                    document.querySelector('#email').value = document.querySelector('.email-only').value
                    alert("Kindly Enter your name")
               })
          // menu
          let menu = document.querySelectorAll(".menu")
          let nav = document.querySelector(".navigation-links-wrapper")
               menu.forEach((item, i) => {
                    item.addEventListener('click', () => {
                         if (!nav.classList.contains("animate__slideInRight")) {
                              nav.classList.replace("animate__slideInRight", "animate__slideOutRight")
                         }else{
                              nav.classList.replace("animate__slideOutRight", "animate__slideInRight")
                         }
                         nav.classList.toggle("hidden")
                    })
               });

     </script>
</html>
