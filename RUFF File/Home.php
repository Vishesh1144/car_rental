<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar and Page View</title>
    <style>
        /* Add some basic styling to our page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Style the navigation bar */
        .nav-bar {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        
        /* Style the navigation links */
        .nav-bar a {
            color: #fff;
            text-decoration: none;
            margin: 0 1em;
        }
        
        /* Style the page view container */
        .page-view {
            padding: 2em;
        }
        
        /* Style the about us section */
        .about-us {
            background-color: #f0f0f0;
            padding: 1em;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <div class="nav-bar">
        <a href="#home" class="active">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>
    
    <!-- Page view container -->
    <div class="page-view">
        <!-- We'll use JavaScript to dynamically change the content of this container -->
        <div id="page-content"></div>
    </div>
    
    <!-- About us section -->
    <div class="about-us">
        <h2>About Us</h2>
        <p>This is the about us section. It will remain unchanged.</p>
    </div>
    
    <script>
        // Get the navigation links and page view container
        const navLinks = document.querySelectorAll('.nav-bar a');
        const pageView = document.getElementById('page-content');
        
        // Add an event listener to each navigation link
        navLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                // Get the href attribute of the clicked link
                const href = e.target.getAttribute('href');
                
                // Use the href attribute to determine which content to display
                switch (href) {
                    case '#home':
                        pageView.innerHTML = '<h1>Welcome to our website!</h1><p>This is the home page.</p>';
                        break;
                    case '#about':
                        pageView.innerHTML = '<h1>About Us</h1><p>This is the about page.</p>';
                        break;
                    case '#contact':
                        pageView.innerHTML = '<h1>Get in Touch</h1><p>This is the contact page.</p>';
                        break;
                    default:
                        pageView.innerHTML = '<h1>404 Not Found</h1><p>Sorry, we couldn\'t find that page.</p>';
                }
            });
        });
    </script>
</body>
</html>