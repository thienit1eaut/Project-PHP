<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm tài khoản quản trị</title>
</head>
<body>
    <form action="{{ route('admin.add-account') }}" method="post" accept-charset="UTF-8">
        @csrf
        <div class="input-form">
            <input type="text" name="name" placeholder="Nhập tên">
            <input type="text" name="username" placeholder="Nhập tên đăng nhập">
            <input type="password" name="password" placeholder="Nhập tên đăng nhập">
            <input type="text" name="email" placeholder="Nhập email">
        </div>
        <button type="submit" name="add_account">THÊM TÀI KHOẢN</button>
    </form>
</body>
</html>