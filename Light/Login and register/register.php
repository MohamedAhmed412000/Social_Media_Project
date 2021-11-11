<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>social media platform</title>
        <link rel="stylesheet" href="register.css">
    </head>
    <body>
        <div class="container">
            <div class="sign-in-up-container">
                <form class="sign-up-form" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                    <?php include('errors.php'); ?>
                        <h2 class="head">Sign up</h2>
                        <div class="input">
                        <i>   <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00NjcsNjFINDVDMjAuMjE4LDYxLDAsODEuMTk2LDAsMTA2djMwMGMwLDI0LjcyLDIwLjEyOCw0NSw0NSw0NWg0MjJjMjQuNzIsMCw0NS0yMC4xMjgsNDUtNDVWMTA2DQoJCQlDNTEyLDgxLjI4LDQ5MS44NzIsNjEsNDY3LDYxeiBNNDYwLjc4Niw5MUwyNTYuOTU0LDI5NC44MzNMNTEuMzU5LDkxSDQ2MC43ODZ6IE0zMCwzOTkuNzg4VjExMi4wNjlsMTQ0LjQ3OSwxNDMuMjRMMzAsMzk5Ljc4OHoNCgkJCSBNNTEuMjEzLDQyMWwxNDQuNTctMTQ0LjU3bDUwLjY1Nyw1MC4yMjJjNS44NjQsNS44MTQsMTUuMzI3LDUuNzk1LDIxLjE2Ny0wLjA0NkwzMTcsMjc3LjIxM0w0NjAuNzg3LDQyMUg1MS4yMTN6IE00ODIsMzk5Ljc4Nw0KCQkJTDMzOC4yMTMsMjU2TDQ4MiwxMTIuMjEyVjM5OS43ODd6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="width="16"height="16" /></i>
                        <input type="email" name="email" placeholder="Enter your Email address" value="<?php echo $email; ?>">
                        </div>
                        <div class="input">
                        <i>   <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MzcuMDIsMzMwLjk4Yy0yNy44ODMtMjcuODgyLTYxLjA3MS00OC41MjMtOTcuMjgxLTYxLjAxOEMzNzguNTIxLDI0My4yNTEsNDA0LDE5OC41NDgsNDA0LDE0OA0KCQkJQzQwNCw2Ni4zOTMsMzM3LjYwNywwLDI1NiwwUzEwOCw2Ni4zOTMsMTA4LDE0OGMwLDUwLjU0OCwyNS40NzksOTUuMjUxLDY0LjI2MiwxMjEuOTYyDQoJCQljLTM2LjIxLDEyLjQ5NS02OS4zOTgsMzMuMTM2LTk3LjI4MSw2MS4wMThDMjYuNjI5LDM3OS4zMzMsMCw0NDMuNjIsMCw1MTJoNDBjMC0xMTkuMTAzLDk2Ljg5Ny0yMTYsMjE2LTIxNnMyMTYsOTYuODk3LDIxNiwyMTYNCgkJCWg0MEM1MTIsNDQzLjYyLDQ4NS4zNzEsMzc5LjMzMyw0MzcuMDIsMzMwLjk4eiBNMjU2LDI1NmMtNTkuNTUxLDAtMTA4LTQ4LjQ0OC0xMDgtMTA4UzE5Ni40NDksNDAsMjU2LDQwDQoJCQljNTkuNTUxLDAsMTA4LDQ4LjQ0OCwxMDgsMTA4UzMxNS41NTEsMjU2LDI1NiwyNTZ6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="width="16" height="16"></i>
                        <input type="text"placeholder="Username"  name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="input">
                            <i>   <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iX3gzMV9feDJDXzUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDI0IDI0IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0xOC43NSAyNGgtMTMuNWMtMS4yNCAwLTIuMjUtMS4wMDktMi4yNS0yLjI1di0xMC41YzAtMS4yNDEgMS4wMS0yLjI1IDIuMjUtMi4yNWgxMy41YzEuMjQgMCAyLjI1IDEuMDA5IDIuMjUgMi4yNXYxMC41YzAgMS4yNDEtMS4wMSAyLjI1LTIuMjUgMi4yNXptLTEzLjUtMTMuNWMtLjQxMyAwLS43NS4zMzYtLjc1Ljc1djEwLjVjMCAuNDE0LjMzNy43NS43NS43NWgxMy41Yy40MTMgMCAuNzUtLjMzNi43NS0uNzV2LTEwLjVjMC0uNDE0LS4zMzctLjc1LS43NS0uNzV6Ii8+PHBhdGggZD0ibTE3LjI1IDEwLjVjLS40MTQgMC0uNzUtLjMzNi0uNzUtLjc1di0zLjc1YzAtMi40ODEtMi4wMTktNC41LTQuNS00LjVzLTQuNSAyLjAxOS00LjUgNC41djMuNzVjMCAuNDE0LS4zMzYuNzUtLjc1Ljc1cy0uNzUtLjMzNi0uNzUtLjc1di0zLjc1YzAtMy4zMDkgMi42OTEtNiA2LTZzNiAyLjY5MSA2IDZ2My43NWMwIC40MTQtLjMzNi43NS0uNzUuNzV6Ii8+PHBhdGggZD0ibTEyIDE3Yy0xLjEwMyAwLTItLjg5Ny0yLTJzLjg5Ny0yIDItMiAyIC44OTcgMiAyLS44OTcgMi0yIDJ6bTAtMi41Yy0uMjc1IDAtLjUuMjI0LS41LjVzLjIyNS41LjUuNS41LS4yMjQuNS0uNS0uMjI1LS41LS41LS41eiIvPjxwYXRoIGQ9Im0xMiAyMGMtLjQxNCAwLS43NS0uMzM2LS43NS0uNzV2LTIuNzVjMC0uNDE0LjMzNi0uNzUuNzUtLjc1cy43NS4zMzYuNzUuNzV2Mi43NWMwIC40MTQtLjMzNi43NS0uNzUuNzV6Ii8+PC9zdmc+" width="16" height="16"></i>
                            <input type="password" placeholder="Password" name="password_1">
                        </div>
                        <div class="input">
                            <i>   <img src="data:image/svg+xml;base64,PHN2ZyBpZD0iX3gzMV9feDJDXzUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDI0IDI0IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0xOC43NSAyNGgtMTMuNWMtMS4yNCAwLTIuMjUtMS4wMDktMi4yNS0yLjI1di0xMC41YzAtMS4yNDEgMS4wMS0yLjI1IDIuMjUtMi4yNWgxMy41YzEuMjQgMCAyLjI1IDEuMDA5IDIuMjUgMi4yNXYxMC41YzAgMS4yNDEtMS4wMSAyLjI1LTIuMjUgMi4yNXptLTEzLjUtMTMuNWMtLjQxMyAwLS43NS4zMzYtLjc1Ljc1djEwLjVjMCAuNDE0LjMzNy43NS43NS43NWgxMy41Yy40MTMgMCAuNzUtLjMzNi43NS0uNzV2LTEwLjVjMC0uNDE0LS4zMzctLjc1LS43NS0uNzV6Ii8+PHBhdGggZD0ibTE3LjI1IDEwLjVjLS40MTQgMC0uNzUtLjMzNi0uNzUtLjc1di0zLjc1YzAtMi40ODEtMi4wMTktNC41LTQuNS00LjVzLTQuNSAyLjAxOS00LjUgNC41djMuNzVjMCAuNDE0LS4zMzYuNzUtLjc1Ljc1cy0uNzUtLjMzNi0uNzUtLjc1di0zLjc1YzAtMy4zMDkgMi42OTEtNiA2LTZzNiAyLjY5MSA2IDZ2My43NWMwIC40MTQtLjMzNi43NS0uNzUuNzV6Ii8+PHBhdGggZD0ibTEyIDE3Yy0xLjEwMyAwLTItLjg5Ny0yLTJzLjg5Ny0yIDItMiAyIC44OTcgMiAyLS44OTcgMi0yIDJ6bTAtMi41Yy0uMjc1IDAtLjUuMjI0LS41LjVzLjIyNS41LjUuNS41LS4yMjQuNS0uNS0uMjI1LS41LS41LS41eiIvPjxwYXRoIGQ9Im0xMiAyMGMtLjQxNCAwLS43NS0uMzM2LS43NS0uNzV2LTIuNzVjMC0uNDE0LjMzNi0uNzUuNzUtLjc1cy43NS4zMzYuNzUuNzV2Mi43NWMwIC40MTQtLjMzNi43NS0uNzUuNzV6Ii8+PC9zdmc+" width="16" height="16"></i>
                            <input type="password" placeholder="Confirm Password" name="password_2">
                        </div>
    
                        <button type="submit" class="sign-up" name="reg_user">Sign-up</button>
                        <br>
                        <br>
                        <p>Already have an account </p>
                        <br>
                        <button type="button" class="login"><a style = "text-decoration: none;" href="login.php">Sign in</a></button>
                </form>
            </div>
        </div>
    </body>
</html>