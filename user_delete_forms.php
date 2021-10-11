<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Borrow Device</title>
  </head>

  <style>
    .button_image {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    .button_images{
      border-radius: 8px;
    }

    .center {
      margin: auto;
      width: 60%;

    }

    .logout {
      border: none;
      color: white;
      padding: 5px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .cancel {
      border: none;
      color: white;
      padding: 1px 5px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }
    
    .logoutbtn {
      color: black; 
      border: 1px solid #C70039;
    }

    .cancelbtn {
      color: black; 
      border: 1px solid #C70039;
    }
  </style>

<?php

include('database.php'); //ติดต่อฐานข้อมูล
$id = $_GET['id'];
$sql = "
    SELECT * 
    FROM user 
    WHERE id = {$id}
";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);

?>

<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
           <b class="navbar-brand" style="font-size=100px;">EGAT</b>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto ">
                <li class="nav-item">
                <a class="nav-link active mt-3" aria-current="page" href="devicelist.php" ><h5>Home <img class="mb-1" style="width: 25px; height: 25px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHJlY3QgeD0iMzgyLjkzMyIgeT0iNzMuNiIgc3R5bGU9ImZpbGw6I0YwNTU0MDsiIHdpZHRoPSI1OC42NjciIGhlaWdodD0iMTAyLjQiLz4NCjxyZWN0IHg9IjM2MC41MzMiIHk9IjIxLjMzMyIgc3R5bGU9ImZpbGw6I0YzNzA1QTsiIHdpZHRoPSIxMDMuNDY3IiBoZWlnaHQ9IjU1LjQ2NyIvPg0KPHBhdGggc3R5bGU9ImZpbGw6I0ZGRDE1QzsiIGQ9Ik00NC44LDI3Ni4yNjdWNTEyaDQxOC4xMzNWMjc2LjI2N2MtODIuMTMzLTgyLjEzMy0xMjgtMTI4LTIwOS4wNjctMjA5LjA2N2wwLDANCglDMTcyLjgsMTQ5LjMzMywxMjYuOTMzLDE5NS4yLDQ0LjgsMjc2LjI2N3oiLz4NCjxwYXRoIHN0eWxlPSJmaWxsOiNGN0I2NEM7IiBkPSJNNDY0LDI3Ni4yNjdjLTgyLjEzMy04Mi4xMzMtMTI4LTEyOC0yMDkuMDY3LTIwOS4wNjdjLTQxLjYsNDAuNTMzLTczLjYsNzIuNTMzLTEwNS42LDEwNC41MzMNCglzLTY0LDY0LTEwNC41MzMsMTA0LjUzM3Y0OGM4Mi4xMzMtODIuMTMzLDEyOC0xMjgsMjA5LjA2Ny0yMDkuMDY3YzgyLjEzMyw4Mi4xMzMsMTI4LDEyOCwyMDkuMDY3LDIwOS4wNjd2Ni40bDAsMHYtNTQuNEg0NjR6Ii8+DQo8cGF0aCBzdHlsZT0iZmlsbDojNDE1QTZCOyIgZD0iTTIxNi41MzMsNTEySDkwLjY2N1YzODguMjY3YzAtMzUuMiwyOC44LTYyLjkzMyw2Mi45MzMtNjIuOTMzbDAsMGMzNS4yLDAsNjIuOTMzLDI4LjgsNjIuOTMzLDYyLjkzMw0KCVY1MTJ6Ii8+DQo8cmVjdCB4PSIyNTMuODY3IiB5PSIzMjUuMzMzIiBzdHlsZT0iZmlsbDojMzQ0QTVFOyIgd2lkdGg9IjE2NC4yNjciIGhlaWdodD0iMTQ0Ii8+DQo8Zz4NCgk8cmVjdCB4PSIyNzAuOTMzIiB5PSIzNDIuNCIgc3R5bGU9ImZpbGw6IzhBRDdGODsiIHdpZHRoPSI1Ni41MzMiIGhlaWdodD0iMTA5Ljg2NyIvPg0KCTxyZWN0IHg9IjM0NC41MzMiIHk9IjM0Mi40IiBzdHlsZT0iZmlsbDojOEFEN0Y4OyIgd2lkdGg9IjU2LjUzMyIgaGVpZ2h0PSIxMDkuODY3Ii8+DQo8L2c+DQo8cGF0aCBzdHlsZT0iZmlsbDojRjM3MDVBOyIgZD0iTTUwMi40LDIzMi41MzNMMjc5LjQ2Nyw5LjZjLTEyLjgtMTIuOC0zNS4yLTEyLjgtNDgsMEw5LjYsMjMyLjUzM2MtMTIuOCwxMi44LTEyLjgsMzUuMiwwLDQ4DQoJYzEyLjgsMTIuOCwzNS4yLDEyLjgsNDgsMEwyNTYsODIuMTMzbDE5OC40LDE5OC40YzEyLjgsMTIuOCwzNS4yLDEyLjgsNDgsMEM1MTUuMiwyNjYuNjY3LDUxNS4yLDI0NS4zMzMsNTAyLjQsMjMyLjUzM3oiLz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K" /></h5></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active mt-3" aria-current="page" href="manage_device.php"><h5>Manage Device <img style="width: 25px; height: 25px;" src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIuMDg5IDUxMi4wODkiIGhlaWdodD0iNTEyIiB2aWV3Qm94PSIwIDAgNTEyLjA4OSA1MTIuMDg5IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxnPjxwYXRoIGQ9Im0zNzEuMzE3IDQwLjU0N2MwLTIyLjM0NSAxOC4xMTQtNDAuNDU4IDQwLjQ1OC00MC40NThoLTMxNC45MTJjLTE3Ljc2OSAwLTMyLjE3NCAxNC40MDUtMzIuMTc0IDMyLjE3NHYzNjYuMzgxaDMwNi42Mjd2LTI5Ny4wMy0yMC42MDgtNDAuNDU5eiIgZmlsbD0iI2ZmZTA3ZCIvPjwvZz48cGF0aCBkPSJtMzg3LjM0OS4wODljLTIyLjM0NSAwLTQwLjQ1OCAxOC4xMTQtNDAuNDU4IDQwLjQ1OHYxNjAuNDQzYzAgOS40NC02LjIgMTcuODM4LTE1LjI4NiAyMC40LTY2Ljk5OSAxOC44OTItMTE2LjEwNyA4MC40NTctMTE2LjEwNyAxNTMuNSAwIDE5LjIwMyAzLjM5NiAzNy42MTMgOS42MTcgNTQuNjYzaDEyMS43NzYgMjQuNDI2di0yMTQuMDk3LTExMy44NDMtNjEuMDY2YzAtMjIuMzQ1IDE4LjExNC00MC40NTggNDAuNDU4LTQwLjQ1OGgtMjQuNDI2eiIgZmlsbD0iI2ZmZDA2NCIvPjxnPjxnPjxwYXRoIGQ9Im0zMjIuNDE4IDY5Ljg2OGgtMjAyLjY5OWMtNC4yNjggMC03LjcyOC0zLjQ1OS03LjcyOC03LjcyOHMzLjQ1OS03LjcyOCA3LjcyOC03LjcyOGgyMDIuNjk5YzQuMjY4IDAgNy43MjggMy40NTkgNy43MjggNy43MjhzLTMuNDYgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMmI0ZDY2Ii8+PC9nPjxnPjxwYXRoIGQ9Im0zMjIuNDE4IDE0Ni45MjZoLTIwMi42OTljLTQuMjY4IDAtNy43MjgtMy40NTktNy43MjgtNy43MjhzMy40NTktNy43MjggNy43MjgtNy43MjhoMjAyLjY5OWM0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4cy0zLjQ2IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzJiNGQ2NiIvPjwvZz48Zz48cGF0aCBkPSJtMzIyLjQxOCAyMjMuOTg2aC0yMDIuNjk5Yy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4IDAtNC4yNjggMy40NTktNy43MjggNy43MjgtNy43MjhoMjAyLjY5OWM0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4cy0zLjQ2IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzJiNGQ2NiIvPjwvZz48Zz48cGF0aCBkPSJtMzIyLjQxOCAzMDEuMDQ1aC0yMDIuNjk5Yy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4czMuNDU5LTcuNzI4IDcuNzI4LTcuNzI4aDIwMi42OTljNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHMtMy40NiA3LjcyOC03LjcyOCA3LjcyOHoiIGZpbGw9IiMyYjRkNjYiLz48L2c+PC9nPjxwYXRoIGQ9Im0zMzQuMzUyIDQyOS41NTVoLTI3Ny4xNTFjLTMxLjU5MSAwLTU3LjIwMS0yNS42MS01Ny4yMDEtNTcuMjAydi0xMC4xM2MwLTIuNjc3IDIuMTcxLTQuODQ4IDQuODQ4LTQuODQ4aDMyOS41MDR6IiBmaWxsPSIjZWFiMTRkIi8+PHBhdGggZD0ibTIxNS40OTggMzc0Ljg5MWMwIDE5LjIwMyAzLjM5NiAzNy42MTMgOS42MTcgNTQuNjYzaDEwOS4yMzd2LTcyLjE4aC0xMTcuODkyYy0uNjI5IDUuNzU0LS45NjIgMTEuNTk3LS45NjIgMTcuNTE3eiIgZmlsbD0iI2U0OTU0MiIvPjxjaXJjbGUgY3g9IjM3NC45OCIgY3k9IjM3NC44OTEiIGZpbGw9IiNkZDYzNmUiIHI9IjEzNy4xMDkiLz48cGF0aCBkPSJtMzc0Ljk4IDIzNy43ODJjLTMuNjM1IDAtNy4yMzYuMTQ0LTEwLjguNDIyIDcwLjY3NSA1LjUwNyAxMjYuMzA5IDY0LjU5OSAxMjYuMzA5IDEzNi42ODdzLTU1LjYzNSAxMzEuMTgtMTI2LjMwOSAxMzYuNjg3YzMuNTY0LjI3OCA3LjE2NS40MjIgMTAuOC40MjIgNzUuNzIzIDAgMTM3LjEwOS02MS4zODYgMTM3LjEwOS0xMzcuMTA5cy02MS4zODYtMTM3LjEwOS0xMzcuMTA5LTEzNy4xMDl6IiBmaWxsPSIjZGE0YTU0Ii8+PGNpcmNsZSBjeD0iMzc0Ljk4IiBjeT0iMzc0Ljg5MSIgZmlsbD0iI2Y0ZmJmZiIgcj0iMTAyLjI2OCIvPjxwYXRoIGQ9Im0zNzQuOTggMjcyLjYyM2MtNC43MzkgMC05LjQuMzMtMTMuOTY3Ljk1MyA0OS44NzMgNi44MTIgODguMzAxIDQ5LjU3MiA4OC4zMDEgMTAxLjMxNXMtMzguNDI5IDk0LjUwMy04OC4zMDEgMTAxLjMxNWM0LjU2Ny42MjQgOS4yMjguOTUzIDEzLjk2Ny45NTMgNTYuNDgxIDAgMTAyLjI2OC00NS43ODcgMTAyLjI2OC0xMDIuMjY5IDAtNTYuNDgtNDUuNzg3LTEwMi4yNjctMTAyLjI2OC0xMDIuMjY3eiIgZmlsbD0iI2RhZjFmNCIvPjxnPjxnPjxwYXRoIGQ9Im0zNzQuOTggMzExLjgyNGMtNC4yNjggMC03LjcyOC0zLjQ1OS03LjcyOC03LjcyOHYtMy41NGMwLTQuMjY4IDMuNDU5LTcuNzI4IDcuNzI4LTcuNzI4IDQuMjY4IDAgNy43MjggMy40NTkgNy43MjggNy43Mjh2My41NGMwIDQuMjY5LTMuNDU5IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48Zz48cGF0aCBkPSJtNDI1LjAzOSAzMzIuNTU5Yy0xLjk3OCAwLTMuOTU2LS43NTUtNS40NjYtMi4yNjUtMy4wMTctMy4wMTgtMy4wMTYtNy45MTEuMDAzLTEwLjkyOGwyLjUwMy0yLjUwMmMzLjAxOC0zLjAxNiA3LjkxMS0zLjAxNyAxMC45MjguMDAzIDMuMDE3IDMuMDE4IDMuMDE2IDcuOTExLS4wMDMgMTAuOTI4bC0yLjUwMyAyLjUwMmMtMS41MDcgMS41MDgtMy40ODQgMi4yNjItNS40NjIgMi4yNjJ6IiBmaWxsPSIjMzY1ZTdkIi8+PC9nPjxnPjxwYXRoIGQ9Im00NDkuMzE0IDM4Mi42MThoLTMuNTRjLTQuMjY4IDAtNy43MjgtMy40NTktNy43MjgtNy43MjhzMy40NTktNy43MjggNy43MjgtNy43MjhoMy41NGM0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4cy0zLjQ2IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48Zz48cGF0aCBkPSJtMzA0LjE4NSAzODIuNjE4aC0zLjU0Yy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4czMuNDU5LTcuNzI4IDcuNzI4LTcuNzI4aDMuNTRjNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHMtMy40NTkgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMzY1ZTdkIi8+PC9nPjxnPjxwYXRoIGQ9Im00MjcuNTQzIDQzNS4xODFjLTEuOTc3IDAtMy45NTQtLjc1NC01LjQ2My0yLjI2MmwtMi41MDMtMi41MDJjLTMuMDE5LTMuMDE4LTMuMDItNy45MTEtLjAwMy0xMC45MjggMy4wMTctMy4wMjEgNy45MS0zLjAyMiAxMC45MjgtLjAwM2wyLjUwMyAyLjUwMmMzLjAxOSAzLjAxOCAzLjAyIDcuOTExLjAwMyAxMC45MjgtMS41MDkgMS41MS0zLjQ4NyAyLjI2NS01LjQ2NSAyLjI2NXoiIGZpbGw9IiMzNjVlN2QiLz48L2c+PGc+PHBhdGggZD0ibTM3NC45OCA0NTYuOTUzYy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4di0zLjU0YzAtNC4yNjggMy40NTktNy43MjggNy43MjgtNy43MjggNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHYzLjU0YzAgNC4yNjktMy40NTkgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMzY1ZTdkIi8+PC9nPjxnPjxwYXRoIGQ9Im0zMjIuNDE4IDQzNS4xODFjLTEuOTc3IDAtMy45NTUtLjc1NS01LjQ2NS0yLjI2My0zLjAxOC0zLjAxOS0zLjAxOC03LjkxMSAwLTEwLjkyOWwyLjUwMi0yLjUwMmMzLjAxOS0zLjAxNyA3LjkxMS0zLjAxNyAxMC45MjkgMCAzLjAxOCAzLjAxOSAzLjAxOCA3LjkxMSAwIDEwLjkyOWwtMi41MDIgMi41MDJjLTEuNTA5IDEuNTA4LTMuNDg3IDIuMjYzLTUuNDY0IDIuMjYzeiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48Zz48cGF0aCBkPSJtMzI0LjkyIDMzMi41NTljLTEuOTc3IDAtMy45NTUtLjc1NS01LjQ2NS0yLjI2M2wtMi41MDItMi41MDJjLTMuMDE4LTMuMDE5LTMuMDE4LTcuOTExIDAtMTAuOTI5IDMuMDE5LTMuMDE3IDcuOTExLTMuMDE3IDEwLjkyOSAwbDIuNTAyIDIuNTAyYzMuMDE4IDMuMDE5IDMuMDE4IDcuOTExIDAgMTAuOTI5LTEuNTA4IDEuNTA5LTMuNDg3IDIuMjYzLTUuNDY0IDIuMjYzeiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48L2c+PGc+PHBhdGggZD0ibTM5Ni4wNDMgMzgyLjYxOGgtMjEuMDYzYy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4di00MC43ODZjMC00LjI2OCAzLjQ1OS03LjcyOCA3LjcyOC03LjcyOCA0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4djMzLjA1OGgxMy4zMzVjNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHMtMy40NTkgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMmI0ZDY2Ii8+PC9nPjxwYXRoIGQ9Im00NDUuMDMxIDEwMS42MTNoLTczLjcxNXYtNjEuMDY2YzAtMjIuMzQ1IDE4LjExNC00MC40NTggNDAuNDU4LTQwLjQ1OCAyMi4zNDUgMCA0MC40NTggMTguMTE0IDQwLjQ1OCA0MC40NTh2NTMuODY0Yy4wMDIgMy45NzgtMy4yMjMgNy4yMDItNy4yMDEgNy4yMDJ6IiBmaWxsPSIjZWFiMTRkIi8+PHBhdGggZD0ibTQyNC45NTUgMi4yOTdjLTQuMTMzLTEuNDI0LTguNTYzLTIuMjA4LTEzLjE4LTIuMjA4LTIyLjM0NCAwLTQwLjQ1OCAxOC4xMTQtNDAuNDU4IDQwLjQ1OHY2MS4wNjZoMjYuMzZ2LTYxLjA2NmMtLjAwMS0xNy43MjggMTEuNDA3LTMyLjc4MiAyNy4yNzgtMzguMjV6IiBmaWxsPSIjZTQ5NTQyIi8+PC9nPjwvc3ZnPg==" /></h5></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active mt-3" aria-current="page" href="manage_user.php"><h5>Manage User<img style="width: 25px; height: 25px;" src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIuMDg5IDUxMi4wODkiIGhlaWdodD0iNTEyIiB2aWV3Qm94PSIwIDAgNTEyLjA4OSA1MTIuMDg5IiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxnPjxwYXRoIGQ9Im0zNzEuMzE3IDQwLjU0N2MwLTIyLjM0NSAxOC4xMTQtNDAuNDU4IDQwLjQ1OC00MC40NThoLTMxNC45MTJjLTE3Ljc2OSAwLTMyLjE3NCAxNC40MDUtMzIuMTc0IDMyLjE3NHYzNjYuMzgxaDMwNi42Mjd2LTI5Ny4wMy0yMC42MDgtNDAuNDU5eiIgZmlsbD0iI2ZmZTA3ZCIvPjwvZz48cGF0aCBkPSJtMzg3LjM0OS4wODljLTIyLjM0NSAwLTQwLjQ1OCAxOC4xMTQtNDAuNDU4IDQwLjQ1OHYxNjAuNDQzYzAgOS40NC02LjIgMTcuODM4LTE1LjI4NiAyMC40LTY2Ljk5OSAxOC44OTItMTE2LjEwNyA4MC40NTctMTE2LjEwNyAxNTMuNSAwIDE5LjIwMyAzLjM5NiAzNy42MTMgOS42MTcgNTQuNjYzaDEyMS43NzYgMjQuNDI2di0yMTQuMDk3LTExMy44NDMtNjEuMDY2YzAtMjIuMzQ1IDE4LjExNC00MC40NTggNDAuNDU4LTQwLjQ1OGgtMjQuNDI2eiIgZmlsbD0iI2ZmZDA2NCIvPjxnPjxnPjxwYXRoIGQ9Im0zMjIuNDE4IDY5Ljg2OGgtMjAyLjY5OWMtNC4yNjggMC03LjcyOC0zLjQ1OS03LjcyOC03LjcyOHMzLjQ1OS03LjcyOCA3LjcyOC03LjcyOGgyMDIuNjk5YzQuMjY4IDAgNy43MjggMy40NTkgNy43MjggNy43MjhzLTMuNDYgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMmI0ZDY2Ii8+PC9nPjxnPjxwYXRoIGQ9Im0zMjIuNDE4IDE0Ni45MjZoLTIwMi42OTljLTQuMjY4IDAtNy43MjgtMy40NTktNy43MjgtNy43MjhzMy40NTktNy43MjggNy43MjgtNy43MjhoMjAyLjY5OWM0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4cy0zLjQ2IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzJiNGQ2NiIvPjwvZz48Zz48cGF0aCBkPSJtMzIyLjQxOCAyMjMuOTg2aC0yMDIuNjk5Yy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4IDAtNC4yNjggMy40NTktNy43MjggNy43MjgtNy43MjhoMjAyLjY5OWM0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4cy0zLjQ2IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzJiNGQ2NiIvPjwvZz48Zz48cGF0aCBkPSJtMzIyLjQxOCAzMDEuMDQ1aC0yMDIuNjk5Yy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4czMuNDU5LTcuNzI4IDcuNzI4LTcuNzI4aDIwMi42OTljNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHMtMy40NiA3LjcyOC03LjcyOCA3LjcyOHoiIGZpbGw9IiMyYjRkNjYiLz48L2c+PC9nPjxwYXRoIGQ9Im0zMzQuMzUyIDQyOS41NTVoLTI3Ny4xNTFjLTMxLjU5MSAwLTU3LjIwMS0yNS42MS01Ny4yMDEtNTcuMjAydi0xMC4xM2MwLTIuNjc3IDIuMTcxLTQuODQ4IDQuODQ4LTQuODQ4aDMyOS41MDR6IiBmaWxsPSIjZWFiMTRkIi8+PHBhdGggZD0ibTIxNS40OTggMzc0Ljg5MWMwIDE5LjIwMyAzLjM5NiAzNy42MTMgOS42MTcgNTQuNjYzaDEwOS4yMzd2LTcyLjE4aC0xMTcuODkyYy0uNjI5IDUuNzU0LS45NjIgMTEuNTk3LS45NjIgMTcuNTE3eiIgZmlsbD0iI2U0OTU0MiIvPjxjaXJjbGUgY3g9IjM3NC45OCIgY3k9IjM3NC44OTEiIGZpbGw9IiNkZDYzNmUiIHI9IjEzNy4xMDkiLz48cGF0aCBkPSJtMzc0Ljk4IDIzNy43ODJjLTMuNjM1IDAtNy4yMzYuMTQ0LTEwLjguNDIyIDcwLjY3NSA1LjUwNyAxMjYuMzA5IDY0LjU5OSAxMjYuMzA5IDEzNi42ODdzLTU1LjYzNSAxMzEuMTgtMTI2LjMwOSAxMzYuNjg3YzMuNTY0LjI3OCA3LjE2NS40MjIgMTAuOC40MjIgNzUuNzIzIDAgMTM3LjEwOS02MS4zODYgMTM3LjEwOS0xMzcuMTA5cy02MS4zODYtMTM3LjEwOS0xMzcuMTA5LTEzNy4xMDl6IiBmaWxsPSIjZGE0YTU0Ii8+PGNpcmNsZSBjeD0iMzc0Ljk4IiBjeT0iMzc0Ljg5MSIgZmlsbD0iI2Y0ZmJmZiIgcj0iMTAyLjI2OCIvPjxwYXRoIGQ9Im0zNzQuOTggMjcyLjYyM2MtNC43MzkgMC05LjQuMzMtMTMuOTY3Ljk1MyA0OS44NzMgNi44MTIgODguMzAxIDQ5LjU3MiA4OC4zMDEgMTAxLjMxNXMtMzguNDI5IDk0LjUwMy04OC4zMDEgMTAxLjMxNWM0LjU2Ny42MjQgOS4yMjguOTUzIDEzLjk2Ny45NTMgNTYuNDgxIDAgMTAyLjI2OC00NS43ODcgMTAyLjI2OC0xMDIuMjY5IDAtNTYuNDgtNDUuNzg3LTEwMi4yNjctMTAyLjI2OC0xMDIuMjY3eiIgZmlsbD0iI2RhZjFmNCIvPjxnPjxnPjxwYXRoIGQ9Im0zNzQuOTggMzExLjgyNGMtNC4yNjggMC03LjcyOC0zLjQ1OS03LjcyOC03LjcyOHYtMy41NGMwLTQuMjY4IDMuNDU5LTcuNzI4IDcuNzI4LTcuNzI4IDQuMjY4IDAgNy43MjggMy40NTkgNy43MjggNy43Mjh2My41NGMwIDQuMjY5LTMuNDU5IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48Zz48cGF0aCBkPSJtNDI1LjAzOSAzMzIuNTU5Yy0xLjk3OCAwLTMuOTU2LS43NTUtNS40NjYtMi4yNjUtMy4wMTctMy4wMTgtMy4wMTYtNy45MTEuMDAzLTEwLjkyOGwyLjUwMy0yLjUwMmMzLjAxOC0zLjAxNiA3LjkxMS0zLjAxNyAxMC45MjguMDAzIDMuMDE3IDMuMDE4IDMuMDE2IDcuOTExLS4wMDMgMTAuOTI4bC0yLjUwMyAyLjUwMmMtMS41MDcgMS41MDgtMy40ODQgMi4yNjItNS40NjIgMi4yNjJ6IiBmaWxsPSIjMzY1ZTdkIi8+PC9nPjxnPjxwYXRoIGQ9Im00NDkuMzE0IDM4Mi42MThoLTMuNTRjLTQuMjY4IDAtNy43MjgtMy40NTktNy43MjgtNy43MjhzMy40NTktNy43MjggNy43MjgtNy43MjhoMy41NGM0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4cy0zLjQ2IDcuNzI4LTcuNzI4IDcuNzI4eiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48Zz48cGF0aCBkPSJtMzA0LjE4NSAzODIuNjE4aC0zLjU0Yy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4czMuNDU5LTcuNzI4IDcuNzI4LTcuNzI4aDMuNTRjNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHMtMy40NTkgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMzY1ZTdkIi8+PC9nPjxnPjxwYXRoIGQ9Im00MjcuNTQzIDQzNS4xODFjLTEuOTc3IDAtMy45NTQtLjc1NC01LjQ2My0yLjI2MmwtMi41MDMtMi41MDJjLTMuMDE5LTMuMDE4LTMuMDItNy45MTEtLjAwMy0xMC45MjggMy4wMTctMy4wMjEgNy45MS0zLjAyMiAxMC45MjgtLjAwM2wyLjUwMyAyLjUwMmMzLjAxOSAzLjAxOCAzLjAyIDcuOTExLjAwMyAxMC45MjgtMS41MDkgMS41MS0zLjQ4NyAyLjI2NS01LjQ2NSAyLjI2NXoiIGZpbGw9IiMzNjVlN2QiLz48L2c+PGc+PHBhdGggZD0ibTM3NC45OCA0NTYuOTUzYy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4di0zLjU0YzAtNC4yNjggMy40NTktNy43MjggNy43MjgtNy43MjggNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHYzLjU0YzAgNC4yNjktMy40NTkgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMzY1ZTdkIi8+PC9nPjxnPjxwYXRoIGQ9Im0zMjIuNDE4IDQzNS4xODFjLTEuOTc3IDAtMy45NTUtLjc1NS01LjQ2NS0yLjI2My0zLjAxOC0zLjAxOS0zLjAxOC03LjkxMSAwLTEwLjkyOWwyLjUwMi0yLjUwMmMzLjAxOS0zLjAxNyA3LjkxMS0zLjAxNyAxMC45MjkgMCAzLjAxOCAzLjAxOSAzLjAxOCA3LjkxMSAwIDEwLjkyOWwtMi41MDIgMi41MDJjLTEuNTA5IDEuNTA4LTMuNDg3IDIuMjYzLTUuNDY0IDIuMjYzeiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48Zz48cGF0aCBkPSJtMzI0LjkyIDMzMi41NTljLTEuOTc3IDAtMy45NTUtLjc1NS01LjQ2NS0yLjI2M2wtMi41MDItMi41MDJjLTMuMDE4LTMuMDE5LTMuMDE4LTcuOTExIDAtMTAuOTI5IDMuMDE5LTMuMDE3IDcuOTExLTMuMDE3IDEwLjkyOSAwbDIuNTAyIDIuNTAyYzMuMDE4IDMuMDE5IDMuMDE4IDcuOTExIDAgMTAuOTI5LTEuNTA4IDEuNTA5LTMuNDg3IDIuMjYzLTUuNDY0IDIuMjYzeiIgZmlsbD0iIzM2NWU3ZCIvPjwvZz48L2c+PGc+PHBhdGggZD0ibTM5Ni4wNDMgMzgyLjYxOGgtMjEuMDYzYy00LjI2OCAwLTcuNzI4LTMuNDU5LTcuNzI4LTcuNzI4di00MC43ODZjMC00LjI2OCAzLjQ1OS03LjcyOCA3LjcyOC03LjcyOCA0LjI2OCAwIDcuNzI4IDMuNDU5IDcuNzI4IDcuNzI4djMzLjA1OGgxMy4zMzVjNC4yNjggMCA3LjcyOCAzLjQ1OSA3LjcyOCA3LjcyOHMtMy40NTkgNy43MjgtNy43MjggNy43Mjh6IiBmaWxsPSIjMmI0ZDY2Ii8+PC9nPjxwYXRoIGQ9Im00NDUuMDMxIDEwMS42MTNoLTczLjcxNXYtNjEuMDY2YzAtMjIuMzQ1IDE4LjExNC00MC40NTggNDAuNDU4LTQwLjQ1OCAyMi4zNDUgMCA0MC40NTggMTguMTE0IDQwLjQ1OCA0MC40NTh2NTMuODY0Yy4wMDIgMy45NzgtMy4yMjMgNy4yMDItNy4yMDEgNy4yMDJ6IiBmaWxsPSIjZWFiMTRkIi8+PHBhdGggZD0ibTQyNC45NTUgMi4yOTdjLTQuMTMzLTEuNDI0LTguNTYzLTIuMjA4LTEzLjE4LTIuMjA4LTIyLjM0NCAwLTQwLjQ1OCAxOC4xMTQtNDAuNDU4IDQwLjQ1OHY2MS4wNjZoMjYuMzZ2LTYxLjA2NmMtLjAwMS0xNy43MjggMTEuNDA3LTMyLjc4MiAyNy4yNzgtMzguMjV6IiBmaWxsPSIjZTQ5NTQyIi8+PC9nPjwvc3ZnPg==" /></h5></a>
                </li>
            </ul>

            <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNDgwIDQ4MCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDgwIDQ4MDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHBhdGggc3R5bGU9ImZpbGw6I0VGRUNFODsiIGQ9Ik0yNDAsOEMxMTEuODcyLDgsOCwxMTEuODcyLDgsMjQwYzAsNTYuMjU2LDIwLjAzMiwxMDcuODI0LDUzLjMzNiwxNDcuOTkyDQoJYzE1LjUxMi02My4xNzYsNjMuNjg4LTExMy4zODQsMTI1LjU1Mi0xMzIuMDRDMTYxLjA0OCwyMzguNzQ0LDE0NCwyMDkuMzc2LDE0NCwxNzZjMC01My4wMTYsNDIuOTg0LTk2LDk2LTk2czk2LDQyLjk4NCw5Niw5Ng0KCWMwLDMzLjM3Ni0xNy4wNDgsNjIuNzQ0LTQyLjg5Niw3OS45NTJjNjEuODY0LDE4LjY1NiwxMTAuMDQsNjguODY0LDEyNS41NTIsMTMyLjA0QzQ1MS45NjgsMzQ3LjgyNCw0NzIsMjk2LjI1Niw0NzIsMjQwDQoJQzQ3MiwxMTEuODcyLDM2OC4xMjgsOCwyNDAsOHoiLz4NCjxwYXRoIHN0eWxlPSJmaWxsOiNDNkMzQkQ7IiBkPSJNMjkzLjEwNCwyNTUuOTUyQzMxOC45NTIsMjM4Ljc0NCwzMzYsMjA5LjM3NiwzMzYsMTc2YzAtNTMuMDE2LTQyLjk4NC05Ni05Ni05NnMtOTYsNDIuOTg0LTk2LDk2DQoJYzAsMzMuMzc2LDE3LjA0OCw2Mi43NDQsNDIuODk2LDc5Ljk1MmMtNjEuODY0LDE4LjY1Ni0xMTAuMDQsNjguODY0LTEyNS41NTIsMTMyLjA0YzAsMCwwLDAuMDA4LDAuMDA4LDAuMDA4DQoJYzIuNTI4LDMuMDQ4LDUuMTUyLDYuMDI0LDcuODMyLDguOTQ0YzAuNjQ4LDAuNzEyLDEuMzI4LDEuMzkyLDEuOTkyLDIuMDg4YzIuMDY0LDIuMTkyLDQuMTUyLDQuMzUyLDYuMjk2LDYuNDY0DQoJYzAuODg4LDAuODcyLDEuNzkyLDEuNzEyLDIuNjk2LDIuNTY4YzEuOTg0LDEuODg4LDMuOTkyLDMuNzUyLDYuMDQsNS41NjhjMS4wMTYsMC44OTYsMi4wNDgsMS43ODQsMy4wNzIsMi42NjQNCgljMi4wMDgsMS43Miw0LjA0LDMuNDA4LDYuMTEyLDUuMDU2YzEuMDg4LDAuODcyLDIuMTg0LDEuNzI4LDMuMjgsMi41ODRjMi4wOTYsMS42MTYsNC4yMjQsMy4xODQsNi4zNzYsNC43Mg0KCWMxLjExMiwwLjc5MiwyLjIwOCwxLjYsMy4zMzYsMi4zNzZjMi4yNzIsMS41NjgsNC41ODQsMy4wNzIsNi45MTIsNC41NmMxLjA0OCwwLjY2NCwyLjA3MiwxLjM1MiwzLjEyOCwyLjAwOA0KCWMyLjY4OCwxLjY1Niw1LjQyNCwzLjI0LDguMTg0LDQuNzkyYzAuNzI4LDAuNDA4LDEuNDQsMC44NDgsMi4xNzYsMS4yNDhjMy41NjgsMS45NTIsNy4xOTIsMy44MjQsMTAuODcyLDUuNTkyDQoJYzAuMDg4LDAuMDQsMC4xODQsMC4wOCwwLjI3MiwwLjEyYzMuNTEyLDEuNjgsNy4wOCwzLjI3MiwxMC42ODgsNC43NzZjMS4xMiwwLjQ3MiwyLjI2NCwwLjg4OCwzLjM5MiwxLjMzNg0KCWMyLjYwOCwxLjA0LDUuMjE2LDIuMDY0LDcuODcyLDMuMDA4YzEuNDA4LDAuNTA0LDIuODMyLDAuOTYsNC4yNDgsMS40NGMyLjQxNiwwLjgxNiw0Ljg0OCwxLjYwOCw3LjI5NiwyLjMzNg0KCWMxLjU1MiwwLjQ2NCwzLjExMiwwLjg5Niw0LjY4LDEuMzI4YzIuMzY4LDAuNjU2LDQuNzUyLDEuMjgsNy4xNiwxLjg2NGMxLjYyNCwwLjM5MiwzLjI1NiwwLjc2OCw0Ljg5NiwxLjEyOA0KCWMyLjQwOCwwLjUyOCw0LjgyNCwxLjAwOCw3LjI1NiwxLjQ1NmMxLjY0OCwwLjMwNCwzLjI4OCwwLjYxNiw0Ljk1MiwwLjg4YzIuNTEyLDAuNDA4LDUuMDQsMC43NTIsNy41NzYsMS4wOA0KCWMxLjYsMC4yMDgsMy4xOTIsMC40NCw0LjgsMC42MDhjMi44LDAuMzA0LDUuNjI0LDAuNTIsOC40NDgsMC43MmMxLjM2OCwwLjA5NiwyLjcyLDAuMjQsNC4wODgsMC4zMTINCgljNC4yMTYsMC4yNCw4LjQ0OCwwLjM3NiwxMi43MiwwLjM3NnM4LjUwNC0wLjEzNiwxMi43Mi0wLjM2YzEuMzY4LTAuMDcyLDIuNzI4LTAuMjE2LDQuMDg4LTAuMzEyYzIuODMyLTAuMiw1LjY1Ni0wLjQxNiw4LjQ0OC0wLjcyDQoJYzEuNjA4LTAuMTc2LDMuMi0wLjQsNC44LTAuNjA4YzIuNTM2LTAuMzI4LDUuMDY0LTAuNjcyLDcuNTc2LTEuMDhjMS42NTYtMC4yNzIsMy4zMDQtMC41NzYsNC45NTItMC44OA0KCWMyLjQzMi0wLjQ0OCw0Ljg1Ni0wLjkyOCw3LjI1Ni0xLjQ1NmMxLjY0LTAuMzYsMy4yNzItMC43MzYsNC44OTYtMS4xMjhjMi40LTAuNTg0LDQuNzg0LTEuMjA4LDcuMTYtMS44NjQNCgljMS41Ni0wLjQzMiwzLjEyOC0wLjg2NCw0LjY4LTEuMzI4YzIuNDU2LTAuNzM2LDQuODgtMS41MjgsNy4yOTYtMi4zMzZjMS40MTYtMC40OCwyLjg0OC0wLjkzNiw0LjI0OC0xLjQ0DQoJYzIuNjQ4LTAuOTUyLDUuMjY0LTEuOTY4LDcuODcyLTMuMDA4YzEuMTI4LTAuNDQ4LDIuMjcyLTAuODcyLDMuMzkyLTEuMzM2YzMuNTkyLTEuNTA0LDcuMTQ0LTMuMDgsMTAuNjQtNC43Ng0KCWMwLjEwNC0wLjA0OCwwLjIxNi0wLjA5NiwwLjMyLTAuMTQ0YzMuNjgtMS43NjgsNy4zMDQtMy42NCwxMC44NzItNS41OTJjMC43MzYtMC40LDEuNDQ4LTAuODQsMi4xNzYtMS4yNDgNCgljMi43Ni0xLjU1Miw1LjQ5Ni0zLjEzNiw4LjE4NC00Ljc5MmMxLjA1Ni0wLjY0OCwyLjA4OC0xLjMzNiwzLjEyOC0yLjAwOGMyLjMyOC0xLjQ4OCw0LjY0LTMsNi45MTItNC41Ng0KCWMxLjEyLTAuNzc2LDIuMjI0LTEuNTc2LDMuMzM2LTIuMzc2YzIuMTUyLTEuNTQ0LDQuMjgtMy4xMTIsNi4zNzYtNC43MmMxLjEwNC0wLjg0OCwyLjE5Mi0xLjcxMiwzLjI4LTIuNTg0DQoJYzIuMDY0LTEuNjQ4LDQuMTA0LTMuMzM2LDYuMTEyLTUuMDU2YzEuMDMyLTAuODgsMi4wNjQtMS43NjgsMy4wNzItMi42NjRjMi4wNDgtMS44MTYsNC4wNTYtMy42OCw2LjA0LTUuNTY4DQoJYzAuODk2LTAuODU2LDEuODA4LTEuNzA0LDIuNjk2LTIuNTY4YzIuMTQ0LTIuMTEyLDQuMjQtNC4yNzIsNi4yOTYtNi40NjRjMC42NTYtMC43MDQsMS4zMzYtMS4zODQsMS45OTItMi4wODgNCgljMi42OC0yLjkyLDUuMzA0LTUuODk2LDcuODMyLTguOTQ0YzAsMCwwLTAuMDA4LDAuMDA4LTAuMDA4QzQwMy4xNTIsMzI0LjgxNiwzNTQuOTc2LDI3NC42LDI5My4xMDQsMjU1Ljk1MnoiLz4NCjxwYXRoIHN0eWxlPSJmaWxsOiM0QjQxM0E7IiBkPSJNMjQwLDBDMTA3LjY2NCwwLDAsMTA3LjY2NCwwLDI0MGMwLDU3Ljk2LDIwLjY1NiwxMTEuMTg0LDU0Ljk5MiwxNTIuNzA0DQoJYzAuMDg4LDAuMTIsMC4wOTYsMC4yNzIsMC4xOTIsMC4zODRjMjQuNzkyLDI5Ljg5Niw1NS45MjgsNTIuODE2LDkwLjYyNCw2Ny42MjRjMC40LDAuMTY4LDAuNzkyLDAuMzUyLDEuMTkyLDAuNTINCgljMi44MDgsMS4xODQsNS42NDgsMi4yOCw4LjQ5NiwzLjM1MmMxLjEyLDAuNDI0LDIuMjQsMC44NTYsMy4zNzYsMS4yNjRjMi40NTYsMC44OCw0LjkyOCwxLjcxMiw3LjQxNiwyLjUxMg0KCWMxLjU5MiwwLjUxMiwzLjE4NCwxLjAxNiw0Ljc5MiwxLjQ5NmMyLjIsMC42NTYsNC40MDgsMS4yODgsNi42MzIsMS44ODhjMS45NTIsMC41MjgsMy45MiwxLjAxNiw1Ljg4OCwxLjQ4OA0KCWMxLjk5MiwwLjQ4LDMuOTkyLDAuOTYsNiwxLjM4NGMyLjI0LDAuNDgsNC41MDQsMC45MDQsNi43NzYsMS4zMmMxLjgyNCwwLjMzNiwzLjY0LDAuNjg4LDUuNDgsMC45ODQNCgljMi41MiwwLjQwOCw1LjA1NiwwLjcyOCw3LjYsMS4wNTZjMS42NCwwLjIwOCwzLjI3MiwwLjQ0OCw0LjkyLDAuNjI0YzIuODgsMC4zMDQsNS43ODQsMC41Miw4LjY5NiwwLjcyDQoJYzEuMzUyLDAuMDk2LDIuNjk2LDAuMjQsNC4wNTYsMC4zMTJjNC4yNDgsMC4yNCw4LjU0NCwwLjM2OCwxMi44NzIsMC4zNjhzOC42MjQtMC4xMjgsMTIuODg4LTAuMzUyDQoJYzEuMzYtMC4wNzIsMi43MDQtMC4yMTYsNC4wNTYtMC4zMTJjMi45MTItMC4yMDgsNS44MTYtMC40MTYsOC42OTYtMC43MmMxLjY0OC0wLjE3NiwzLjI4LTAuNDE2LDQuOTItMC42MjQNCgljMi41NDQtMC4zMjgsNS4wOC0wLjY0OCw3LjYtMS4wNTZjMS44MzItMC4yOTYsMy42NTYtMC42NDgsNS40OC0wLjk4NGMyLjI2NC0wLjQxNiw0LjUyOC0wLjg0LDYuNzc2LTEuMzINCgljMi4wMDgtMC40MzIsNC0wLjkwNCw2LTEuMzg0YzEuOTY4LTAuNDgsMy45MzYtMC45NjgsNS44ODgtMS40ODhjMi4yMjQtMC41OTIsNC40MzItMS4yMzIsNi42MzItMS44ODgNCgljMS42MDgtMC40OCwzLjItMC45ODQsNC43OTItMS40OTZjMi40ODgtMC44LDQuOTYtMS42MzIsNy40MTYtMi41MTJjMS4xMjgtMC40MDgsMi4yNDgtMC44NCwzLjM3Ni0xLjI2NA0KCWMyLjg1Ni0xLjA3Miw1LjY4OC0yLjE3Niw4LjQ5Ni0zLjM1MmMwLjQtMC4xNjgsMC43OTItMC4zNTIsMS4xOTItMC41MmMzNC42ODgtMTQuODA4LDY1LjgzMi0zNy43MjgsOTAuNjI0LTY3LjYyNA0KCWMwLjA5Ni0wLjExMiwwLjEwNC0wLjI3MiwwLjE5Mi0wLjM4NEM0NTkuMzQ0LDM1MS4xODQsNDgwLDI5Ny45Niw0ODAsMjQwQzQ4MCwxMDcuNjY0LDM3Mi4zMzYsMCwyNDAsMHogTTI4Ny44NzIsMjQ5LjczNg0KCWMtMy4xNTIsMi4wNDgtNi40MzIsMy44OC05LjgsNS40OGMtMC40LDAuMTkyLTAuNzkyLDAuMzkyLTEuMTkyLDAuNTc2Yy0yMy4xNjgsMTAuNTM2LTUwLjU5MiwxMC41MzYtNzMuNzYsMA0KCWMtMC40LTAuMTg0LTAuOC0wLjM4NC0xLjE5Mi0wLjU3NmMtMy4zNzYtMS42LTYuNjQ4LTMuNDMyLTkuOC01LjQ4QzE2OC4wMDgsMjM0LjAyNCwxNTIsMjA2Ljg2NCwxNTIsMTc2YzAtNDguNTIsMzkuNDgtODgsODgtODgNCglzODgsMzkuNDgsODgsODhDMzI4LDIwNi44NjQsMzExLjk5MiwyMzQuMDI0LDI4Ny44NzIsMjQ5LjczNnogTTE4OS4xNTIsMjY2LjYzMmMwLjY3MiwwLjM3NiwxLjMzNiwwLjc3NiwyLjAxNiwxLjEzNg0KCWMyLjM4NCwxLjI2NCw0LjgsMi40NDgsNy4yNzIsMy41MTJjMS44OTYsMC44MzIsMy44NTYsMS41MzYsNS44MDgsMi4yNTZjMC4zODQsMC4xMzYsMC43NjgsMC4yODgsMS4xNTIsMC40MjQNCgljMTAuODQ4LDMuODQsMjIuNDU2LDYuMDQsMzQuNiw2LjA0YzEyLjE0NCwwLDIzLjc1Mi0yLjIsMzQuNTkyLTYuMDRjMC4zODQtMC4xMzYsMC43NjgtMC4yODgsMS4xNTItMC40MjQNCgljMS45NTItMC43MiwzLjkxMi0xLjQyNCw1LjgwOC0yLjI1NmMyLjQ3Mi0xLjA2NCw0Ljg4OC0yLjI0OCw3LjI3Mi0zLjUxMmMwLjY4LTAuMzY4LDEuMzQ0LTAuNzYsMi4wMTYtMS4xMzYNCgljMS4xNDQtMC42NCwyLjMxMi0xLjI0OCwzLjQzMi0xLjkzNmM1Ni4zMiwxOC4yNzIsMTAwLjA4OCw2NC4xNzYsMTE1LjU2LDEyMS4xMTJjLTIwLjAwOCwyMy4yNzItNDQuNjY0LDQyLjQ0LTcyLjU3Niw1NS45NTINCgljLTAuMTIsMC4wNTYtMC4yMzIsMC4xMi0wLjM1MiwwLjE3NmMtMi44NTYsMS4zNzYtNS43NiwyLjY3Mi04LjY4OCwzLjkzNmMtMC42NjQsMC4yOC0xLjMyLDAuNTY4LTEuOTg0LDAuODQ4DQoJYy0yLjU2LDEuMDcyLTUuMTUyLDIuMDg4LTcuNzYsMy4wNjRjLTEuMDg4LDAuNDA4LTIuMTc2LDAuODA4LTMuMjcyLDEuMTkyYy0yLjMxMiwwLjgyNC00LjYzMiwxLjYxNi02Ljk3NiwyLjM2OA0KCWMtMS40NTYsMC40NjQtMi45MiwwLjkwNC00LjM4NCwxLjMzNmMtMi4wOCwwLjYyNC00LjE2OCwxLjIyNC02LjI4LDEuNzg0Yy0xLjc3NiwwLjQ3Mi0zLjU2OCwwLjkwNC01LjM2LDEuMzI4DQoJYy0xLjg4LDAuNDQ4LTMuNzUyLDAuOTA0LTUuNjQ4LDEuMzA0Yy0yLjA3MiwwLjQ0LTQuMTYsMC44MTYtNi4yNCwxLjE5MmMtMS42ODgsMC4zMTItMy4zNjgsMC42NC01LjA3MiwwLjkxMg0KCWMtMi4zNDQsMC4zNjgtNC43MTIsMC42NjQtNy4wNzIsMC45NmMtMS40OTYsMC4xOTItMi45ODQsMC40MTYtNC40OTYsMC41NzZjLTIuNjk2LDAuMjg4LTUuNDE2LDAuNDcyLTguMTI4LDAuNjY0DQoJYy0xLjIwOCwwLjA4LTIuNDA4LDAuMjE2LTMuNjMyLDAuMjhjLTMuOTYsMC4yMDgtNy45MjgsMC4zMi0xMS45MTIsMC4zMnMtNy45NTItMC4xMTItMTEuOTA0LTAuMzINCgljLTEuMjE2LTAuMDY0LTIuNDE2LTAuMTkyLTMuNjMyLTAuMjhjLTIuNzItMC4xODQtNS40MzItMC4zNzYtOC4xMjgtMC42NjRjLTEuNTEyLTAuMTYtMy0wLjM4NC00LjQ5Ni0wLjU3Ng0KCWMtMi4zNi0wLjI5Ni00LjcyOC0wLjU5Mi03LjA3Mi0wLjk2Yy0xLjcwNC0wLjI3Mi0zLjM4NC0wLjYtNS4wNzItMC45MTJjLTIuMDg4LTAuMzc2LTQuMTc2LTAuNzYtNi4yNC0xLjE5Mg0KCWMtMS44OTYtMC40LTMuNzc2LTAuODU2LTUuNjQ4LTEuMzA0Yy0xLjc5Mi0wLjQzMi0zLjU4NC0wLjg1Ni01LjM2LTEuMzI4Yy0yLjEwNC0wLjU2LTQuMi0xLjE2OC02LjI4LTEuNzg0DQoJYy0xLjQ2NC0wLjQzMi0yLjkyOC0wLjg3Mi00LjM4NC0xLjMzNmMtMi4zNDQtMC43NTItNC42NzItMS41NDQtNi45NzYtMi4zNjhjLTEuMDk2LTAuMzkyLTIuMTg0LTAuNzkyLTMuMjcyLTEuMTkyDQoJYy0yLjYwOC0wLjk3Ni01LjItMS45OTItNy43Ni0zLjA2NGMtMC42NjQtMC4yNzItMS4zMTItMC41Ni0xLjk3Ni0wLjg0Yy0yLjkyOC0xLjI1Ni01LjgzMi0yLjU2LTguNjk2LTMuOTM2DQoJYy0wLjEyLTAuMDU2LTAuMjMyLTAuMTEyLTAuMzUyLTAuMTc2Yy0yNy45MTItMTMuNTA0LTUyLjU2OC0zMi42NzItNzIuNTc2LTU1Ljk1MmMxNS40NjQtNTYuOTQ0LDU5LjI0LTEwMi44NDgsMTE1LjU2LTEyMS4xMTINCglDMTg2Ljg0OCwyNjUuMzg0LDE4OC4wMDgsMjY1Ljk5MiwxODkuMTUyLDI2Ni42MzJ6IE00MjEuODMyLDM3MC41ODRjLTE4LjEzNi01My41NTItNTkuNTEyLTk2LjgzMi0xMTIuMzc2LTExNy4zOTINCglDMzMwLjYsMjM0LjE0NCwzNDQsMjA2LjY0LDM0NCwxNzZjMC01Ny4zNDQtNDYuNjU2LTEwNC0xMDQtMTA0cy0xMDQsNDYuNjU2LTEwNCwxMDRjMCwzMC42NCwxMy40LDU4LjE0NCwzNC41NTIsNzcuMTkyDQoJYy01Mi44NjQsMjAuNTY4LTk0LjI0LDYzLjg0LTExMi4zNzYsMTE3LjM5MkMzMS42NzIsMzMzLjc5MiwxNiwyODguNzA0LDE2LDI0MEMxNiwxMTYuNDg4LDExNi40ODgsMTYsMjQwLDE2czIyNCwxMDAuNDg4LDIyNCwyMjQNCglDNDY0LDI4OC43MDQsNDQ4LjMyOCwzMzMuNzkyLDQyMS44MzIsMzcwLjU4NHoiLz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K" alt="mdo" width="40" height="40" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>

            </div> 
        </div>
        </nav>
    </header> 
<body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Device Information</h2>
      <h5 style="color: red">Do you want to delete this device? </h5>
  </div>
  <br>
  <form method="post" action="user_delete_do.php" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div class="row g-5">

      <div class="col-lg-8 center">
        <form class="needs-validation" novalidate="">
          <div class="row g-3">

          <br>

          <div class="col-12">
            <label for="address" class="form-label">Employee Number</label>
            <input type="text" class="form-control" name="code" value="<?php echo $row['code']; ?>">
        </div>

            <div class="col-12">
              <label for="address" class="form-label">Name</label>
              <input type="text" class="form-control" name="type" value="<?php echo $row['name']; ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="brand" value="<?php echo $row['phonenumber']; ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Username</label>
              <input type="text" class="form-control" name="model" value="<?php echo $row['username']; ?>">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Role</label>
              <input type="text" class="form-control" name="model" value="<?php echo $row['role']; ?>">
            </div>

          <hr class="my-4">
          
            <div class="row">
                  <div class="col-md-6">
                    <button type="submit" style="background-color: #4CAF50;" class="w-100 btn btn-lg"><div style="color: aliceblue;" >Confirm</div></button>                  
                  </div>
                  <div class="col-md-6">
                    <a href="manage_user.php" style="background-color: #C70039;" class="w-100 btn-lg btn">Cancel</a>
                  </div>
            </div>
        </form>
      </div>
    </div>
  </main>
</div>

</body>
            <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
            <script src="form-validation.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        </body>
</html>

