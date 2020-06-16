<?php

require './UserController.php';

$userID = isset($_GET['id']) ? $_GET['id'] : '';
if (!empty($userID)) {
    $user = getUserById($userID);
}

// Back user list screnn if data is empty
if (empty($user)) {
    header('Location: list.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/public/css/app.css">
</head>
<body>

<div class="container"> 
    <div class="categories"></div>
    <div class="content">
        <h3>Chỉnh sửa thông tin người dùng</h3>
        <hr>
        <form action="/UserController.php" method="POST" enctype="multipart/form-data">
            <div class="flex-content">
                <div class="label-item">
                    <label for="fullname">Họ và tên</label>
                    <label for="email">Email</label>
                    <label for="birthday">Ngày sinh</label>
                    <label for="phone">Số điện thoại</label>
                    <label for="address">Địa chỉ</label>
                    <label for="gender">Giới tính</label>
                    <label for="avatar">Avatar</label>
                </div>
                <div class="input-item">
                    <input type="text" id="fullname" name="fullname" value="<?php echo $user['display_name']; ?>" required>
                    <input type="text" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    <input type="date" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>" required>
                    <input type="tel" id="phone" name="phone" value="<?php echo $user['phone_number']; ?>" required>
                    <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" required>
                    <div class="gender">
                        <input type="radio" id="male" name="gender" value="male"
                            <?php if ($user['gender'] == 1) : ?>
                                checked="checked"
                            <?php endif; ?>
                        >
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"
                            <?php if ($user['gender'] != 1) : ?>
                                    checked="checked"
                            <?php endif; ?>
                        >
                        <label for="female">Female</label>
                    </div>
                    <input type="file" id="avatar" name="avatar">
                </div>
            </div>
            <br>
            <input type="hidden" id="#" name="actionName" value="edit">
            <input type="hidden" id="id" name="id" value="<?php echo $userID; ?>">
            <input class="add" type="submit" value="Cập nhật">
        </form>
    </div>
    <div class="sidebar"></div>
</div>
</body>
</html>
