<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: relative;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .user-info {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            align-items: center;
        }

        .user-info a{
            text-decoration: none;
        }

        .user-info span {
            margin-right: 10px;
            color: #333;
            font-weight: bold;
        }

        .logout-button {
            padding: 5px 10px;
            border: none;
            background: #ff6b6b;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout-button:hover {
            opacity: 0.8;
        }

        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        form input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
            font-size: 16px;
        }

        form button {
            padding: 10px 20px;
            border: none;
            background: #5c9ded;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background: #3d8bdb;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #eee;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li span {
            flex: 1;
            margin-right: 10px;
        }

        li button {
            border: none;
            background: #ff6b6b;
            color: #fff;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            margin-left: 5px;
        }

        li button.done {
            background: #5cb85c;
        }

        li button:hover {
            opacity: 0.8;
        }

        li.completed span {
            text-decoration: line-through;
            color: #aaa;
        }

        #list_todo a{
            border: none;
            background: #ff6b6b;
            color: #fff;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            margin-left: 5px;
            text-decoration: none;
        }
        #list_todo a.done{
            background: #5cb85c;
            
        }
        .notification {
        display: block;
        position: fixed;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

.notification .close-button {
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
    </style>
</head>
<body>
    
    <?php if(session()->has('success')): ?>
        <div id="notification" class="notification">
        <span class="close-button" onclick="closeNotification()">&times;</span> 
            <p><?=
                session()->get('success');
            ?></p>
        </div>

        <?php
              session()->remove('success');
        ?>
    <?php elseif(session()->has('error')): ?>
        <span class="close-button" onclick="closeNotification()">&times;</span> 
        <div id="notification" class="notification">
            <p><?=
                session()->get('error');
            ?></p>
              <?php
              session()->remove('error');
        ?>
        </div>
    <?php endif; ?>


    <div class="user-info">
        <span id="user-name"><?= isset($user_data['username']) ? esc($user_data['username']) : 'User' ?></span>
        <a href="/prosesLogout" class="logout-button" id="logout-button">Logout</a>
    </div>

    <div class="container">
        <h1>To-Do List</h1>
        <form id="todo-form" action="todolist/tambah" method="get">
            <input type="text" id="todo-input" placeholder="Masukan Kegiatan" name="nama_kegiatan">
            <button type="submit">Add</button>
        </form>

        <ul id="todo-list">
            <!-- tempaat list list -->
            <?php
                foreach ($todo_data['daftar_kegiatan'] as $todo) {
                    echo '<li id="list_todo">';
                    echo '<span>' . $todo['kegiatan'] . '</span>';
                    echo '<a class="done" href="todolist/selesai/'.$todo['idkegiatan'].'">Selesai</a>';
                    echo '<a class="delete" href="todolist/hapus/'.$todo['idkegiatan'].'">Hapus</a>';
                    echo '</li>';
                }
            ?>
        </ul>
    </div>
</body>

<script>
      
        function closeNotification() {
            var notification = document.getElementById('notification');
            notification.style.display = 'none';
        }
    </script>

</html>
