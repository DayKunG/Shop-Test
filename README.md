# โปรเจคร้านค้า Laravel + Livewire + Tailwind CSS

โปรเจคทดลองสำหรับการเรียนรู้ Database และ Backend โดยใช้ Laravel, Livewire และ Tailwind CSS

## ฟีเจอร์

### 1. ระบบ Authentication
- **Login**: หน้าเข้าสู่ระบบ
- **Register**: หน้าสมัครสมาชิก
- ข้อมูลผู้ใช้จะถูกบันทึกใน Database (MySQL/SQLite)

### 2. หน้า Product (สินค้า)
- แสดงสินค้าทั้งหมดในรูปแบบ Grid
- ปุ่ม "ใส่ตะกร้า" - เพิ่มสินค้าเข้าตะกร้า
- ปุ่ม "ซื้อ" และ "ถูกใจ" (ยังไม่ใช้งาน - สำหรับทดสอบเท่านั้น)

### 3. หน้า Cart (ตะกร้า)
- แสดงสินค้าที่เพิ่มในตะกร้า
- แสดงราคารวม
- ปุ่มลบสินค้าออกจากตะกร้า
- ข้อมูลตะกร้าถูกบันทึกใน Database

## การติดตั้ง

1. ติดตั้ง dependencies:
```bash
composer install
npm install
```

2. ตั้งค่า .env:
```bash
cp .env.example .env
php artisan key:generate
```

3. ตั้งค่า Database:
- สำหรับ MySQL: แก้ไข DB_CONNECTION, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD ใน .env
- สำหรับ SQLite: ใช้ค่า default (DB_CONNECTION=sqlite)

4. รัน migrations และ seeders:
```bash
php artisan migrate
php artisan db:seed
```

5. Build assets:
```bash
npm run build
# หรือสำหรับ development
npm run dev
```

6. รันเซิร์ฟเวอร์:
```bash
php artisan serve
```

## การใช้งาน

1. เปิดเบราว์เซอร์ไปที่ `http://localhost:8000`
2. สมัครสมาชิกใหม่หรือเข้าสู่ระบบ
3. ดูสินค้าและกดปุ่ม "ใส่ตะกร้า"
4. ไปที่หน้า "ตะกร้า" เพื่อดูสินค้าที่เพิ่มไว้
5. ลบสินค้าออกจากตะกร้าได้โดยกดปุ่ม "ลบ"

## โครงสร้าง Database

### ตาราง users
- id
- name
- email
- password
- timestamps

### ตาราง products
- id
- name
- description
- price
- image
- stock
- timestamps

### ตาราง carts
- id
- user_id (foreign key)
- product_id (foreign key)
- quantity
- timestamps

## หมายเหตุ

- นี่เป็นโปรเจคทดลองสำหรับการเรียนรู้เท่านั้น
- UI เน้นความใช้งานได้มากกว่าความสวยงาม
- ฟีเจอร์ "ซื้อ" และ "ถูกใจ" ยังไม่ถูกใช้งาน
