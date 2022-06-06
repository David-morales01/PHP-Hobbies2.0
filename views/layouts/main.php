<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David</title>
    <link rel="stylesheet" href="../dist/styles/style.css">
    <script src="https://kit.fontawesome.com/96a8e20c9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <sidebar class="sidebar scroll-menu-span">
        
        <div class="sidebar__header">
            <a href="#">
            <i class="fas fa-user-circle"></i>
            <span>
                David Morales  
            </span>
            </a>
        </div>
        <div class="sidebar__body">
            <nav>
                <ul>
                    <li>
                        <a href="/">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a> 
                    </li> 
                    <li>
                        <a href="#">
                        <i class="fas fa-user-cog"></i>
                            <span>Usuarios</span>

                            <ul class="sub-menu">

                                <li>
                                    <a href="/users"> 
                                        <i class="far fa-circle nav-icon"></i>
                                        <span>List users</span>
                                    </a>
                                </li><li>
                                    <a href="/createUsers"> 
                                        <i class="far fa-circle nav-icon"></i>
                                        <span>Create users</span>
                                    </a>
                                </li>
                            </ul>
                        </a> 
                    </li>  

 
                </ul>
            </nav>
        </div>
    </sidebar>
    <main class="main">

        <div class="main__header">
            <button class="icon-menu"><i class="class= fas fa-bars "></i></button>
        </div>

        <div class="main__body "> 
            {% block content %}{% endblock %}
        </div>

        <div class="main__footer ">
            footer
        </div>
    </main>
    <script src="../dist/script/main.js">
       
    </script>
</body>

</html>