<!DOCTYPE html>
<html>
<head>
<title>Add User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/public/css/app.css">
</head>
<body>

<div class="container">
    <div class="categories"></div>
    <div class="content">
        <h3>Thêm người dùng</h3>
        <hr>
        <form action="/site/controller/UserController.php" method="POST" enctype="multipart/form-data">
            <div class="flex-content">
                <div class="label-item">
                    <label for="name">Họ và tên</label>
                    <label for="email">Email</label>
                    <label for="birthday">Ngày sinh</label>
                    <label for="phone">Số điện thoại</label>
                    <label for="address">Địa chỉ</label>
                    <label for="gender">Giới tính</label>
                    <label for="avatar">Avatar</label>
                </div>
                <div class="input-item">
                    <input type="text" id="fullname" name="fullname" placeholder="Luka Modric" required>
                    <input type="text" id="email" name="email" placeholder="example@gmail.com" required>
                    <input type="date" id="birthday" name="birthday" required>
                    <input type="tel" id="phone" name="phone" placeholder="0123-456-789" pattern="[0-9]{4}-[0-9]{2}-[0-9]{3}" required>
                    <input type="text" id="address" name="address" required>
                    <div class="gender">
                        <input type="radio" id="male" name="gender" value="male" checked>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                    <input type="file" id="avatar" name="avatar">
                </div>
            </div>
            <br>
            <input class="add" type="submit" value="Thêm">
        </form>
    </div>
    <div class="sidebar"></div>
</div>
</body>
</html>
