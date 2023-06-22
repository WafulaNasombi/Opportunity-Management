<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
        
        .background-image {
            position: relative;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url("{{ asset('images/welcome3.jpg') }}");
            background-position: center;
            background-size: cover;
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* opacity  */
        }
        
        .background-image h1 {
            margin-top: 0;
            color: white; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* text shadow for visibility*/
        }

        .background-image h2 {
            margin-top: 10px;
            color:white; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* text shadow for visibility*/
        }

        

        

        .login-register-links {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        
        .login-register-links a {
            margin-left: 10px;
            color: white; 
        }
        
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Adjust the background color as needed */
            padding: 20px;
            margin-bottom: 80px;
            text-align: center; /* Center align the content */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width:30cm;
    
        }
        
        .container h1 {
            color: white; /* Adjust the heading color as needed */
        }



        .container h2 {
            color: white; /* Adjust the subheading color as needed */
            margin-top: 10px; /* Add some space between headings */
        }

        .container button {
            height:fit-content;
            width:fit-content;
             color:black;
            margin-top:5px;
        }

        

        .container-footer {
          
           position: absolute;
           display: flex;
           justify-content:center;
           bottom:1px;
           left: 0;
           width:39.79cm;
           background-color: rgba(0, 0, 0, 0.7);
           padding: 1rem;
           color: white;
            margin: 0 auto;
        }


    </style>
</head>
<body>
    <div class="background-image">
        <div class="overlay"></div>

        <div class="container">
            <h1 class="text-3xl font-bold mt-4">OPPORTUNITY MANAGEMENT</h1>
            <h2 >Welcome!We got what you need</h2>
            <a href="{{ route('steps') }}">
                <button class="hover-color:red">Learn More</button>
            </a>
            
        </div>

        <div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
              <div class="login-register-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                @endif
              </div>
        </div>

        <footer class="footer">
            <div class="container-footer">
                <p>&copy; 2023 Your Website. All rights reserved.</p>
                <p>Designed and developed by Opportunity Management</p>
            </div>
        </footer>
        
    </div>
</body>
</html>
