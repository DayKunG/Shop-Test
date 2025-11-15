# วิธีเช็ค Database ใน MySQL

## วิธีที่ 1: ใช้ Laravel Tinker (แนะนำ - ง่ายที่สุด)

### เปิด Tinker:
```bash
php artisan tinker
```

### คำสั่งที่ใช้บ่อย:

#### ดูข้อมูล Users:
```php
User::all();
User::count();
User::where('email', 'test@example.com')->first();
```

#### ดูข้อมูล Products:
```php
Product::all();
Product::count();
Product::find(1);
```

#### ดูข้อมูล Carts:
```php
Cart::all();
Cart::with('user', 'product')->get();
Cart::where('user_id', 1)->get();
```

#### ดูข้อมูลพร้อม Relationships:
```php
$user = User::with('carts.product')->find(1);
$user->carts;
```

#### ออกจาก Tinker:
```php
exit
```

---

## วิธีที่ 2: ใช้ MySQL Command Line

### เชื่อมต่อ MySQL:
```bash
mysql -u root -p
```

### คำสั่งที่ใช้บ่อย:

#### เลือก Database:
```sql
USE shop_project;  -- หรือชื่อ database ที่คุณตั้งไว้
```

#### ดูตารางทั้งหมด:
```sql
SHOW TABLES;
```

#### ดูข้อมูลในตาราง users:
```sql
SELECT * FROM users;
SELECT id, name, email, created_at FROM users;
```

#### ดูข้อมูลในตาราง products:
```sql
SELECT * FROM products;
SELECT id, name, price, stock FROM products;
```

#### ดูข้อมูลในตาราง carts พร้อม JOIN:
```sql
SELECT 
    c.id,
    u.name AS user_name,
    p.name AS product_name,
    c.quantity,
    c.created_at
FROM carts c
JOIN users u ON c.user_id = u.id
JOIN products p ON c.product_id = p.id;
```

#### นับจำนวนข้อมูล:
```sql
SELECT COUNT(*) FROM users;
SELECT COUNT(*) FROM products;
SELECT COUNT(*) FROM carts;
```

---

## วิธีที่ 3: ใช้ MySQL Workbench (GUI - ง่ายสำหรับผู้เริ่มต้น)

1. เปิด MySQL Workbench
2. เชื่อมต่อกับ MySQL Server (ใช้ข้อมูลจาก .env)
3. เลือก Database ที่ต้องการดู
4. คลิกขวาที่ตาราง → Select Rows - Limit 1000

---

## วิธีที่ 4: ใช้ phpMyAdmin (ถ้ามีติดตั้ง)

1. เปิดเบราว์เซอร์ไปที่ `http://localhost/phpmyadmin`
2. เลือก Database
3. คลิกที่ตารางที่ต้องการดู

---

## วิธีที่ 5: ใช้ Laravel Artisan Commands

### ดูข้อมูลผ่าน Artisan:
```bash
# ดูข้อมูล users
php artisan tinker --execute="User::all()->toArray();"

# ดูข้อมูล products
php artisan tinker --execute="Product::all()->toArray();"

# ดูข้อมูล carts
php artisan tinker --execute="Cart::with('user', 'product')->get()->toArray();"
```

---

## ตัวอย่างการเช็คข้อมูลที่สำคัญ

### เช็คว่ามี User อยู่กี่คน:
```php
// ใน Tinker
User::count();
```

### เช็คว่ามี Product อะไรบ้าง:
```php
// ใน Tinker
Product::select('id', 'name', 'price')->get();
```

### เช็คตะกร้าของ User คนที่ 1:
```php
// ใน Tinker
$user = User::find(1);
$user->carts()->with('product')->get();
```

### เช็คราคารวมในตะกร้า:
```php
// ใน Tinker
$carts = Cart::with('product')->get();
$total = $carts->sum(function($cart) {
    return $cart->product->price * $cart->quantity;
});
echo $total;
```

---

## หมายเหตุ

- ตรวจสอบว่าในไฟล์ `.env` ตั้งค่า `DB_CONNECTION=mysql` แล้ว
- ตรวจสอบว่า MySQL Server กำลังทำงานอยู่
- ตรวจสอบว่า Database ถูกสร้างแล้ว (`CREATE DATABASE shop_project;`)
- ตรวจสอบว่า migrations รันแล้ว (`php artisan migrate`)

